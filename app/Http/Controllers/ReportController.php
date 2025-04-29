<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Mail;
use Helper;
class ReportController extends Controller
{
    public function testing(){
        return view('reports.order');
    }

    public function ajaxcall(Request $request)
	{
		 $draw = $request->get('draw');
		 $start = $request->get("start");
		 $rowperpage = $request->get("length"); 
		 $columnIndex_arr = $request->get('order');
		 $columnName_arr = $request->get('columns');
		 $order_arr = $request->get('order');
		 $search_arr = $request->get('search');
		 $columnIndex = $columnIndex_arr[0]['column'];
		 $columnName = $columnName_arr[$columnIndex]['data'];
		 $columnSortOrder = $order_arr[0]['dir']; 
		 $searchValue = $search_arr['value']; 
		 $user = Session::get('user');
		 $userId=$user->userId;
    
		 $countData = DB::table('orders')->select('count(*) as allcount')
		 ->join('order_user_details', 'order_user_details.order_id', '=', 'orders.order_id') 
         ->leftJoin('order_transaction', 'order_transaction.order_id', '=', 'orders.order_id')
		 ->where('orders.restaurant_id', $userId);	
		
		if($request->from != null && $request->to != null) {
			$start_date = $request->from;
			$end_date = $request->to;
			$countData->whereDate('orders.created_at', '>=', $start_date);
			$countData->whereDate('orders.created_at', '<=', $end_date);
		}

		$totalRecordswithFilter = $countData->count();

		$records = DB::table('orders')->select('orders.*', 'order_user_details.full_name', 'order_user_details.email', 'order_user_details.phone', 'order_user_details.pin_code',
		'order_transaction.payment_status')
		   ->join('order_user_details', 'order_user_details.order_id', '=', 'orders.order_id') 
           ->leftJoin('order_transaction', 'order_transaction.order_id', '=', 'orders.order_id')
           ->where('orders.restaurant_id', $userId)
		   ->orderBy('orders.id', 'Desc')
		   ->skip($start)
		   ->take($rowperpage);

		if($request->from != null && $request->to != null) {
			$start_date = $request->from;
			$end_date = $request->to;
			$records->whereDate('orders.created_at', '>=', $start_date);
			$records->whereDate('orders.created_at', '<=', $end_date);
		}
		
		$list = $records->get();

		$data_arr = array();

		foreach($list as $sno => $record){

            $allamount=$record->after_discount+$record->delivery_charge+$record->tip; 

            $paystatus='';
            $payment_mode = null; 
			if($record->payment_status != null) {
			$payment_mode = 'Paypal';
			if($record->payment_status == 'Completed') {
			$paystatus='<span class="badge badge-primary">Completed</span>';
			} else if($record->payment_status == 'Failed') {
            $paystatus='<span class="badge badge-danger">Failed</span>';
			} else {
            $paystatus='<span class="badge badge-warning">Pending</span>';
			}
			} else if($record->payment_mode == 'Paypal') {
			$paystatus='<span class="badge badge-warning">Pending</span>';
			}

			$data_arr[] = array(
			  "id" => ++$start,
			  "order_id" => $record->order_id,
			  "name" => $record->full_name,
			  "email" => $record->email,
			  "phone" => $record->phone,
              "total_price" =>number_format($allamount, 2, ',', '.'). ' €',
			  "payment" => $paystatus.'/'.($payment_mode == null) ? $record->payment_mode : $payment_mode,
              "status" => $record->order_status,
			);
		}

		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" =>$totalRecordswithFilter,
			"iTotalDisplayRecords" => $countData->count(),
			"aaData" => $data_arr
		);

		echo json_encode($response);
		exit;
	 }
   
}

