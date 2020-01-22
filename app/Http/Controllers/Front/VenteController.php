<?php

namespace App\Http\Controllers\Front;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

use App\Http\Controllers\Controller;
use App\Models\Vente;
use App\Models\Product;
use Auth;

class VenteController extends Controller
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
        $ventes = Vente::where('is_public', true)->where('status', 'active')->get();
        ActivityLogger::activity("a regardé les ventes");

        return view('ventes.index')->with(['ventes' => $ventes]);
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

        $vente = Vente::where('slug', $slug)->firstOrFail();
        ActivityLogger::activity("a regardé la vente $vente->name");
        return view('ventes.show')->with(['vente' => $vente, 'products' => $vente->products]);

    }

    /**
     * Display the specified resource.
     *
     * @param string $username
     *
     * @return Response
     */
    public function product($vente_slug, $product_slug)
    {
        $vente = Vente::where('slug', $vente_slug)->firstOrFail();
        $product = Product::where('slug', $product_slug)->firstOrFail();
        ActivityLogger::activity("a regardé le produit $product->name de la vente $vente->name");

        return view('ventes.product')->with(['vente' => $vente, 'product' => $product, 'products' => $vente->products]);

    }

}

