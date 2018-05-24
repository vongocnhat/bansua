<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['category_id', 'name', 'img', 'quantity', 'price', 'packet', 'summary', 'description'];
    
    public function promotion()
    {
    	return $this->hasOne('App\Models\Promotion');
    }

    public function productDetails()
    {
    	return $this->hasMany('App\Models\ProductDetail');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    // public function orderDetails()
    // {
    //     return $this->belongsTo('App\Models\OrderDetail', 'product_id', 'id');
    // }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order')
        ->withPivot('quantity', 'price')
        ->withTimestamps();
    }
}
