<?php

use Illuminate\Database\Seeder;
use App\Models\ProductCategorie;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cat1 = ProductCategorie::create([
          'slug' => 'petites-plantes',
          'name' => 'Petites Plantes',
          'description' => "Nos petites plantes d'intérieur",
        ]);

        $cat2 = ProductCategorie::create([
          'slug' => 'moyennes-plantes',
          'name' => 'Moyennes Plantes',
          'description' => "Nos moyennes plantes d'intérieur",
        ]);

        $cat3 = ProductCategorie::create([
          'slug' => 'grandes-plantes',
          'name' => 'Grandes Plantes',
          'description' => "Nos grandes plantes d'intérieur",
        ]);

        $cat4 = ProductCategorie::create([
          'slug' => 'outils',
          'name' => "Outils d'entretien",
          'description' => "Outils pour entretien",
        ]);


        $cat4 = ProductCategorie::create([
          'slug' => 'box-surprise',
          'name' => "Nos Box surprise",
          'description' => "Outils pour entretien",
        ]);


    }
}
