<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    //
    public function index()
    {
    	$categories = Category::with('products')->get();
    	return view('home', compact("categories"));
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
}
