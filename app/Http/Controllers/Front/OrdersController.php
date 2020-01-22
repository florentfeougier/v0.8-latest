<?php

namespace App\Http\Controllers\Front;

use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\NewOrderRequest;
use App\Notifications\NewOrder;
use App\Notifications\SendNewOrderDetails;
use Illuminate\Mail\Mailable;
use App\Models\Vente;
use App\Models\Order;
use App\Models\Deliverie;
use App\Models\Product;
use App\Models\Boite;
use App\Models\User;
use Redirect;
use Auth;
use Mail;
use Setting;

class OrdersController extends Controller
{
  use ActivityLogger;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
    public function __construct() {
        $this->middleware('auth');
    }


  /**
      * Store a new order to db
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function store(NewOrderRequest $request){

      // Check if admin has disabled order creation.
      // if(Setting::get('orders_disable_all')){
       //return Redirect::back()->with('error', "<strong>Patience!..</strong> Notre shop est actuellement fermé...");
      // }


      // Check pickup location has been selected for shop orders
      if($request->cart == "shop" && !$request->pickup_id && !$request->pickup_name && !$request->pickup_address && !$request->pickup_city){
        return back()->with('error', 'Vous devez sélectionner un point relais de livraison pour votre commande.');
      }



      // must be logged in and have an email
      $user = Auth()->user();
      // Check pickup location has been selected for shop orders
      if($request->cart == "shop" && $user->profile->phone_number == null && $request->phone_number == null){
        return back()->with('error', "Vous devez fournir un numéro de téléphone pour la livraison. <a class='btn btn-secondary' href='https://www.plantesaddict.fr/profile/" . $user->name . "/edit'>Ajouter un numéro</a>");
      }

      // Check pickup location has been selected for shop orders

      if($user->profile->phone_number == null && $request->phone_number != null){
        $user->profile->phone_number = $request->phone_number;

        $user->profile->save();

      }

      if(count($user->orders->where('created_at', '>',
        \Carbon\Carbon::now()->subMinutes(1)->toDateTimeString()
    )) > 0) {
return back()->with('warning', "Vous avez validé une commande similaire il y a moins de 2mn, voir vos commandes <a href='https://www.plantesaddict.fr/home'>en cliquant ici</a>");
    }
      if($user->activated == false){
        return redirect("home");
      }

      // Cart must have products
      $cartName = $request->cart;
      $cart = Cart::instance(strtolower($request->cart));



      if(count($cart->content()) == 0){
        return redirect("panier")->with('error', 'Votre panier est vide. Impossible de valider la commande.');
      }

  
      if($cart->total() < 9.99){
        return back()->with('error', 'Le montant minimum de commande est de 10€.');
      }
      // Link and adjust cart items to the order and user account
      foreach($cart->content() as $item){

        $product = Product::find($item->id); // Retrieve product model
      //  $product->users()->attach($user->id);
        if($product->stock - $item->qty < 0){

          return back()->with('error', "Nous n'avons plus de $product->name en stock.");

        }
      }

      // Create the order
      $order = Order::create([
        'order_id' => uniqid("OR"),
        'user_id' => $user->id,
        'amount' => $cart->total(),
        'cart' => $request->cart,
      ]);



      ActivityLogger::activity("$user->email a validé sa commande de $order->amount € [$order->order_id] ");

      // Handle deliverie and pickup information
      if($order->cart == "shop"){
        $deliverie = Deliverie::create([
         'deliverie_id' => uniqid("DE"),
          'pickup_id' => $request->pickup_id,
          'pickup_name' => $request->pickup_name,
         'pickup_address' => $request->pickup_address,
         'pickup_postalcode' => $request->pickup_postalcode,
         'pickup_city' => $request->pickup_city,
        ]);
        $deliverie->order()->associate($order->id);
        $deliverie->save();
        $order->pickup_location = $request->pickup_name . " " . $request->pickup_address . " - " . $request->pickup_postalcode .  " " . $request->pickup_city;

      } else {
        $vente = Vente::where('slug', $order->cart)->first();
        $order->pickup_date = $vente->date;
        $order->pickup_location = $vente->location_address . " " . $vente->location_address_info . " - " . $vente->location_postalcode . " " . $vente->location_city;

      }



      // Link and adjust cart items to the order and user account
      foreach($cart->content() as $item){

        $product = Product::find($item->id); // Retrieve product model
      //  $product->users()->attach($user->id);
        $product->users()->sync([$user->id], false);

        // check if cart is sale or shop
        if($cartName != 'shop'){
          $order->ventes()->attach(Vente::where('slug', $request->cart)->first()->id); // attach the order to the sale
        }
        ActivityLogger::activity("$product->name a été commandé (x $item->qty)");

        $order->products()->attach($product->id, [ "quantity" => $item->qty, "price" => $product->price]);
        $product->stock = $product->stock - $item->qty; // adjust the product stock
        if($product->stock <= 2){
          ActivityLogger::activity("Le stock de $product->name est bientôt épuisé!");
        }
        elseif($product->stock <= 0){
          ActivityLogger::activity("Le stock de $product->name est épuisé!");
        }
        $product->save(); // save the changes
      }

      // Now we empty the cart
      $cart->destroy();
      $order->save();


      // Send some notifications
      //event(new \App\Events\NewOrder($order));
      //$user->notify(new NewOrder($order));

      //$flo = User::where('email', 'webmaster@plantesaddict.fr')->first();
      //$flo->notify(new SendNewOrderDetails($order));
    //  $flo->notify(new SendPaymentAcceptedEmail($payment));


      return redirect("payment/pay/$order->order_id")->with('success', 'Vous allez être redirigé vers la page de paiement...');

    }


//     /**
//       * Store a new order to db
//       *
//       * @param Request $request
//       *
//       * @return \Illuminate\Http\Response
//     */
//     public function store(NewOrderRequest $request){

//       // Check if the cart is allowed
//       // Check pickup location has been selected for shop orders

//       if($request->cart == "shop"){
//         return back()->with('error', 'Vous devez sélectionner un point relais de livraison pour votre commande.');
//       } else {
//           $vente = Vente::where('slug', $order->cart)->first();
//           if($vente == null){

//             return back()->with('error', "Votre panier n'a pas été trouvé.");

//           } else {
//             if($vente->status = "0"){
//                 return back()->with('error', "La vente est terminé, vous ne pouvez plus passer de commande.");

//             }
//           }


//       }

//       if($request->cart == "shop" && !$request->pickup_id && !$request->pickup_name && !$request->pickup_address && !$request->pickup_city){
//         return back()->with('error', 'Vous devez sélectionner un point relais de livraison pour votre commande.');
//       }


//       // must be logged in and have an email
//       $user = Auth()->user();


//       // Check the user location phone number
//       if($user->profile->phone_number == null){




//         if($request->phone_number != null && preg_match("/^[0-9][0-9]{0,15}$/", $request->phone_number)){


//           $user->profile->phone_number = $request->phone_number;

           
//         } else {
//           return back()->with('error', "Vous devez fournir un numéro de téléphone valide (Ex: 0612345678). <a class='btn btn-secondary' href='https://www.plantesaddict.fr/profile/" . $user->name . "/edit'>Ajouter un numéro</a>");
//         }   
//       }

//       // Check the user location address

//       if($user->profile->location_address == null){


//         if($request->location_address != null){

//           $user->profile->location_address = $request->location_address;
//                $user->profile->save();

//         } else {
//           return back()->with('error', "Vous devez fournir une adresse de facturation valide. <a class='btn btn-secondary' href='https://www.plantesaddict.fr/profile/" . $user->name . "/edit'>Ajouter un numéro</a>");
//         }   
//       }
//       // Check the user location postal code
//       if($user->profile->location_postalcode == null && preg_match("/^[0-9][0-9]{0,6}$/", $request->location_address)){

//         if($request->location_postalcode != null){

//           $user->profile->location_postalcode = $request->location_postalcode;
//                $user->profile->save();

//         } else {
//           return back()->with('error', "Vous devez fournir un code postal valide (Ex: 69000) <a class='btn btn-secondary' href='https://www.plantesaddict.fr/profile/" . $user->name . "/edit'>Ajouter un numéro</a>");
//         }   
//       }



//       // Check the user location city
//       if($user->profile->location_city == null){

//         if($request->location_city != null){

//           $user->profile->location_city = $request->location_city;
//                $user->profile->save();

//         } else {
//           return back()->with('error', "Vous devez fournir une ville valide. <a class='btn btn-secondary' href='https://www.plantesaddict.fr/profile/" . $user->name . "/edit'>Ajouter un numéro</a>");
//         }   
//       }


//       $user->profile->save();
//       echo($user->profile->phone_number);
//       echo($user->profile->location_address);
//       echo($user->profile->location_postalcode);
//       echo($user->profile->location_city);
//       dd('ok');

//       // Check pickup location has been selected for shop orders

//       if(count($user->orders->where('created_at', '>',
//         \Carbon\Carbon::now()->subMinutes(1)->toDateTimeString()
//     )) > 0) {
// return back()->with('warning', "Vous avez validé une commande similaire il y a moins de 2mn, voir vos commandes <a href='https://www.plantesaddict.fr/home'>en cliquant ici</a>");
//     }
//       if($user->activated == false){
//         return redirect("home");
//       }

//       // Cart must have products
//       $cartName = $request->cart;
//       $cart = Cart::instance(strtolower($request->cart));



//       if(count($cart->content()) == 0){
//         return redirect("panier")->with('error', 'Votre panier est vide. Impossible de valider la commande.');
//       }

	
//       if($cart->total() < 9.99){
//         return back()->with('error', 'Le montant minimum de commande est de 10€.');
//       }
//       // Link and adjust cart items to the order and user account
//       foreach($cart->content() as $item){

//         $product = Product::find($item->id); // Retrieve product model
//       //  $product->users()->attach($user->id);
//         if($product->stock - $item->qty < 0){

//           return back()->with('error', "Nous n'avons plus de $product->name en stock.");

//         }
//       }

//       // Create the order
//       $order = Order::create([
//         'order_id' => uniqid("OR"),
//         'user_id' => $user->id,
//         'amount' => $cart->total(),
//         'cart' => $request->cart,
//       ]);



//       ActivityLogger::activity("$user->email a validé sa commande de $order->amount € [$order->order_id] ");

//       // Handle deliverie and pickup information
//       if($order->cart == "shop"){
//         $deliverie = Deliverie::create([
//          'deliverie_id' => uniqid("DE"),
//           'pickup_id' => $request->pickup_id,
//           'pickup_name' => $request->pickup_name,
//          'pickup_address' => $request->pickup_address,
//          'pickup_postalcode' => $request->pickup_postalcode,
//          'pickup_city' => $request->pickup_city,
//         ]);
//         $deliverie->order()->associate($order->id);
//         $deliverie->save();
//         $order->pickup_location = $request->pickup_name . " " . $request->pickup_address . " - " . $request->pickup_postalcode .  " " . $request->pickup_city;

//       } else {
//         $vente = Vente::where('slug', $order->cart)->first();

//         $order->pickup_date = $vente->date;
//         $order->pickup_location = $vente->location_address . " " . $vente->location_address_info . " - " . $vente->location_postalcode . " " . $vente->location_city;

//       }



//       // Link and adjust cart items to the order and user account
//       foreach($cart->content() as $item){

//         $product = Product::find($item->id); // Retrieve product model
//       //  $product->users()->attach($user->id);
//         $product->users()->sync([$user->id], false);

//         // check if cart is sale or shop
//         if($cartName != 'shop'){
//           $order->ventes()->attach(Vente::where('slug', $request->cart)->first()->id); // attach the order to the sale
//         }
//         ActivityLogger::activity("$product->name a été commandé (x $item->qty)");

//         $order->products()->attach($product->id, [ "quantity" => $item->qty, "price" => $product->price]);
//         $product->stock = $product->stock - $item->qty; // adjust the product stock
//         if($product->stock <= 2){
//           ActivityLogger::activity("Le stock de $product->name est bientôt épuisé!");
//         }
//         elseif($product->stock <= 0){
//           ActivityLogger::activity("Le stock de $product->name est épuisé!");
//         }
//         $product->save(); // save the changes
//       }

//       // Now we empty the cart
//       $cart->destroy();
//       $order->save();


//       // Send some notifications
//       //event(new \App\Events\NewOrder($order));
//       //$user->notify(new NewOrder($order));

//       //$flo = User::where('email', 'webmaster@plantesaddict.fr')->first();
//       //$flo->notify(new SendNewOrderDetails($order));
//     //  $flo->notify(new SendPaymentAcceptedEmail($payment));


//       return redirect("payment/pay/$order->order_id")->with('success', 'Vous allez être redirigé vers la page de paiement...');

//     }


