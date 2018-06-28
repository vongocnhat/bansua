<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Mail;

class HomeController extends Controller
{
    //
    public function index()
    {
        // send email
        Mail::send('admin.mail', ['name'=>'Vo Ngoc Nhat','email'=> 'nhatdn96it@gmail.com', 'content' => 'content'], function($message){
            $message->to('nhatdn96it@gmail.com', 'Visitor')->subject('Visitor Feedback!');
        });
        //// send email
        die;
    	$categories = Category::with('products')->get();
    	return view('home', compact('categories'));
    }

    public function show($productID)
    {
    	$product = Product::findOrFail($productID);
    	return view('ajax.product_show', compact('product'));
    }

    public function categoryProduct($categoriID)
    {
    	$category= Category::with('products')->findOrFail($categoriID);
    	$categoryName = $category->name;
    	$products = $category->products()->paginate(16);
    	return view('categoryProduct', compact('categoryName', 'products'));
    }

    public function search(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->input('search') . '%')->paginate(16);
        $categoryName = 'Các Sản Phẩm Tìm Được';
        return view('categoryProduct', compact('products', 'categoryName'));
    }

    public function changeLanguage($language)
    {
        session()->put('website_language', $language);
        // dd(config('app.locale'));
        // dd(session()->get('website_language'));
        return redirect()->back();
    }
}
