<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         $orders = factory(App\Models\Order::class, 3)->make();
//         $productIDs = Product::pluck('id')->all();
//         $orders->each(function ($order) use ($productIDs) {
//             $orderDetails = factory(App\Models\OrderDetail::class, 3)->make()->each(function ($orderDetail) use ($productIDs) {
//                 $productID = array_rand($productIDs, 1);
//                 $selectedID = $productIDs[$productID];  
//                 unset($productIDs[$selectedID]); 
//                 $product = Product::find($selectedID);
//                 $orderDetail->productID = $product->id;
//                 $orderDetail->price = $product->price;
//                 $orderDetail->quantity = $product->quantity;
//             });
//             $orderDetails = $orderDetails;
//             $totalQuantity = 0;
//             $totalPrice = 0;
//             foreach ($orderDetails as $orderDetail) {
//                 $totalQuantity += $orderDetail->quantity;
//                 $totalPrice += $orderDetail->quantity * $orderDetail->price;
//             }
//             $order->totalQuantity = $totalQuantity;
//             $order->totalPrice = $totalPrice;
//             $order->save();
//             $order->orderDetails()->saveMany($orderDetails);
//         });
    }
}
