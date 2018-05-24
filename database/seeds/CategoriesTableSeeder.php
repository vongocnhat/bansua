<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Models\Category::class, 2)->create();
        // ->each(function ($category) {
        //     $products = factory(App\Models\Product::class, 20)->make();
        //     $category->products()->saveMany($products);
        //     $products->each(function ($product) {
        //         $product->promotion()->saveMany(factory(App\Models\Promotion::class));
        //         $product->productDetails()->saveMany(factory(App\Models\ProductDetail::class, 5));
        //     });
        // });
    }
}
