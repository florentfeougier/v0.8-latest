<?php

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Vente;
use App\Models\Fiche;
use App\Models\User;
use App\Models\Profile;
use jeremykenedy\LaravelRoles\Models\Role;
use App\Models\ProductCategorie;

class RestoreOrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {




          $userEmail = 'libouroux.fanny@gmail.com';
          $user = User::where('email', '=', $userEmail)->first();


        $order = Order::create([
          'order_id' => "OR5dc9ca9f10854",
          'amount' => "20",
          'cart' => "clermont-ferrand-nov2019",
          'payment_id' => '289554212154643800',
          'transaction_id' => '144066895',
          'payment_method' => '3DSECURE',
          'payment_status' => true,
          'user_id' => $user->id,
          'status' => 'payed',
          'created_at' => "2019-11-11 21:55:00",
          'updated_at' => "2019-11-11 21:59:00",
        ]);

        $payment = Payment::create([
          'ref_id' => $order->payment_id,
          'status' => true,
          'info' => "payed",
          'transaction_number' => $order->transaction_id,
          'auth_number' => '347804',
          'call_number' => '563399839',
          'payment_method' => '3DSECURE',
          'response_code' => '00000',
          'info' => 'payed',
          'user_id' => $user->id,
          'order_id' => $order->id,
          'amount' => $order->amount,
          'created_at' => $order->created_at,
          'updated_at' => $order->updated_at,
        ]);



        $product = Product::where('slug', 'monstera-deliciosa-70cm')->first();
        $product1 = Product::where('slug', 'musa-bananier-petit')->first();
        $product2 = Product::where('slug', 'maranta-fascinator')->first();


        $order->products()->attach($product->id, [ "quantity" => 1, "price" => $product->price]);
        $order->products()->attach($product1->id, [ "quantity" => 1, "price" => $product1->price]);
        $order->products()->attach($product2->id, [ "quantity" => 1, "price" => $product2->price]);

        $payment->order()->associate($order->id);
        $order->ventes()->attach(Vente::where('slug', "clermont-ferrand-nov2019")->first()->id);
        $payment->save();






}






}
