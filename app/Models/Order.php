<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['user_id', 'name', 'email', 'phone', 'birthday', 'gender', 'city', 'country', 'address', 'method', 'totalQuantity', 'totalPrice', 'status'];

    public function payer()
    {
    	return $this->hasOne('App\Models\Payer');
    }

    // public function orderDetails()
    // {
    // 	return $this->hasMany('App\Models\OrderDetail');
    // }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product')
        ->withPivot('quantity', 'price')
        ->withTimestamps();
    }
}
