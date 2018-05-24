<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    //
	protected $fillable = ['product_id', 'price', 'start', 'end'];

	public function product()
	{
		return $this->belongsTo('App\Models\Product');
	}
}
