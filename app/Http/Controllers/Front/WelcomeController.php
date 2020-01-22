<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vente;
use Vinkla\Instagram\Instagram;
use Cache;

class WelcomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        if (Cache::has('medias')){
          $medias = Cache::get('medias');
} else {
  $instagram = new Instagram('9122784576.86429bf.12ebe324a7014b829080e739639a8bf1');

    $medias = $instagram->media(['count' => 4]);
    Cache::put('medias', $medias, 10);
}
        \Carbon\Carbon::setLocale('fr');
        setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
        $ventes = Vente::where('is_public', 1)->take(3)->get();
        return view('welcome.index', ['ventes' => $ventes, 'instagram' => $medias]);
    }
}
