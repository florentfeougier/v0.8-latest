<?php

namespace App\Http\Controllers\Front;

use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Product;
use App\Models\ProductCategorie;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\NewsletterSubscriptionRequest;
use App\Http\Requests\AddProductToSaleCart;
use Newsletter;
use Redirect;

class NewslettersController extends Controller
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

      $user = auth()->user();
      $newsletters = $user->newsletters();

      return view('front.newsletters.list', [
        'newsletters' => $newsletters,

      ]);
    }

    /**
      * Display a list of the sales.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function subscribe(NewsletterSubscriptionRequest $request){

      if ( ! Newsletter::isSubscribed($request->user_email) ) {
        Newsletter::subscribe($request->user_email);
        ActivityLogger::activity("$request->user_email vient de s'abonner à la newsletter [IP: $request->ip()]");

      } else {
        ActivityLogger::activity("$request->user_email est déjà abonné à la newsletter. [IP: $request->getIp()]");

      }

      if(! Newsletter::lastActionSucceeded()){
        Redirect::back()->with('error', "Erreur lors de l'abonnement.");

      }

      return Redirect::back()->with('success', "<strong>Bien reçu!</strong> Vous recevrez nos prochaines newsletter!");

    }

    /**
      * Display a list of the sales.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function subscribefooter(Request $request){

      $validatedData = $request->validate([
        'user_email' => 'required|email',

      ]);
      //dd($request->user_email);

      if ( ! Newsletter::isSubscribed($request->user_email) ) {
        Newsletter::subscribe($request->user_email);
      }

      if(! Newsletter::lastActionSucceeded()){

          return Redirect::back()->with('warning', "<strong>Oops!</strong> Tous vos paniers sont vides. <a class='btn btn-secondary bg-dark ml-2 bo-rad-23' href='/ventes'> Voir nos ventes</a>");


      }
      if($request->ajax()){
        return Redirect::back()->with('warning', "<strong>Oops!</strong> Tous vos paniers sont vides. <a class='btn btn-secondary bg-dark ml-2 bo-rad-23' href='/ventes'> Voir nos ventes</a>");


      }

      return Redirect::back()->with('warning', "<strong>Oops!</strong> Tous vos paniers sont vides. <a class='btn btn-secondary bg-dark ml-2 bo-rad-23' href='/ventes'> Voir nos ventes</a>");


    }

}
