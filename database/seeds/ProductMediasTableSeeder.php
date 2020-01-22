<?php

use Illuminate\Database\Seeder;
use App\Models\ProductMedia;
use App\Models\Product;

class ProductMediasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $product1 = Product::find(1);
      $product2 = Product::find(2);
      $product3 = Product::find(3);

      $image = ProductMedia::create([
          'name' => 'Cactus',
          'description' => 'Petites Plantes',
          'filename' => "storage/products/product.jpg",
          'filetype' => 'image',
         ]);

    //  $product1->productmedias()->attach($image->id);
    //  $product2->productmedias()->attach($image->id);
    //  $product3->productmedias()->attach($image->id);

      $image = ProductMedia::create([
          'name' => 'Monstera',
          'description' => 'Petites Plantes',
          'filename' => "storage/products/product.jpg",
          'filetype' => 'image',
         ]);

    //  $product1->productmedias()->attach($image->id);
    //  $product2->productmedias()->attach($image->id);
    //  $product3->productmedias()->attach($image->id);


      $video = ProductMedia::create([
          'name' => 'Video 2',
          'description' => 'Video Plantes',
          'filename' => "storage/products/video.mp4",
          'filetype' => 'video',
         ]);

    //  $product1->productmedias()->attach($image->id);
    //  $product2->productmedias()->attach($image->id);
    //  $product3->productmedias()->attach($video->id);


    }
}
