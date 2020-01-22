<?php

namespace App\Http\Controllers\Front;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

use App\Http\Controllers\Controller;
use App\Models\Boite;
use App\Models\Product;
use Auth;
use Redirect;

use Gloudemans\Shoppingcart\Facades\Cart;

class boiteController extends Controller
{

  use ActivityLogger;


    /**
     * Fetch user
     * (You can extract this to repository method).
     *
     * @param $username
     *
     * @return mixed
     */
    public function index()
    {
        $boites = Boite::all();
        ActivityLogger::activity("a regardé les boites");

        return view('boites.index')->with(['boites' => $boites]);
    }

    /**
     * Display the specified resource.
     *
     * @param string $username
     *
     * @return Response
     */
    public function show($slug)
    {

        $boite = Boite::where('slug', $slug)->firstOrFail();
        ActivityLogger::activity("a regardé la boite $boite->name");
        return view('boites.show')->with(['boite' => $boite, 'products' => $boite->products]);

    }

    /**
     * Display the specified resource.
     *
     * @param string $username
     *
     * @return Response
     */
    public function boite($boite_slug, $product_slug)
    {
        $boite = Boite::where('slug', $boite_slug)->firstOrFail();
        $product = Product::where('slug', $product_slug)->firstOrFail();
        ActivityLogger::activity("a regardé le produit $product->name de la boite $boite->name");

        return view('boites.product')->with(['boite' => $boite, 'product' => $product, 'products' => $boite->products]);

    }

    public function checkout($box_slug){

        $boite = Boite::where('slug', $box_slug)->firstOrFail();
        $cart = Cart::instance($box_slug);

        if($cart->count() != $boite->product_quantity){

             return Redirect::back()->with('warning', "<strong>Oops!</strong> Vous devez sélectionner " . $boite->product_quantity ." plantes. <a class='btn btn-secondary  ml-2 bo-rad-23' href='/ventes'> Voir nos ventes</a>");
        }
       // dd($cart);

        ActivityLogger::activity("est sur le point de validé sa box");

    return view('boites.checkout', [
                  'boite' => $boite,
                  'cart' => $cart,
                  
                 


                ]);
    }


   public function validation($box_slug){

        $boite = Boite::where('slug', $box_slug)->firstOrFail();
        $cart = Cart::instance($box_slug);
       // dd($cart);

        ActivityLogger::activity("est sur le point de validé sa box");

    return view('boites.checkout', [
                  'boite' => $boite,
                  'cart' => $cart,
                  
                 


                ]);
    }
}

