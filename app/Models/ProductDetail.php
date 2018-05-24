<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    //
    protected $fillable = ['product_id', 'name', 'value', 'unit'];

    public function product()
    {
    	return $this->belongsTo('App\Models\Product');
    }
}
