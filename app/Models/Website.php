<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Website extends Model
{
    use HasFactory;


    protected $table = 'websiteImg';

    protected $fillable = [
    					'restaurant_id',
    					'img_title',
    					'logoimg',
    					'bannerimg',
    					'aboutusimage',
    					'whyweareimage',
    					'BookTableimage',
    					'Testimonialsimage',
    					'galleryimage'
    				];



    public function websiteimage($request){

    	// dd($_FILES);
    	$user = Session::get('user');
		    if($files=$request->file('logoimg')){
		            $logoimage=$files->getClientOriginalName();
		            $files->move(public_path('/uploads/website/themes'.$user->userId.''),$logoimage); 
		    }
		   
		    if($files=$request->file('bannerimg')){
		            $banner =$files->getClientOriginalName();
		            $files->move(public_path('/uploads/website/themes'.$user->userId.''),$banner); 
		    }

		    $aboutusimage=array();
		    if($files=$request->file('aboutusimage')){
		        foreach($files as $file){
		            $name=$file->getClientOriginalName();
		            $file->move(public_path('/uploads/website/themes'.$user->userId.''),$name);
		            $aboutusimage[]=$name;
		        }
		    }

		    $whyweareimage=array();
		    if($files=$request->file('whyweareimage')){
		        foreach($files as $file){
		            $name=$file->getClientOriginalName();
		            $file->move(public_path('/uploads/website/themes'.$user->userId.''),$name);
		            $whyweareimage[]=$name;
		        }
		    }

		    $BookTableimage=array();
		    if($files=$request->file('BookTableimage')){
		        foreach($files as $file){
		            $name=$file->getClientOriginalName();
		            $file->move(public_path('/uploads/website/themes'.$user->userId.''),$name);
		            $BookTableimage[]=$name;
		        }
		    }

		     $Testimonialsimage=array();
		    if($files=$request->file('Testimonialsimage')){
		        foreach($files as $file){
		            $name=$file->getClientOriginalName();
		            $file->move(public_path('/uploads/website/themes'.$user->userId.''),$name);
		            $Testimonialsimage[]=$name;
		        }
		    }

		    $galleryimage=array();
		    if($files=$request->file('galleryimage')){
		        foreach($files as $file){
		            $name=$file->getClientOriginalName();
		            $file->move(public_path('/uploads/website/themes'.$user->userId.''),$name);
		            $galleryimage[]=$name;
		        }
		    }
			self::create([
	    				'restaurant_id' =>$user->code,
	    				'img_title' => $request->imageTitle,
	                    'logoimg' =>$logoimage,
	    				'bannerimg' =>$banner,
	    				'aboutusimage' => implode("|",$aboutusimage),
	    				'whyweareimage' => implode("|",$whyweareimage),
	    				'BookTableimage' => implode("|",$BookTableimage),
	    				'Testimonialsimage' => implode("|",$Testimonialsimage),
	    				'galleryimage' => implode("|",$galleryimage)
	    			]);

	}
}