    public function store_boite(Request $request){
      $boite = Boite::where('slug', $request->cart)->firstOrFail();
      $cart = Cart::instance($request->cart);
      $user = Auth()->user();

      // Make sure the number of plantes in cart is the number of plantes for this box
      if($cart->count() != $boite->product_quantity){
        return redirect("box")->with('error', 'Vous devez sélectionner ' . $boite->product_quantity . ' plantes pour cette box.');
      }

          //  Create the order
      $order = Order::create([
        'order_id' => uniqid("OR"),
        'user_id' => $user->id,
        'amount' => $boite->price,
        'cart' => $boite->slug,
      ]);

        $deliverie = Deliverie::create([
         'deliverie_id' => uniqid("DE"),
          'pickup_id' => "000000",
          'pickup_name' => 'test',
         'pickup_address' => 'test',
         'pickup_postalcode' => 'test',
         'pickup_city' => 'test',
        ]);
        $deliverie->order()->associate($order->id);
        $deliverie->save();

 // Link and adjust cart items to the order and user account
      foreach($cart->content() as $item){

        $product = Product::find($item->id); // Retrieve product model
      //  $product->users()->attach($user->id);
        $product->users()->sync([$user->id], false);
        
        $order->products()->attach($product->id, [ "quantity" => $item->qty, "price" => $product->price]);
        $product->stock = $product->stock - $item->qty; // adjust the product stock
      }

      $order->save();
       return redirect("payment/pay/$order->order_id")->with('success', 'Vous allez être redirigé vers la page de paiement...');

    }

}

