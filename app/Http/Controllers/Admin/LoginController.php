<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function loginView()
    {
        if (Auth::check())
            if (Auth::user()->admin)
                return redirect()->route('order.index');
    	return view('admin.login.loginView');
    }

    public function login(Request $request)
    {
    	$account = $request->input('email');
    	$password = $request->input('password');
    	if (Auth::attempt(['email' => $account, 'password' => $password, 'active' => 1, 'admin' => 1]) 
    		|| Auth::attempt(['phone' => $account, 'password' => $password, 'active' => 1, 'admin' => 1])) {
		    return redirect()->route('order.index');
		} else {
            session()->flash('error', 'Đăng Nhập Thất Bại');
        }
    	return redirect()->route('admin.loginView');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.loginView');
    }
}
