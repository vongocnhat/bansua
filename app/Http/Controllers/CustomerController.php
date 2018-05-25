<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
    	$user = new User;
    	$user->fill($request->except('password', 'active', 'admin'));
    	$user->password = Hash::make($request->input('password'));
    	$user->save();
    	return redirect()->route('home');
    }

    public function edit($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            return view('customer.edit', compact('user'));
        }
        return view('layouts.eror');
    }

    public function update(Request $request, $id)
    {
        if (Auth::check())
        {
            $user = User::findOrFail(Auth::user()->id);
            $user->fill($request->except('password', 'active', 'admin'));
            $user->password = Hash::make($request->input('password'));
            session()->flash('notify', 'Cập Nhật Thông Tin Người Dùng Thành Công!');
            return redirect()->route('customer.edit', $user->id);
        }
        return view('layouts.eror');
    }

    public function orderIndex()
    {
        if (Auth::check()) {
            $orders = Order::where('user_id', Auth::user()->id)->get();
            return view('customer.order.index', compact('orders'));
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
            return view('customer.order.show', compact('order'));
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
