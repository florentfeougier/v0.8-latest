<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\Vente;
use App\Models\Product;
use App\Models\Order;
use App\Models\Payment;
use App\Traits\CaptureIpTrait;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use jeremykenedy\LaravelRoles\Models\Role;
use Validator;
use Cache;

class OrdersManagementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $pagintaionEnabled = config('ordersmanagement.enablePagination');
        $orders = Cache::remember('orders', 5, function() {
          return Order::with('user')->get()->sortByDesc("created_at");
        });

        return View('ordersmanagement.show-orders', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('ordersmanagement.create-order', [
          'users' => User::all(),
          'payments' => Payment::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'order_id'                  => 'required|max:255|unique:orders',
                'amount'            => 'required',
                'cart'             => 'required',
                'user_id'                 => 'required',
                'product1'                 => 'required|numeric',
                'quantity1'                 => 'required|numeric',
                'product2'                 => 'nullable|numeric',
                'quantity2'                 => 'nullable|numeric',
                'product3'                 => 'nullable|numeric',
                'product4'                 => 'nullable|numeric',

            ],
            [
                'name.unique'         => trans('auth.userNameTaken'),
                'name.required'       => trans('auth.userNameRequired'),
                'first_name.required' => trans('auth.fNameRequired'),
                'last_name.required'  => trans('auth.lNameRequired'),
                'email.required'      => trans('auth.emailRequired'),
                'email.email'         => trans('auth.emailInvalid'),
                'password.required'   => trans('auth.passwordRequired'),
                'password.min'        => trans('auth.PasswordMin'),
                'password.max'        => trans('auth.PasswordMax'),
                'role.required'       => trans('auth.roleRequired'),
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


        $order = Order::create([
            'order_id'             => $request->input('order_id'),
            'amount'       => $request->input('amount'),
            'user_id'        => $request->input('user_id'),
            'cart'            => $request->input('cart'),
          //  'created_at'        => $request->input('created_at'),
          //  'updated_at'        => $request->input('created_at'),
        ]);

        $product1 = Product::find($request->input('product1'));
        $order->products()->attach($product1->id, [ "quantity" => $request->input('quantity1'), "price" => $product1->price]);


        $counter = 2;
        while($counter >= 2){

          if($request->input('product' . $counter) != null)
          {
            $productX = Product::find($request->input('product' . $counter));
            $order->products()->attach($productX->id, [ "quantity" => $request->input('quantity' . $counter), "price" => $productX->price]);
            $counter++;

          }
          else {
            $counter = 0;
          }
        }


        $order->save();


        return redirect("manager/orders" . $order->id . "/edit")->with('success', trans('ordersmanagement.createSuccess'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $order = Order::where('order_id', $id)->first();
        if(empty($order)){
          $order = Order::findOrFail($id);

        }

        return view('ordersmanagement.show-order')->withOrder($order);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function receipt(Request $request, $id)
    {

        $order = Order::where('order_id', $id)->first();
        if(empty($order)){
          $order = Order::findOrFail($id);

        }

        return view('ordersmanagement.show-order-receipt')->withOrder($order);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);



        $data = [
            'order'        => $order,

        ];

        return view('ordersmanagement.edit-order')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $currentUser = Auth::user();
        $order = Order::find($id);

      //  $emailCheck = ($request->input('email') != '') && ($request->input('email') != $order->email);
      //  $ipAddress = new CaptureIpTrait();


            $validator = Validator::make($request->all(), [
                // 'name'     => 'required|max:255|unique:orders,name,'.$id,
                // 'password' => 'nullable|confirmed|min:6',
            ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        //$order->name = $request->input('name');
        //$order->first_name = $request->input('first_name');
        //$order->last_name = $request->input('last_name');


        if ($request->input('closed') == true) {
            $order->closed = true;
        } else {
          $order->closed = false;

        }

        //dd($request);
        if($request->input('payment_id')){
          $payment = Payment::find($request->input('payment_id'));
          if($payment->response_code == "00000") {
            $order->payment_id = $payment->ref_id;
            $order->payment_status = true;
            $order->transaction_id = $payment->transaction_number;
            $order->payment_method = $payment->payment_method;
          }

        }

        $order->products()->detach();
        $product1 = Product::find($request->input('product1'));
        $order->products()->attach($product1->id, [ "quantity" => $request->input('quantity1'), "price" => $product1->price]);


        $counter = 2;
        while($counter >= 2){

          if($request->input('product' . $counter) != null)
          {
            $productX = Product::find($request->input('product' . $counter));
            $order->products()->attach($productX->id, [ "quantity" => $request->input('quantity' . $counter), "price" => $productX->price]);
            $counter++;

          }
          else {
            $counter = 0;
          }
        }


        $order->save();
        //dd($order->products);



      //  $order->updated_ip_address = $ipAddress->getClientIp();



        $order->save();

        return back()->with('success', trans('ordersmanagement.updateSuccess'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $order = Order::findOrFail($id);
        $order->delete();

        return redirect('manager/orders')->with('success', "Commande supprimée!");

    }

    /**
     * Method to search the orders.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $searchTerm = $request->input('order_search_box');
        $searchRules = [
            'order_search_box' => 'required|string|max:255',
        ];
        $searchMessages = [
            'order_search_box.required' => 'Search term is required',
            'order_search_box.string'   => 'Search term has invalid characters',
            'order_search_box.max'      => 'Search term has too many characters - 255 allowed',
        ];

        $validator = Validator::make($request->all(), $searchRules, $searchMessages);

        if ($validator->fails()) {
            return response()->json([
                json_encode($validator),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $results = Order::where('order_id', 'like', $searchTerm.'%')
                            ->orWhere('cart', 'like', $searchTerm.'%')->get();
                           // ->orWhere('name', 'like', '%'.$searchTerm.'%')->get();
                          //  ->orWhere('price', 'like', $searchTerm.'%')
                          //  ->orWhere('tax', 'like', $searchTerm.'%')
                          //  ->orWhere('description', 'like', $searchTerm.'%')->get();


      if($results->isEmpty() == 1){
        $user = User::where('email', $searchTerm)->first();
        $results = $user->orders;
      }

        return response()->json([
            json_encode($results),
        ], Response::HTTP_OK);
    }


    public function unpaidNotificationCheck($id){

      $order = Order::find($id);

      // Send notif is last one was more than 24h ago
      if($order->updated_at < \Carbon\Carbon::now()->subDay(1)){

        $order->updated_at = \Carbon\Carbon::now()->toDateTimeString();
        
      // Else throw a message to the admin
      } else{
        return back()->with('error', "Cet utilisateur a déjà été notifié il y a moins de 24h.");
      }

      $order->save();
      // In any case we redirect to the same page
      return back()->with('success', "Un email de relance va être envoyé à ce client.");

    }


    public function changeStatusDelivered($id){

      $order = Order::findOrFail($id);
      if($order->closed == 0) {
        $order->closed = 1;

      } else {
        return back()->with('success', "Cette commande a déjà été réceptionné.");
      }

      $order->save();

      return back()->with('success', "Le statut de cette commande vient d'être passé en réceptionné.");
    }


    public function filterByVente($vente){

     $vente = Vente::where('slug', $vente)->firstOrFail();
     $orders = Order::where('cart', $vente->slug)->get();
     return View('ordersmanagement.show-orders-vente', compact('orders', 'vente'));


    }


    public function filterByShop(){
     //$vente = Vente::where('slug', $vente)->firstOrFail();
     $orders = Order::where('cart', 'shop')->get();
     return View('ordersmanagement.show-orders-shop', compact('orders'));

    }

    public function close($id){
      $order = Order::findOrFail($id);
      //if vente order
      if($order->cart != 'shop'){

        if($order->closed == true){
          $order->closed = false;
          $order->save();
          return back()->with('error', "Le client n'a pas réceptionné sa commande. Le statut de cette commande a bien été passé en: en cours");
      
        } else{
          $order->closed = true;
          $order->save();
          return back()->with('success', "Le client a réceptionné sa commande. Le statut de cette commande a bien été passé en: terminé"); 
        }

      } 
      else {

        if($order->deliverie->completed == true){
          // check the deliverie state
      
            $order->closed = true; 
            dd('Livraison de cette commande a été expédié. Le statut de cette commande a bien été passé en: terminé');      
         

        }
        else {
           $order->closed = true; 
            dd('Livraison de cette commande a été expédié. Le statut de cette commande a bien été passé en: terminé');      
         
        }

      }
      // if shop order
      $order->save();
    }

}

