<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Theme extends Model
{
    use HasFactory;
    protected $table = 'website';
    protected $fillable = [
    					'restaurant_id',
                        'restaurant_name',
    					'bannerTitle',
    					'bannerSubTitle',
    					'bannerContent',
    					'videoLink',
    					'aboutUsContent',
    					'whyweeAreContent',
    					'Review',
    					'name',
    					'facebook',
    					'instagram',
    					'twitter',
    					'youtube',
    					'indeed',
    					'linkdin',
    					'service1',
    					'service2',
    					'service3',
    					'service4',
                        'email',
                        'Phone_no',
                        'whatsapp_no',
                        'address',
						'vatNumber',
						'districtCourt',
                        'opening_time',
                        'maplink',
						'foodbeeLink'
    					];



    public function websiteContent($request){
    	$user = Session::get('user');
		    // $images=array();
		    // if($files=$request->file('customerImg')){
		    //     foreach($files as $file){
		    //         $name=$file->getClientOriginalName();
		    //         $file->move(public_path('/image'),$name);
		    //         $images[]=$name;
		    //     }
		    // }
		self::create([
    				'restaurant_id' =>$user->code,
                    'restaurant_name' =>$user->name,
                    'bannerTitle' =>$request->bannerTitle,
    				'bannerSubTitle' => $request->bannerSubTitle,
    				'bannerContent' => $request->bannerContent,
    				'videoLink' => $request->videolink,
    				'aboutUsContent' => $request->aboutUsContent,
    				'whyweeAreContent' => $request->whyweeAreContent,
    				'Review' => implode("|",$request->Review),
    				'name' => implode("|",$request->name),	
                    'facebook' => $request->facebook,
                    'instagram' => $request->instagram,
                    'twitter' => $request->twitter,
                    'youtube' => $request->youtube,
                    'indeed' => $request->indeed,
                    'linkdin' => $request->linkdin,
                    'service1' => $request->service1,
                    'service2' => $request->service2,
                    'service3' => $request->service3,
                    'service4' => $request->service4,
                    'status' => '0',
                    'email'  => $request->email,
                    'Phone_no'  =>  $request->Phone_no,
                    'whatsapp_no'  =>   $request->whatsapp_no,
                    'vatNumber'  =>   $request->vatNumber,
					'address'  =>   $request->address,
					'districtCourt'=> $request->districtCourt,
                    'opening_time'  =>  $request->opening_time,
                    'maplink'  =>   $request->googlemap,
					'foodbeeLink'=>$request->foodbeeLink
    			]);

	}


	public function websiteContentUpdate($request){
    	$user = Session::get('user');
			 
		$this::update([
    				'restaurant_id' =>$user->code,
                    'restaurant_name' =>$user->name,
                    'bannerTitle' =>$request->bannerTitle,
    				'bannerSubTitle' => $request->bannerSubTitle,
    				'bannerContent' => $request->bannerContent,
    				'videoLink' => $request->videolink,
    				'aboutUsContent' => $request->aboutUsContent,
    				'whyweeAreContent' => $request->whyweeAreContent,
    				'Review' => implode("|",$request->Review),
    				'name' => implode("|",$request->name),	
                    'facebook' => $request->facebook,
                    'instagram' => $request->instagram,
                    'twitter' => $request->twitter,
                    'youtube' => $request->youtube,
                    'indeed' => $request->indeed,
                    'linkdin' => $request->linkdin,
                    'service1' => $request->service1,
                    'service2' => $request->service2,
                    'service3' => $request->service3,
                    'service4' => $request->service4,
                    'status' => '0',
                    'email'  => $request->email,
                    'Phone_no'  =>  $request->Phone_no,
                    'whatsapp_no'  =>   $request->whatsapp_no,
                    'vatNumber'  =>   $request->vatNumber,
					'address'  =>   $request->address,
					'districtCourt'=> $request->districtCourt,
                    'opening_time'  =>  $request->opening_time,
                    'maplink'  =>   $request->googlemap,
					'foodbeeLink'=>$request->foodbeeLink
    			]);

	}
}
