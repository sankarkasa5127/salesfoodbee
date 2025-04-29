<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Cookie;
use Helper;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $cookieData = Cookie::get('user');
        if($this->checkAuth()==false){
                return redirect()->route('login');die;

        }

        
        $user = Session::get('user');
       
        $booking = DB::table('bookings')->where('restaurant_id', $user->code)->orderBy('id', 'desc')->limit(4)->get();
        $order = DB::table('orders')->where('restaurant_id', $user->userId)->where('created_at', '>', Carbon::today())->get();

        $bookingCount = DB::table('bookings')
        ->where('restaurant_id', $user->code)
        ->where('bookings.created_at', '>=', Carbon::today())
        ->orderBy('id', 'desc')->count();

        // dd($bookingCount);
        $total_revenues ="";
         $total_revenue=DB::select(DB::raw("SELECT *,(SELECT sum(order_items.item_qty) FROM order_items WHERE orders.order_id=order_items.order_id AND order_items.beverage=1 )as beverageQty ,(SELECT sum(order_items.item_qty) FROM order_items WHERE orders.order_id=order_items.order_id AND order_items.beverage=0 )as foodQty FROM orders JOIN order_user_details ON  order_user_details.order_id=orders.order_id WHERE orders.order_status != 'Cancelled' AND  orders.restaurant_id=".$user->userId." AND  DATE(orders.created_at) = CURDATE() ORDER BY orders.id desc"));
         // dd($total_revenue);
        $total = 0;
         $arrayTotal = array();
         foreach ($total_revenue as $revenue) {
          $delivery_charge =  $revenue->delivery_charge;
        
          $discount = $revenue->discount;
        
          $after_discount = $revenue->after_discount;
        
          $tip = $revenue->tip;
      
           if($delivery_charge > 0) { 
           $total_revenues = $after_discount+$delivery_charge+$tip;
           }else{
             $total_revenues = $after_discount+$tip;
           }
         $arrayTotal[] = $total_revenues;
         
         }
         $total = array_sum($arrayTotal);
         // echo"<pre>"; print_r($total); 
         // die();
         
        $LineChart = DB::table('orders')
                 ->select(DB::raw('count(*) as totalOrder,MONTH(created_at) as monthnumber'))
                  ->where('restaurant_id', '=',51)
                  ->whereRaw('YEAR(created_at) = YEAR(CURRENT_DATE())')
                 ->groupBy(DB::raw('year(created_at) , MONTH(created_at)'))
                  ->orderByRaw('year(created_at) , MONTH(created_at)')
                 ->get();
                 $arrMonth=array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
                 $arrayMonth=array();
                 $arrayTotalOrders=array();
                 $monthcnt=1;
                 if(!empty($LineChart)){
                    $cnt=1;
                    foreach($arrMonth as $rowmon){
                        $flag=1;
                             foreach($LineChart as $lineRow){
                                if($cnt==$lineRow->monthnumber){
                                    $flag=0;
                                     $monthName = date("F", mktime(0, 0, 0, $lineRow->monthnumber, 10));
                          // dd($monthName);
                           array_push($arrayMonth,$rowmon);
                           array_push($arrayTotalOrders,$lineRow->totalOrder);
                     }
                                }
                                if($flag){
                                         array_push($arrayMonth,$rowmon);
                                         array_push($arrayTotalOrders,0);
                                }
                         
                     $cnt++;
                    }
                    
                      
                }
         $result="";
         //DB::select(DB::raw("SELECT products.name,products.id, COUNT(products.id) as cnt, order_items.item_id  From products JOIN order_items on order_items.item_id = products.id  JOIN orders ON orders.order_id = order_items.order_id  WHERE orders.order_status != 'Cancelled'  AND  products.storeid=".$user->userId."   GROUP BY  order_items.item_id  ORDER BY cnt DESC LIMIT 6"));
