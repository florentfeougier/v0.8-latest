<?php

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Vente;
use App\Models\Fiche;
use App\Models\User;
use App\Models\ProductCategorie;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      //
      // Order
      //
    $user = User::where('email', "sarah.cabrespine@gmail.com")->first();

    $order1 = Order::create([
      'order_id' => "OR5dc8416349210",
      'amount' => "10",
      'cart' => "clermont-ferrand-nov2019",
      'payment_id' => '66346886920046085',
      'transaction_id' => '143760049',
      'payment_method' => '3DSECURE',
      'payment_status' => true,
      'user_id' => $user->id,
      'status' => 'payed',
      'created_at' => "2019-11-10 17:54:06",
      'updated_at' => "2019-11-10 17:54:06",
    ]);

    $payment = Payment::create([
      'ref_id' => '66346886920046085',
      'status' => true,
      'info' => "payed",
      'transaction_number' => '143760049',
      'auth_number' => '848892',
      'call_number' => '562976389',
      'payment_method' => '3DSECURE',
      'response_code' => '00000',
      'info' => 'payed',
      'user_id' => $user->id,
      'order_id' => $order1->id,
      'amount' => $order1->amount,
      'created_at' => "2019-11-10 17:57:45",
      'updated_at' => "2019-11-10 17:57:45",
    ]);

    $product = Product::where('slug', 'monstera-deliciosa-70cm')->first();
    $order1->products()->attach($product->id, [ "quantity" => 1, "price" => 10]);
    $payment->order()->associate($order1->id);
    $order1->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);
    $payment->save();






          //
          // Order
          //
        $user = User::where('email', "marion.taborda@yahoo.fr")->first();

        $order1 = Order::create([
          'order_id' => "OR5dc83707795a1",
          'amount' => "5",
          'cart' => "clermont-ferrand-nov2019",
          'payment_id' => '852215920560560484',
          'transaction_id' => '143745732',
          'payment_method' => '3DSECURE',
          'payment_status' => true,
          'user_id' => $user->id,
          'status' => 'payed',
          'created_at' => "2019-11-10 17:15:30",
          'updated_at' => "2019-11-10 17:15:30",
        ]);

        $payment = Payment::create([
          'ref_id' => '852215920560560484',
          'status' => true,
          'info' => "payed",
          'transaction_number' => '143745732',
          'auth_number' => '864562',
          'call_number' => '562962175',
          'payment_method' => '3DSECURE',
          'response_code' => '00000',
          'info' => 'payed',
          'user_id' => $user->id,
          'order_id' => $order1->id,
          'amount' => $order1->amount,
          'created_at' => "2019-11-10 17:15:30",
          'updated_at' => "2019-11-10 17:15:30",
        ]);

        $product = Product::where('slug', 'epipr-aureum')->first();
        $order1->products()->attach($product->id, [ "quantity" => 1, "price" => 5]);
        $payment->order()->associate($order1->id);
        $order1->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);
        $payment->save();



        //
        // Order
        //
      $user = User::where('email', "as.ricord@gmail.com")->first();

      $order3 = Order::create([
        'order_id' => "OR5dc836e2343bf",
        'amount' => "7",
        'cart' => "clermont-ferrand-nov2019",
        'payment_id' => '2417831380082411208',
        'transaction_id' => '143745286',
        'payment_method' => '3DSECURE',
        'payment_status' => true,
        'user_id' => $user->id,
        'status' => 'payed',
        'created_at' => "2019-11-10 17:12:18",
        'updated_at' => "2019-11-10 17:13:28",
      ]);

      $payment3 = Payment::create([

        'auth_number' => '864562',
        'call_number' => '562962175',

        'ref_id' => $order3->payment_id,
        'status' => true,
        'info' => "payed",
        'response_code' => '00000',
        'info' => 'payed',
        'transaction_number' => $order3->transaction_id,
        'payment_method' => $order3->payment_method,
        'user_id' => $user->id,
        'order_id' => $order3->id,
        'amount' => $order3->amount,
        'created_at' => $order3->created_at,
        'updated_at' => $order3->updated_at,
      ]);

      $product1 = Product::where('slug', 'dracaena-compacta')->first();
      $product2 = Product::where('slug', 'aloevera')->first();
      $order3->products()->attach($product1->id, [ "quantity" => 1, "price" => 2]);
      $order3->products()->attach($product2->id, [ "quantity" => 1, "price" => 5]);

      $payment3->order()->associate($order3->id);
      $order3->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);
      $payment3->save();





              //
              // Order
              //
            $user = User::where('email', "cattleya.sedilot@gmail.com")->first();

            $order4 = Order::create([
              'order_id' => "OR5dc7fca89c7af",
              'amount' => "26",
              'cart' => "clermont-ferrand-nov2019",
              'payment_id' => '1395719738521274536',
              'transaction_id' => '143688725',
              'payment_method' => '3DSECURE',
              'payment_status' => true,
              'user_id' => $user->id,
              'status' => 'payed',
              'created_at' => "2019-11-10 13:03:52",
              'updated_at' => "2019-11-10 13:03:58",
            ]);

            $payment4 = Payment::create([

              'auth_number' => '261309',
              'call_number' => '562885876',

              'ref_id' => $order4->payment_id,
              'status' => true,
              'info' => "payed",
              'response_code' => '00000',
              'info' => 'payed',
              'transaction_number' => $order4->transaction_id,
              'payment_method' => $order4->payment_method,
              'user_id' => $user->id,
              'order_id' => $order4->id,
              'amount' => $order4->amount,
              'created_at' => $order4->created_at,
              'updated_at' => $order4->updated_at,
            ]);

            $product1 = Product::where('slug', 'dracaena-compacta')->first();
            $product2 = Product::where('slug', 'aloevera')->first();
            $product3 = Product::where('slug', 'musa-bananier-petit')->first();
            $product4 = Product::where('slug', 'zamioculcas')->first();
            $product5 = Product::where('slug', 'chameodora')->first();
            $product6 = Product::where('slug', 'athyrium')->first();
            $order4->products()->attach($product1->id, [ "quantity" => 1, "price" => 2]);
            $order4->products()->attach($product2->id, [ "quantity" => 1, "price" => 5]);
            $order4->products()->attach($product3->id, [ "quantity" => 1, "price" => 5]);
            $order4->products()->attach($product4->id, [ "quantity" => 1, "price" => 10]);
            $order4->products()->attach($product5->id, [ "quantity" => 1, "price" => 2]);
            $order4->products()->attach($product5->id, [ "quantity" => 1, "price" => 2]);

            $payment4->order()->associate($order4->id);
            $order4->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);
            $payment4->save();





                          //
                          // Order
                          //
                        $user = User::where('email', "oriane.auxerre@gmail.com")->first();

                        $order5 = Order::create([
                          'order_id' => "OR5dc7d6bd98970",
                          'amount' => "29",
                          'cart' => "clermont-ferrand-nov2019",
                          'payment_id' => '1468198547073762697',
                          'transaction_id' => '143649592',
                          'payment_method' => '3DSECURE',
                          'payment_status' => true,
                          'user_id' => $user->id,
                          'status' => 'payed',
                          'created_at' => "2019-11-10 10:22:05",
                          'updated_at' => "2019-11-10 10:22:55",
                        ]);

                        $payment5 = Payment::create([

                          'auth_number' => '995552',
                          'call_number' => '562830974',

                          'ref_id' => $order5->payment_id,
                          'status' => true,
                          'info' => "payed",
                          'response_code' => '00000',
                          'info' => 'payed',
                          'transaction_number' => $order5->transaction_id,
                          'payment_method' => $order5->payment_method,
                          'user_id' => $user->id,
                          'order_id' => $order5->id,
                          'amount' => $order5->amount,
                          'created_at' => $order5->created_at,
                          'updated_at' => $order5->updated_at,
                        ]);

                        $product1 = Product::where('slug', 'dracaena-marginata-80cm')->first();
                        $product2 = Product::where('slug', 'aloevera')->first();
                        $product3 = Product::where('slug', 'monstera-deliciosa-70cm')->first();
                        $product4 = Product::where('slug', 'athyrium')->first();
                        $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);
                        $order5->products()->attach($product2->id, [ "quantity" => 1, "price" => $product2->price]);
                        $order5->products()->attach($product3->id, [ "quantity" => 1, "price" => $product3->price]);
                        $order5->products()->attach($product4->id, [ "quantity" => 2, "price" => $product4->price]);

                        $payment5->order()->associate($order5->id);
                        $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                        $payment5->save();





                                                  //
                                                  // Order
                                                  //
                                                $user = User::where('email', "dasilva.claire@ymail.com")->first();

                                                $order5 = Order::create([
                                                  'order_id' => "OR5dc6bb9c9091d",
                                                  'amount' => "30",
                                                  'cart' => "clermont-ferrand-nov2019",
                                                  'payment_id' => '771416081154832248',
                                                  'transaction_id' => '143496427',
                                                  'payment_method' => '3DSECURE',
                                                  'payment_status' => true,
                                                  'user_id' => $user->id,
                                                  'status' => 'payed',
                                                  'created_at' => "2019-11-09 14:14:04",
                                                  'updated_at' => "2019-11-09 14:14:10",
                                                ]);

                                                $payment5 = Payment::create([

                                                  'auth_number' => '370154',
                                                  'call_number' => '562580419',

                                                  'ref_id' => $order5->payment_id,
                                                  'status' => true,
                                                  'info' => "payed",
                                                  'response_code' => '00000',
                                                  'info' => 'payed',
                                                  'transaction_number' => $order5->transaction_id,
                                                  'payment_method' => $order5->payment_method,
                                                  'user_id' => $user->id,
                                                  'order_id' => $order5->id,
                                                  'amount' => $order5->amount,
                                                  'created_at' => $order5->created_at,
                                                  'updated_at' => $order5->updated_at,
                                                ]);

                                                $product1 = Product::where('slug', 'ficus-be-daniel-70cm')->first();
                                                $product2 = Product::where('slug', 'chameodora')->first();
                                                $product3 = Product::where('slug', 'athyrium')->first();
                                                $order5->products()->attach($product1->id, [ "quantity" => 2, "price" => $product1->price]);
                                                $order5->products()->attach($product2->id, [ "quantity" => 2, "price" => $product2->price]);
                                                $order5->products()->attach($product3->id, [ "quantity" => 3, "price" => $product3->price]);

                                                $payment5->order()->associate($order5->id);
                                                $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);
                                                $payment5->save();






          //
          // Order
          //
        $user = User::where('email', "chrisperonnet@aol.com")->first();

        $order5 = Order::create([
          'order_id' => "OR5dc5b1eed16bf",
          'amount' => "12",
          'cart' => "clermont-ferrand-nov2019",
          'payment_id' => '1775079579676607400',
          'transaction_id' => '143327560',
          'payment_method' => '3DSECURE',
          'payment_status' => true,
          'user_id' => $user->id,
          'status' => 'payed',
          'created_at' => "2019-11-08 19:20:30",
          'updated_at' => "2019-11-08 19:20:30",
        ]);

        $payment5 = Payment::create([

          'auth_number' => '359197',
          'call_number' => '562320989',

          'ref_id' => $order5->payment_id,
          'status' => true,
          'info' => "payed",
          'response_code' => '00000',
          'info' => 'payed',
          'transaction_number' => $order5->transaction_id,
          'payment_method' => $order5->payment_method,
          'user_id' => $user->id,
          'order_id' => $order5->id,
          'amount' => $order5->amount,
          'created_at' => $order5->created_at,
          'updated_at' => $order5->updated_at,
        ]);

        $product1 = Product::where('slug', 'epipr-aureum')->first();
        $product2 = Product::where('slug', 'callu-marlies')->first();
        $product3 = Product::where('slug', 'lierre')->first();
        $product4 = Product::where('slug', 'athyrium')->first();
        $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);
        $order5->products()->attach($product2->id, [ "quantity" => 1, "price" => $product2->price]);
        $order5->products()->attach($product3->id, [ "quantity" => 1, "price" => $product3->price]);
        $order5->products()->attach($product4->id, [ "quantity" => 1, "price" => $product4->price]);

        $payment5->order()->associate($order5->id);
        $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

        $payment5->save();




              //
              // Order
              //
            $user = User::where('email', "lmarcela@laposte.net")->first();

            $order5 = Order::create([
              'order_id' => "OR5dc5b09c05019",
              'amount' => "27",
              'cart' => "clermont-ferrand-nov2019",
              'payment_id' => '2510846314951074048',
              'transaction_id' => '143326891',
              'payment_method' => '3DSECURE',
              'payment_status' => true,
              'user_id' => $user->id,
              'status' => 'payed',
              'created_at' => "2019-11-08 19:20:30",
              'updated_at' => "2019-11-08 19:20:30",
            ]);

            $payment5 = Payment::create([

              'auth_number' => '084418',
              'call_number' => '562319743',

              'ref_id' => $order5->payment_id,
              'status' => true,
              'info' => "payed",
              'response_code' => '00000',
              'info' => 'payed',
              'transaction_number' => $order5->transaction_id,
              'payment_method' => $order5->payment_method,
              'user_id' => $user->id,
              'order_id' => $order5->id,
              'amount' => $order5->amount,
              'created_at' => $order5->created_at,
              'updated_at' => $order5->updated_at,
            ]);

            $product1 = Product::where('slug', 'dracaena-marginata-80cm')->first();
            $product2 = Product::where('slug', 'musa-bananier-petit')->first();
            $product3 = Product::where('slug', 'lierre')->first();
            $product4 = Product::where('slug', 'sanseveria-laurentii-80cm')->first();
            $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);
            $order5->products()->attach($product2->id, [ "quantity" => 1, "price" => $product2->price]);
            $order5->products()->attach($product3->id, [ "quantity" => 1, "price" => $product3->price]);
            $order5->products()->attach($product4->id, [ "quantity" => 1, "price" => $product4->price]);

            $payment5->order()->associate($order5->id);
            $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

            $payment5->save();





                          //
                          // Order
                          //
                        $user = User::where('email', "samira.messaoudi@gmail.com")->first();

                        $order5 = Order::create([
                          'order_id' => "OR5dc5844e520c9",
                          'amount' => "30",
                          'cart' => "clermont-ferrand-nov2019",
                          'payment_id' => '141682541941151184',
                          'transaction_id' => '143270520',
                          'payment_method' => '3DSECURE',
                          'payment_status' => true,
                          'user_id' => $user->id,
                          'status' => 'payed',
                          'created_at' => "2019-11-08 16:06:02",
                          'updated_at' => "2019-11-08 16:06:45",
                        ]);

                        $payment5 = Payment::create([

                          'auth_number' => '096634',
                          'call_number' => '562236597',

                          'ref_id' => $order5->payment_id,
                          'status' => true,
                          'info' => "payed",
                          'response_code' => '00000',
                          'info' => 'payed',
                          'transaction_number' => $order5->transaction_id,
                          'payment_method' => $order5->payment_method,
                          'user_id' => $user->id,
                          'order_id' => $order5->id,
                          'amount' => $order5->amount,
                          'created_at' => $order5->created_at,
                          'updated_at' => $order5->updated_at,
                        ]);

                        $product1 = Product::where('slug', 'strelitzia-nicolai')->first();
                        $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);

                        $payment5->order()->associate($order5->id);
                        $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);
                        $payment5->save();




                                                  //
                                                  // Order
                                                  //
                                                $user = User::where('email', "livy9.7.2@hotmail.fr")->first();

                                                $order5 = Order::create([
                                                  'order_id' => "OR5dc57bf230230",
                                                  'amount' => "30",
                                                  'cart' => "clermont-ferrand-nov2019",
                                                  'payment_id' => '295405745240940516',
                                                  'transaction_id' => '143258998',
                                                  'payment_method' => '3DSECURE',
                                                  'payment_status' => true,
                                                  'user_id' => $user->id,
                                                  'status' => 'payed',
                                                  'created_at' => "2019-11-08 15:33:10",
                                                  'updated_at' => "2019-11-08 15:33:40",
                                                ]);

                                                $payment5 = Payment::create([

                                                  'auth_number' => '775482',
                                                  'call_number' => '562220739',

                                                  'ref_id' => $order5->payment_id,
                                                  'status' => true,
                                                  'info' => "payed",
                                                  'response_code' => '00000',
                                                  'info' => 'payed',
                                                  'transaction_number' => $order5->transaction_id,
                                                  'payment_method' => $order5->payment_method,
                                                  'user_id' => $user->id,
                                                  'order_id' => $order5->id,
                                                  'amount' => $order5->amount,
                                                  'created_at' => $order5->created_at,
                                                  'updated_at' => $order5->updated_at,
                                                ]);

                                                $product1 = Product::where('slug', 'aloevera')->first();
                                                $product2 = Product::where('slug', 'musa-bananier-petit')->first();
                                                $product3 = Product::where('slug', 'spathiphyllum')->first();
                                                $order5->products()->attach($product1->id, [ "quantity" => 3, "price" => $product1->price]);
                                                $order5->products()->attach($product2->id, [ "quantity" => 2, "price" => $product2->price]);
                                                $order5->products()->attach($product3->id, [ "quantity" => 1, "price" => $product3->price]);

                                                $payment5->order()->associate($order5->id);
                                                $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                                                $payment5->save();




                                                                          //
                                                                          // Order
                                                                          //
                                                                        $user = User::where('email', "myrtillelbm@gmail.com")->first();

                                                                        $order5 = Order::create([
                                                                          'order_id' => "OR5dc408d4aa2af",
                                                                          'amount' => "18",
                                                                          'cart' => "clermont-ferrand-nov2019",
                                                                          'payment_id' => '1682741723933578132',
                                                                          'transaction_id' => '142911715',
                                                                          'payment_method' => '3DSECURE',
                                                                          'payment_status' => true,
                                                                          'user_id' => $user->id,
                                                                          'status' => 'payed',
                                                                          'created_at' => "2019-11-07 13:07:16",
                                                                          'updated_at' => "2019-11-07 13:07:19",
                                                                        ]);

                                                                        $payment5 = Payment::create([

                                                                          'auth_number' => '158696',
                                                                          'call_number' => '561734658',

                                                                          'ref_id' => $order5->payment_id,
                                                                          'status' => true,
                                                                          'info' => "payed",
                                                                          'response_code' => '00000',
                                                                          'info' => 'payed',
                                                                          'transaction_number' => $order5->transaction_id,
                                                                          'payment_method' => $order5->payment_method,
                                                                          'user_id' => $user->id,
                                                                          'order_id' => $order5->id,
                                                                          'amount' => $order5->amount,
                                                                          'created_at' => $order5->created_at,
                                                                          'updated_at' => $order5->updated_at,
                                                                        ]);

                                                                        $product1 = Product::where('slug', 'lierre')->first();
                                                                        $product2 = Product::where('slug', 'athyrium')->first();
                                                                        $product3 = Product::where('slug', 'dracaena-compacta')->first();
                                                                        $product4 = Product::where('slug', 'ficus-tineke-85cm')->first();

                                                                        $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);
                                                                        $order5->products()->attach($product2->id, [ "quantity" => 2, "price" => $product2->price]);
                                                                        $order5->products()->attach($product3->id, [ "quantity" => 1, "price" => $product3->price]);
                                                                        $order5->products()->attach($product4->id, [ "quantity" => 1, "price" => $product4->price]);

                                                                        $payment5->order()->associate($order5->id);
                                                                        $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                                                                        $payment5->save();





                                                                        //
                                                                        // Order
                                                                        //
                                                                      $user = User::where('email', "elpicolus@gmail.com")->first();

                                                                      $order5 = Order::create([
                                                                        'order_id' => "elpicolus@gmail.com",
                                                                        'amount' => "14",
                                                                        'cart' => "clermont-ferrand-nov2019",
                                                                        'payment_id' => '1852421265614895404',
                                                                        'transaction_id' => '142694245',
                                                                        'payment_method' => '3DSECURE',
                                                                        'payment_status' => true,
                                                                        'user_id' => $user->id,
                                                                        'status' => 'payed',
                                                                        'created_at' => "2019-11-06 19:43:11",
                                                                        'updated_at' => "2019-11-06 19:43:12",
                                                                      ]);

                                                                      $payment5 = Payment::create([

                                                                        'auth_number' => '438870',
                                                                        'call_number' => '561486229',

                                                                        'ref_id' => $order5->payment_id,
                                                                        'status' => true,
                                                                        'info' => "payed",
                                                                        'response_code' => '00000',
                                                                        'info' => 'payed',
                                                                        'transaction_number' => $order5->transaction_id,
                                                                        'payment_method' => $order5->payment_method,
                                                                        'user_id' => $user->id,
                                                                        'order_id' => $order5->id,
                                                                        'amount' => $order5->amount,
                                                                        'created_at' => $order5->created_at,
                                                                        'updated_at' => $order5->updated_at,
                                                                      ]);

                                                                      $product1 = Product::where('slug', 'lierre')->first();
                                                                      $product2 = Product::where('slug', 'chameodora')->first();
                                                                      $product3 = Product::where('slug', 'dracaena-marginata-80cm')->first();

                                                                      $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);
                                                                      $order5->products()->attach($product2->id, [ "quantity" => 1, "price" => $product2->price]);
                                                                      $order5->products()->attach($product3->id, [ "quantity" => 1, "price" => $product3->price]);

                                                                      $payment5->order()->associate($order5->id);
                                                                      $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                                                                      $payment5->save();


                                                                        //
                                                                        // Order
                                                                        //
                                                                      $user = User::where('email', "lina-marche@hotmail.com")->first();

                                                                      $order5 = Order::create([
                                                                        'order_id' => "OR5dc3150c0a509",
                                                                        'amount' => "5",
                                                                        'cart' => "clermont-ferrand-nov2019",
                                                                        'payment_id' => '2772113456295483720',
                                                                        'transaction_id' => '142695000',
                                                                        'payment_method' => '3DSECURE',
                                                                        'payment_status' => true,
                                                                        'user_id' => $user->id,
                                                                        'status' => 'payed',
                                                                        'created_at' => "2019-11-06 19:46:45",
                                                                        'updated_at' => "2019-11-06 19:46:49",
                                                                      ]);

                                                                      $payment5 = Payment::create([

                                                                        'auth_number' => '393212',
                                                                        'call_number' => '561487510',

                                                                        'ref_id' => $order5->payment_id,
                                                                        'status' => true,
                                                                        'info' => "payed",
                                                                        'response_code' => '00000',
                                                                        'info' => 'payed',
                                                                        'transaction_number' => $order5->transaction_id,
                                                                        'payment_method' => $order5->payment_method,
                                                                        'user_id' => $user->id,
                                                                        'order_id' => $order5->id,
                                                                        'amount' => $order5->amount,
                                                                        'created_at' => $order5->created_at,
                                                                        'updated_at' => $order5->updated_at,
                                                                      ]);

                                                                      $product1 = Product::where('slug', 'aloevera')->first();

                                                                      $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);

                                                                      $payment5->order()->associate($order5->id);
                                                                      $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                                                                      $payment5->save();




                                                                        //
                                                                        // Order
                                                                        //
                                                                      $user = User::where('email', "adelesignoret9@orange.fr")->first();

                                                                      $order5 = Order::create([
                                                                        'order_id' => "OR5dc30c21c2340",
                                                                        'amount' => "20",
                                                                        'cart' => "clermont-ferrand-nov2019",
                                                                        'payment_id' => '887154472969529751',
                                                                        'transaction_id' => '142683828',
                                                                        'payment_method' => '3DSECURE',
                                                                        'payment_status' => true,
                                                                        'user_id' => $user->id,
                                                                        'status' => 'payed',
                                                                        'created_at' => "2019-11-06 19:08:33",
                                                                        'updated_at' => "2019-11-06 19:08:53",
                                                                      ]);

                                                                      $payment5 = Payment::create([

                                                                        'auth_number' => '241303',
                                                                        'call_number' => '561473011',

                                                                        'ref_id' => $order5->payment_id,
                                                                        'status' => true,
                                                                        'info' => "payed",
                                                                        'response_code' => '00000',
                                                                        'info' => 'payed',
                                                                        'transaction_number' => $order5->transaction_id,
                                                                        'payment_method' => $order5->payment_method,
                                                                        'user_id' => $user->id,
                                                                        'order_id' => $order5->id,
                                                                        'amount' => $order5->amount,
                                                                        'created_at' => $order5->created_at,
                                                                        'updated_at' => $order5->updated_at,
                                                                      ]);

                                                                      $product1 = Product::where('slug', 'monstera-90cm')->first();

                                                                      $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);

                                                                      $payment5->order()->associate($order5->id);
                                                                      $order5->ventes()->attach(Vente::where('slug', $order5->cart)->first()->id);

                                                                      $payment5->save();






                                                                      //
                                                                      // Order
                                                                      //
                                                                    $user = User::where('email', "luciegiat@icloud.com")->first();

                                                                    $order5 = Order::create([
                                                                      'order_id' => "OR5dc3094a43b67",
                                                                      'amount' => "24",
                                                                      'cart' => "clermont-ferrand-nov2019",
                                                                      'payment_id' => '3355910460606219726',
                                                                      'transaction_id' => '142680265',
                                                                      'payment_method' => '3DSECURE',
                                                                      'payment_status' => true,
                                                                      'user_id' => $user->id,
                                                                      'status' => 'payed',
                                                                      'created_at' => "2019-11-06 18:57:31",
                                                                      'updated_at' => "2019-11-06 18:57:39",
                                                                    ]);

                                                                    $payment5 = Payment::create([

                                                                      'auth_number' => '552655',
                                                                      'call_number' => '561468535',

                                                                      'ref_id' => $order5->payment_id,
                                                                      'status' => true,
                                                                      'info' => "payed",
                                                                      'response_code' => '00000',
                                                                      'info' => 'payed',
                                                                      'transaction_number' => $order5->transaction_id,
                                                                      'payment_method' => $order5->payment_method,
                                                                      'user_id' => $user->id,
                                                                      'order_id' => $order5->id,
                                                                      'amount' => $order5->amount,
                                                                      'created_at' => $order5->created_at,
                                                                      'updated_at' => $order5->updated_at,
                                                                    ]);





                                                                    $product1 = Product::where('slug', 'maranta-fascinator')->first();
                                                                    $product2 = Product::where('slug', 'musa-bananier-petit')->first();
                                                                    $product3 = Product::where('slug', 'dracaena-marginata-45cm')->first();
                                                                    $product4 = Product::where('slug', 'dieffenbachia')->first();
                                                                    $product5 = Product::where('slug', 'dracaena-compacta')->first();
                                                                    $product6 = Product::where('slug', 'chameodora')->first();


                                                                    $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);
                                                                    $order5->products()->attach($product2->id, [ "quantity" => 1, "price" => $product2->price]);
                                                                    $order5->products()->attach($product3->id, [ "quantity" => 1, "price" => $product3->price]);
                                                                    $order5->products()->attach($product4->id, [ "quantity" => 1, "price" => $product4->price]);
                                                                    $order5->products()->attach($product5->id, [ "quantity" => 1, "price" => $product5->price]);
                                                                    $order5->products()->attach($product6->id, [ "quantity" => 1, "price" => $product6->price]);


                                                                    $payment5->order()->associate($order5->id);
                                                                    $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                                                                    $payment5->save();




                                                                      //
                                                                      // Order
                                                                      //
                                                                    $user = User::where('email', "mariecolin03@gmail.com")->first();

                                                                    $order5 = Order::create([
                                                                      'order_id' => "OR5dc30dd0147cc",
                                                                      'amount' => "20",
                                                                      'cart' => "clermont-ferrand-nov2019",
                                                                      'payment_id' => '505495994462309580',
                                                                      'transaction_id' => '142685885',
                                                                      'payment_method' => '3DSECURE',
                                                                      'payment_status' => true,
                                                                      'user_id' => $user->id,
                                                                      'status' => 'payed',
                                                                      'created_at' => "2019-11-06 18:50:22",
                                                                      'updated_at' => "2019-11-06 18:50:29",
                                                                    ]);

                                                                    $payment5 = Payment::create([

                                                                      'auth_number' => '432556',
                                                                      'call_number' => '561475703',

                                                                      'ref_id' => $order5->payment_id,
                                                                      'status' => true,
                                                                      'info' => "payed",
                                                                      'response_code' => '00000',
                                                                      'info' => 'payed',
                                                                      'transaction_number' => $order5->transaction_id,
                                                                      'payment_method' => $order5->payment_method,
                                                                      'user_id' => $user->id,
                                                                      'order_id' => $order5->id,
                                                                      'amount' => $order5->amount,
                                                                      'created_at' => $order5->created_at,
                                                                      'updated_at' => $order5->updated_at,
                                                                    ]);

                                                                    $product1 = Product::where('slug', 'maranta-fascinator')->first();
                                                                    $product2 = Product::where('slug', 'aloevera')->first();
                                                                    $product3 = Product::where('slug', 'epipr-aureum')->first();
                                                                    $product4 = Product::where('slug', 'dieffenbachia')->first();


                                                                    $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);
                                                                    $order5->products()->attach($product2->id, [ "quantity" => 1, "price" => $product2->price]);
                                                                    $order5->products()->attach($product3->id, [ "quantity" => 1, "price" => $product3->price]);
                                                                    $order5->products()->attach($product4->id, [ "quantity" => 1, "price" => $product4->price]);


                                                                    $payment5->order()->associate($order5->id);
                                                                    $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                                                                    $payment5->save();






                                                                    // Order
                                                                    //
                                                                  $user = User::where('email', "rozozo000@gmail.com")->first();

                                                                  $order5 = Order::create([
                                                                    'order_id' => "OR5dc306496339f",
                                                                    'amount' => "76",
                                                                    'cart' => "clermont-ferrand-nov2019",
                                                                    'payment_id' => '3277984697088707112',
                                                                    'transaction_id' => '142675564',
                                                                    'payment_method' => '3DSECURE',
                                                                    'payment_status' => true,
                                                                    'user_id' => $user->id,
                                                                    'status' => 'payed',
                                                                    'created_at' => "2019-11-06 18:44:04",
                                                                    'updated_at' => "2019-11-06 18:44:34",
                                                                  ]);

                                                                  $payment5 = Payment::create([

                                                                    'auth_number' => '279178',
                                                                    'call_number' => '561462289',

                                                                    'ref_id' => $order5->payment_id,
                                                                    'status' => true,
                                                                    'info' => "payed",
                                                                    'response_code' => '00000',
                                                                    'info' => 'payed',
                                                                    'transaction_number' => $order5->transaction_id,
                                                                    'payment_method' => $order5->payment_method,
                                                                    'user_id' => $user->id,
                                                                    'order_id' => $order5->id,
                                                                    'amount' => $order5->amount,
                                                                    'created_at' => $order5->created_at,
                                                                    'updated_at' => $order5->updated_at,
                                                                  ]);

                                                                  $product1 = Product::where('slug', 'athyrium')->first();
                                                                  $product2 = Product::where('slug', 'euphorbia-80cm')->first();
                                                                  $product3 = Product::where('slug', 'zamioculcas')->first();
                                                                  $product4 = Product::where('slug', 'strelitzia-nicolai')->first();
                                                                  $product5 = Product::where('slug', 'dracaena-bicolor ')->first();
                                                                  $product6 = Product::where('slug', 'dracaena-marginata-80cm')->first();





                                                                  $order5->products()->attach($product1->id, [ "quantity" => 2, "price" => $product1->price]);
                                                                  $order5->products()->attach($product2->id, [ "quantity" => 1, "price" => $product2->price]);
                                                                  $order5->products()->attach($product3->id, [ "quantity" => 1, "price" => $product3->price]);
                                                                  $order5->products()->attach($product4->id, [ "quantity" => 1, "price" => $product4->price]);
                                                                  $order5->products()->attach($product5->id, [ "quantity" => 1, "price" => $product5->price]);
                                                                  $order5->products()->attach($product6->id, [ "quantity" => 1, "price" => $product6->price]);


                                                                  $payment5->order()->associate($order5->id);
                                                                  $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                                                                  $payment5->save();




                                                                                                                                          //
                                                                                                                                          // Order
                                                                                                                                          //
                                                                                                                                        $user = User::where('email', "lucilevelut@orange.fr")->first();

                                                                                                                                        $order5 = Order::create([
                                                                                                                                          'order_id' => "OR5dc3073117c33",
                                                                                                                                          'amount' => "12",
                                                                                                                                          'cart' => "clermont-ferrand-nov2019",
                                                                                                                                          'payment_id' => '2264170626726097299',
                                                                                                                                          'transaction_id' => '142677420',
                                                                                                                                          'payment_method' => '3DSECURE',
                                                                                                                                          'payment_status' => true,
                                                                                                                                          'user_id' => $user->id,
                                                                                                                                          'status' => 'payed',
                                                                                                                                          'created_at' => "2019-11-06 18:47:37",
                                                                                                                                          'updated_at' => "2019-11-06 18:47:39",
                                                                                                                                        ]);

                                                                                                                                        $payment5 = Payment::create([

                                                                                                                                          'auth_number' => '692486',
                                                                                                                                          'call_number' => '561464627',

                                                                                                                                          'ref_id' => $order5->payment_id,
                                                                                                                                          'status' => true,
                                                                                                                                          'info' => "payed",
                                                                                                                                          'response_code' => '00000',
                                                                                                                                          'info' => 'payed',
                                                                                                                                          'transaction_number' => $order5->transaction_id,
                                                                                                                                          'payment_method' => $order5->payment_method,
                                                                                                                                          'user_id' => $user->id,
                                                                                                                                          'order_id' => $order5->id,
                                                                                                                                          'amount' => $order5->amount,
                                                                                                                                          'created_at' => $order5->created_at,
                                                                                                                                          'updated_at' => $order5->updated_at,
                                                                                                                                        ]);

                                                                                                                                        $product1 = Product::where('slug', 'monstera-deliciosa-70cm')->first();
                                                                                                                                        $product2 = Product::where('slug', 'chameodora')->first();



                                                                                                                                        $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);
                                                                                                                                        $order5->products()->attach($product2->id, [ "quantity" => 1, "price" => $product2->price]);


                                                                                                                                        $payment5->order()->associate($order5->id);
                                                                                                                                        $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                                                                                                                                        $payment5->save();



                                                                      //
                                                                      // Order
                                                                      //
                                                                    $user = User::where('email', "mrouchon92@gmail.com")->first();

                                                                    $order5 = Order::create([
                                                                      'order_id' => "OR5dc307d41cfb7",
                                                                      'amount' => "29",
                                                                      'cart' => "clermont-ferrand-nov2019",
                                                                      'payment_id' => '585656463480569614',
                                                                      'transaction_id' => '142677918',
                                                                      'payment_method' => '3DSECURE',
                                                                      'payment_status' => true,
                                                                      'user_id' => $user->id,
                                                                      'status' => 'payed',
                                                                      'created_at' => "2019-11-06 18:50:22",
                                                                      'updated_at' => "2019-11-06 18:50:29",
                                                                    ]);

                                                                    $payment5 = Payment::create([

                                                                      'auth_number' => '706547',
                                                                      'call_number' => '561465421',

                                                                      'ref_id' => $order5->payment_id,
                                                                      'status' => true,
                                                                      'info' => "payed",
                                                                      'response_code' => '00000',
                                                                      'info' => 'payed',
                                                                      'transaction_number' => $order5->transaction_id,
                                                                      'payment_method' => $order5->payment_method,
                                                                      'user_id' => $user->id,
                                                                      'order_id' => $order5->id,
                                                                      'amount' => $order5->amount,
                                                                      'created_at' => $order5->created_at,
                                                                      'updated_at' => $order5->updated_at,
                                                                    ]);

                                                                    $product1 = Product::where('slug', 'dracaena-marginata-45cm')->first();
                                                                    $product2 = Product::where('slug', 'chameodora')->first();
                                                                    $product3 = Product::where('slug', 'euphorbia-80cm')->first();


                                                                    $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);
                                                                    $order5->products()->attach($product2->id, [ "quantity" => 1, "price" => $product2->price]);
                                                                    $order5->products()->attach($product3->id, [ "quantity" => 1, "price" => $product3->price]);


                                                                    $payment5->order()->associate($order5->id);
                                                                    $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                                                                    $payment5->save();





                                                                                                                                        //
                                                                                                                                        // Order
                                                                                                                                        //

                                                                                                                                        $user = User::where('email', "ophelie.barbou@outlook.fr")->first();

                                                                                                                                        $order5 = Order::create([
                                                                                                                                          'order_id' => "OR5dc8783d48eb5",
                                                                                                                                          'amount' => "21",
                                                                                                                                          'cart' => "clermont-ferrand-nov2019",
                                                                                                                                          'payment_id' => '1434588897062514572',
                                                                                                                                          'transaction_id' => '143815696',
                                                                                                                                          'payment_method' => '3DSECURE',
                                                                                                                                          'payment_status' => true,
                                                                                                                                          'user_id' => $user->id,
                                                                                                                                          'status' => 'payed',
                                                                                                                                          'created_at' => "2019-11-10 21:24:38",
                                                                                                                                          'updated_at' => "2019-11-10 21:24:39",
                                                                                                                                        ]);

                                                                                                                                        $payment5 = Payment::create([

                                                                                                                                          'auth_number' => '529553',
                                                                                                                                          'call_number' => '563046705',

                                                                                                                                          'ref_id' => $order5->payment_id,
                                                                                                                                          'status' => true,
                                                                                                                                          'info' => "payed",
                                                                                                                                          'response_code' => '00000',
                                                                                                                                          'info' => 'payed',
                                                                                                                                          'transaction_number' => $order5->transaction_id,
                                                                                                                                          'payment_method' => $order5->payment_method,
                                                                                                                                          'user_id' => $user->id,
                                                                                                                                          'order_id' => $order5->id,
                                                                                                                                          'amount' => $order5->amount,
                                                                                                                                          'created_at' => $order5->created_at,
                                                                                                                                          'updated_at' => $order5->updated_at,
                                                                                                                                        ]);


                                                                                                                                        


                                                                                                                                        $product1 = Product::where('slug', 'lierre')->first();
                                                                                                                                        $product2 = Product::where('slug', 'aloevera')->first();
                                                                                                                                        $product3 = Product::where('slug', 'epipr-aureum')->first();
                                                                                                                                        $product4 = Product::where('slug', 'callu-marlies')->first();
                                                                                                                                        $product5 = Product::where('slug', 'ficus-be-daniel-70cm')->first();
                                                                                                                                        $product6 = Product::where('slug', 'maranta-fascinator')->first();
                                                                                                                                        $product7 = Product::where('slug', 'dracaena-bicolor')->first();

                                                                                                                                        $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);
                                                                                                                                        $order5->products()->attach($product2->id, [ "quantity" => 1, "price" => $product2->price]);
                                                                                                                                        $order5->products()->attach($product3->id, [ "quantity" => 1, "price" => $product3->price]);
                                                                                                                                        $order5->products()->attach($product4->id, [ "quantity" => 1, "price" => $product4->price]);
                                                                                                                                        $order5->products()->attach($product5->id, [ "quantity" => 1, "price" => $product5->price]);
                                                                                                                                        $order5->products()->attach($product6->id, [ "quantity" => 1, "price" => $product5->price]);
                                                                                                                                        $order5->products()->attach($product7->id, [ "quantity" => 1, "price" => $product5->price]);

                                                                                                                                        $payment5->order()->associate($order5->id);
                                                                                                                                        $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                                                                                                                                        $payment5->save();



                                                                                                                                      $user = User::where('email', "manoune_7854@hotmail.fr")->first();

                                                                                                                                      $order5 = Order::create([
                                                                                                                                        'order_id' => "OR5dc871e281654",
                                                                                                                                        'amount' => "24",
                                                                                                                                        'cart' => "clermont-ferrand-nov2019",
                                                                                                                                        'payment_id' => '2529956596278517670',
                                                                                                                                        'transaction_id' => '143811504',
                                                                                                                                        'payment_method' => '3DSECURE',
                                                                                                                                        'payment_status' => true,
                                                                                                                                        'user_id' => $user->id,
                                                                                                                                        'status' => 'payed',
                                                                                                                                        'created_at' => "2019-11-10 21:24:38",
                                                                                                                                        'updated_at' => "2019-11-10 21:24:39",
                                                                                                                                      ]);

                                                                                                                                      $payment5 = Payment::create([

                                                                                                                                        'auth_number' => '122307',
                                                                                                                                        'call_number' => '563040839',

                                                                                                                                        'ref_id' => $order5->payment_id,
                                                                                                                                        'status' => true,
                                                                                                                                        'info' => "payed",
                                                                                                                                        'response_code' => '00000',
                                                                                                                                        'info' => 'payed',
                                                                                                                                        'transaction_number' => $order5->transaction_id,
                                                                                                                                        'payment_method' => $order5->payment_method,
                                                                                                                                        'user_id' => $user->id,
                                                                                                                                        'order_id' => $order5->id,
                                                                                                                                        'amount' => $order5->amount,
                                                                                                                                        'created_at' => $order5->created_at,
                                                                                                                                        'updated_at' => $order5->updated_at,
                                                                                                                                      ]);



                                                                                                                                      $product1 = Product::where('slug', 'lierre')->first();
                                                                                                                                      $product2 = Product::where('slug', 'dieffenbachia')->first();
                                                                                                                                      $product3 = Product::where('slug', 'epipr-aureum')->first();
                                                                                                                                      $product4 = Product::where('slug', 'herbes-a-chat')->first();
                                                                                                                                      $product5 = Product::where('slug', 'ficus-be-daniel-70cm')->first();

                                                                                                                                      $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);
                                                                                                                                      $order5->products()->attach($product2->id, [ "quantity" => 1, "price" => $product2->price]);
                                                                                                                                      $order5->products()->attach($product3->id, [ "quantity" => 1, "price" => $product3->price]);
                                                                                                                                      $order5->products()->attach($product4->id, [ "quantity" => 1, "price" => $product4->price]);
                                                                                                                                      $order5->products()->attach($product5->id, [ "quantity" => 1, "price" => $product5->price]);

                                                                                                                                      $payment5->order()->associate($order5->id);
                                                                                                                                      $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                                                                                                                                      $payment5->save();


                                                                    //
                                                                    // Order
                                                                    //
                                                                  $user = User::where('email', "martin.viger63@gmail.com")->first();

                                                                  $order5 = Order::create([
                                                                    'order_id' => "OR5dc30777084fb",
                                                                    'amount' => "10",
                                                                    'cart' => "clermont-ferrand-nov2019",
                                                                    'payment_id' => '369638440708673828',
                                                                    'transaction_id' => '142677399',
                                                                    'payment_method' => '3DSECURE',
                                                                    'payment_status' => true,
                                                                    'user_id' => $user->id,
                                                                    'status' => 'payed',
                                                                    'created_at' => "2019-11-06 18:48:49",
                                                                    'updated_at' => "2019-11-06 18:48:53",
                                                                  ]);

                                                                  $payment5 = Payment::create([

                                                                    'auth_number' => '440790',
                                                                    'call_number' => '561464577',

                                                                    'ref_id' => $order5->payment_id,
                                                                    'status' => true,
                                                                    'info' => "payed",
                                                                    'response_code' => '00000',
                                                                    'info' => 'payed',
                                                                    'transaction_number' => $order5->transaction_id,
                                                                    'payment_method' => $order5->payment_method,
                                                                    'user_id' => $user->id,
                                                                    'order_id' => $order5->id,
                                                                    'amount' => $order5->amount,
                                                                    'created_at' => $order5->created_at,
                                                                    'updated_at' => $order5->updated_at,
                                                                  ]);

                                                                  $product1 = Product::where('slug', 'aloevera')->first();
                                                                  $product2 = Product::where('slug', 'maranta-fascinator')->first();

                                                                  $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);
                                                                  $order5->products()->attach($product2->id, [ "quantity" => 1, "price" => $product2->price]);

                                                                  $payment5->order()->associate($order5->id);
                                                                  $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                                                                  $payment5->save();





                                                                                                                                    //
                                                                                                                                  $user = User::where('email', "orane.debrune@outlook.fr")->first();

                                                                                                                                  $order5 = Order::create([
                                                                                                                                    'order_id' => "OR5dc43c6e7c817",
                                                                                                                                    'amount' => "15",
                                                                                                                                    'cart' => "clermont-ferrand-nov2019",
                                                                                                                                    'payment_id' => '1593577278479191040',
                                                                                                                                    'transaction_id' => '142976518',
                                                                                                                                    'payment_method' => '3DSECURE',
                                                                                                                                    'payment_status' => true,
                                                                                                                                    'user_id' => $user->id,
                                                                                                                                    'status' => 'payed',
                                                                                                                                    'created_at' => "2019-11-07 14:36:22",
                                                                                                                                    'updated_at' => "2019-11-07 14:37:22",
                                                                                                                                  ]);

                                                                                                                                  $payment5 = Payment::create([

                                                                                                                                    'auth_number' => '520425',
                                                                                                                                    'call_number' => '561813544',

                                                                                                                                    'ref_id' => $order5->payment_id,
                                                                                                                                    'status' => true,
                                                                                                                                    'info' => "payed",
                                                                                                                                    'response_code' => '00000',
                                                                                                                                    'info' => 'payed',
                                                                                                                                    'transaction_number' => $order5->transaction_id,
                                                                                                                                    'payment_method' => $order5->payment_method,
                                                                                                                                    'user_id' => $user->id,
                                                                                                                                    'order_id' => $order5->id,
                                                                                                                                    'amount' => $order5->amount,
                                                                                                                                    'created_at' => $order5->created_at,
                                                                                                                                    'updated_at' => $order5->updated_at,
                                                                                                                                  ]);



                                                                                                                                  $product1 = Product::where('slug', 'musa-bananier-petit')->first();
                                                                                                                                  $product2 = Product::where('slug', 'ficus-be-daniel-70cm')->first();

                                                                                                                                  $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);
                                                                                                                                  $order5->products()->attach($product2->id, [ "quantity" => 1, "price" => $product2->price]);

                                                                                                                                  $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                                                                                                                                  $payment5->save();

                                                                                            //



                                                                                            $user = User::where('email', "mylinh.ngd@gmail.com")->first();

                                                                                            $order5 = Order::create([
                                                                                              'order_id' => "OR5dc86d9c0af07",
                                                                                              'amount' => "30",
                                                                                              'cart' => "montpellier-nov2019",
                                                                                              'payment_id' => '2348985374761102740',
                                                                                              'transaction_id' => '143808325',
                                                                                              'payment_method' => '3DSECURE',
                                                                                              'payment_status' => true,
                                                                                              'user_id' => $user->id,
                                                                                              'status' => 'payed',
                                                                                              'created_at' => "2019-11-10 21:06:06",
                                                                                              'updated_at' => "2019-11-10 21:06:06",
                                                                                            ]);

                                                                                            $payment5 = Payment::create([

                                                                                              'auth_number' => '803324',
                                                                                              'call_number' => '563036339',

                                                                                              'ref_id' => $order5->payment_id,
                                                                                              'status' => true,
                                                                                              'info' => "payed",
                                                                                              'response_code' => '00000',
                                                                                              'info' => 'payed',
                                                                                              'transaction_number' => $order5->transaction_id,
                                                                                              'payment_method' => $order5->payment_method,
                                                                                              'user_id' => $user->id,
                                                                                              'order_id' => $order5->id,
                                                                                              'amount' => $order5->amount,
                                                                                              'created_at' => $order5->created_at,
                                                                                              'updated_at' => $order5->updated_at,
                                                                                            ]);




                                                                                            $product1 = Product::where('slug', 'strelitzia-nicolai')->first();

                                                                                            $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);

                                                                                            $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                                                                                            $payment5->save();

                                                                                        //

                                                                                        $user = User::where('email', "zoedolla22@gmail.com")->first();

                                                                                        $order5 = Order::create([
                                                                                          'order_id' => "OR5dc994a4401f9",
                                                                                          'amount' => "21",
                                                                                          'cart' => "clermont-ferrand-nov2019",
                                                                                          'payment_id' => '2758789225457994912',
                                                                                          'transaction_id' => '144001520',
                                                                                          'payment_method' => '3DSECURE',
                                                                                          'payment_status' => true,
                                                                                          'user_id' => $user->id,
                                                                                          'status' => 'payed',
                                                                                          'created_at' => "2019-11-11 18:06:41",
                                                                                          'updated_at' => "2019-11-11 18:06:44",
                                                                                        ]);

                                                                                        $payment5 = Payment::create([

                                                                                          'auth_number' => '842901',
                                                                                          'call_number' => '563318814',

                                                                                          'ref_id' => $order5->payment_id,
                                                                                          'status' => true,
                                                                                          'info' => "payed",
                                                                                          'response_code' => '00000',
                                                                                          'info' => 'payed',
                                                                                          'transaction_number' => $order5->transaction_id,
                                                                                          'payment_method' => $order5->payment_method,
                                                                                          'user_id' => $user->id,
                                                                                          'order_id' => $order5->id,
                                                                                          'amount' => $order5->amount,
                                                                                          'created_at' => $order5->created_at,
                                                                                          'updated_at' => $order5->updated_at,
                                                                                        ]);





                                                                                        $product1 = Product::where('slug', 'lierre')->first();
                                                                                        $product2 = Product::where('slug', 'spathiphyllum')->first();
                                                                                        $product3 = Product::where('slug', 'athyrium')->first();
                                                                                        $product4 = Product::where('slug', 'ficus-be-daniel-70cm')->first();

                                                                                        $order5->products()->attach($product1->id, [ "quantity" => 2, "price" => $product1->price]);
                                                                                        $order5->products()->attach($product2->id, [ "quantity" => 1, "price" => $product2->price]);
                                                                                        $order5->products()->attach($product3->id, [ "quantity" => 1, "price" => $product3->price]);
                                                                                        $order5->products()->attach($product4->id, [ "quantity" => 1, "price" => $product4->price]);

                                                                                        $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                                                                                        $payment5->save();










                                                                                                                                                                                    $user = User::where('email', "martinajulie.mj@gmail.com")->first();

                                                                                                                                                                                    $order5 = Order::create([
                                                                                                                                                                                      'order_id' => "OR5dc98c16c059e",
                                                                                                                                                                                      'amount' => "14",
                                                                                                                                                                                      'cart' => "clermont-ferrand-nov2019",
                                                                                                                                                                                      'payment_id' => '900590976654360134',
                                                                                                                                                                                      'transaction_id' => '143990456',
                                                                                                                                                                                      'payment_method' => '3DSECURE',
                                                                                                                                                                                      'payment_status' => true,
                                                                                                                                                                                      'user_id' => $user->id,
                                                                                                                                                                                      'status' => 'payed',
                                                                                                                                                                                      'created_at' => "2019-11-11 17:28:00",
                                                                                                                                                                                      'updated_at' => "2019-11-11 17:28:10",
                                                                                                                                                                                    ]);

                                                                                                                                                                                    $payment5 = Payment::create([

                                                                                                                                                                                      'auth_number' => '362689',
                                                                                                                                                                                      'call_number' => '563305162',

                                                                                                                                                                                      'ref_id' => $order5->payment_id,
                                                                                                                                                                                      'status' => true,
                                                                                                                                                                                      'info' => "payed",
                                                                                                                                                                                      'response_code' => '00000',
                                                                                                                                                                                      'info' => 'payed',
                                                                                                                                                                                      'transaction_number' => $order5->transaction_id,
                                                                                                                                                                                      'payment_method' => $order5->payment_method,
                                                                                                                                                                                      'user_id' => $user->id,
                                                                                                                                                                                      'order_id' => $order5->id,
                                                                                                                                                                                      'amount' => $order5->amount,
                                                                                                                                                                                      'created_at' => $order5->created_at,
                                                                                                                                                                                      'updated_at' => $order5->updated_at,
                                                                                                                                                                                    ]);




                                                                                                                                                                                    $product1 = Product::where('slug', 'lierre')->first();
                                                                                                                                                                                    $product2 = Product::where('slug', 'athyrium')->first();
                                                                                                                                                                                    $product3 = Product::where('slug', 'monstera-deliciosa-70cm')->first();

                                                                                                                                                                                    $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);
                                                                                                                                                                                    $order5->products()->attach($product2->id, [ "quantity" => 1, "price" => $product2->price]);
                                                                                                                                                                                    $order5->products()->attach($product3->id, [ "quantity" => 1, "price" => $product2->price]);

                                                                                                                                                                                    $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                                                                                                                                                                                    $payment5->save();

                                                                                                                                                                                //




                                                                                            $user = User::where('email', "bertuol.amandine@hotmail.fr")->first();

                                                                                            $order5 = Order::create([
                                                                                              'order_id' => "OR5dc864bb7abed",
                                                                                              'amount' => "30",
                                                                                              'cart' => "montpellier-nov2019",
                                                                                              'payment_id' => '934841407214709524',
                                                                                              'transaction_id' => '143801492',
                                                                                              'payment_method' => '3DSECURE',
                                                                                              'payment_status' => true,
                                                                                              'user_id' => $user->id,
                                                                                              'status' => 'payed',
                                                                                              'created_at' => "2019-11-10 20:28:44",
                                                                                              'updated_at' => "2019-11-10 20:28:44",
                                                                                            ]);

                                                                                            $payment5 = Payment::create([

                                                                                              'auth_number' => '038632',
                                                                                              'call_number' => '563026187',

                                                                                              'ref_id' => $order5->payment_id,
                                                                                              'status' => true,
                                                                                              'info' => "payed",
                                                                                              'response_code' => '00000',
                                                                                              'info' => 'payed',
                                                                                              'transaction_number' => $order5->transaction_id,
                                                                                              'payment_method' => $order5->payment_method,
                                                                                              'user_id' => $user->id,
                                                                                              'order_id' => $order5->id,
                                                                                              'amount' => $order5->amount,
                                                                                              'created_at' => $order5->created_at,
                                                                                              'updated_at' => $order5->updated_at,
                                                                                            ]);




                                                                                            $product1 = Product::where('slug', 'monstera-90cm')->first();
                                                                                            $product2 = Product::where('slug', 'sanseveria-laurentii-80cm')->first();

                                                                                            $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);
                                                                                            $order5->products()->attach($product2->id, [ "quantity" => 1, "price" => $product2->price]);

                                                                                            $order5->ventes()->attach(Vente::where('slug', $order5->cart)->first()->id);

                                                                                            $payment5->save();

                                                                                        //





                                                                                            $user = User::where('email', "nathansouch@gmail.com")->first();

                                                                                            $order5 = Order::create([
                                                                                              'order_id' => "OR5dc85f74911fa",
                                                                                              'amount' => "20",
                                                                                              'cart' => "clermont-ferrand-nov2019",
                                                                                              'payment_id' => '2479867994565612096',
                                                                                              'transaction_id' => '143797169',
                                                                                              'payment_method' => '3DSECURE',
                                                                                              'payment_status' => true,
                                                                                              'user_id' => $user->id,
                                                                                              'status' => 'payed',
                                                                                              'created_at' => "2019-11-10 19:59:02",
                                                                                              'updated_at' => "2019-11-10 19:59:59",
                                                                                            ]);

                                                                                            $payment5 = Payment::create([

                                                                                              'auth_number' => '692225',
                                                                                              'call_number' => '563019316',

                                                                                              'ref_id' => $order5->payment_id,
                                                                                              'status' => true,
                                                                                              'info' => "payed",
                                                                                              'response_code' => '00000',
                                                                                              'info' => 'payed',
                                                                                              'transaction_number' => $order5->transaction_id,
                                                                                              'payment_method' => $order5->payment_method,
                                                                                              'user_id' => $user->id,
                                                                                              'order_id' => $order5->id,
                                                                                              'amount' => $order5->amount,
                                                                                              'created_at' => $order5->created_at,
                                                                                              'updated_at' => $order5->updated_at,
                                                                                            ]);




                                                                                            $product1 = Product::where('slug', 'monstera-90cm')->first();

                                                                                            $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);

                                                                                            $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                                                                                            $payment5->save();

                                                                                        //



                                                                                            //
                                                                                          $user = User::where('email', "manon.benbark19@gmail.com")->first();

                                                                                          $order5 = Order::create([
                                                                                            'order_id' => "OR5dc85ba78a714",
                                                                                            'amount' => "22",
                                                                                            'cart' => "clermont-ferrand-nov2019",
                                                                                            'payment_id' => ' 2631485943046727500	',
                                                                                            'transaction_id' => '142673460',
                                                                                            'payment_method' => '3DSECURE',
                                                                                            'payment_status' => true,
                                                                                            'user_id' => $user->id,
                                                                                            'status' => 'payed',
                                                                                            'created_at' => "2019-11-10 19:49:11",
                                                                                            'updated_at' => "2019-11-10 19:49:19",
                                                                                          ]);

                                                                                          $payment5 = Payment::create([

                                                                                            'auth_number' => '228042',
                                                                                            'call_number' => '563014573',

                                                                                            'ref_id' => $order5->payment_id,
                                                                                            'status' => true,
                                                                                            'info' => "payed",
                                                                                            'response_code' => '00000',
                                                                                            'info' => 'payed',
                                                                                            'transaction_number' => $order5->transaction_id,
                                                                                            'payment_method' => $order5->payment_method,
                                                                                            'user_id' => $user->id,
                                                                                            'order_id' => $order5->id,
                                                                                            'amount' => $order5->amount,
                                                                                            'created_at' => $order5->created_at,
                                                                                            'updated_at' => $order5->updated_at,
                                                                                          ]);




                                                                                          $product1 = Product::where('slug', 'musa-bananier-petit')->first();
                                                                                          $product2 = Product::where('slug', 'athyrium')->first();
                                                                                          $product3 = Product::where('slug', 'chameodora')->first();
                                                                                          $product4 = Product::where('slug', 'aloevera')->first();
                                                                                          $product5 = Product::where('slug', 'lierre')->first();
                                                                                          $product6 = Product::where('slug', 'dracaena-compacta')->first();

                                                                                          $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);
                                                                                          $order5->products()->attach($product2->id, [ "quantity" => 2, "price" => $product2->price]);
                                                                                          $order5->products()->attach($product3->id, [ "quantity" => 1, "price" => $product3->price]);
                                                                                          $order5->products()->attach($product4->id, [ "quantity" => 1, "price" => $product4->price]);
                                                                                          $order5->products()->attach($product5->id, [ "quantity" => 1, "price" => $product5->price]);
                                                                                          $order5->products()->attach($product6->id, [ "quantity" => 2, "price" => $product6->price]);

                                                                                          $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                                                                                          $payment5->save();

                                                                                      //


                                                                                            //
                                                                                          $user = User::where('email', "corselyne@hotmail.com")->first();

                                                                                          $order5 = Order::create([
                                                                                            'order_id' => "OR5dc8430f5f33b",
                                                                                            'amount' => "20",
                                                                                            'cart' => "clermont-ferrand-nov2019",
                                                                                            'payment_id' => '1142854911569270270',
                                                                                            'transaction_id' => '142673460',
                                                                                            'payment_method' => '3DSECURE',
                                                                                            'payment_status' => true,
                                                                                            'user_id' => $user->id,
                                                                                            'status' => 'payed',
                                                                                            'created_at' => "2019-11-10 18:36:22",
                                                                                            'updated_at' => "2019-11-10 18:37:22",
                                                                                          ]);

                                                                                          $payment5 = Payment::create([

                                                                                            'auth_number' => '527578',
                                                                                            'call_number' => '563278685',

                                                                                            'ref_id' => $order5->payment_id,
                                                                                            'status' => true,
                                                                                            'info' => "payed",
                                                                                            'response_code' => '00000',
                                                                                            'info' => 'payed',
                                                                                            'transaction_number' => $order5->transaction_id,
                                                                                            'payment_method' => $order5->payment_method,
                                                                                            'user_id' => $user->id,
                                                                                            'order_id' => $order5->id,
                                                                                            'amount' => $order5->amount,
                                                                                            'created_at' => $order5->created_at,
                                                                                            'updated_at' => $order5->updated_at,
                                                                                          ]);



                                                                                          $product1 = Product::where('slug', 'monstera-deliciosa-70cm')->first();
                                                                                          $product2 = Product::where('slug', 'aloevera')->first();
                                                                                          $product3 = Product::where('slug', 'maranta-fascinator')->first();

                                                                                          $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);
                                                                                          $order5->products()->attach($product2->id, [ "quantity" => 1, "price" => $product2->price]);
                                                                                          $order5->products()->attach($product3->id, [ "quantity" => 1, "price" => $product3->price]);

                                                                                          $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                                                                                          $payment5->save();

                                                                                  //


                                                                  //
                                                                $user = User::where('email', "e.varlet03@live.fr")->first();

                                                                $order5 = Order::create([
                                                                  'order_id' => "OR5dc41dd684dc1",
                                                                  'amount' => "32",
                                                                  'cart' => "clermont-ferrand-nov2019",
                                                                  'payment_id' => '2772103028136981078',
                                                                  'transaction_id' => '142673460',
                                                                  'payment_method' => '3DSECURE',
                                                                  'payment_status' => true,
                                                                  'user_id' => $user->id,
                                                                  'status' => 'payed',
                                                                  'created_at' => "2019-11-07 14:36:22",
                                                                  'updated_at' => "2019-11-07 14:37:22",
                                                                ]);

                                                                $payment5 = Payment::create([

                                                                  'auth_number' => '454423',
                                                                  'call_number' => '561764656',

                                                                  'ref_id' => $order5->payment_id,
                                                                  'status' => true,
                                                                  'info' => "payed",
                                                                  'response_code' => '00000',
                                                                  'info' => 'payed',
                                                                  'transaction_number' => $order5->transaction_id,
                                                                  'payment_method' => $order5->payment_method,
                                                                  'user_id' => $user->id,
                                                                  'order_id' => $order5->id,
                                                                  'amount' => $order5->amount,
                                                                  'created_at' => $order5->created_at,
                                                                  'updated_at' => $order5->updated_at,
                                                                ]);



                                                                $product1 = Product::where('slug', 'chameodora')->first();
                                                                $product2 = Product::where('slug', 'musa-bananier-petit')->first();
                                                                $product3 = Product::where('slug', 'monstera-deliciosa-70cm')->first();
                                                                $product4 = Product::where('slug', 'maranta-fascinator')->first();
                                                                $product5 = Product::where('slug', 'sanseveria-laurentii-80cm')->first();


                                                                $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);
                                                                $order5->products()->attach($product2->id, [ "quantity" => 1, "price" => $product2->price]);
                                                                $order5->products()->attach($product3->id, [ "quantity" => 1, "price" => $product3->price]);
                                                                $order5->products()->attach($product4->id, [ "quantity" => 1, "price" => $product4->price]);
                                                                $order5->products()->attach($product5->id, [ "quantity" => 1, "price" => $product5->price]);

                                                                $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                                                                $payment5->save();

                          //

                                                                  //
                                                                $user = User::where('email', "estelle.paulet0@gmail.com")->first();

                                                                $order5 = Order::create([
                                                                  'order_id' => "OR5dc3050358ad9",
                                                                  'amount' => "13",
                                                                  'cart' => "clermont-ferrand-nov2019",
                                                                  'payment_id' => '1502409511083856800',
                                                                  'transaction_id' => '142673460',
                                                                  'payment_method' => '3DSECURE',
                                                                  'payment_status' => true,
                                                                  'user_id' => $user->id,
                                                                  'status' => 'payed',
                                                                  'created_at' => "2019-11-06 18:38:20",
                                                                  'updated_at' => "2019-11-06 18:38:25",
                                                                ]);

                                                                $payment5 = Payment::create([

                                                                  'auth_number' => '207652',
                                                                  'call_number' => '561459579',

                                                                  'ref_id' => $order5->payment_id,
                                                                  'status' => true,
                                                                  'info' => "payed",
                                                                  'response_code' => '00000',
                                                                  'info' => 'payed',
                                                                  'transaction_number' => $order5->transaction_id,
                                                                  'payment_method' => $order5->payment_method,
                                                                  'user_id' => $user->id,
                                                                  'order_id' => $order5->id,
                                                                  'amount' => $order5->amount,
                                                                  'created_at' => $order5->created_at,
                                                                  'updated_at' => $order5->updated_at,
                                                                ]);

                                                                $product1 = Product::where('slug', 'dracaena-compacta')->first();
                                                                $product2 = Product::where('slug', 'chameodora')->first();
                                                                $product3 = Product::where('slug', 'maranta-fascinator')->first();
                                                                $product4 = Product::where('slug', 'lierre')->first();
                                                                $product5 = Product::where('slug', 'athyrium')->first();


                                                                $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);
                                                                $order5->products()->attach($product2->id, [ "quantity" => 1, "price" => $product2->price]);
                                                                $order5->products()->attach($product3->id, [ "quantity" => 1, "price" => $product3->price]);
                                                                $order5->products()->attach($product4->id, [ "quantity" => 1, "price" => $product4->price]);
                                                                $order5->products()->attach($product5->id, [ "quantity" => 1, "price" => $product5->price]);

                                                                $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                                                                $payment5->save();

                          //
                                                                                                                                    //
                                                                                                                                    // Order
                                                                                                                                    //
                                                                                                                                  $user = User::where('email', "carole.tilly@hotmail.fr")->first();

                                                                                                                                  $order5 = Order::create([
                                                                                                                                    'order_id' => "OR5dc3050c3b016",
                                                                                                                                    'amount' => "10",
                                                                                                                                    'cart' => "clermont-ferrand-nov2019",
                                                                                                                                    'payment_id' => '26459620114570128',
                                                                                                                                    'transaction_id' => '142673745',
                                                                                                                                    'payment_method' => '3DSECURE',
                                                                                                                                    'payment_status' => true,
                                                                                                                                    'user_id' => $user->id,
                                                                                                                                    'status' => 'payed',
                                                                                                                                    'created_at' => "2019-11-06 18:40:13",
                                                                                                                                    'updated_at' => "2019-11-06 18:40:19",
                                                                                                                                  ]);

                                                                                                                                  $payment5 = Payment::create([

                                                                                                                                    'auth_number' => '365352',
                                                                                                                                    'call_number' => '561459626',

                                                                                                                                    'ref_id' => $order5->payment_id,
                                                                                                                                    'status' => true,
                                                                                                                                    'info' => "payed",
                                                                                                                                    'response_code' => '00000',
                                                                                                                                    'info' => 'payed',
                                                                                                                                    'transaction_number' => $order5->transaction_id,
                                                                                                                                    'payment_method' => $order5->payment_method,
                                                                                                                                    'user_id' => $user->id,
                                                                                                                                    'order_id' => $order5->id,
                                                                                                                                    'amount' => $order5->amount,
                                                                                                                                    'created_at' => $order5->created_at,
                                                                                                                                    'updated_at' => $order5->updated_at,
                                                                                                                                  ]);

                                                                                                                                  $product1 = Product::where('slug', 'ficus-tineke-85cm')->first();



                                                                                                                                  $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);

                                                                                                                                  $payment5->order()->associate($order5->id);
                                                                                                                                  $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                                                                                                                                  $payment5->save();

                                                                                            //

                                                                  //
                                                                  // Order
                                                                  //
                                                                $user = User::where('email', "g.morgane@hotmail.com")->first();

                                                                $order5 = Order::create([
                                                                  'order_id' => "OR5dc305f8ce951",
                                                                  'amount' => "17",
                                                                  'cart' => "clermont-ferrand-nov2019",
                                                                  'payment_id' => '3139164421212714640',
                                                                  'transaction_id' => '142679087',
                                                                  'payment_method' => '3DSECURE',
                                                                  'payment_status' => true,
                                                                  'user_id' => $user->id,
                                                                  'status' => 'payed',
                                                                  'created_at' => "2019-11-06 18:54:16",
                                                                  'updated_at' => "2019-11-06 18:54:23",
                                                                ]);

                                                                $payment5 = Payment::create([

                                                                  'auth_number' => '869932',
                                                                  'call_number' => '561466980',

                                                                  'ref_id' => $order5->payment_id,
                                                                  'status' => true,
                                                                  'info' => "payed",
                                                                  'response_code' => '00000',
                                                                  'info' => 'payed',
                                                                  'transaction_number' => $order5->transaction_id,
                                                                  'payment_method' => $order5->payment_method,
                                                                  'user_id' => $user->id,
                                                                  'order_id' => $order5->id,
                                                                  'amount' => $order5->amount,
                                                                  'created_at' => $order5->created_at,
                                                                  'updated_at' => $order5->updated_at,
                                                                ]);

                                                                $product1 = Product::where('slug', 'dracaena-compacta')->first();
                                                                $product2 = Product::where('slug', 'dieffenbachia')->first();
                                                                $product3 = Product::where('slug', 'philodendron-imperial-red')->first();


                                                                $order5->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);
                                                                $order5->products()->attach($product2->id, [ "quantity" => 1, "price" => $product2->price]);
                                                                $order5->products()->attach($product3->id, [ "quantity" => 1, "price" => $product3->price]);

                                                                $payment5->order()->associate($order5->id);
                                                                $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                                                                $payment5->save();

                          //
                          // Order
                          //
                        $user = User::where('email', "alexandre.masse63000@gmail.com")->first();

                        $order5 = Order::create([
                          'order_id' => "OR5dc45d0ab77b2",
                          'amount' => "36",
                          'cart' => "clermont-ferrand-nov2019",
                          'payment_id' => '1475496372436102110',
                          'transaction_id' => '143018939',
                          'payment_method' => '3DSECURE',
                          'payment_status' => true,
                          'user_id' => $user->id,
                          'status' => 'payed',
                          'created_at' => "2019-11-07 19:06:30",
                          'updated_at' => "2019-11-07 19:06:40",
                        ]);

                        $payment5 = Payment::create([

                          'auth_number' => '300574',
                          'call_number' => '561870897',

                          'ref_id' => $order5->payment_id,
                          'status' => true,
                          'info' => "payed",
                          'response_code' => '00000',
                          'info' => 'payed',
                          'transaction_number' => $order5->transaction_id,
                          'payment_method' => $order5->payment_method,
                          'user_id' => $user->id,
                          'order_id' => $order5->id,
                          'amount' => $order5->amount,
                          'created_at' => $order5->created_at,
                          'updated_at' => $order5->updated_at,
                        ]);

                        $product1 = Product::where('slug', 'lierre')->first();
                        $product2 = Product::where('slug', 'athyrium')->first();
                        $product3 = Product::where('slug', 'musa-bananier-petit')->first();
                        $product4 = Product::where('slug', 'epipr-aureum')->first();
                        $product5 = Product::where('slug', 'aloevera')->first();
                        $product6 = Product::where('slug', 'monstera-deliciosa-70cm')->first();
                        $product7 = Product::where('slug', 'spathiphyllum')->first();
                        $order5->products()->attach($product1->id, [ "quantity" => 2, "price" => $product1->price]);
                        $order5->products()->attach($product2->id, [ "quantity" => 1, "price" => $product2->price]);
                        $order5->products()->attach($product3->id, [ "quantity" => 1, "price" => $product3->price]);
                        $order5->products()->attach($product4->id, [ "quantity" => 1, "price" => $product4->price]);
                        $order5->products()->attach($product5->id, [ "quantity" => 1, "price" => $product5->price]);
                        $order5->products()->attach($product6->id, [ "quantity" => 1, "price" => $product6->price]);
                        $order5->products()->attach($product7->id, [ "quantity" => 1, "price" => $product7->price]);

                        $payment5->order()->associate($order5->id);
                        $order5->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);

                        $payment5->save();



    }

}
