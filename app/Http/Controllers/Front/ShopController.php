<?php

namespace App\Http\Controllers\Front;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vente;
use App\Models\Product;
use App\Models\ProductCategorie;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\AddProductToSaleCart;
use Redirect;

class ShopController extends Controller
{
  use ActivityLogger;

    /**
      * INDEX
      * Display a list of the sales.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function index(){

      // if(Setting::get('shop_disable')){
      //   return Redirect::back()->with('error', "<strong>Patience!..</strong> Nous ne sommes pas encore prêt à prendre de commande.");
      // }

      $products = Product::where('store_enabled', true)->get();
      ActivityLogger::activity("a visité le shop");

      return view('shop.index', [
        'products' => $products,

      ]);
    }

    /**
      * SHOW
      * Display a list of the sales.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function showProduct($slug){


      $product = Product::where('slug', $slug)->firstOrFail();

      $products = Product::all();
      if($product->store_enabled){
        return abort('404');
      }
      return view('shop.product', [

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
    public function product($productSlug){


            $product = Product::where('slug', $productSlug)->firstOrFail();

            $products = Product::all();
            if(!$product->store_enabled){
              return abort('404');
            }
            ActivityLogger::activity("a regardé le produit $product->name sur le shop");

            return view('shop.product', [

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
    public function list(){

      $products = Product::where('store_enable', true)->get();
      return view('shop.list', [
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
    public function addProductToCart(AddProductToSaleCart $request){


      $product = Product::find($request->productId);

      $cart = Cart::instance("$request->saleSlug")->content();

      Cart::instance("$request->saleSlug")->add($product->id, $product->name, $request->quantity, $product->price, 550);
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

      $cart = Cart::instance("$request->saleSlug")->content();

      $productId = $product->id;
      $rowId = $cart->search(function ($cartItem, $rowId) use ($productId) {
	        return $cartItem->id === $productId;
        });


      Cart::instance("$request->saleSlug")->update($rowId, $request->quantity);
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
      $cart = Cart::instance("$request->saleSlug")->content();
      $productId = $product->id;

      $rowId = $cart->search(function ($cartItem, $rowId) use ($productId) {
	        return $cartItem->id === $productId;
        });


      Cart::instance("$request->saleSlug")->remove($rowId);
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
          $cart = Cart::instance("$saleSlug")->content();


          if($cart->isEmpty()){
            return redirect("ventes/$sale->slug")->with('error', 'Votre panier est vide.');
          }

          return view('front.ventes.checkout', [
            'sale' => $sale,
            'cart' => $cart,


          ]);

        }
}

