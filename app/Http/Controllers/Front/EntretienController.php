<?php

namespace App\Http\Controllers\Front;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vente;
use App\Models\Conseil;
use App\Models\Post;
use App\Models\PostCategorie;
use App\Models\Fiche;
use App\Models\ProductCategorie;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\AddProductToVenteCart;
use Redirect;

class EntretienController extends Controller
{
  use ActivityLogger;

    /**
      * Affiche la page /entretien
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function show(Request $request){

      $validatedData = $request->validate([
        'q' => 'nullable:string',

      ]);

      if($request->q){
        $fiches = Fiche::where('name','like','%'.$request->q.'%')->get();
        $astuces = Post::where('name','like','%'.$request->q.'%')->get();
      } else {
        $fiches = Fiche::all();
        $astuces = Post::where('postcategorie_id', PostCategorie::where('slug', 'astuces')->firstOrFail()->id)->get();
      }
      ActivityLogger::activity("a visité la page /entretien ");

      return view('entretien.index', compact('fiches', 'astuces'));
    }



}
