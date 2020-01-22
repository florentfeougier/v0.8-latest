<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Vente;
use App\Models\Fiche;
use App\Models\ProductCategorie;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      // Ventes
      $venteLyon = Vente::where('slug', 'lyon-dec2019')->firstOrFail();
      $venteValence = Vente::where('slug', 'valence')->firstOrFail();
      $venteClermont = Vente::where('slug', 'clermont-ferrand-nov2019')->firstOrFail();
      //$venteClermont = Vente::where('slug', 'clermont-ferrand-dec2019')->firstOrFail();
      $venteDijon = Vente::where('slug', 'dijon')->firstOrFail();
      $venteAnnecy = Vente::where('slug', 'annecy')->firstOrFail();
      $venteMontelimar = Vente::where('slug', 'montelimar')->firstOrFail();

      // Fiches
      //$ficheMonstera = Fiche::where('slug', 'monstera')->firstOrFail();

      // Products
      $dracaenaMarginataPetite = Product::create([
        'slug' => 'dracaena-marginata-45cm',
        'sku' => 'P' . rand(10000,99999),
        'name' => 'Dracaena Marginata 45cm',
        'description' => 'Hauteur 45',
        'specs' => "Pot de 12cm",

        'productlabel_id' => 2,
        'price' => 5,
        'tax' => 10,
        'thumbnail' => 'products/dracaena-marginata-45cm.png',
        'stock' => 47,
        'store_enabled' => true,

      ]);

      $dracaenaMarginataMoyenne = Product::create([
        'slug' => 'dracaena-marginata-80cm',
        'sku' => 'P' . rand(10000,99999),
        'name' => 'Dracaena Marginata 80cm',
        'description' => 'Hauteur 80 cm',
        'specs' => "Pot de 17cm",

        'productlabel_id' => 3,
        'price' => 10,
        'tax' => 10,
        'thumbnail' => 'products/dracaena-marginata-80cm.png',
        'stock' => 10,
        'store_enabled' => true,

      ]);
      $dracaenaMarginataGrande = Product::create([
        'slug' => 'dracaena-marginata-160cm',
        'sku' => 'P' . rand(10000,99999),
        'name' => 'Dracaena Marginata 160cm',
        'description' => 'Hauteur 160 cm',
        'specs' => "Pot de 17cm",

        'productlabel_id' => 3,
        'price' => 40,
        'tax' => 10,
        'thumbnail' => 'products/dracaena-marginata-160cm.jpg',
        'stock' => 10,
        'store_enabled' => true,

      ]);
      $aloevera = Product::create([
        'slug' => 'aloevera',
        'sku' => 'P' . rand(10000,99999),
        'name' => 'Aloe Vera',
        'description' => 'Hauteur 35 cm',
        'specs' => "Plantes médicinale",

        'productlabel_id' => 1,
        'price' => 5,
        'tax' => 10,
        'thumbnail' => 'products/aloevera.jpg',
        'stock' => 90,
        'store_enabled' => true,

      ]);

      $dieffenbachia = Product::create([
        'slug' => 'dieffenbachia',
        'sku' => 'P' . rand(10000,99999),
        'name' => 'Dieffenbachia	',
        'description' => 'Hauteur 30cm',
        'specs' => "Pot de 12cm	",

        'productlabel_id' => 2,
        'price' => 5,
        'tax' => 10,
        'thumbnail' => 'products/dieffenbachia.jpg',
        'stock' => 10,
        'store_enabled' => true,

      ]);

      $athyrium = Product::create([
        'slug' => 'athyrium',
        'sku' => 'P' . rand(10000,99999),
        'name' => 'Athyrium',
        'description' => 'Hauteur 20cm	',
        'specs' => "Pot de 8cm	",

        'productlabel_id' => 3,
        'price' => 2,
        'tax' => 10,
        'thumbnail' => 'products/athyrium.jpg',
        'stock' => 100,
        'store_enabled' => true,

      ]);

      $marantaFascinator = Product::create([
        'slug' => 'maranta-fascinator',
        'sku' => 'P' . rand(10000,99999),
        'name' => 'Maranta fascinator',
        'description' => 'Hauteur 30cm	',
        'specs' => "Pot de 12cm	",

        'productlabel_id' => 2,
        'price' => 5,
        'tax' => 10,
        'thumbnail' => 'products/maranta-fascinator.jpg',
        'stock' => 50,
        'store_enabled' => true,

      ]);

      $philodendron = Product::create([
        'slug' => 'philodendron-imperial-red',
        'sku' => 'P' . rand(10000,99999),
        'name' => 'Philodendron Imperial red',
        'description' => 'Hauteur 60cm	',
        'specs' => "Pot de 17cm	",

        'productlabel_id' => 2,
        'price' => 10,
        'tax' => 10,
        'thumbnail' => 'products/philodendron-imperial-red.jpg',
        'stock' => 50,
        'store_enabled' => true,

      ]);

      $sanseveria = Product::create([
        'slug' => 'sanseveria-laurentii-80cm',
        'sku' => 'P' . rand(10000,99999),
        'name' => 'Sanseveria laurentii 80 cm',
        'description' => 'Hauteur 80cm	',
        'specs' => "Pot de 14cm	",

        'productlabel_id' => 2,
        'price' => 10,
        'tax' => 10,
        'thumbnail' => 'products/sanseveria-laurentii-80cm.jpg',
        'stock' => 50,
        'store_enabled' => true,

      ]);

      $calluMarlies = Product::create([
        'slug' => 'callu-marlies',
        'sku' => 'P' . rand(10000,99999),
        'name' => 'Callu marlies	',
        'description' => 'Hauteur 20cm	',
        'specs' => "Pot de 11cm	",

        'productlabel_id' => 2,
        'price' => 3,
        'tax' => 10,
        'thumbnail' => 'products/callu-marlies.png',
        'stock' => 50,
        'store_enabled' => true,

      ]);

      $lierre = Product::create([
        'slug' => 'lierre',
        'sku' => 'P' . rand(10000,99999),
        'name' => 'Lierre',
        'description' => '20cm de hauteur',
        'specs' => "Pot de 8cm	",

        'productlabel_id' => 1,
        'price' => 2,
        'tax' => 10,
        'thumbnail' => 'products/lierre.png',
        'stock' => 93,
        'store_enabled' => true,

      ]);

      $zamioculcas = Product::create([
        'slug' => 'zamioculcas',
        'sku' => 'P' . rand(10000,99999),
        'name' => 'Zamioculcas',
        'description' => 'Hauteur 55 - 65 cm	',
        'specs' => "Plantes d'intérieur nécessitant peu de lumière	",
        'productlabel_id' => 1,
        'price' => 10,
        'tax' => 10,
        'thumbnail' => 'products/zamioculcas.jpg',
        'stock' => 30,
        'store_enabled' => true,
                'productcategorie_id' => 2,

      ]);

      $zamioculcas = Product::create([
        'slug' => 'chameodora',
        'sku' => 'P' . rand(10000,99999),
        'name' => 'Chameodora',
        'description' => 'Hauteur 27,5 cm	',
        'specs' => "Pot de 9cm",
        'productlabel_id' => 2,
        'price' => 2,
        'tax' => 10,
        'thumbnail' => 'products/chameodora.jpg',
        'stock' => 67,
        'store_enabled' => true,
        'productcategorie_id' => 3,

      ]);


      $epipr = Product::create([
        'slug' => 'epipr-aureum',
        'sku' => 'P' . rand(10000,99999),
        'name' => 'Epipr Aureum	',
        'description' => 'Hauteur 20 cm	',
        'specs' => "Pot de 12cm	",

        'productlabel_id' => 3,
        'price' => 5,
        'tax' => 10,
        'thumbnail' => 'products/epipr.png',
        'stock' => 50,
        'store_enabled' => true,
        'productcategorie_id' => 1,

      ]);

      $lierre = Product::create([
        'slug' => 'dracaena-bicolor',
        'sku' => 'P' . rand(10000,99999),
        'name' => 'Dracaena Bicolor',
        'description' => 'Hauteur 30 cm',
        'specs' => "Pot de 8 cm	",

        'productlabel_id' => 2,
        'price' => 2,
        'tax' => 10,
        'thumbnail' => 'products/dracaena-bicolore.jpg',
        'stock' => 40,
        'store_enabled' => true,
        'productcategorie_id' => 3,

      ]);


      $musaBananier5 = Product::create([
        'slug' => 'musa-bananier-petit',
        'sku' => 'P' . rand(10000,99999),
        'name' => 'Musa bananier 5€',
        'description' => 'Hauteur 35 cm',
        'specs' => "Pot de 12 cm	",

        'productlabel_id' => 2,
        'price' => 5,
        'tax' => 10,
        'thumbnail' => 'products/musa-bananier-petit.jpg',
        'stock' => 100,
        'store_enabled' => true,
        'productcategorie_id' => 1,

      ]);

      $herbeChat = Product::create([
        'slug' => 'herbes-a-chat',
        'sku' => 'P' . rand(10000,99999),
        'name' => 'Herbes à chat',
        'description' => 'Pot de 12cm',
        'specs' => "Pot de 12cm",

        'productlabel_id' => 3,
        'price' => 2,
        'tax' => 10,
        'thumbnail' => 'products/herbes-a-chat.png',
        'stock' => 100,
        'store_enabled' => true,
        'productcategorie_id' => 3,

      ]);

      $monsteraDeliciosa = Product::create([
        'slug' => 'monstera-deliciosa-70cm',
        'sku' => 'P' . rand(10000,99999),
        'name' => 'Monstera deliciosa 70cm',
        'description' => 'Hauteur 70 cm',
        'specs' => "Très belle monstera deliciosa facile d'entretien",

        'productlabel_id' => 2,
        'price' => 10,
        'tax' => 10,
        'thumbnail' => 'products/monstera-deliciosa-70cm.jpg',
        'stock' => 100,
        'store_enabled' => true,
        'productcategorie_id' => 2,

      ]);

      $monsteraDeliciosa = Product::create([
        'slug' => 'monstera-90cm',
        'sku' => 'P' . rand(10000,99999),
        'name' => 'Monstera 90cm',
        'description' => 'Hauteur 90cm',
        'specs' => "Pot de 21cm",

        'productlabel_id' => 2,
        'price' => 20,
        'tax' => 10,
        'thumbnail' => 'products/Monstera-90cm.jpg',
        'stock' => 100,
        'store_enabled' => true,
        'productcategorie_id' => 2,

      ]);


      $dracaenaCompacta = Product::create([
        'slug' => 'dracaena-compacta',
        'sku' => 'P' . rand(10000,99999),
        'name' => 'Dracaena Compacta',
        'description' => 'Hauteur : 23 cm',
        'specs' => "Pot de 8cm",

        'productlabel_id' => 1,
        'price' => 2,
        'tax' => 10,
        'thumbnail' => 'products/dracaena-compacta.jpg',
        'stock' => 100,
        'store_enabled' => true,
        'productcategorie_id' => 2,

      ]);

      $ficusTineke = Product::create([
        'slug' => 'ficus-tineke',
        'sku' => 'P' . rand(10000,99999),
        'name' => 'Ficus el Tineke',
        'description' => 'Hauteur 100 -110 cm',
        'specs' => "Plantes d'intérieur",

        'productlabel_id' => 1,
        'price' => 30,
        'tax' => 10,
        'thumbnail' => 'products/ficus-tineke.jpg',
        'stock' => 20,
        'store_enabled' => true,
        'productcategorie_id' => 1,

      ]);

      $ficusTineke85 = Product::create([
        'slug' => 'ficus-tineke-85cm',
        'sku' => 'P' . rand(10000,99999),
        'name' => 'Ficus el tineke 85cm	',
        'description' => ' Hauteur 80 - 90 cm	',
        'specs' => "Pot de 17cm",

        'productlabel_id' => 1,
        'price' => 10,
        'tax' => 10,
        'thumbnail' => 'products/ficus-tineke-85cm.png',
        'stock' => 15,
        'store_enabled' => true,
        'productcategorie_id' => 1,

      ]);

      $ficusTineke85 = Product::create([
        'slug' => 'spathiphyllum',
        'sku' => 'P' . rand(10000,99999),
        'name' => 'Spathiphyllum',
        'description' => ' Hauteur 35cm',
        'specs' => "Pot de 12cm",

        'productlabel_id' => 1,
        'price' => 5,
        'tax' => 10,
        'thumbnail' => 'products/spathiphyllum.jpg',
        'stock' => 100,
        'store_enabled' => true,
        'productcategorie_id' => 1,

      ]);


      //$product->fiches()->attach(1);
      // $product->ventes()->attach(Vente::find(1)->id);
      // $product->ventes()->attach(Vente::find(2)->id);
      // $product->ventes()->attach(Vente::find(3)->id);
    //  $product->ventes()->attach(Vente::find(2)->id);

    $pachiraAquatica = Product::create([
      'slug' => 'pachira-aquatica-180cm',
      'sku' => 'P' . rand(10000,99999),
      'name' => 'Pachira Aquatica 180cm',
      'description' => 'Hauteur 180 cm',
      'specs' => "Hauteur 180 cm",

      'productlabel_id' => 1,
      'price' => 50,
      'tax' => 10,
      'thumbnail' => 'products/pachira-aquatica-180cm.png',
      'stock' => 2,
      'store_enabled' => true,
      'productcategorie_id' => 2,

    ]);



        $bananierMusa = Product::create([
          'slug' => 'bananier-musa',
          'sku' => 'P' . rand(10000,99999),
          'name' => 'Bananier musa',
          'description' => 'Hauteur 90 -100 cm',
          'specs' => "",

          'productlabel_id' => 1,
          'price' => 25,
          'tax' => 10,
          'thumbnail' => 'products/bananier-musa.jpg',
          'stock' => 10,
          'store_enabled' => true,
          'productcategorie_id' => 1,

        ]);


        $strelitziaNicolai = Product::create([
          'slug' => 'strelitzia-nicolai',
          'sku' => 'P' . rand(10000,99999),
          'name' => 'Strelitzia Nicolai',
          'description' => 'Hauteur 130 - 150 cm',
          'specs' => "",

          'productlabel_id' => 1,
          'price' => 30,
          'tax' => 10,
          'thumbnail' => 'products/strelitzia-nicolai.png',
          'stock' => 9,
          'store_enabled' => true,
          'productcategorie_id' => 1,

        ]);



          $euphorbia = Product::create([
            'slug' => 'euphorbia-80cm',
            'sku' => 'P' . rand(10000,99999),
            'name' => 'Euphorbia 80 cm + pot ',
            'description' => 'Hauteur 80 cm',
            'specs' => "Euphorbia avec pot en terre cuite",
            'productlabel_id' => 1,
            'price' => 20,
            'tax' => 10,
            'thumbnail' => 'products/euphorbia-80cm.png',
            'stock' => 6,
            'store_enabled' => true,

          ]);

          $ficusBiDaniel = Product::create([
            'slug' => 'ficus-be-daniel-70cm',
            'sku' => 'P' . rand(10000,99999),
            'name' => 'Ficus be daniel 70cm',
            'description' => 'Hauteur 70 cm',
            'specs' => "Pot de 17cm",
            'productlabel_id' => 1,
            'price' => 10,
            'tax' => 10,
            'thumbnail' => 'products/ficus-be-daniel-70cm.png',
            'stock' => 6,
            'store_enabled' => true,

          ]);


          $hypoest = Product::create([
            'slug' => 'hypoest',
            'sku' => 'P' . rand(10000,99999),
            'name' => 'Hypoest',
            'description' => 'Sélection au choix lors de la réception de la marchandises	',
            'specs' => "Plusieurs couleurs à sélectionner lors de la réception	",
            'productlabel_id' => 1,
            'price' => 2,
            'tax' => 10,
            'thumbnail' => 'products/hypoest.jpg',
            'stock' => 97,
            'store_enabled' => true,

          ]);

          $echeveria = Product::create([
            'slug' => 'echeveria',
            'sku' => 'P' . rand(10000,99999),
            'name' => 'Echeveria',
            'description' => ' Au choix lors de la récupération de votre commande		',
            'specs' => " Pot de 10cm		",
            'productlabel_id' => 1,
            'price' => 5,
            'tax' => 10,
            'thumbnail' => 'products/echeveria.png',
            'stock' => 40,
            'store_enabled' => true,

          ]);

          $cypres = Product::create([
            'slug' => 'cypres-lawson',
            'sku' => 'P' . rand(10000,99999),
            'name' => 'Cypres Lawson',
            'description' => ' Hauteur 30 cm	',
            'specs' => " Pot de 9 cm		",
            'productlabel_id' => 1,
            'price' => 2,
            'tax' => 10,
            'thumbnail' => 'products/cypres-lawson.jpg',
            'stock' => 8,
            'store_enabled' => true,

          ]);


                    $mini_cactus = Product::create([
                      'slug' => 'mini-cactus',
                      'sku' => 'P' . rand(10000,99999),
                      'name' => 'Cypres Lawson',
                      'description' => ' sélection au choix lors de la réception de votre commande sur place	',
                      'specs' => "  Pot 5,5 cm		",
                      'productlabel_id' => 1,
                      'price' => 1,
                      'tax' => 10,
                      'thumbnail' => 'products/mini-cactus.png',
                      'stock' => 4,
                      'store_enabled' => true,

                    ]);

                                        $cactus_pot = Product::create([
                                          'slug' => 'cactus-pot',
                                          'sku' => 'P' . rand(10000,99999),
                                          'name' => 'Cactus + Pot',
                                          'description' => ' Au choix lors de la récupération de votre commande		',
                                          'specs' => " pot de 9,5 cm			",
                                          'productlabel_id' => 1,
                                          'price' => 3,
                                          'tax' => 10,
                                          'thumbnail' => 'products/cactus-pot.png',
                                          'stock' => 37,
                                          'store_enabled' => true,

                                        ]);

                    $dypsis = Product::create([
                      'slug' => 'dypsis-lutescens-90cm',
                      'sku' => 'P' . rand(10000,99999),
                      'name' => 'Dypsis lutescens 90 cm',
                      'description' => ' hauteur 95 cm	',
                      'specs' => "  pot de 19 cm		",
                      'productlabel_id' => 1,
                      'price' => 20,
                      'tax' => 10,
                      'thumbnail' => 'products/dypsis-lutescens-90cm.jpg',
                      'stock' => 10,
                      'store_enabled' => true,

                    ]);
          $ficusMi = Product::create([
            'slug' => 'ficus-mi-ginseng-60cm',
            'sku' => 'P' . rand(10000,99999),
            'name' => ' Ficus MI GINSENG 60cm',
            'description' => 'Hauteur 55 - 60 cm	',
            'specs' => "Taille de pot 20 cm	",
            'productlabel_id' => 1,
            'price' => 40,
            'tax' => 10,
            'thumbnail' => 'products/ficus-mi-ginseng.jpg',
            'stock' => 10,
            'store_enabled' => true,

          ]);



$musaBananier5->ventes()->attach($venteClermont->id);


$dracaenaCompacta->productlabels()->attach(4);
$dracaenaCompacta->ventes()->attach($venteClermont->id);





$monsteraDeliciosa->ventes()->attach($venteClermont->id);


$herbeChat->ventes()->attach($venteClermont->id);


$euphorbia->productlabels()->attach(4);
$euphorbia->ventes()->attach($venteClermont->id);

$ficusMi->productlabels()->attach(4);
$ficusMi->ventes()->attach($venteClermont->id);


$strelitziaNicolai->productlabels()->attach(1);
$strelitziaNicolai->ventes()->attach($venteClermont->id);


$bananierMusa->productlabels()->attach(1);
$bananierMusa->ventes()->attach($venteClermont->id);


$pachiraAquatica->ventes()->attach($venteClermont->id);


$ficusTineke->ventes()->attach($venteClermont->id);

$dieffenbachia->ventes()->attach($venteClermont->id);

$aloevera->ventes()->attach($venteClermont->id);




    }
}
