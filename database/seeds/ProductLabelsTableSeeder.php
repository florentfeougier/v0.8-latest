<?php

use Illuminate\Database\Seeder;
use App\Models\ProductLabel;
class ProductLabelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductLabel::create([
          'slug' => 'nouveau',
          'name' => 'Nouveau',
        ]);

        ProductLabel::create([
          'slug' => 'promo',
          'name' => 'Promo',
        ]);

        ProductLabel::create([
          'slug' => 'peu-lumiere',
          'name' => 'Base lumière',
        ]);

        ProductLabel::create([
          'slug' => 'peu-eau',
          'name' => "Besoin de peu d'eau",
        ]);
    }
}
