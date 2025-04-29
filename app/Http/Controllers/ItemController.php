<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Str;
use Cookie;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        if($this->checkAuth()==false){
                return redirect()->route('login'); 
        }
        $user = Session::get('user');

        $categories =DB::table('categories')
                    ->select('categories.id','categories.category','websiteMenuCardCategories.status','websiteMenuCardCategories.catId')
                    ->leftJoin('websiteMenuCardCategories', function($join) {
                        $join->on('websiteMenuCardCategories.catId', '=', 'categories.id');
                    })
                    ->where('categories.storeid', $user->userId)
                    ->orderBy('categories.id', 'desc')->get();

        $itemList = DB::table('products')
                    ->select('products.id','products.category_id','products.name','products.status','products.price','websiteMenuCardItems.status as show_status','websiteMenuCardItems.Itemid')
                    ->leftJoin('websiteMenuCardItems', function($join) {
                       $join->on('websiteMenuCardItems.Itemid', '=', 'products.id');
                    })
                   ->where('products.storeid', $user->userId)->get();
        return view('pages.itemList' , compact('itemList' , 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateproductbyid(Request $request) {
    	// dd($_POST);
        if($request->id){
            $productId = $request->id;
            $value = $request->value;
            $type =$request->type;
            $params = array();
            if($type == 'price') {
                 $d = explode(',', $value);
                if(count($d) == 1) {
                    $value = $d[0];
                } else if(count($d) > 1) {
                    $value = $d[0].'.'.$d[1];
                }
                $params = array('price' => $value);
                
            } else if($type == 'sku') {
                $params = array('sku' => $value);
            }else if($type == 'status') {
            	if($value == 'false'){
            		$val = 1;
            	}elseif($value == 'true'){
            		$val = 0;
            	}

                    $params = array('status' => $val);
            }
            
            if(count($params) == 0) {
                echo json_encode(array('status' => 'error', 'message' => 'Something went wrong params please try again later.')); exit;
            }
            $update = DB::table('products')
            ->where('id', $productId)
            ->update(
                $params
        ); 
            
            // $result=$this->Store_model->update($productId, $params,'products');
            
            if($update) {
           
                echo json_encode(array('status' => 'success', 'message' => 'successfully Update')); exit;
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Something went wrong please try again later.')); exit;
            }
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function menubuilder()
    {
        return view('pages.menubuilder');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function product_edit($id)
    {
        if($this->checkAuth()==false){
            return redirect()->route('login');die;

    }
        $user = Session::get('user');
		$categories = DB::table('categories')->select('id','category')->where('storeid',$user->userId)->get();
        $products=DB::table('products')->where('id',$id)->first();
        return view('pages.product_edit',['products'=>$products,'categories'=>$categories]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function product_update(Request $request)
    {
        $params = $request->all();
           
        $validator = Validator::make($params,
        [
            'name'=>'required',
            'category_id'=>'required',
        ]);
        
        if($validator->fails())
        {
            return response()->json(array('status'=>'errors', 'message' => $validator->errors()));
        }
        
        $params = [
            'category_id' =>$request->category_id,
            'name' =>$request->name,
            'product_type' => $request->product_type,
            'sku' =>$request->sku,
            'choice' =>$request->choice,
            'slugname'=>Str::slug($request->name),
            'delivery_amount'=> $request->delivery_amount==2 ? $request->delivery_amount:1,
            'more_info'=>$this->multiMoreInformation($request->more_info),
            'description'=>$this->multiDescription($request->description)
        ];

        $status=Db::table('products')->where('id',$request->id)->update($params);
            
            if($status)
            {
                return response()->json(array('status'=>'success', 'message' => $status));
            }

            return response()->json(array('status'=>'success', 'message' => 'Updated Successfully'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function multiMoreInformation($info) {
		$value = null;
		
		if(is_array($info)) {
			if(count($info) > 0 ) {
				$data = array(); 
				foreach($info as $v) {
					if(!empty($v)) {
						$data[] = $v;
					}
				}
				if(count($data) > 0) {
					$value = json_encode($data, false);
				}
				
			}
		}
		
		return $value;
	}

    private function multiDescription($description) {
		$value = null;
		if(is_array($description)) {
			if(count($description) > 0) {
				$data = array(); 
				foreach($description as $v) {
					if(!empty($v)) {
						$data[] = $v;
					}
				}
				if(count($data) > 0) {
					$value = json_encode($data, false);
				}
			}
		}
		return $value;
	}

    public function checkAuth()
    {
    if(Session::has('user')){
       return true;
    }elseif(Cookie::get('user')){
        $cookies = json_decode($cookieData);
            $id = $cookies['id'];
           $details = DB::table('tbl_users')->where('userId', $id)->first(); 
           if($details){
            Session::put('user', $details);
            return true;
           }else{
            return false;
           }  
    }
    else{
        return false;
    }
    }


    public function getCatById(Request $request){
        $id = $request->id;
		$department = DB::table('categories')->select('id','category','catslug','note','description')->where('id',$id)->first();
		if($department == null)
		{
			return response()->json(array('status'=>'error', 'message' => 'Record not found.'));
		}
		
		return response()->json(array('status'=>'success', 'data' => $department));
     
    }

    public function cat_update(Request $request){
        $params = $request->all();
         
        $validator = Validator::make($params,
        [
           'category'=>'required',
        ]);
        
        if($validator->fails())
        {
            return response()->json(array('status'=>'errors', 'message' => $validator->errors()));
        }
       
       $params = [
           'category' =>$request->category,
           'note'=>$request->note,
           'description'=>$request->description,
           'catslug'=>Str::slug($request->category)
       ];
       
        $status=DB::table('categories')->where('id',$request->id)->update($params);
            
            if($status)
            {
                return response()->json(array('status'=>'success', 'message' => $status));
            }

    }

    public function changemenu(Request $request){
        if($this->checkAuth()==false){
            return redirect()->route('login'); 
    }
        $user = Session::get('user');

        $catId=$request->id;
        $checked=$request->checked;
        $userId=$user->userId;
        $status=$checked==1 ? $this->checkmaxCount($userId):true;
        
        if($status)
        {
            $params=[
                'restaurantid'=>$userId,
                'catId'=>$catId,
                'status'=>$checked
            ];
        
            $save=DB::table('websiteMenuCardCategories')
            ->updateOrInsert(
                ['restaurantid' => $userId, 'catId' => $catId],
                $params
            );
            
            $message=$checked==1 ? "Added Successfully" : "Removed Successfully";
            return response()->json(array('status'=>'success', 'message' => $message));
            
        }
        
        return response()->json(array('status'=>'error', 'message' => 'You have exceeded the limit'));
        
        }

        public function changemenuitem(Request $request){
            if($this->checkAuth()==false){
                return redirect()->route('login'); 
        } 
            $user = Session::get('user');
            $pid=$request->id;
            $cid=$request->cid;
            $checked=$request->checked;
            $userId=$user->userId;
            $status=$checked==1 ? $this->checkmaxitemCount($userId,$cid):true;

            if($status)
            {
                $params=[
                    'restaurantid'=>$userId,
                    'catId'=>$cid,
                    'Itemid'=>$pid,
                    'status'=>$checked
                ];
            
                $save=DB::table('websiteMenuCardItems')
                ->updateOrInsert(
                    ['restaurantid' => $userId,'Itemid'=>$pid],
                    $params
                );
                
                $message=$checked==1 ? "Item Added Successfully" : "Item Removed Successfully";
                return response()->json(array('status'=>'success', 'message' => $message));
                
            }
            
            return response()->json(array('status'=>'error', 'message' => 'You have exceeded the limit'));
            
            }
        
        private function checkmaxCount($userId){
        
        $check=DB::table('websiteMenuCardCategories')->where('restaurantid',$userId)->where('status','1')->count();
        
        if($check>=6){
            return false;
        }
        
        return true;
        
        }

        private function checkmaxitemCount($userId,$cid){
        
            $check=DB::table('websiteMenuCardItems')->where('restaurantid',$userId)
                  ->where('catId',$cid)
                  ->where('status','1')->count();
            
            if($check>=8){
                return false;
            }
            
            return true;
            
        }


        


}
