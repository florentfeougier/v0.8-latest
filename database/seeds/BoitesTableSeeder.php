<?php

use App\Models\Profile;
use App\Models\Boite;
use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Role;

class BoitesTableSeeder extends Seeder
{

      /**
       * Run the database seeds.
       *
       * @return void
       */
      public function run()
      {

       $box = Boite::create([
        'slug' => "box-saint-valentin",
        'name' => "Box Spéciale Saint-Valentin",
        'description' => "my box is great",
        'content' => "long text describing my super awesome box",
        'price' => 24.99,
        'tax' => 10,
        'store_enabled' => 1,
       ]);

       $box->products()->attach(1);
       $box->products()->attach(2);
       $box->products()->attach(3);
       $box->products()->attach(4);
       $box->products()->attach(5);
       $box->products()->attach(6);
       $box->products()->attach(7);
       $box->products()->attach(8);
       $box->products()->attach(9);
       $box->products()->attach(10);
       $box->products()->attach(11);
       $box->products()->attach(12);
       $box->save();
      }

  }
