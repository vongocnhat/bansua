<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payer extends Model
{
    //
    protected $fillable = ['order_id', 'name', 'email', 'phone', 'gender', 'birthday', 'city', 'country', 'address'];

    public function order()
    {
    	return $this->belongsTo('App\Models\Order');
    }
}
