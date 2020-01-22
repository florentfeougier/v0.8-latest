<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Boite;
use App\Models\Vente;
use App\Models\Product;
use App\Models\Voucher;
use App\Models\ProductCategorie;
use App\Notifications\SendLowStockEmail;
use App\Notifications\SendEmptyStockEmail;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\AddProductToVenteCart;
use Redirect;
use Spatie\Activitylog\Models\Activity;
use QuentinBontemps\LaravelMondialRelay\Facades\LaravelMondialRelay;
use Illuminate\Support\Facades\Log;
use Auth;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class CartController extends Controller
{
      use ActivityLogger;

    /**
      * Display a list of the sales.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function index(){

      $carts = [];

      if(Cart::instance("shop")->count() > 0){
        $carts[] = "shop";
      }
      // Check if carts for sales exists
      $sales = Vente::where('is_public', 1)->get();

      foreach($sales as $sale){

        if(Cart::instance("$sale->slug")->count() > 0){
          $carts[] = "$sale->slug";
        }

      }

      if(empty($carts)){
        return Redirect::back()->with('warning', "<strong>Oops!</strong> Tous vos paniers sont vides. <a class='btn btn-secondary  ml-2 bo-rad-23' href='/ventes'> Voir nos ventes</a>");

      }

      return view('carts.index', [
        'carts' => $carts,
      ]);
    }

    /**
      * Display a list of the sales.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */

    public function show($cart, Request $request){

      $cartName = $cart;

      if($cart == "shop"){
        $cart = Cart::instance($cart);
        $cartDesc = "Shop";
      }
      elseif(Vente::where('slug', $cart)->First() != null){
        $cartDesc = Vente::where('slug', $cart)->First()->description;

        $cart = Cart::instance($cart);
        return view('carts.show-box', [
        'cart' => $cart,
        'cartName' => $cartName,
        'cartDesc' => $cartDesc,

      ]);
      } 
      elseif($boite = Boite::where('slug', $cart)->First() != null){

        
        $cartDesc = Boite::where('slug', $cart)->First()->decription;
        $cart = Cart::instance($cart);
              return view('carts.show-box', [
        'cart' => $cart,
        'cartName' => $cartName,
        'cartDesc' => $cartDesc,

      ]);
      } else {
        return false;
      }

     // dd($cart);
      


      ActivityLogger::activity("a regardé son panier '$cartName'");

      return view('carts.show', [
        'cart' => $cart,
        'cartName' => $cartName,
        'cartDesc' => $cartDesc,

      ]);

    }

    /**
      * Display a product if associated to the given sale.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function store($cart, Request $request){

      $ventes = Vente::where('is_public', 1)->get();
      // Check
      $validatedData = $request->validate([
        'cart' => ['required', 'string', 'max:32',],
        'product' => 'required', 'unique:products',
        'quantity' => 'required',
      ]);



      $cartName = $cart;
      // Now we are sure the cart exist
      $cart = Cart::instance($cart);

      $product = Product::find($request->product);

      if(Auth::check()){
        //Log::info("Ajouter des articles dans le panier $request->cart", [Auth::user()]);
            ActivityLogger::activity("+$request->quantity $product->name dans le panier $request->cart");
      }
      else {
        //Log::info("Ajouter des articles dans le panier $request->cart", Auth::user());
        ActivityLogger::activity("+$request->quantity $product->name dans le panier $request->cart");
      }



      if($product->stock - $request->quantity <= 0){
        $message = "<strong>Oops!</strong> Nous n'avons plus assez de $product->name en stock...";
        $admins = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
            })->get();
            foreach($admins as $admin){
              //$admin->notify(new SendEmptyStockEmail($product));
            }
        ActivityLogger::activity("Votre stock de $product->name est épuisé!");

        //return Redirect::back()->with('error', $message);
      }

      if($product->stock - $request->quantity <= 1){
        ActivityLogger::activity("Votre stock de $product->name est bientôt épuisé ($product->stock restants)");

        $admins = User::whereHas('roles', function ($query) {
            $query->where('name', 'admin');
            })->get();
            foreach($admins as $admin){
              //$admin->notify(new SendLowStockEmail($product));
            }

      }
      // Add the product to the cart
      $row = $cart->add($product->id, $product->name, $request->quantity, $product->price, 100 , ['tva' => $product->tax]);
      $cart->setGlobalTax(0);

      $cartCount = $cart->count();
      $totalCarts = 0;
      foreach($ventes as $vente){
        $totalCarts = $totalCarts + Cart::instance($vente)->count();
      }
      $totalCarts = $totalCarts + Cart::instance('shop')->count();


      // Redirect back with success
      $message = "<strong>Youpi!</strong> $product->name ajouté à votre panier ($cartCount articles) <a class='ml-2 bo-rad-23 btn btn-outline-secondary' href='/panier/$cartName'>Voir le panier</a> <a class='btn btn-info ml-2 bo-rad-23' href='/panier/$cartName/checkout'>Valider ma commande</a>";
      return Redirect::back()->with('success', $message);
    }

    /**
      * Display a product if associated to the given sale.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function storeAjax(Request $request){



      // Check
      $validatedData = $request->validate([
        'cart' => ['required', 'string', 'max:32',],
        'product' => 'required', 'unique:products',
        'quantity' => 'required|min:1',
      ]);


      // Now we are sure the cart exist
      $cart = Cart::instance($request->cart);
      $product = Product::where('slug', $request->product)->firstOrFail();
      $cart->setGlobalTax(0);
      // Add the product to the cart
      $row = $cart->add($product->id, $product->name, $request->quantity, $product->price, 550);
      // Redirect back with success
      return response()->json(['success'=>'Produit ajouté au panier']);
    }

    public function update($cart, Request $request){
      $validatedData = $request->validate([
        'product' => 'required',
        'cart' => 'required',
        'quantity' => 'required|min:1',
      ]);


      $product = Product::find($request->product);

      if($product->stock - $request->quantity <= 0){
        $message = "<strong>Oops!</strong> Nous n'avons plus assez de $product->name en stock...";
        return Redirect::back()->with('error', $message);
      }

      $cart = Cart::instance($cart)->content();


      $productId = $product->id;
      $rowId = $cart->search(function ($cartItem, $rowId) use ($productId) {
          return $cartItem->id === $productId;
        });


      Cart::instance($request->cart)->update($rowId, $request->quantity);

      return Redirect::back();
    }


    public function remove($cart, Request $request){
      $validatedData = $request->validate([
        'product' => 'required',
        'cart' => 'required',
      ]);


      $product = Product::find($request->product);
      $cart = Cart::instance($request->cart)->content();
      $productId = $product->id;

      $rowId = $cart->search(function ($cartItem, $rowId) use ($productId) {
          return $cartItem->id === $productId;
        });


      Cart::instance($request->cart)->remove($rowId);
      return Redirect::back();
    }




    public function checkout($cart){

      setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');

      $user = Auth::user();

      // if($user->profile->phone_number == null){
      //   return redirect("profile/" . $user->name . "/edit")->with('error', 'Merci de fournir un numéro de téléphone avant de valider votre commande.');
      // }
      // if($user->profile->location_address == null){
      //   return redirect("profile/" . $user->name . "/edit")->with('error', 'Vous devez renseigner une adresse pour la facturation avant de valider votre commande.');
      // }

      $cartName = $cart;
      $sale = "shop";

      if($cart == "shop"){
        $cart = Cart::instance($cart);
        $cartDesc = "Shop";
      }
      elseif(Vente::where('slug', $cart)->first() != null){
        $sale = Vente::where('slug', $cart)->first();

        $cart = Cart::instance($cart);
        $cartDesc = "Vente de: " .$sale->name . " du ". strftime("%A %d %B ", strtotime(date('Y/m/d', strtotime($sale->date)))) ;
      }

      elseif(Boite::where('slug', $cart)->first() != null){
        $box = Boite::where('slug', $cart)->first();

        $cart = Cart::instance($cart);
        $cartDesc = "Box: " .$box->name . " du ". strftime("%A %d %B ", strtotime(date('Y/m/d', strtotime($box->date)))) ;
      }

      $cart->setGlobalTax(0);
      if($cart->content()->isEmpty()){
                  return redirect("ventes/$cartName")->with('error', 'Votre panier est vide.');
      }

      ActivityLogger::activity("est sur le point de validé son panier '$cartName'");

    return view('carts.checkout', [
                  'sale' => $sale,
                  'cart' => $cart,
                  'cartName' => $cartName,
                  'cartDesc' => $cartDesc,


                ]);
    }

    public function discount($cart, Request $request){
      $validatedData = $request->validate([
        'code' => 'required|string|min:12',
      ]);

      $vouchers = Voucher::all();
      $exist = 0;
      foreach($vouchers as $voucher){

        if(strcmp($request->code, $voucher->code) == 0){
          Cart::instance($cart)->setGlobalDiscount(50);
        }
      }
      if(!$exist){
        return Redirect::back()->with('error', "<strong>Oops!</strong> Ce code de réduction n'existe pas ou a déjà été utilisé!");
      }
      return back();

    }
}

