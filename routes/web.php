<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'locale'], function() {
    Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('user.change-language');

	Route::get('/', 'HomeController@index')->name('home');
	Route::get('search', 'HomeController@search')->name('home.search');
	Route::get('category/{categoryID}', 'HomeController@categoryProduct')->name('categoryProduct');
	Route::get('product/showhome/{productID}', 'HomeController@show')->name('productShowHome');
	// Route::resource('test', 'TestController');
	Route::get('cart', 'CartController@index')->name('cart.index');
	Route::get('cart-update/{productID}/{quantity}', 'CartController@update')->name('cart.update');
	Route::get('cart-quantity/{productID}/{quantity}', 'CartController@quantityChange')->name('cart.quantity');
	Route::get('cart-destroy/{productID}', 'CartController@destroy')->name('cart.destroy');
	    // Route::get('create', 'CustomerController@create')->name('customer.create');
	    // Route::post('/', 'CustomerController@store')->name('customer.store');
	    Route::resource('customer', 'CustomerController')->except('index', 'show', 'destroy');
	    Route::get('order', 'CustomerController@orderIndex')->name('customer.order');
	    Route::get('order-show', 'CustomerController@orderShow')->name('customer.show');
		Route::post('login', 'CustomerController@login')->name('customer.login');
		Route::get('logout', 'CustomerController@logout')->name('customer.logout');

	Route::get('order-create', 'OrderController@create')->name('orderCus.create');
	Route::get('create-payer', 'OrderController@createPayer')->name('orderCus.createPayer');
	Route::post('store-payer', 'OrderController@storePayer')->name('orderCus.storePayer');
	Route::post('order-store', 'OrderController@store')->name('cart.store');

	//admin login
	Route::get('manager', 'Admin\LoginController@loginView')->name('admin.loginView');
	Route::post('manager/login', 'Admin\LoginController@login')->name('admin.login');
	Route::get('manager/logout', 'Admin\LoginController@logout')->name('admin.logout');
	////admin login
	//admin
	Route::prefix('admin')->middleware('adminMiddleware')->namespace('Admin')->group(function() {
		Route::resource('category', 'CategoryController')->except('show');
		Route::resource('order', 'OrderController')->except('create', 'store', 'edit');
		Route::resource('product', 'ProductController')->except('show');
		Route::resource('productDetail', 'ProductDetailController')->except('show');
		Route::resource('promotion', 'PromotionController')->except('show');
		Route::resource('user', 'UserController')->except('show');
	});

});