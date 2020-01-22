<?php
namespace App\Http\Controllers\Front;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vente;
use App\Models\Order;
use App\Models\User;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Deliverie;
use Illuminate\Mail\Mailable;
use App\Mail\OrderPayed;
use App\Mail\OrderPayedAdmin;
use App\Notifications\SendPaymentAcceptedEmail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Redirect;
use Auth;
use Mail;

use App\Notifications\SendPaymentRefusedEmail;
use App\Notifications\SendNewOrderDetails;

class PaymentController extends Controller
{
  use ActivityLogger;


  /**
    * Create a payment transaction via Paybox.
    *
    * @param Request $request
    *
    * @return \Illuminate\Http\Response
  */
  public function create($order){
    $order = Order::where('order_id', $order)->firstOrFail();
    $user = User::where('id', $order->user_id)->firstOrFail();
    if(Auth::user()->id != $user->id){
      return abort('401');
    }

    if($order->payment_status == true){
      return redirect("profile/$user->name")->with('error', "Cette commande semble déjà avoir été payé (Réference de paiement: $order->payment_id)");
    }

    $payments = $order->payments;

    $payment = $payments->where('order_id', $order->id)->where('response_code', null)->where('info', 'created')->where('status', 0)->first();

    if(!$payment){

      $payment = Payment::create([
        'status' => 'false',
        'ref_id' => rand() * time(),
        'order_id' => $order->id,
        'user_id' => $user->id,
        'amount' => $order->amount,
      ]);

      $payment->user()->associate($user->id);
      $payment->save();

    }


    ActivityLogger::activity($order->user->email . " a été redirigé vers la page de paiement [Commande: $order->order_id | Ref paiement: $payment->ref_id] ");

    $authorizationRequest = \App::make(\Bnb\PayboxGateway\Requests\Paybox\AuthorizationWithCapture::class);
    return $authorizationRequest->setAmount($order->amount)->setCustomerEmail($order->user->email)
                ->setPaymentNumber($payment->ref_id)->send('paybox.send');
  }
    /**
      * Validation callback from Etransaction for each payment
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function process(Request $request){
      $validatedData = $request->validate([
        'amount' => 'required',
        'response_code' => 'required',
        'transaction_number' => 'required',
      ]);
      $payment = Payment::where('ref_id', $request->input('order_number'))->firstOrFail();
      $payboxVerify = \App::make(\Bnb\PayboxGateway\Responses\Paybox\Verify::class);
      // Let's check the authentsity of the payment
      try {
          $success = $payboxVerify->isSuccess($payment->amount);
          // Process is now successful, we can modify the status of the payment/order
          if ($success) {
            ActivityLogger::activity("Paiement $payment->ref_id validé par e-transaction");

            //$payment->amount = $request->amount / 100;
            $payment->auth_number = $request->authorization_number;
            $payment->response_code = $request->response_code;
            $payment->payment_method = $request->payment_type;
            $payment->call_number = $request->call_number;
            $payment->transaction_number = $request->transaction_number;
            $payment->status = true;
            $order = $payment->order;
            $order->status = "paiement validé";
            $order->payment_id = $payment->ref_id;
            $order->payment_status = true;
            $order->transaction_id = $request->transaction_number;
            $order->payment_method = $request->payment_type;
            foreach($order->products as $product){
              //$product->stock = $product->stock - $product->pivot->quantity;
              $product->save();
              ActivityLogger::activity($product->pivot->quantity . " " . $product->name .  " ont été retiré du stock pour la commande " . $order->order_id);

            }

              $admins = User::whereHas('roles', function ($query) {
                      $query->where('name', 'admin');
              })->get();
              foreach($admins as $admin){
                $admin->notify(new SendNewOrderDetails($order));
              }
            $order->user->notify(new SendPaymentAcceptedEmail($payment));
            $order->save();
            $payment->save();

            echo('OK');
          }
      }
      catch (InvalidSignature $e) {
          Log::alert('Invalid payment signature detected. Contact: webmaster@plantesaddict.fr');
      }
    }
    /**
      * Display a list of the sales.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function accepted(Request $request){
      $payment = Payment::where('ref_id', $request->input('order_number'))->firstOrFail();
      $payboxVerify = \App::make(\Bnb\PayboxGateway\Responses\Paybox\Verify::class);
      try {
          $success = $payboxVerify->isSuccess($payment->amount);
          if ($success) {
            $order = $payment->order;


            if($order->cart == "shop"){
              $deliverie = $order->deliverie;
              $deliverie->status = 'a préparer';
              $deliverie->save();
            }
            //$order->user->notify(new SendPaymentAcceptedEmail($order));
            ActivityLogger::activity($order->user->email . "a payé sa commande et a été redirigé vers les détails de sa commande. En attente de la confirmation de e-transaction...");

            return redirect("profile/" . $order->user->name ."/commandes/" )->with('success', 'Réussi! Votre paiement a été accepté, un email va vous être envoyé une fois validé par notre banque.');
          }
      }
      catch (InvalidSignature $e) {
          Log::alert('Invalid payment signature detected. Contact: webmaster@plantesaddict.fr');
      }
      // Go to payment
    }
    /**
      * Display a list of the sales.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function aborted(){
      $user = Auth::user();
      $payment = $user->payments->first();
      $payment->info = "aborted";
      $payment->status = false;
      // $payment->response_code = $request->input('response_code');
      // $payment->transaction_number = $request->input('transaction_number');
      $payment->save();
      return redirect("/home")->with('error', '<strong>Oops!</strong> Vous avez annulé votre paiement.');

    }
    /**
      * Display a list of the sales.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function refused(Request $request){
      $payment = Payment::where('ref_id', $request->input('order_number'))->firstOrFail();
      $payment->status = "refused";
      $payment->amount = $request->input('amount') / 100;
      $payment->response_code = $request->input('response_code');
      $payment->transaction_number = $request->input('transaction_number');
      $payment->auth_number = $request->input('authorization_number');
      $payment->call_number = $request->input('call_number');
      $order = $payment->order;
      $order->user->notify(new SendPaymentRefusedEmail($order));
      $payment->save();
      // $order->paymentMethod = $request->payment_type;
      // $order->transactionNumber = $request->transaction_number;
      // $order->save();
      return redirect("/home")->with('error', 'Votre paiement a été refusé. Numéro de transaction: ' . $payment->transaction_number);
      //return view('paybox.refused');
      // Go to payment
    }
    /**
      * Display a list of the sales.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function waiting(){
      return redirect("/compte")->with('warning', '<strong>Patience...</strong> En attente de confirmation de la part de notre banque.');
      // Go to payment
    }
}
