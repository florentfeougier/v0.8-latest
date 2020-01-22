<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ContactForm;
use App\Models\Sale;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductCategorie;
use Gloudemans\Shoppingcart\Facades\Cart;

use Redirect;
use Mail;
use Validator;
use App\Notifications\SendContactRequestEmail;

class ContactController extends Controller
{

    /**
      * Display a list of the sales.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function index(){


//SitemapGenerator::create('https://www.plantesaddict.fr')->writeToFile("resources/views/sitemap.xml");
      return view('pages.contact');
    }


        /**
          * Display a list of the sales.
          *
          * @param Request $request
          *
          * @return \Illuminate\Http\Response
        */
        public function store(Request $request){

          //$validated = $request->validated();
          $validator = Validator::make($request->all(),
              [
                  'name'                  => 'required|max:128',
                  'content'            => 'required',
                  'subject'             => 'required|max:128',
                  'email'                 => 'required|email|max:128',
                  'g-recaptcha-response'                 => 'required',

              ],
              [
                  'name.unique'         => trans('auth.userNameTaken'),
                  'content.required'       => trans('auth.userNameRequired'),
                  'subject.required'  => trans('auth.lNameRequired'),
                  'email.required'      => trans('auth.emailRequired'),

              ]
          );

          if ($validator->fails()) {
              return back()->withErrors($validator)->withInput();
          }


// check if reCaptcha has been validated by Google
$secret = env('RE_CAP_SECRET');
$captchaId = $request->input('g-recaptcha-response');

//sends post request to the URL and tranforms response to JSON
$responseCaptcha = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$captchaId));


if($responseCaptcha->success != true){
    return back()->withErrors("Merci de remplir le reCaptcha Google")->withInput();
}
          //dispatch(new App\Jobs\SendEmail(["email" => "shop@plantesaddict.fr"]));
          $admins = User::whereHas('roles', function ($query) {
              $query->where('name', 'admin');
              })->get();
              foreach($admins as $admin){
                $admin->notify(new SendContactRequestEmail($request));
              }
          return Redirect::back()->with('success', "<strong>Bien reçu!</strong> Nous vous répondrons le plus rapidement possible !");
        }


}
