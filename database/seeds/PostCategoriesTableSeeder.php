<?php

use Illuminate\Database\Seeder;
use App\Models\PostCategorie;

class PostCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostCategorie::create([
          'name' => 'Actualités',
          'slug' => 'actualites',
          'icon' => 'storage/icons/icon-actualites-w.svg',
          'color_code' => '2980b9',
        ]);

        PostCategorie::create([
          'name' => 'Astuces',
          'slug' => 'astuces',
          'icon' => 'storage/icons/icon-bulb-w.svg',
          'color_code' => '27ae60',
        ]);

        PostCategorie::create([
          'name' => 'Les plantes & Moi',
          'slug' => 'plantes-et-moi',
          'icon' => 'storage/icons/icon-plant-w.svg',
          'color_code' => 'dc3545',
        ]);
    }
}
