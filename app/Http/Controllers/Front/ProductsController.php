<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Product;
use App\Models\ProductCategorie;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\AddProductToSaleCart;
use Redirect;

class ProductsController extends Controller
{

    /**
      * Display a list of the sales.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function thumbnail($slug){

      $product = Product::where('slug', $slug)->first();
      if(!$product){
        $product = Product::findOrFail($slug);
      }

      $filePath =  $product->thumbnail;
      return response()->file($filePath);;
    }


}
