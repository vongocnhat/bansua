<?php

namespace App\Models;

class Utilities
{
    //
    public static function checkPromotionDate($startDay, $endDay) {
    	$dateNow = strtotime(\Carbon\Carbon::now()->toDateString());
    	if(strtotime($startDay) <= $dateNow && strtotime($endDay) >= $dateNow)
    		return true;
    	return false;
    }
}