$monthnamejson=json_encode($arrayMonth);
 // dd(json_decode($monthnamejson , true));
        return view('pages.index' , compact('arrayTotalOrders','monthnamejson','booking','order','total' ,'result','bookingCount'));
    }

    public function weekdata()
    {   
         if($this->checkAuth()==false){
                return redirect()->route('login');die;

        }
 
         $user = Session::get('user');
        $date = Carbon::now()->subDays(7)->endOfDay();
        $booking = DB::table('bookings')->where('restaurant_id', $user->code)->orderBy('id', 'desc')->limit(3)->get();
        $order = DB::table('orders')->where('restaurant_id', $user->userId)->where('created_at', '>', $date)->get();

        $bookingCount = DB::table('bookings')
        ->where('restaurant_id', $user->code)
        ->where('bookings.created_at', '>=', Carbon::now()->subDays(7)->endOfDay())
        ->orderBy('id', 'desc')->count();

       $total_revenues ="";
         $total_revenue=DB::select(DB::raw("SELECT *,(SELECT sum(order_items.item_qty) FROM order_items WHERE orders.order_id=order_items.order_id AND order_items.beverage=1 )as beverageQty ,(SELECT sum(order_items.item_qty) FROM order_items WHERE orders.order_id=order_items.order_id AND order_items.beverage=0 )as foodQty FROM orders JOIN order_user_details ON  order_user_details.order_id=orders.order_id WHERE orders.restaurant_id=".$user->userId." AND  orders.created_at >= DATE(NOW() - INTERVAL 7 DAY) ORDER BY orders.id desc"));
         // dd($total_revenue);
        $total = 0;
         $arrayTotal = array();
         foreach ($total_revenue as $revenue) {
          $delivery_charge =  $revenue->delivery_charge;
        
          $discount = $revenue->discount;
        
          $after_discount = $revenue->after_discount;
        
          $tip = $revenue->tip;
      
           if($delivery_charge > 0) { 
           $total_revenues = $after_discount+$delivery_charge+$tip;
           }else{
             $total_revenues = $after_discount+$tip;
           }
         $arrayTotal[] = $total_revenues;
         
         }
         $total = array_sum($arrayTotal);

         $count =0;
        $deliverd_count=0;
        $cancel_count =0;
        $alldata = [];
        foreach ($order as $odr) {
            $count++;
            if($odr->order_status =='Delivered'){
                $deliverd_count++; $odr; 
            }
            if($odr->order_status =='Cancelled'){
                $cancel_count++; $odr; 
            }
           
           
        }

        $alldata[] = array(
               "count" =>  $count,
               "deliverd_count" =>  $deliverd_count,
               "cancel_count" =>  $cancel_count,
               "total_revenue" =>  Helper::formatPrice($total),
               "bookingCount" =>  $bookingCount,
               
           );  
         return response()->json($alldata);
    }
     public function monthdata()
    {   
         if($this->checkAuth()==false){
                return redirect()->route('login');die;

        }

         $user = Session::get('user');
        $date = Carbon::now()->subDays(30)->endOfDay();
        $order = DB::table('orders')->where('restaurant_id', $user->userId)->where('created_at', '>', $date)->get();


         $total_revenues ="";
         $total_revenue=DB::select(DB::raw("SELECT *,(SELECT sum(order_items.item_qty) FROM order_items WHERE orders.order_id=order_items.order_id AND order_items.beverage=1 )as beverageQty ,(SELECT sum(order_items.item_qty) FROM order_items WHERE orders.order_id=order_items.order_id AND order_items.beverage=0 )as foodQty FROM orders JOIN order_user_details ON  order_user_details.order_id=orders.order_id WHERE orders.restaurant_id=".$user->userId." AND  orders.created_at >= DATE(NOW() - INTERVAL 30 DAY) ORDER BY orders.id desc"));
         // dd($total_revenue);
        $total = 0;
         $arrayTotal = array();
         foreach ($total_revenue as $revenue) {
          $delivery_charge =  $revenue->delivery_charge;
        
          $discount = $revenue->discount;
        
          $after_discount = $revenue->after_discount;
        
          $tip = $revenue->tip;
      
           if($delivery_charge > 0) { 
           $total_revenues = $after_discount+$delivery_charge+$tip;
           }else{
             $total_revenues = $after_discount+$tip;
           }
         $arrayTotal[] = $total_revenues;
         
         }
         $total = array_sum($arrayTotal);


         $bookingCount = DB::table('bookings')
        ->where('restaurant_id', $user->code)
        ->where('bookings.created_at', '>=', Carbon::now()->subDays(7)->endOfDay())
        ->orderBy('id', 'desc')->count();
        $count =0;
        $deliverd_count=0;
        $cancel_count =0;
        $alldata = [];
        foreach ($order as $odr) {
            $count++;
            if($odr->order_status =='Delivered'){
                $deliverd_count++; $odr; 
            }
            if($odr->order_status =='Cancelled'){
                $cancel_count++; $odr; 
            }
           
           
        }

        $alldata[] = array(
               "count" =>  $count,
               "deliverd_count" =>  $deliverd_count,
               "cancel_count" =>  $cancel_count,
               "total_revenue" => Helper::formatPrice($total),
               "bookingCount" =>  $bookingCount,
               
           );  
         return response()->json($alldata);
        // echo $count;
        // echo $cancel_count;
        // echo $cancel_count;
        // echo $total_revenue;
    }

     public function todaydata()
    {   
         if($this->checkAuth()==false){
                return redirect()->route('login');die;

        }

         $user = Session::get('user');
       
        $order = DB::table('orders')->where('restaurant_id', $user->userId)->where('created_at', '>',Carbon::today())->get();

       $total_revenues ="";
         $total_revenue=DB::select(DB::raw("SELECT *,(SELECT sum(order_items.item_qty) FROM order_items WHERE orders.order_id=order_items.order_id AND order_items.beverage=1 )as beverageQty ,(SELECT sum(order_items.item_qty) FROM order_items WHERE orders.order_id=order_items.order_id AND order_items.beverage=0 )as foodQty FROM orders JOIN order_user_details ON  order_user_details.order_id=orders.order_id WHERE orders.restaurant_id=".$user->userId." AND  orders.created_at >= DATE(NOW() - INTERVAL 1 DAY) ORDER BY orders.id desc"));
         // dd($total_revenue);
        $total = 0;
         $arrayTotal = array();
         foreach ($total_revenue as $revenue) {
          $delivery_charge =  $revenue->delivery_charge;
        
          $discount = $revenue->discount;
        
          $after_discount = $revenue->after_discount;
        
          $tip = $revenue->tip;
      
           if($delivery_charge > 0) { 
           $total_revenues = $after_discount+$delivery_charge+$tip;
           }else{
             $total_revenues = $after_discount+$tip;
           }
         $arrayTotal[] = $total_revenues;
         
         }
         $total = array_sum($arrayTotal);

        $bookingCount = DB::table('bookings')
        ->where('restaurant_id', $user->code)
        ->where('bookings.created_at', '>=', Carbon::now()->subDays(7)->endOfDay())
        ->orderBy('id', 'desc')->count();
        $count =0;
        $deliverd_count=0;
        $cancel_count =0;
        $alldata = [];
        foreach ($order as $odr) {
            $count++;
            if($odr->order_status =='Delivered' ){
                $deliverd_count++; $odr; 
            }
            if($odr->order_status =='Cancelled'){
                $cancel_count++; $odr; 
            }
           
           
        }

        $alldata[] = array(
               "count" =>  $count,
               "deliverd_count" =>  $deliverd_count,
               "cancel_count" =>  $cancel_count,
               "total_revenue" =>  Helper::formatPrice($total),
               "bookingCount" =>  $bookingCount,
               
           );  
         return response()->json($alldata);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pie_data()
    {
 if($this->checkAuth()==false){
                return redirect()->route('login');die;

        }


        $user = Session::get('user');
         $result=DB::select(DB::raw("SELECT products.name,products.id, COUNT(products.id) as cnt, order_items.item_id  From products JOIN order_items on order_items.item_id = products.id  JOIN orders ON orders.order_id = order_items.order_id  WHERE orders.order_status != 'Cancelled'  AND  products.storeid=".$user->userId."   GROUP BY  order_items.item_id  ORDER BY cnt DESC LIMIT 6"));
         echo "<pre>";
         print_r($result);die;
         $pai_order = [];
        foreach ($result as $order_items) {
            $order_items->name;
            $order_items->cnt;
            
        }
       
       
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function settings()
    {
       return view('pages.settings');
    }

    public function RestorentsStatus(Request $request)
    {
         if($this->checkAuth()==false){
                return redirect()->route('login');die;

        }

      $user = Session::get('user');

        $res_status ="";
        $id = $request->id;
        $status = $request->ariapressed;
        if($status == 'true'){

            $res_status = '0';

        }elseif($status == 'false'){
            $res_status = '1';
        }

       $update = DB::table('tbl_users')
        ->where('userId', $id)
        ->update([
            'status'=> $res_status
        ]);
    
        if($update) {
          
//             try{
//                 $pusherdata['message']='updated successfully.';
//                 $options = array(
//             'cluster' => 'ap2',
//             'useTLS' => true
//         );
//         $pusher = new Pusher(
//                 '83a310a5fd0558a9e5bf',
//                 '728027e92c112e10790d',
//                 '1332051',
//                 $options
//         );
//        $pusher->trigger('foodbeeApp', 'foodbeeupdate', $pusherdata);
//             }catch (\Exception $e) {

//     echo  $e->getMessage();
// }
// echo "zxcsfd";die;
         
                echo json_encode(array('status' => 'success', 'res_status'=> $res_status ,'message' => 'successfully Update')); exit;
            } else {
                echo json_encode(array('status' => 'error', 'res_status'=> $res_status , 'message' => 'Something went wrong please try again later.')); exit;
            }
       
    }

    public function ReservationStatus(Request $request)
    {
         if($this->checkAuth()==false){
                return redirect()->route('login');die;

        }

      $user = Session::get('user');

        $Reservation_status ="";
        $id = $request->id;
        $status = $request->ariapressed;
        if($status == 'true'){

            $Reservation_status = '0';

        }elseif($status == 'false'){
            $Reservation_status = '1';
        }

       $update = DB::table('tbl_users')
        ->where('userId', $id)
        ->update([
            'reservation_status'=> $Reservation_status
        ]);
    
        if($update) {
           
                echo json_encode(array('status' => 'success', 'res_status'=> $Reservation_status ,'message' => 'successfully Update')); exit;
            } else {
                echo json_encode(array('status' => 'error', 'res_status'=> $Reservation_status , 'message' => 'Something went wrong please try again later.')); exit;
            }
       
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function paypalStatus(Request $request)
    {
        $paypal_status = "";
        $id = $request->id;
        $status = $request->ariapressed;
        $type = $request->paypal;
        if($status == 'true'){

            $paypal_status = 0;

        }elseif($status == 'false'){
             $paypal_status = 1;
        }
       $update = DB::table('tbl_users')
        ->where('userId', $id)
        ->update([
            'paypal_status'=> $paypal_status
        ]);

        $update_pay_mode = DB::table('payment_mode')
        ->where('restaurant_id', $id)
        ->where('type',  $type)
        ->update([
            'status'=> $paypal_status
        ]);

        if($update){
           
                echo json_encode(array('status' => 'success', 'message' => 'successfully Update')); exit;
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Something went wrong please try again later.')); exit;
            }
       
    }


    public function codStatus(Request $request)
    {
         if($this->checkAuth()==false){
                return redirect()->route('login');die;

        }

        $cod_status = "";
        $id = $request->id;
        $status = $request->ariapressed;
        $type = $request->COD;
        if($status == 'true'){

            $cod_status = 0;

        }elseif($status == 'false'){
             $cod_status = 1;
        }
       $update = DB::table('tbl_users')
        ->where('userId', $id)
        ->update([
            'cashPayment'=> $cod_status
        ]);

        $update_pay_mode = DB::table('payment_mode')
        ->where('restaurant_id', $id)
        ->where('type',  $type)
        ->update([
            'status'=> $cod_status
        ]);

        if($update){
           
                echo json_encode(array('status' => 'success', 'cod_status'=>$cod_status, 'message' => 'successfully Update')); exit;
            } else {
                echo json_encode(array('status' => 'error', 'cod_status'=>$cod_status, 'message' => 'Something went wrong please try again later.')); exit;
            }
       
    }




    public function pickupStatus(Request $request)
    {
         if($this->checkAuth()==false){
                return redirect()->route('login');die;

        }

        $pickup_status = "";
        $id = $request->id;
        $status = $request->ariapressed;
        $type = $request->pickup_status;
        if($status == 'true'){

            $pickup_status = 0;

        }elseif($status == 'false'){
             $pickup_status = 1;
        }
       $update = DB::table('tbl_users')
        ->where('userId', $id)
        ->update([
            'pickupStatus'=> $pickup_status
        ]);

        if($update) {
           
                echo json_encode(array('status' => 'success', 'message' => 'successfully Update')); exit;
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Something went wrong please try again later.')); exit;
            }
       
    }



    public function deliverystatus(Request $request)
    {
        
        $delivery_status = "";
        $id = $request->id;
        $status = $request->ariapressed;
        if($status == 'true'){

            $delivery_status = 0;

        }elseif($status == 'false'){
             $delivery_status = 1;
        }
       $update = DB::table('tbl_users')
        ->where('userId', $id)
        ->update([
            'deliveryStatus'=> $delivery_status
        ]);

        if($update) {
           
                echo json_encode(array('status' => 'success', 'deliveryStatus'=> $delivery_status, 'message' => 'successfully Update')); exit;
            } else {
                echo json_encode(array('status' => 'error', 'deliveryStatus'=> $delivery_status, 'message' => 'Something went wrong please try again later.')); exit;
            }
       
    }


     public function setting_data(Request $request)
    {
         if($this->checkAuth()==false){
                return redirect()->route('login');die;

        }

        $user = Session::get('user');
        $id = $request->id;
        $setting = DB::table('tbl_users')->where('userId', $user->userId)->first();
       
        // echo"<pre>";print_r($setting);
        if($setting) {
                
                echo json_encode(array(
                    'responce' => 'success',
                    'status' =>$setting->status,
                    'Pickup_Status' =>$setting->pickupStatus,
                    'deliveryStatus' =>$setting->deliveryStatus,
                    'cashPayment' =>$setting->cashPayment,
                    'paypal' =>$setting->paypal_status,
                    'reservation' =>$setting->reservation_status,
                  
                    'message' => 'successfull'));
                     exit;
            } else {
                echo json_encode(array('status' => 'error',  'message' => 'Something went wrong please try again later.')); exit;
            }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pusherOrderPopup()
    {
        $id = $_POST['orderId'];
         if($this->checkAuth()==false){
                return redirect()->route('login');die;

        }

        $user = Session::get('user');
        // $order=DB::select(DB::raw("SELECT *,(SELECT sum(order_items.item_qty) FROM order_items WHERE orders.order_id=order_items.order_id AND order_items.beverage=1 )as beverageQty ,(SELECT sum(order_items.item_qty) FROM order_items WHERE orders.order_id=order_items.order_id AND order_items.beverage=0 )as foodQty FROM orders JOIN order_user_details ON  order_user_details.order_id=orders.order_id WHERE orders.order_id=".$id." LIMIT  1"));
        //  $data = $order[0];
        $order = DB::table('orders')->leftJoin("order_user_details", "order_user_details.order_id", "=", "orders.order_id")
        ->where('orders.order_id', '=', $id )->first();
        
            $order_items = DB::table('order_items')->where('order_items.order_id', '=', $order->order_id)->get()->toArray();
            $order->order_items = $order_items;

            // dd($order);
         $alldata =[
            'html' => $this->renderhtml($order)->render()
         ];
          echo  json_encode($alldata);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function renderhtml($singalOrder)
    {
      $result=array();
       if($this->checkAuth()==false){
                return redirect()->route('login');die;

        }

        $user = Session::get('user');
      return view('pages.pusherOrder', compact('singalOrder','user'));
    }



    public function mainOrderstatus()
    {
       $status = $_POST['status'];
      $id = $_POST['id'];
       $status_update = DB::table('orders')
        ->where('order_id', $id)
        ->update([
            'order_status'=> $status
        ]); 
       $orderDetail =  DB::table('orders')->Join("order_user_details", "order_user_details.order_id", "=", "orders.order_id")
        ->where('orders.order_id', $id)
        ->first();

        $restorantData = DB::table('tbl_users')
        ->where('userId', $orderDetail->restaurant_id)
        ->first();

        // dd($restorantData);
      if(!empty($orderDetail)){
        
        $data = [
            'email' => $orderDetail->email,
            'rest_name' => $restorantData->name,
            ];
            $response=array();
            //$data = $this->Api_model->getOrderByOrderId($order_id);
        $response['error']='202';
        $response['data']=$orderDetail;
        $response['start']='';
        $pusherdata['message']=$response;
                    $options = array(
                'cluster' => 'ap2',
                'useTLS' => true
            );
            $pusher = new Pusher(
                    '83a310a5fd0558a9e5bf',
                    '728027e92c112e10790d',
                    '1332051',
                    $options
            );
            $pusher->trigger('foodbeeApp', 'OrderStatus'.$id, $pusherdata);
        
        if($orderDetail->order_status = 'Cancelled'){
            Mail::send('email_temp.Cancelled_order_email', $data, function($message) use ($data) {
         $message->to( $data['email'])->subject
            ('order Cancelled');
            $message->from('info@reservation.harjassinfotech.org','foodbee.de');
        });

        }
        if($orderDetail->order_status = 'Accepted'){
            Mail::send('email_temp.Completed_order_email', $data, function($message) use ($data) {
             $message->to( $data['email'])->subject
                ('order Accepted');
            $message->from('info@reservation.harjassinfotech.org','foodbee.de');
        });
            
        }
        }else{
          die();
        }
    }







     public function checkAuth()
    {
        // dd(Cookie::get('user'));
    if(Session::has('user')){
       return true;
    }elseif(Cookie::get('user') != null){
         $cookies = json_decode(Cookie::get('user'));
         // dd($cookies->id);
         $id = $cookies->id;
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

}
