<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = Category::all();
        foreach ($categories as $category) {
        	$category->products()->saveMany(factory(App\Models\Product::class, 3)->make());
        }
    }
}
