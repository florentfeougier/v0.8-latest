<?php

namespace App\Http\Controllers\Front;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vente;
use App\Models\Conseil;
use App\Models\Fiche;
use App\Models\ProductCategorie;
use App\Models\PostCategorie;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\AddProductToVenteCart;
use Redirect;

class FichesController extends Controller
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

      $astuces = PostCategorie::where('slug', 'astuces')->get();
      $fiches = Fiche::all();

      return view('fiches.index', [
        'conseils' => $astuces,
        'fiches' => $fiches,

      ]);
    }

    /**
      * Display a list of the sales.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function show(Request $request, $slug){

      if(is_numeric($slug)){
        $fiche = Fiche::where('id', $slug)->firstOrFail();
      } else{
        $fiche = Fiche::where('slug', $slug)->firstOrFail();

      }
      ActivityLogger::activity("a regardé la fiche d'entretien $fiche->name ");

      $ventes = Vente::where('is_public', 1)->get();

      return view('fiches.show', [

        'fiche' => $fiche,
        'ventes' => $ventes,

      ]);

    }

    /**
      * Display a product if associated to the given sale.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function product($saleSlug, $productSlug){

      $sale = Vente::where('slug', $saleSlug)->FirstOrFail();
      $product = Product::where('slug', $productSlug)->firstOrFail();
      $products = $sale->products;

      // Check if the product is associated to the given sale
      $exists = $sale->products->contains($product->id);
      if(!$exists){
        abort(404);
      }

      return view('front.sales.show-product', [
        'sale' => $sale,
        'product' => $product,
        'products' => $products,

      ]);
    }

    /**
      * Display a product if associated to the given sale.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function showCart($saleSlug){
      $sale = Vente::where('slug', $saleSlug)->firstOrFail();
      $cart = Cart::instance("sale-$saleSlug")->content();

      if($cart->isEmpty()){
          return redirect("ventes/$sale->slug")->with('error', 'Votre panier est vide.');
      }

      return view('front.sales.show-sale-cart', [
        'sale' => $sale,
        'cart' => $cart,


      ]);
    }

    /**
      * Display a product if associated to the given sale.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function addProductToCart(AddProductToVenteCart $request){


      $product = Product::find($request->productId);

      $cart = Cart::instance("sale-$request->saleSlug")->content();

      Cart::instance("sale-$request->saleSlug")->add($product->id, $product->name, $request->quantity, $product->price, 550);
      return Redirect::back()->with('success', 'Produit ajouté à votre panier.');;
    }

    /**
      * Display a product if associated to the given sale.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function updateProductToCart(Request $request){

      $validatedData = $request->validate([
        'productId' => 'required',
        'saleSlug' => 'required',
        'quantity' => 'required|min:1',
      ]);


      $product = Product::find($request->productId);

      $cart = Cart::instance("sale-$request->saleSlug")->content();

      $productId = $product->id;
      $rowId = $cart->search(function ($cartItem, $rowId) use ($productId) {
	        return $cartItem->id === $productId;
        });


      Cart::instance("sale-$request->saleSlug")->update($rowId, $request->quantity);
      return Redirect::back();
    }


    /**
      * Display a product if associated to the given sale.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function removeProductToCart(Request $request){

      $validatedData = $request->validate([
        'productId' => 'required',
        'saleSlug' => 'required',
      ]);


      $product = Product::find($request->productId);
      $cart = Cart::instance("sale-$request->saleSlug")->content();
      $productId = $product->id;

      $rowId = $cart->search(function ($cartItem, $rowId) use ($productId) {
	        return $cartItem->id === $productId;
        });


      Cart::instance("sale-$request->saleSlug")->remove($rowId);
      return Redirect::back();
    }


        /**
          * Display a product if associated to the given sale.
          *
          * @param Request $request
          *
          * @return \Illuminate\Http\Response
        */
        public function checkout($saleSlug){

          $sale = Vente::where('slug', $saleSlug)->firstOrFail();
          $cart = Cart::instance("sale-$saleSlug")->content();


          if($cart->isEmpty()){
            return redirect("ventes/$sale->slug")->with('error', 'Votre panier est vide.');
          }

          // get the products from cart, check if available in stock, remove include_once
          // from stock and go to paiementcontroller
          return view('front.sales.checkout', [
            'sale' => $sale,
            'cart' => $cart,


          ]);
        }
}
