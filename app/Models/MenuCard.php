<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class MenuCard extends Model
{
    use HasFactory;

    protected $table = 'menuCard';
    protected $fillable = ([	
    						'restaurant_id',
    						'product_name',
    						'product_discription',
    						'product_price',
    						'category_name'
    					]);



    public function addProduct($request){
        $user = Session::get('user');
    	self::create([
    					'restaurant_id' =>$user->code,
    					'product_name' =>$request->product_name,
    					'product_discription' =>$request->product_discription,
    					'product_price' =>$request->product_price,
    					'category_name' =>$request->category_name
    	]);
    }




    public function updateProduct($request){
    $user = Session::get('user');
        $this::update([
                        'restaurant_id' =>$user->code,
                        'product_name' =>$request->product_name,
                        'product_discription' =>$request->product_discription,
                        'product_price' =>$request->product_price,
                        'category_name' =>$request->category_name
                        
                    ]);
    }

}
