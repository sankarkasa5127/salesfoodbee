<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class MenuCategory extends Model
{
    use HasFactory;
     protected $table = 'menuCategory';
    protected $fillable = ([	
    						'restaurant_id',
    						'category_name'
    					]);


    public function addcategory($request){
$user = Session::get('user');
    	self::create([
    					'restaurant_id' =>$user->code,
    					'category_name' =>$request->category_name
    					
    				]);
    }

}
