<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Payer;

class OrderController extends Controller
{
    //
    public function create() {
        return view('order.create');
    }

    public function store(Request $request)
    {
        $order = new Order;
        if (Auth::check()) {
            $data = $request->except('_token', 'method');
            foreach ($data as $key => $value) {
                if(Auth::user()->$key != $value)
                    $order->$key = $value;
            }
            $order->user_id = Auth::user()->id;
            $order->method = $request->input('method');
        } else {
            $order->fill($request->all());
        }
        $products = $request->session()->get('products');
        $totalQuantity = 0;
        $totalPrice = 0;
        foreach ($products as $product) {
            $totalQuantity += $product['quantity'];
            $totalPrice += $product['price'] * $product['quantity'];
        }
        $order->total_quantity = $totalQuantity;
        $order->total_price = $totalPrice;
        if ($request->input('payer') == 'payer') {
            $request->session()->put('order', $order);
            return redirect()->route('orderCus.createPayer');
        }
        $order->save();
        $this->storeOrderProduct($products, $order->id);
        $request->session()->forget('products');
        $request->session()->flash('notify', 'Đặt Hàng Thành Công');
    	return redirect()->route('home');
    }

    public function createPayer()
    {
        return view('user.payer');
    }

    public function storePayer(Request $request)
    {
        $order = $request->session()->pull('order');
        $order->save();
        // store payer
        $payer = new Payer;
        $payer->fill($request->all());
        $payer->order_id = $order->id;
        $payer->save();
        //// store payer
        $products = $request->session()->pull('products');
        $this->storeOrderProduct($products, $order->id);
        $request->session()->flash('notify', 'Đặt Hàng Thành Công');
        return redirect()->route('home');
    }

    private function storeOrderProduct($products, $orderID)
    {
        $order = Order::findOrFail($orderID);
        foreach ($products as $product) {
            $order->products()->attach($product['product_id'], ['price' => $product['price'], 'quantity' => $product['quantity']]);
        }
    }
}
