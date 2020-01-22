<?php

use App\Models\Profile;
use App\Models\Vente;
use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Role;

class VentesTableSeeder extends Seeder
{

      /**
       * Run the database seeds.
       *
       * @return void
       */
      public function run()
      {

        $dijon = Vente::create([
          'slug' => 'lyon-dec2019',
          'name' => 'Lyon',
          "description" => "  Le rendez-vous incontournable des Plantes Addict s'installe à Lyon prochainement avec plus de 30 variétés de plantes différentes",
          'date' => "2019-12-07 09:00:00",
          'color_code' => "#7ED195",
          'horaires' => "9h à 18h",
          'location_address' => '273 Rue de Créqui',
          'location_city' => 'Lyon',
          'location_postalcode' => '69000',
          'location_state' => 'rhone alpes',
          'location_country' => 'fr',
          'show_location' => true,
          'show_date' => true,
          'is_public' => true,
          'status' => 'active',
          'fb_event_url' => "https://facebook/plantesaddict.fr",
          'thumbnail' => "storage/ventes/lyon.jpg",

        ]);


        $valence = Vente::create([
          'slug' => 'valence',
          'name' => 'Valence',
          "description" => "Le rendez-vous incontournable des Plantes Addict s'installe à Valence prochainement avec plus de 30 variétés de plantes différentes",
          'date' => '2019-11-02 09:00:00',
          'color_code' => "#FDCC79",
          'horaires' => "9h à 18h",
          'location_address' => '6 Rue Faventine',
          'location_city' => 'Valence',
          'location_postalcode' => '26000',
          'location_state' => 'rhone alpes',
          'location_country' => 'fr',
          'show_location' => true,
          'show_date' => true,
          'is_public' => false,
          'status' => 'closed',
          'fb_event_url' => "https://www.facebook.com/events/2391568134455075/",
                  'thumbnail' => "storage/ventes/valence.jpg",
        ]);

        $valence = Vente::create([
          'slug' => 'montelimar',
          'name' => 'Montélimar',
          "description" => "Le rendez-vous incontournable des Plantes Addict s'installe à Montélimar prochainement avec plus de 30 variétés de plantes différentes",
          'date' => '2019-11-01 09:00:00',
          'color_code' => "#EAAB8C",
          'horaires' => "9h à 18h",
          'location_address' => 'Salle de la colonne',
          'location_address_info' => 'Zone artisanale de fontgrave, Rue denis papin',
          'location_city' => 'Montboucher sur jarbon',
          'location_postalcode' => '26740 ',
          'location_state' => 'rhone alpes',
          'location_country' => 'fr',

          'show_location' => true,
          'show_date' => true,
          'is_public' => false,
          'fb_event_url' => "https://www.facebook.com/events/1325034820989966",
                  'thumbnail' => "storage/ventes/montelimar.jpg",
        ]);

        $annecy = Vente::create([
          'slug' => 'annecy',
          'name' => 'Annecy',
          "description" => "Le rendez-vous incontournable des Plantes Addict s'installe à Annecy prochainement avec plus de 30 variétés de plantes différentes",
          'date' => '2019-10-26 09:00:00',
          'color_code' => "#ee8896",
          'horaires' => "9h à 18h",
          'location_address' => 'Place de la Mandallaz',
          'location_address_info' => '',
          'location_city' => 'Annecy',
          'location_postalcode' => 74000,
          'location_county' => 74,
          'location_state' => 'Rhone alpes',
          'location_country' => 'fr',

          'show_location' => true,
          'show_date' => true,
          'is_public' => false,
          'fb_event_url' => "https://www.facebook.com/events/940483946329219/",
                  'thumbnail' => "storage/ventes/annecy.jpg",
        ]);

        $annecy = Vente::create([
          'slug' => 'dijon',
          'name' => 'Dijon',
          "description" => "Le rendez-vous incontournable des Plantes Addict s'installe à Dijon prochainement avec plus de 30 variétés de plantes différentes",
          'date' => '2019-11-09 09:00:00',
          'color_code' => "#9AC8DC",
          'horaires' => "9h à 18h",
          'location_address' => '9 Boulevard Voltaire',
          'location_address_info' => '',
          'location_city' => 'Dijon',
          'location_postalcode' => 21000,
          'location_county' => 74,
          'location_state' => '',
          'location_country' => 'fr',

          'show_location' => true,
          'show_date' => true,
          'is_public' => true,
          'fb_event_url' => "https://www.facebook.com/events/529899817582308/",
                  'thumbnail' => "storage/ventes/dijon.jpg",
        ]);

        $annecy = Vente::create([
          'slug' => 'montpellier-nov2019',
          'name' => 'Montpellier',
          "description" => "Le rendez-vous incontournable des Plantes Addict s'installe à Montpellier prochainement avec plus de 30 variétés de plantes différentes",
          'date' => '2019-11-16 10:00:00',
          'color_code' => "#DBC880",
          'horaires' => "10h à 18h",
          'location_address' => '19 avenue Georges Clemenceau',
          'location_address_info' => '',
          'location_city' => 'Montpellier',
          'location_postalcode' => 34000,
          'location_county' => 34,
          'location_state' => '',
          'location_country' => 'fr',

          'show_location' => true,
          'show_date' => true,
                    'status' => 'active',
          'is_public' => true,
          'fb_event_url' => "https://www.facebook.com/events/469389210589072/",
                  'thumbnail' => "storage/ventes/dijon.jpg",
        ]);


                $annecy = Vente::create([
                  'slug' => 'clermont-ferrand-nov2019',
                  'name' => 'Clermont Ferrand',
                  "description" => "Le rendez-vous incontournable des Plantes Addict s'installe à Clermont Ferrand prochainement avec plus de 30 variétés de plantes différentes",
                  'date' => '2019-12-01 10:00:00',
                  'color_code' => "#81D7EF",
                  'horaires' => "10h à 16h",
                  'location_address' => '19 avenue Georges Clemenceau',
                  'location_address_info' => '',
                  'location_city' => 'Clermont Ferrand',
                  'location_postalcode' => 63000,
                  'location_county' => 63,
                  'location_state' => '',
                  'location_country' => 'fr',
                  'status' => 'active',
                  'show_location' => false,
                  'show_date' => true,
                  'is_public' => true,
                  'fb_event_url' => "https://www.facebook.com/events/469389210589072/",
                          'thumbnail' => "storage/ventes/dijon.jpg",
                ]);
      }
  }
