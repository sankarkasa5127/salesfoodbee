<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Mail;
use Cookie;

class ReservationController extends Controller
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
        $user = $user = Session::get('user');
       $date = Carbon::now()->subDays(7);
        $booking = DB::table('bookings')
        ->where('restaurant_id', $user->code)
        ->where('bookings.created_at', '>=', $date)
        ->orderBy('id', 'desc')->get();
        return view('pages.reservation',compact('booking'));
    }

     public function allbooking()
    {
        if($this->checkAuth()==false){
            return redirect()->route('login');die;

    }
        return view('pages.all_reservation');
    }

    public function getallbooking()
    {
        if($this->checkAuth()==false){
            return redirect()->route('login');die;

    }
        $user = $user = Session::get('user');
        if(!$user){
        return redirect()->route('login');
       }
       
        $all_booking = DB::table('bookings')
        ->where('restaurant_id', $user->code)
        ->orderBy('id', 'desc')->get();

        // dd($all_booking);
        $data_arr = array();

        foreach($all_booking as $record){
           $restaurant_id = $record->restaurant_id;
           $reservation_id = $record->reservation_id;
           $no_of_person = $record->no_of_person;
           $name = $record->name;
           $email = $record->email;
           $phone_no = $record->phone_no;
           $message = $record->message;
           $slot = $record->slot;
           $date = $record->date;
           $status = $record->status;

           $data_arr[] = array(
               "restaurant_id" => $restaurant_id,
               "reservation_id" => $reservation_id,
               "no_of_person" => $no_of_person,
               "name" => $name,
               "email" => $email,
               "phone_no" => $phone_no,
               "message" => $message,
               "slot" => $slot,
               "date" => $date,
               "status" => $status
           );
        }

        $response = array(
           "aaData" => $data_arr
        );

        return response()->json($response); 
        
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search_bookings()
    {
        if($this->checkAuth()==false){
            return redirect()->route('login');die;

    }
    $bookings_name = $_POST['search'];
    $user = $user = Session::get('user'); 
        $booking = DB::table('bookings')->where('restaurant_id', $user->code)
        ->where('bookings.name' , $bookings_name)
        ->orwhere('bookings.date' , $bookings_name)
        ->orwhere('bookings.email' , $bookings_name)
        ->orwhere('bookings.phone_no' , $bookings_name)
        ->orwhere('bookings.created_at' , $bookings_name)
        ->orwhere('bookings.slot' , $bookings_name)
        ->get();
        // dd($booking);
        foreach ($booking as $book) {
        echo '<div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 bg-white">
                        <div class="card-body p-2">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-4">
                                    <div class="rounded-1">
                                        <h4 class="font-weight-bold text-black fb-5 mb-1">'.$book->no_of_person.'</h4>
                                        <div class="bdr1"></div>
                                        <small class="text-black mb-1 mt-1 small">No. of Person</small>
                                        <p class="mb-0"><i class="fa fa-user text-black"></i></p>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-8 pt-3">
                                    <h6 class="text-black font-weight-sbold mb-1">'.$book->name.'</h6>
                                    <!-- <p class="text-muted mb-2 small">No. of Person : <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">5</span></p> -->
                                    <p class="mb-2"><span class="text-muted mb-1 small">Created Date</span> <span class="mx-2">:</span>
                                        <span class="text-muted mb-1 small">'. date("d.M.Y",strtotime($book->created_at)).'</span>
                                    </p>';
                                 
                                    if($book->status==1){       
                                       echo'<a href="#" class="btn text-black btn-success b1" >Aprroved !</a> ';}   
                                 if($book->status==2) {
                                      echo'<a href="#" class="btn text-black btn-danger b1">Decline...!</a>';
                                       }
                                if($book->status==0) {
                                      echo'<a href="#" class="btn text-black btn-warning b1">Pending...</a> ';   
                                } 
                               echo'</div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-calendar text-muted"></i> Booking Date: </span>
                                    <span class="font-weight-sbold text-black fb-5 mb-0 fx-1">'.$book->date.'</span>
                                </div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-clock text-muted"></i> Booking Time: </span>
                                    <span class="font-weight-sbold text-black fb-5 mb-0 fx-1">'.$book->slot.'</span>
                                </div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-envelope text-muted"></i> Email: </span>
                                    <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">'.$book->email.'</span>
                                </div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-phone text-muted tr"></i> Phone No.: </span>
                                    <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">'.$book->phone_no.'</span>
                                </div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-phone text-muted tr"></i> Message.: </span>
                                    <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">'.$book->message.'</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-light">
                            <div class="col-lg-12 col-md-12 col-12 text-center">
                                <a href="#" data-id="'.$book->email.'" data-toggle="modal" data-target="#reserveModal_email" class="text-muted small text-decoration-none compose_email">Email <i class="fa fa-envelope pl-2"></i></a>
                                <span class="mx-5">|</span>
                                <a href="#" data-id="'.$book->id.'" email-id="'.$book->email.'" data-toggle="modal" data-target="#reserveModal" class="text-muted small text-decoration-none status_update"><i class="fa fa-edit pr-2"></i> Edit</a>
                            </div>
                        </div>
                    </div>
                </div>';
            }
 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function date_filter()
    {
        if($this->checkAuth()==false){
            return redirect()->route('login');die;

    }
       $start =$_POST['startdate'];
       $end =$_POST['enddate'];


   
        $user = $user = Session::get('user'); 

        $booking_by_date = DB::table('bookings')->where('bookings.restaurant_id', '=', $user->code)->whereBetween('bookings.date', [ $start, $end])->get();

        // dd($booking_by_date);
        foreach ($booking_by_date as $book) {
       
        echo '<div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 bg-white">
                        <div class="card-body p-2">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-4">
                                    <div class="rounded-1">
                                        <h4 class="font-weight-bold text-black fb-5 mb-1">'.$book->no_of_person.'</h4>
                                        <div class="bdr1"></div>
                                        <small class="text-black mb-1 mt-1 small">No. of Person</small>
                                        <p class="mb-0"><i class="fa fa-user text-black"></i></p>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-8 pt-3">
                                    <h6 class="text-black font-weight-sbold mb-1">'.$book->name.'</h6>
                                    <!-- <p class="text-muted mb-2 small">No. of Person : <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">5</span></p> -->
                                    <p class="mb-2"><span class="text-muted mb-1 small">Created Date</span> <span class="mx-2">:</span>
                                        <span class="text-muted mb-1 small">'. date("d.M.Y",strtotime($book->created_at)).'</span>
                                    </p>';
                                 
                                    if($book->status==1){     
                                       echo'<a href="#" class="btn text-black btn-success b1" >Aprroved !</a> ';}  
                                 if($book->status==2){
                                      echo'<a href="#" class="btn text-black btn-danger b1" >Decline...!</a>';
                                      }
                                   if($book->status==0){   
                                      echo'<a href="#" class="btn text-black btn-warning b1" >Pending...</a> ';   
                                } 
                               echo' </div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-calendar text-muted"></i> Booking Date: </span>
                                    <span class="font-weight-sbold text-black fb-5 mb-0 fx-1">'.$book->date.'</span>
                                </div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-clock text-muted"></i> Booking Time: </span>
                                    <span class="font-weight-sbold text-black fb-5 mb-0 fx-1">'.$book->slot.'</span>
                                </div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-envelope text-muted"></i> Email: </span>
                                    <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">'.$book->email.'</span>
                                </div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-phone text-muted tr"></i> Phone No.: </span>
                                    <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">'.$book->phone_no.'</span>
                                </div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-phone text-muted tr"></i> Message.: </span>
                                    <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">'.$book->message.'</span>
                                </div>
                            </div>
                        </div>
                       <div class="card-footer bg-light">
                            <div class="col-lg-12 col-md-12 col-12 text-center">
                                <a href="#" data-id="'.$book->email.'" data-toggle="modal" data-target="#reserveModal_email" class="text-muted small text-decoration-none compose_email">Email <i class="fa fa-envelope pl-2"></i></a>
                                <span class="mx-5">|</span>
                                <a href="#" data-id="'.$book->id.'" email-id="'.$book->email.'" data-toggle="modal" data-target="#reserveModal" class="text-muted small text-decoration-none status_update"><i class="fa fa-edit pr-2"></i> Edit</a>
                            </div>
                        </div>
                    </div>
                </div>';
            }
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function send_custom_email(Request $request)
    {
        $data = [
            'email' =>$request->email,
            'subject' =>$request->subject,
            'message' =>$request->message
        ];
        Mail::send('email_temp.custom_email', $data, function($message) use ($data) {
         $message->to( $data['email'])->subject
            ($data['subject']);
         $message->from('info@reservation.harjassinfotech.org','foodbee.de');
      });
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filterReservation()
    {
        if($this->checkAuth()==false){
            return redirect()->route('login');die;

    }
       $user = $user = Session::get('user');
       $myfilter = $_POST['option'];
       if($myfilter == 15){
            $date = Carbon::now()->subDays(15);
       }elseif($myfilter == 30){
            $date = Carbon::now()->subDays(30);
       }
       $booking = DB::table('bookings')
        ->where('restaurant_id', $user->code)
        ->where('bookings.created_at', '>=',  $date)
        ->orderBy('id', 'desc')->get();

        foreach ($booking as $book) {
            # code...
       
        echo '<div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 bg-white">
                        <div class="card-body p-2">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-4">
                                    <div class="rounded-1">
                                        <h4 class="font-weight-bold text-black fb-5 mb-1">'.$book->no_of_person.'</h4>
                                        <div class="bdr1"></div>
                                        <small class="text-black mb-1 mt-1 small">No. of Person</small>
                                        <p class="mb-0"><i class="fa fa-user text-black"></i></p>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-8 pt-3">
                                    <h6 class="text-black font-weight-sbold mb-1">'.$book->name.'</h6>
                                    <!-- <p class="text-muted mb-2 small">No. of Person : <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">5</span></p> -->
                                    <p class="mb-2"><span class="text-muted mb-1 small">Created Date</span> <span class="mx-2">:</span>
                                        <span class="text-muted mb-1 small">'. date("d.M.Y",strtotime($book->created_at)).'</span>
                                    </p>
                                     <p class="mb-2"><span class="text-muted mb-1 small">Booking ID</span> <span class="mx-2">:</span>
                                        <span class="text-muted mb-1 small">'.$book->reservation_id.'</span>
                                    </p>';
                                 
                                    if($book->status==1){     
                                       echo'<a href="#" class="btn text-black btn-success b1">Aprroved !</a> ';}  
                                 if($book->status==2){
                                      echo'<a href="#" class="btn text-black btn-danger b1">Decline...!</a>';
                                      }
                                   if($book->status==0){   
                                      echo'<a href="#" class="btn text-black btn-warning b1">Pending...</a> ';   
                                } 
                               echo' </div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-calendar text-muted"></i> Booking Date: </span>
                                    <span class="font-weight-sbold text-black fb-5 mb-0 fx-1">'.$book->date.'</span>
                                </div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-clock text-muted"></i> Booking Time: </span>
                                    <span class="font-weight-sbold text-black fb-5 mb-0 fx-1">'.$book->slot.'</span>
                                </div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-envelope text-muted"></i> Email: </span>
                                    <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">'.$book->email.'</span>
                                </div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-phone text-muted tr"></i> Phone No.: </span>
                                    <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">'.$book->phone_no.'</span>
                                </div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-phone text-muted tr"></i> Message.: </span>
                                    <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">'.$book->message.'</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-light">
                            <div class="col-lg-12 col-md-12 col-12 text-center">
                                <a href="#" data-id="'.$book->email.'" data-toggle="modal" data-target="#reserveModal_email" class="text-muted small text-decoration-none compose_email">Email <i class="fa fa-envelope pl-2"></i></a>
                                <span class="mx-5">|</span>
                                <a href="#" data-id="'.$book->id.'" email-id="'.$book->email.'" data-toggle="modal" data-target="#reserveModal" class="text-muted small text-decoration-none status_update"><i class="fa fa-edit pr-2"></i> Edit</a>
                            </div>
                        </div>
                    </div>
                </div>';
            }
 

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function statusUpdate()
    {
      $status = $_POST['status'];
      $id = $_POST['id'];
     $status_update =  DB::table('bookings')
        ->where('id', $id)
        ->update([
            'status'=> $status
        ]);
        $booking_status =  DB::table('bookings')
        ->where('id', $id)
        ->first();
 // dd($booking_status);
        $restorantData = DB::table('tbl_users')
        ->where('code', $booking_status->restaurant_id)
        ->first();
        
        // dd($restorantData);
        $data = [
            'id' =>$_POST['id'],
            'email' =>$_POST['email'],
            'status' =>$_POST['status'],
            'rest_name' =>$restorantData->name
        ];
        if($booking_status->status == 1){
                Mail::send('email_temp.bookingAprove_email', $data, function($message) use ($data) {
                 $message->to($data['email'])->subject
                    ("Booking Aprroved...!");
                 $message->from('info@reservation.harjassinfotech.org','foodbee.de');
            });
        }elseif($booking_status->status == 2){
           Mail::send('email_temp.bookingReject_email', $data, function($message) use ($data) {
                 $message->to( $data['email'])->subject
                    ("Ihre Reservierung wurde abgelehnt.");
                 $message->from('info@reservation.harjassinfotech.org','foodbee.de');
            });  
        }

        return redirect()->back()->with('success', 'status update successfully...!!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pushReservation()
    {
        $id = $_POST['reservationId'];
         $book = DB::table('bookings')->where('id', $id)->first();
        

         echo'<div class="col-xl-4 col-md-6 mb-4 new-order">
                    <div class="card border-left-danger shadow h-100 bg-white">
                        <div class="card-body p-2">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-4">
                                    <div class="rounded-1">
                                        <h4 class="font-weight-bold text-black fb-5 mb-1">'.$book->no_of_person.'</h4>
                                        <div class="bdr1"></div>
                                        <small class="text-black mb-1 mt-1 small">No. of Person</small>
                                        <p class="mb-0"><i class="fa fa-user text-black"></i></p>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-8 pt-3">
                                    <h6 class="text-black font-weight-sbold mb-1">'.$book->name.'</h6>
                                    <!-- <p class="text-muted mb-2 small">No. of Person : <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">5</span></p> -->
                                    <p class="mb-2"><span class="text-muted mb-1 small">Created Date</span> <span class="mx-2">:</span>
                                        <span class="text-muted mb-1 small">'. date("d.M.Y",strtotime($book->created_at)).'</span>
                                    </p>
                                     <p class="mb-2"><span class="text-muted mb-1 small">Booking ID</span> <span class="mx-2">:</span>
                                        <span class="text-muted mb-1 small">'.$book->reservation_id.'</span>
                                    </p>';
                                 
                                    if($book->status==1){     
                                       echo'<a href="#" class="btn text-black btn-success b1">Aprroved !</a> ';}  
                                 if($book->status==2){
                                      echo'<a href="#" class="btn text-black btn-danger b1">Decline...!</a>';
                                      }
                                   if($book->status==0){   
                                      echo'<a href="#" class="btn text-black btn-warning b1">Pending...</a> ';   
                                } 
                               echo' </div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-calendar text-muted"></i> Booking Date: </span>
                                    <span class="font-weight-sbold text-black fb-5 mb-0 fx-1">'.$book->date.'</span>
                                </div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-clock text-muted"></i> Booking Time: </span>
                                    <span class="font-weight-sbold text-black fb-5 mb-0 fx-1">'.$book->slot.'</span>
                                </div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-envelope text-muted"></i> Email: </span>
                                    <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">'.$book->email.'</span>
                                </div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-phone text-muted tr"></i> Phone No.: </span>
                                    <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">'.$book->phone_no.'</span>
                                </div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-phone text-muted tr"></i> Message.: </span>
                                    <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">'.$book->message.'</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-light">
                            <div class="col-lg-12 col-md-12 col-12 text-center">
                                <a href="#" data-id="'.$book->email.'" data-toggle="modal" data-target="#reserveModal_email" class="text-muted small text-decoration-none compose_email">Email <i class="fa fa-envelope pl-2"></i></a>
                                <span class="mx-5">|</span>
                                <a href="#" data-id="'.$book->id.'" email-id="'.$book->email.'" data-toggle="modal" data-target="#reserveModal" class="text-muted small text-decoration-none status_update"><i class="fa fa-edit pr-2"></i> Edit</a>
                            </div>
                        </div>
                    </div>
                </div>';

       
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

}
