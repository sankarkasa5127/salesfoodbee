<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Mail;
use Pusher\Pusher;
use Helper;
use Cookie;
class OrderController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
      
       if($this->checkAuth()==false){
                return redirect()->route('login');die;

        }
      $user = Session::get('user');
        $countInprocess = 0;
        $pickup =0;
        $Delivery =0;
        $countAccecpted = 0;
        $countready = 0;
        $countcancelled = 0;
        $countdelivered = 0;
        $inprocessHtml='';
        $readyHtml='';
        $AccecptedHtml='';
        $cancelledHtml='';
        $deliveredHtml='';
        $order_beverage=0;
        $order_food=0;
        $order_cash=0;
        $order_Paypal=0;
    $DateWhere='';
    $days="";
  // if(isset($_GET['my_filter'])){

  //   $filter = $_GET['my_filter'];
  //      $start_date = date('Y-m-d', strtotime($_GET['start_date']));
  //      $end_date = date('Y-m-d', strtotime($_GET['end_date']));
  //     //  echo $start_date = $_GET['start_date'];
  //     // echo  $end_date = $_GET['end_date'];
 
  //     if($filter == '15'){
  //       $days = 15;
  //     }elseif($filter == '30'){
  //       $days = 30;
  //     }

  //     if(isset($_GET['start_date']) && !empty($_GET['start_date']) && !empty($_GET['end_date'])){
        
  //         $DateWhere="date(orders.created_at)  between '".$start_date."' and '".$end_date."'";
  //     }elseif(is_numeric($_GET['my_filter'])){  
  //         $DateWhere="orders.created_at >= DATE(NOW() - INTERVAL ".$days." DAY)";
  //     }else{
  //          $DateWhere="orders.created_at >= DATE(NOW() - INTERVAL 7 DAY)";
  //     }
  // }else{
  //     $DateWhere="orders.created_at >= DATE(NOW() - INTERVAL 7 DAY)";
  // }
  $DateWhere="DATE(orders.created_at) = CURDATE()";
    $order=DB::select(DB::raw("SELECT *,(SELECT sum(order_items.item_qty) FROM order_items WHERE orders.order_id=order_items.order_id AND order_items.beverage=1 )as beverageQty ,(SELECT sum(order_items.item_qty) FROM order_items WHERE orders.order_id=order_items.order_id AND order_items.beverage=0 )as foodQty FROM orders JOIN order_user_details ON  order_user_details.order_id=orders.order_id WHERE orders.restaurant_id=".$user->userId." AND  ".$DateWhere." ORDER BY orders.id desc"));
        foreach ($order as $eachOrder) {
            if($eachOrder->payment_mode =='Cash' || $eachOrder->payment_mode == 'Cash Payment'){
                $order_cash++;
            }else{
                $order_Paypal++;
            }
            if(!empty($eachOrder->beverageQty)){
                $order_beverage=$order_beverage + $eachOrder->beverageQty;
            }else{
                $order_beverage=$order_beverage + 0;
            }
            if(!empty($eachOrder->foodQty)){
                $order_food=$order_food + $eachOrder->foodQty;

            }else{
                $order_food=$order_food + 0;
            }
            if($eachOrder->order_status == "Created" || $eachOrder->order_status == "Kitchen"){
                $inprocessHtml.=$this->htmlViewOfOrder($eachOrder);
                if($eachOrder->order_pick_up == 'self'){
                  $pickup++;
                }
                if($eachOrder->order_pick_up == 'delivery'){
                  $Delivery++;
                }
                $countInprocess++;   
            }
            if($eachOrder->order_status=="Accepted"){
                $AccecptedHtml.=$this->htmlViewOfOrder($eachOrder); 
                 if($eachOrder->order_pick_up == 'self'){
                  $pickup++;
                }
                if($eachOrder->order_pick_up == 'delivery'){
                  $Delivery++;
                }
                $countAccecpted++;
            }
            if($eachOrder->order_status == "Ready to delever"){
                $readyHtml.=$this->htmlViewOfOrder($eachOrder); 
                 if($eachOrder->order_pick_up == 'self'){
                  $pickup++;
                }
                if($eachOrder->order_pick_up == 'delivery'){
                  $Delivery++;
                }
                $countready++;
            }
            if($eachOrder->order_status == "Cancelled"){
                $cancelledHtml.=$this->htmlViewOfOrder($eachOrder); 
                 if($eachOrder->order_pick_up == 'self'){
                  $pickup++;
                }
                if($eachOrder->order_pick_up == 'delivery'){
                  $Delivery++;
                }
                $countcancelled++;
            }
            if($eachOrder->order_status == "Delivered"){
                $deliveredHtml.=$this->htmlViewOfOrder($eachOrder);
                 if($eachOrder->order_pick_up == 'self'){
                  $pickup++;
                }
                if($eachOrder->order_pick_up == 'delivery'){
                  $Delivery++;
                } 
                $countdelivered++;
            }
        }
    return view('pages.order', compact('inprocessHtml','readyHtml','cancelledHtml','deliveredHtml','AccecptedHtml','order_beverage','order_food','order_cash','order_Paypal','countInprocess' ,'countdelivered', 'countcancelled','countready','countAccecpted','Delivery','pickup'));
    }
    
     public function AllOrders()
    {
          if($this->checkAuth()==false){
                return redirect()->route('login');die;

        }
      $user = Session::get('user');
      if(!$user){
        return redirect()->route('login');
       }
      
        $allcount = 0;
        $pickup =0;
        $Delivery =0;
        $allOrder='';
        $order_beverage=0;
        $order_food=0;
        $order_cash=0;
        $order_Paypal=0;
    $DateWhere='';
    $days="";
  if(isset($_GET['my_filter'])){

    $filter = $_GET['my_filter'];
       $start_date = date('Y-m-d', strtotime($_GET['start_date']));
       $end_date = date('Y-m-d', strtotime($_GET['end_date']));
      //  echo $start_date = $_GET['start_date'];
      // echo  $end_date = $_GET['end_date'];
 
      if($filter == '15'){
        $days = 15;
      }elseif($filter == '30'){
        $days = 30;
      }

      if(isset($_GET['start_date']) && !empty($_GET['start_date']) && !empty($_GET['end_date'])){
        
          $DateWhere="AND date(orders.created_at)  between '".$start_date."' and '".$end_date."'";
      }elseif(is_numeric($_GET['my_filter'])){  
          $DateWhere="AND orders.created_at >= DATE(NOW() - INTERVAL ".$days." DAY)";
      }else{
           $DateWhere="AND orders.created_at >= DATE(NOW() - INTERVAL 7 DAY)";
      }
  }else{
      $DateWhere="";
  }
    $order=DB::select(DB::raw("SELECT *,(SELECT sum(order_items.item_qty) FROM order_items WHERE orders.order_id=order_items.order_id AND order_items.beverage=1 )as beverageQty ,(SELECT sum(order_items.item_qty) FROM order_items WHERE orders.order_id=order_items.order_id AND order_items.beverage=0 )as foodQty FROM orders JOIN order_user_details ON  order_user_details.order_id=orders.order_id WHERE orders.restaurant_id=".$user->userId."   ".$DateWhere." ORDER BY orders.id desc"));
        foreach ($order as $eachOrder) {
            if($eachOrder->payment_mode =='Cash' || $eachOrder->payment_mode == 'Cash Payment'){
                $order_cash++;
            }else{
                $order_Paypal++;
            }
            // if(!empty($eachOrder->beverageQty)){
            //     $order_beverage=$order_beverage + $eachOrder->beverageQty;
            // }else{
            //     $order_beverage=$order_beverage + 0;
            // }
            // if(!empty($eachOrder->foodQty)){
            //     $order_food=$order_food + $eachOrder->foodQty;

            // }else{
            //     $order_food=$order_food + 0;
            // }
         
                $allOrder.=$this->htmlViewOfOrder($eachOrder);
                if($eachOrder->order_pick_up == 'self'){
                  $pickup++;
                }
                if($eachOrder->order_pick_up == 'delivery'){
                  $Delivery++;
                }
                $allcount++;   
        }
      return view('pages.allOrder', compact('allOrder','order_beverage','order_food','order_cash','order_Paypal','allcount','Delivery','pickup'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function htmlViewOfOrder($singalOrder){
                  $result=array();
                   if($this->checkAuth()==false){
                return redirect()->route('login');die;

        }

        $user = Session::get('user');
                  return view('pages.singalOrder', compact('singalOrder','user'));
    }
    public function filter()
    {
       $start =Carbon::parse($_POST['startdate']);
       $end =Carbon::parse($_POST['enddate']);
       $user = Session::get('user');

      $order = DB::table('orders')->where('orders.restaurant_id', '=',$user->userId)->leftJoin("order_user_details", "order_user_details.order_id", "=", "orders.order_id")
        ->whereBetween('orders.created_at', [ $start, $end])
        ->get();
        
        $allOrders = [];
        foreach ($order as $orders) {
            $eachOrder = $orders;
            $order_items = DB::table('order_items')->where('order_items.order_id', '=', $orders->order_id)->get()->toArray();
            $eachOrder->order_items = $order_items;
            $allOrders[] =  $eachOrder; 
        }
       // dd($allOrders);
         foreach($allOrders as $delivered){
         echo' 
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow bg-white">
                <div class="card-header bg-white p-2">
                    <div class="d-flex justify-content-between">
                        <div class="row">
                            <div class="col-lg-4 col-4"><img class="border border-radius-5" src="public/img/food-package.png"></div>
                            <div class="col-lg-8 col-8 font-weight-sbold text-black">
                                <span>'.$delivered->full_name.'</span><br>
                                <small class="text-muted">
                                    '.$delivered->address.'
                                </small>
                            </div>
                        </div>
                        <div>
                            <button class="btn edit-btn p-0"><i class="fa fa-edit text-muted"></i></button>
                            <!-- <small class="text-danger font-weight-sbold">New</small> -->
                            <h6 class="text-black mb-1 mt-1 text-center fx-1 font-weight-sbold">Order: <br>'.$delivered->order_id.'</h6>
                            
                        </div>
                    </div>
                </div>
                <div class="card-body p-2">';
                     foreach($delivered->order_items as $item_delivered){
                    echo'<div class="row pb-2">
                        <div class="col-lg-2 col-2 px-0 text-center">
                            <div class="brew">
                               ';if($item_delivered->beverage == "1"){
                                 echo'<img class="img-fluid" src="public/img/bottle.png">';
                                 }else{
                                echo'<img class="img-fluid" src="public/img/food-bowl.png">';
                               }
                            echo'</div>
                        </div>
                        <div class="col-lg-9 col-9 px-0">
                           
                            <span class="text-black font-weight-sbold fx-1"><span class="text-muted">'.$item_delivered->item_qty.' x</span>'.$item_delivered->item_name.'</span> <span class="text-black font-weight-sbold fx-1">'.$item_delivered->item_price.'</span><br>
                           
                            <small class="text-muted">Flavoured Food</small>

                        </div>   
                    </div>';
                   }
                   echo' <div class="row pb-2 border-top py-2">
                        <div class="col-lg-6 col-6">
                            <p class="text-secondary fx-1 mb-2">'.$delivered->created_at.'</p>
                            <p class="fx-1 mb-0"><a href="javascript:void(0);" class="text-danger" data-toggle="modal" data-target="#detailModal">View Detail <i class="fa fa-angle-right"></i></a></p>
                        </div>   
                        <div class="col-lg-6 col-6 t-right pr-3">   
                            <p class="mb-1">
                                <span class="text-black font-weight-sbold fx-1">$ 5.30</span>
                                <span class="">';
                                    if($delivered->payment_mode =="Cash Payment"){
                                     echo'<i class="far fa-money-bill-alt text-primary"></i>';
                                     }else{
                                    echo'<i class="fab fa-paypal text-primary"></i>';
                                   }
                           echo' </span>
                            </p> 
                            <p class="fx-1 text-black mb-0">Payment Status: <i class="fa fa-check-circle text-success fx-2"></i></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
        }
       
           
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Order_status()
    {
      $status = $_POST['status'];
      $id = $_POST['id'];


  if(isset($_POST['time'])){
         $status_update = DB::table('orders')
        ->where('order_id', $id)
        ->update([
            'order_status'=> $status,
            'time' => $_POST['time']
        ]); 
      }else{
         $status_update = DB::table('orders')
        ->where('order_id', $id)
        ->update([
            'order_status'=> $status
        ]); 
      }
      
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
             if(isset($_POST['time'])){
    
         $mintuesToAdd = $_POST['time'];
          $response['mintuesToAdd'] = $mintuesToAdd;
          $response['trackerTime'] = date('Y-m-d H:i:s',strtotime($orderDetail->created_at));
          $response['start']=strtotime("+$mintuesToAdd minutes", strtotime($response['trackerTime']));
      }else{
           $response['start']='';
      }
            //$data = $this->Api_model->getOrderByOrderId($order_id);
        $response['error']='202';
        $response['data']=$orderDetail;
     
        $pusherdata['message']=$response;
        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'useTLS' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
            $pusher->trigger('foodbeeApp', 'OrderStatus'.$id, $pusherdata);
        // if($orderDetail->order_status = 'Delivered'){
        //     Mail::send('email_temp.Delivered_order_email', $data, function($message) use ($data) {
        //  $message->to( $data['email'])->subject
        //     ('Order Delivered');
        //  $message->from('info@reservation.harjassinfotech.org','foodbee.de');
        // });

        // }

        // if($orderDetail->order_status = 'Cancelled'){
        //     Mail::send('email_temp.Cancelled_order_email', $data, function($message) use ($data) {
        //  $message->to( $data['email'])->subject
        //     ('order Cancelled');
        //     $message->from('info@reservation.harjassinfotech.org','foodbee.de');
        // });

        // }
        // if($orderDetail->order_status = 'Completed'){
        //     Mail::send('email_temp.Completed_order_email', $data, function($message) use ($data) {
        //      $message->to( $data['email'])->subject
        //         ('order Ready');
        //     $message->from('info@reservation.harjassinfotech.org','foodbee.de');
        // });
            
        // }
        }else{
          die();
        }

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
      $search = $_POST['search'];
      $user = Session::get('user');
      $order = DB::table('orders')->where('orders.restaurant_id', '=',$user->userId)->leftJoin("order_user_details", "order_user_details.order_id", "=", "orders.order_id")
        ->where('orders.order_id',$search)
       
        ->get();
        
        $allOrders = [];
        foreach ($order as $orders) {
            $eachOrder = $orders;
            $order_items = DB::table('order_items')->where('order_items.order_id', '=', $orders->order_id)

            ->get()->toArray();

            $eachOrder->order_items = $order_items;
            $allOrders[] =  $eachOrder; 
        }
         dd($allOrders);
         foreach($allOrders as $ready){
         echo' 
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow bg-white">
                <div class="card-header bg-white p-2">
                    <div class="d-flex justify-content-between">
                        <div class="row">
                            <div class="col-lg-4 col-4"><img class="border border-radius-5" src="public/img/food-package.png"></div>
                            <div class="col-lg-8 col-8 font-weight-sbold text-black">
                                <span>'.$ready->full_name.'</span><br>
                                <small class="text-muted">
                                    '.$ready->address.'
                                </small>
                            </div>
                        </div>
                        <div>
                            <button class="btn edit-btn p-0"><i class="fa fa-edit text-muted"></i></button>
                            <!-- <small class="text-danger font-weight-sbold">New</small> -->
                            <h6 class="text-black mb-1 mt-1 text-center fx-1 font-weight-sbold">Order: <br>'.$ready->order_id.'</h6>
                            
                        </div>
                    </div>
                </div>
                <div class="card-body p-2">
                      ';foreach($ready->order_items as $order_items_comp){
                       echo' <div class="row pb-2">
                            <div class="col-lg-2 col-2 px-0 text-center">
                                <div class="brew">
                                  '; if($order_items_comp->beverage == "1"){
                                     echo'<img class="img-fluid" src="public/img/bottle.png">';
                                     }else{
                                    echo'<img class="img-fluid" src="public/img/food-bowl.png">';
                                   }
                              echo'</div>
                            </div>
                            <div class="col-lg-9 col-9 px-0">
                                <span class="text-black font-weight-sbold fx-1"><span class="text-muted">'.$order_items_comp->item_qty.' x</span>'.$order_items_comp->item_name.'</span><span class="text-black font-weight-sbold fx-1">'.$order_items_comp->item_price.'</span><br>
                               
                                <!--  <small class="text-muted">Flavoured Food</small> -->
                            </div>   
                        </div>
                        ';}
                   echo' <div class="row pb-2 border-top py-2">
                        <div class="col-lg-6 col-6">
                            <p class="text-secondary fx-1 mb-2">'.$ready->created_at.'</p>
                            <p class="fx-1 mb-0"><a href="javascript:void(0);" class="text-danger" data-toggle="modal" data-target="#detailModal">View Detail <i class="fa fa-angle-right"></i></a></p>
                        </div>   
                        <div class="col-lg-6 col-6 t-right pr-3">   
                            <p class="mb-1">
                                <span class="text-black font-weight-sbold fx-1">$ 5.30</span>
                                <span class="">
                                    ';if($ready->payment_mode =="Cash"){
                                     echo'<i class="far fa-money-bill-alt text-primary"></i>';
                                     }else{
                                   echo' <i class="fab fa-paypal text-primary"></i>';
                                    }
                           echo' </span>
                            </p> 
                            <p class="fx-1 text-black mb-0">Payment Status: <i class="fa fa-check-circle text-success fx-2"></i></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response

     */

     public function getallordersview()
    {
        return view('pages.all_orders');
    }
    public function getallorders()
    {
        $user = Session::get('user');
        $order = DB::table('orders')->where('orders.restaurant_id', '=',$user->userId)->leftJoin("order_user_details", "order_user_details.order_id", "=", "orders.order_id")
        ->orderBy('orders.id', 'desc')
        ->get();
        
        $allOrders = []; 
        $order_items = []; 
        foreach ($order as $orders) {
            $eachOrder = $orders;
            $order_items = DB::table('order_items')->where('order_items.order_id', '=', $orders->order_id)->get()->toArray();
            $eachOrder->order_items = $order_items;
 
            foreach ($eachOrder->order_items as $myitems) {
               
            }

            $allOrders[] = array(
               "order_id" =>  $eachOrder->order_id,
               "full_name" => $eachOrder->full_name,
               "email" => $eachOrder->email,
               "phone" => $eachOrder->phone,
               "order_status" => $eachOrder->order_status,
               "payment_mode" => $eachOrder->payment_mode,
               "order_pick_up" => $eachOrder->order_pick_up,
               "total_price" => $eachOrder->total_price,
               "item_name" => $myitems->item_name,
               "item_price" => $myitems->item_price,
               "item_qty" => $myitems->item_qty
           );  

            // echo"<pre>";print_r($allOrders);die();
             $response = array(
           "aaData" => $allOrders
        );
                  
                          
        }
            
        return response()->json($response);
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view_order_detail()
    {
      
        $user = Session::get('user');
        $order = DB::table('orders')->leftJoin("order_user_details", "order_user_details.order_id", "=", "orders.order_id")
        ->where('orders.order_id', '=',$_POST['order_id'] )->first();
        
            $order_items = DB::table('order_items')->where('order_items.order_id', '=', $order->order_id)->get()->toArray();
            $order->order_items = $order_items;
        
            $html=$this->orderDetailpopUp($order);
           $totalitems = array(  
              'DetailsHtml' => $html,
            ); 
           return view('pages.OrderDetailPopup',compact('order','user'));
                    

    }
    public function orderDetailpopUp($orderData)
    {
        return '<div class="row">
                        <div class="col-lg-6">
                            <table class="table table-responsive table-borderless text-black" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr>
                                        <th class="fx-6">Anz.</th>
                                        <th class="fx-6">Produktname</th>
                                        <th class="text-right fx-6">Gesamt</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align="center"><img class="img-fluid" src="public/img/o_item_img2.jpg"></td>
                                        <td>
                                            <div class="pro_qty_prc">
                                                <p class="m-0 fx-6">1 x
                                                    <span class="product_sku">1003</span>
                                                    <span class="font-weight-sbold">Demo 34 17 [<em>1,20 €</em>]</span><br>
                                                    <small style="font-style:italic">Large</small>
                                                </p>
                                            </div>
                                        </td>
                                        <td class="text-right fx-6">1,20 €</td>
                                    </tr>
                                    <tr>
                                        <td align="center"><img class="img-fluid" src="public/img/o_item_img1.jpg"></td>
                                        <td>
                                            <div class="pro_qty_prc">
                                                <p class="m-0 fx-6">1 x
                                                    <span class="font-weight-sbold">New Testing foodbee items [<em>25,00 €</em>]</span><br>
                                                    <small style="font-style:italic">Klein</small>
                                                </p>
                                            </div>
                                        </td>
                                        <td class="text-right fx-6">25,00 €</td>
                                    </tr>
                                    <tr class="totalRow border-top">
                                        <td colspan="2" class="fx-6">Zwischensumme</td>
                                        <td class="text-right fx-6">26,20 €</td>
                                    </tr>
                                    <tr class="totalRow MainRow">
                                        <td colspan="2" class="text-danger fx-6"> 5% Lieferrabatt</td>
                                        <td class="text-right fx-6">-1,25 €</td>
                                    </tr>
                                    <tr class="totalRow MainRow">
                                        <td colspan="2" class="fx-6">Lieferkosten</td>
                                        <td class="text-right fx-6">2,50 €</td>
                                    </tr>
                                    <tr class="totalRow MainRow">
                                        <td colspan="2" class="fx-6"> <b>Zahlung</b> </td>
                                        <td class="text-right fx-6"><b>27,45 €</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6 text-black  bg-dlt">
                            <h4 class="pt-2 text-black fx-6 font-weight-bold mb-1"># : 1671200562</h4>
                            <h4 class="pt-2 text-black fx-6 font-weight-bold">Rahul Sharma</h4>
                            <p class="mb-0 fx-6"><i class="fa fa-phone text-danger ph"></i> : 8557062045</p>
                            <p class="mb-0 fx-6"><i class="fa fa-envelope text-danger"></i> : ravinder2541@gmail.com</p>
                            <p class="mb-0 fx-6"><i class="fa fa-map-marker text-danger"></i> : Kurmainzer Straße 201, Frankfurt am Main West 65936 Frankfurt, Germany</p>
                            <p class="mb-1 fx-6 font-weight-bold">Lorem ipsum is dummy text remarks</p>
                            <h4 class="text-success fx-6 font-weight-bold">Delivered</h4>
                        </div>
                    </div>';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getpusher_data()
    {
      $neworder ='';
      $orderTypeDelivery ='0';
      $ordertypeself ='0';
      $paypal ='';
      $response=array();
        $id = $_POST['orderId'];
        $user = Session::get('user');
        $order=DB::select(DB::raw("SELECT *,(SELECT sum(order_items.item_qty) FROM order_items WHERE orders.order_id=order_items.order_id AND order_items.beverage=1 )as beverageQty ,(SELECT sum(order_items.item_qty) FROM order_items WHERE orders.order_id=order_items.order_id AND order_items.beverage=0 )as foodQty FROM orders JOIN order_user_details ON  order_user_details.order_id=orders.order_id WHERE orders.order_id=".$id." LIMIT  1"));
         $data = $order[0];
        $data->user=$user;
        if($data->payment_mode == 'Cash Payment' || $data->payment_mode == 'Cash'){
            $neworder = 1;
        }

        if($data->payment_mode == 'paypal'){
            $paypal = 1;
        }

        if(empty($data->beverageQty)){
            $data->beverageQty = "0";
        }

        if(empty($data->foodQty)){
            $data->foodQty = "0";
        }

        if($data->order_pick_up == 'self'){
            $ordertypeself = '1';
        }

        if($data->order_pick_up == 'delivery'){
          $orderTypeDelivery = '1';
        }
      

       // echo $this->htmlViewOfOrder($data); 
        $response['singlehtml']= $this->htmlViewOfOrder($data)->render(); 
        $response['beverageQty']= $data->beverageQty;
        $response['foodQty']=$data->foodQty;
        $response['cash']=$neworder;
        $response['paypal']=$paypal;
        $response['ordertypeself']=$ordertypeself;
        $response['order_status']=$data->order_status;
        $response['orderTypeDelivery']=$orderTypeDelivery;
        // return "sankar";
         return json_encode($response);
    }

    public function checkAuth()
    {
    if(Session::has('user')){
       return true;
    }elseif(Cookie::get('user')!== null){
        $cookies = json_decode(Cookie::get('user'));
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

    public function print($orderId){
        $items = DB::table('order_items')->where('order_id', 1740640326)->get();
        return $items;
    }
}
