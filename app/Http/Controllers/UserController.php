<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
    	$user = new User;
    	$user->fill($request->except('password'));
    	$user->password = Hash::make($request->input('password'));
    	$user->save();
    	return redirect()->route('home');
    }

    public function orderIndex()
    {
        if (Auth::check()) {
            $orders = Order::where('user_id', Auth::user()->id)->get();
            return view('user.order.index', compact('orders'));
        } else {
            return view('layouts.404');
        }
    }

    public function orderShow()
    {
        if (Auth::check()) {
            $order = Order::where('user_id', Auth::user()->id)->firstOrFail();
            if (isset($order->user_id)) {
                $img = $order->user->img;
                $user = collect($order->user->toArray())->except('active', 'admin', 'created_at', 'updated_at', 'img', 'id');
                foreach ($user as $key => $value) {
                    if(!isset($order->$key))
                        $order->$key = $value;
                }
            }
            return view('user.order.show', compact('order'));
        } else {
            return view('layouts.404');
        }
    }

    public function login(Request $request)
    {
    	$account = $request->input('email');
    	$password = $request->input('password');
    	if (Auth::attempt(['email' => $account, 'password' => $password, 'active' => 1]) || Auth::attempt(['phone' => $account, 'password' => $password, 'active' => 1])) {
		    echo route('home');
		} else {
            echo 'Đăng Nhập Thất Bại';
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
