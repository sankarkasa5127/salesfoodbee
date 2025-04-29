<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

class Helper
{
    public static  function formatPrice($amount)
	{
		if(trim($amount) == '')
			$amount = 0;
		$amount = number_format($amount, 2);
		$priceAmount = str_replace(".", ",", $amount);
		return preg_replace('/,(?=.*,)/', '.', $priceAmount);
	}

	public function checkmenu($id){

		$user = Session::get('user');
		$check=0;

		$test=DB::table('websiteMenuCardCategories')
		->where('restaurantid',$user->userId)
		->where('catId',$id)
		->where('status',1)
		->first();

	   if($test){
		  $check=1;
	   }

	   return $check;

	}

}