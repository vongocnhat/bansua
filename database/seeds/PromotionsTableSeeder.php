<?php

use Illuminate\Database\Seeder;
use App\Models\Promotion;

class PromotionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $promotions = Promotion::all();
        foreach ($promotions as $promotion) {
        	$promotion->promotions()->save(factory(App\Models\Promotion::class)->make());
        }
    }
}
