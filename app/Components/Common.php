<?php

namespace App\Components;
use Auth,DB;
use Illuminate\Support\Facades\Session;

class Common
{
    public static $_instance;

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function checkmenu($id){

		$check=0;

		$test=DB::table('websiteMenuCardCategories')
		->where('catId',$id)
		->where('status',1)
	    ->count();

	    if($test>0){
		  $check=1;
	    }

	   return $check;

	}

}