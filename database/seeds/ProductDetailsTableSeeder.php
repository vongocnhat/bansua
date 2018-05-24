<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $products = Product::all();
        foreach ($products as $product) {
        	$product->productDetails()->saveMany(factory(App\Models\ProductDetail::class, 3)->make());
        }
    }
}
