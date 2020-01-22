<?php

namespace App\Http\Controllers\Front;

use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Page;
use App\Models\ProductCategorie;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\AddProductToSaleCart;
use Redirect;

class PagesController extends Controller
{

  use ActivityLogger;


    /**
      * Display a list of the sales.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function show($slug){

      $page = Page::where('slug', $slug)->FirstOrFail();
      ActivityLogger::activity("a visité la page /$slug ");

      return view('pages.show', compact('page'));
    }


    public function sitemap(){
    	
     return response()->view('sitemap')->header('Content-Type', 'text/xml');
    
    }
}

