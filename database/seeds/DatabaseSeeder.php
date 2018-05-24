<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         $this->call([
            // CategoriesTableSeeder::class,
            // ProductsTableSeeder::class,
            // ProductDetailsTableSeeder::class,
            // PromotionsTableSeeder::class,
            // OrdersTableSeeder::class,
            // UsersTableSeeder::class,
            MainSeeder::class,
        ]);
    }
}
