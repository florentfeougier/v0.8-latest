<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

       $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);
        $this->call(ThemesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(VentesTableSeeder::class);
        $this->call(ProductCategoriesTableSeeder::class);
        $this->call(ProductLabelsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(FichesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(PostCategoriesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(RestoreOrdersSeeder::class);

        Model::reguard();
    }
}
