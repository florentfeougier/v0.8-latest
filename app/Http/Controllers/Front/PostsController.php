<?php

namespace App\Http\Controllers\Front;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategorie;
use App\Models\Fiche;
use App\Models\Product;
use App\Models\Vente;
use Redirect;

class PostsController extends Controller
{
  use ActivityLogger;

    /**
      * Display a list of the sales.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function index(Request $request){


      $fiches = Fiche::all()->take(6);
      $ventes = Vente::where('is_public', true)->where('status', 'active')->take(4);
      $postcategories = PostCategorie::all();

      if($request->q){
        $posts = Post::query()
           ->where('name', 'LIKE', "%{$request->q}%")
           ->orWhere('description', 'LIKE', "%{$request->q}%")
           ->orWhere('content', 'LIKE', "%{$request->q}%")
           ->get();
          if(count($posts) < 1){
            $posts = Post::all()->take(6);
          }

     } else{
       $posts = Post::paginate(9);
     }


     ActivityLogger::activity("a visité le blog ");

      return view('posts.index', compact('posts', 'ventes', 'fiches', 'postcategories'));
    }

    /**
      * Display a post.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function show($categorie, $slug){

      $post = Post::where('slug', $slug)->FirstOrFail();
      if(!$post->postcategorie->slug == $categorie){
        return back();
      }
      $fiches = Fiche::all()->take(6);
      $ventes = Vente::where('is_public', true)->where('status','active')->get()->take(4);

      $products = Product::where('store_enabled', 1)->get()->take(4);

      $template = "posts.show";
      if($post->postcategorie->slug == "astuces"){
        $template = 'posts.template-astuce';
      }
      return view($template, compact('post', 'ventes', 'fiches', 'products'));
    }

    /**
      * Display a post.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function categorie($categorieSlug){

      $postcategorie = PostCategorie::where('slug', $categorieSlug)->firstOrFail();
      $posts = Post::where('postcategorie_id', $postcategorie->id)->paginate(9);
      $postcategories = PostCategorie::all();

      return view('posts.categorie', compact('postcategorie', 'posts', 'postcategories'));
    }

    /**
      * Display a post.
      *
      * @param Request $request
      *
      * @return \Illuminate\Http\Response
    */
    public function categories(){

      $postcategories = PostCategorie::all();

      return view('posts.categories', compact('postcategories'));
    }
}
