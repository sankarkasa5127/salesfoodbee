@extends('layouts.master')
@section('content')
  <?php
  // echo"<pre>";  print_r($result);
  // $user = Session::get('user');
  // echo $user->code;
  // $cookie = Cookie::get('user');
  // echo"<pre>";  print_r($cookie);
   ?> 

<div class="container-fluid">



                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 d-inline-block w-70"><?php $user = Session::get('user'); echo $user->name;?>  <span class="online_offline"></span></h1>

                        <span id="ajax_loader" class="fa fa-spinner fa-spin text-warning fx-2 loader-1"></span>
                        <select id="select_data" class="d-sm-inline-block btn btn-sm btn-secondary shadow-sm m-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> 
                           
                            <option  value="Today">Today</option>
                            <option value="Week">Week</option>
                            <option value="Month">Month</option>

                        </select>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Orders</div>
                                            <div class="h5 mb-0 font-weight-sbold text-gray-800" id="order_count">{{$order->count()}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <img class="img-profile" src="public/img/total-orders.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Revenue
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <!-- <div class="h5 mb-0 mr-3 font-weight-sbold text-gray-800"></div> -->
                                                    <div class="h5 mb-0 mr-3 font-weight-sbold text-gray-800 total_revenue" >{{Helper::formatPrice($total)}}</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 70%" aria-valuenow="70" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-euro-sign fa-2x text-dark"></i>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Order Canceled
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-sbold text-gray-800" id="order_can"><?php $count=0; foreach ($order as $odr) {if($odr->order_status =='Cancelled'){$count++; $odr; }}  echo $count; ?></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                            style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img class="img-profile" src="public/img/order-canceled.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Reservation
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <!-- <div class="h5 mb-0 mr-3 font-weight-sbold text-gray-800"></div> -->
                                                    <div class="h5 mb-0 mr-3 font-weight-sbold text-gray-800 total_reservation" >{{$bookingCount}}</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 70%" aria-valuenow="70" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img class="img-profile" src="public/img/order-delivered.png">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    

                    <!-- Content Row -->

                 <!--    <div class="row">
                        <div class="col-xl-8 col-lg-7 col-md-6">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-dark">Orders Overview</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                       
                        <div class="col-xl-4 col-lg-5 col-md-6">
                            <div class="card shadow mb-4">
                                
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-dark">Orders Revenue</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="sm-text mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i>Tandoori Chocken Salat 
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Samosa
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i>Gemischter Salat
                                        </span>

                                         <span class="mr-2">
                                            <i class="fas fa-circle text-danger"></i> Paneer Salat
                                        </span>

                                         <span class="mr-2">
                                            <i class="fas fa-circle text-warning"></i> Kase Pakora
                                        </span>

                                         <span class="mr-2">
                                            <i class="fas fa-circle text-dark"></i> Chicken Pakora
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                   <!--  <span class="loader-img "><img src="public/img/popup-img/Rhombus.gif"></span> -->
                    
                 
 <input type="hidden" id="monthLineChart"  value="{{$monthnamejson}}">
  <input type="hidden" id="TotalOrderLineChart"  value="{{json_encode($arrayTotalOrders)}}">
<div  id="ajax-loader"><img src="public/img/75 (1).gif"></div>
                    <!-- Content Row -->
                    <!-- <div class="row">
                        <div class="col-lg-12 mb-4">
                            <h2 class="h3 mb-0 text-gray-800">Reservation</h2>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 mb-4">
                                    <div class="card border-left-success shadow">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col col-lg-3 col-md-6">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Name</div>
                                                    <div class="h6 font-weight-sbold mb-0 text-gray-800">Rahul</div>
                                                </div>
                                                <div class="col col-lg-3 col-md-6">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Date</div>
                                                    <div class="h6 font-weight-sbold mb-0 text-gray-800">29-11-2022</div>
                                                </div>
                                                <div class="col col-lg-3 col-md-6 t-center select-time">
                                                    <a href="#" class="">10:15</a>
                                                </div>
                                                <div class="col col-lg-3 col-md-6 t-right">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase">
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#actionModal">
                                                            Edit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 mb-4">
                                    <div class="card border-left-success shadow bg-light">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col col-lg-3 col-md-6">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Name</div>
                                                    <div class="h6 font-weight-sbold mb-0 text-gray-800">Rahul</div>
                                                </div>
                                                <div class="col col-lg-3 col-md-6">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Date</div>
                                                    <div class="h6 font-weight-sbold mb-0 text-gray-800">29-11-2022</div>
                                                </div>
                                                <div class="col col-lg-3 col-md-6 t-center select-time">
                                                    <a href="#" class="">10:15</a>
                                                </div>
                                                <div class="col col-lg-3 col-md-6 t-right">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase">
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#actionModal">
                                                            Edit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 mb-4">
                                    <div class="card border-left-success shadow bg-light">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col col-lg-3 col-md-6">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Name</div>
                                                    <div class="h6 font-weight-sbold mb-0 text-gray-800">Rahul</div>
                                                </div>
                                                <div class="col col-lg-3 col-md-6">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Date</div>
                                                    <div class="h6 font-weight-sbold mb-0 text-gray-800">29-11-2022</div>
                                                </div>
                                                <div class="col col-lg-3 col-md-6 t-center select-time">
                                                    <a href="#" class="">10:15</a>
                                                </div>
                                                <div class="col col-lg-3 col-md-6 t-right">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase">
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#actionModal">
                                                            Edit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 mb-4">
                                    <div class="card border-left-success shadow">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col col-lg-3 col-md-6">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Name</div>
                                                    <div class="h6 font-weight-sbold mb-0 text-gray-800">Rahul</div>
                                                </div>
                                                <div class="col col-lg-3 col-md-6">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Date</div>
                                                    <div class="h6 font-weight-sbold mb-0 text-gray-800">29-11-2022</div>
                                                </div>
                                                <div class="col col-lg-3 col-md-6 t-center select-time">
                                                    <a href="#" class="">10:15</a>
                                                </div>
                                                <div class="col col-lg-3 col-md-6 t-right">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase">
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#actionModal">
                                                            Edit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <h2 class="h3 mb-0 text-gray-800">Recent Reservation</h2>
                        </div>
                         <!--Box Start---->
                         <!-- <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 bg-white">
                                <div class="card-body p-2">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-4">
                                            <div class="rounded-1">
                                                <h4 class="font-weight-bold text-black fb-5 mb-1"> 5</h4>
                                                <div class="bdr1"></div>
                                                <small class="text-black mb-1 mt-1 small">No. of Person</small>
                                                <p class="mb-0"><i class="fa fa-user text-black"></i></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-8 pt-3">
                                            <h6 class="text-black font-weight-sbold mb-1">Rahul Sharma</h6>
                                             <p class="text-muted mb-2 small">No. of Person : <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">5</span></p> -->
                                            <!-- <p class="mb-2"><span class="text-muted mb-1 small">08 Dec 2022</span> <span class="mx-2">|</span>
                                                <span class="text-muted mb-1 small">10:15</span>
                                            </p>
                                            <a href="#" class="btn text-black btn-warning b1" data-toggle="modal" data-target="#reserveModal">Action</a>
                                        </div>
                                        <div class="w-100 bdr my-2"></div>
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <span class="text-muted mb-1 small"><i class="fa fa-calendar text-muted"></i> Booking Date: </span>
                                            <span class="font-weight-sbold text-black fb-5 mb-0 fx-1">05 Dec 2022</span>
                                        </div>
                                        <div class="w-100 bdr my-2"></div>
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <span class="text-muted mb-1 small"><i class="fa fa-clock text-muted"></i> Booking Time: </span>
                                            <span class="font-weight-sbold text-black fb-5 mb-0 fx-1">05:30</span>
                                        </div>
                                        <div class="w-100 bdr my-2"></div>
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <span class="text-muted mb-1 small"><i class="fa fa-envelope text-muted"></i> Email: </span>
                                            <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">abc@gmail.com</span>
                                        </div>
                                        <div class="w-100 bdr my-2"></div>
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <span class="text-muted mb-1 small"><i class="fa fa-phone text-muted tr"></i> Phone No.: </span>
                                            <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">1234567890</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-light">
                                    <div class="col-lg-12 col-md-12 col-12 text-center">
                                        <a href="#" class="text-muted small text-decoration-none">Email <i class="fa fa-envelope pl-2"></i></a>
                                        <span class="mx-5">|</span>
                                        <a href="#" class="text-muted small text-decoration-none"><i class="fa fa-edit pr-2"></i> Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div> --> 
                        <!--Box End---->
                         <!--Box Start---->
                         @foreach($booking as $book)
                         <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 bg-white">
                        <div class="card-body p-2">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-4">
                                    <div class="rounded-1">
                                        <h4 class="font-weight-bold text-black fb-5 mb-1">{{$book->no_of_person}}</h4>
                                        <div class="bdr1"></div>
                                        <small class="text-black mb-1 mt-1 small">No. of Person</small>
                                        <p class="mb-0"><i class="fa fa-user text-black"></i></p>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-8 pt-1 rt-box">
                                    <h6 class="text-black font-weight-sbold mb-1">{{$book->name}}</h6>
                                    <!-- <p class="text-muted mb-2 small">No. of Person : <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">5</span></p> -->
                                    <p class="mb-0"><span class="text-muted mb-0 small">Created Date :</span>
                                        <span class="text-muted mb-1 small"><?php echo date('d.M.Y',strtotime($book->created_at));?></span>
                                    </p>

                                    <p class="mb-2"><span class="text-muted mb-1 small">Booking ID :</span>
                                        <span class="text-muted mb-1 small">{{$book->reservation_id}}</span>
                                    </p>
                                 
                                    @if($book->status ==1)         
                                        <a href="#"  class="btn text-black btn-success b1 " >Aprroved !</a>    
                                    @elseif($book->status==2) 
                                      <a href="#"   class="btn text-black btn-danger b1 " >Decline...!</a>
                                      @else
                                      <a href="#"  class="btn text-black btn-warning b1 " >Pending...</a>    
                                @endif
                                </div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-calendar text-muted"></i> Booking Date: </span>
                                    <span class="font-weight-sbold text-black fb-5 mb-0 fx-1">{{$book->date}}</span>
                                </div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-clock text-muted"></i> Booking Time: </span>
                                    <span class="font-weight-sbold text-black fb-5 mb-0 fx-1">{{$book->slot}}</span>
                                </div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-envelope text-muted"></i> Email: </span>
                                    <span class="font-weight-sbold text-black fb-5 fx-1 mb-0 get_email">{{$book->email}}</span>
                                </div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-phone text-muted tr"></i> Phone No.: </span>
                                    <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">{{$book->phone_no}}</span>
                                </div>
                                <div class="w-100 bdr my-2"></div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <span class="text-muted mb-1 small"><i class="fa fa-envelope-open" aria-hidden="true"></i> Message.: </span>
                                    <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">{{$book->message}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-light">
                            <div class="col-lg-12 col-md-12 col-12 text-center">
                                <div class="row">
                                    
                                <div class="col-lg-6 col-md-6 col-6 border-right ">
                                    <a href="#" data-id=" {{$book->email}}" data-toggle="modal" data-target="#reserveModal_email" class="text-muted small text-decoration-none compose_email">Email <i class="fa fa-envelope pl-2"></i></a>
                                </div>
                                <!-- <span class="mx-5">|</span> -->
                                <div class="col-lg-6 col-md-6 col-6 ">
                                    <a href="#" data-id=" {{$book->id}}" email-id="{{$book->email}}" data-toggle="modal" data-target="#reserveModal" class="text-muted small text-decoration-none status_update"><i class="fa fa-edit pr-2"></i> Edit</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        @endforeach
                        <!--Box End---->
                         <!--Box Start---->
                        <!--  <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 bg-white">
                                <div class="card-body p-2">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-4">
                                            <div class="rounded-1">
                                                <h4 class="font-weight-bold text-black fb-5 mb-1"> 5</h4>
                                                <div class="bdr1"></div>
                                                <small class="text-black mb-1 mt-1 small">No. of Person</small>
                                                <p class="mb-0"><i class="fa fa-user text-black"></i></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-8 pt-3">
                                            <h6 class="text-black font-weight-sbold mb-1">Rahul Sharma</h6>
                                             <p class="text-muted mb-2 small">No. of Person : <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">5</span></p> -->
                                          <!--   <p class="mb-2"><span class="text-muted mb-1 small">08 Dec 2022</span> <span class="mx-2">|</span>
                                                <span class="text-muted mb-1 small">10:15</span>
                                            </p>
                                            <a href="#" class="btn text-black btn-warning b1" data-toggle="modal" data-target="#reserveModal">Action</a>
                                        </div>
                                        <div class="w-100 bdr my-2"></div>
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <span class="text-muted mb-1 small"><i class="fa fa-calendar text-muted"></i> Booking Date: </span>
                                            <span class="font-weight-sbold text-black fb-5 mb-0 fx-1">05 Dec 2022</span>
                                        </div>
                                        <div class="w-100 bdr my-2"></div>
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <span class="text-muted mb-1 small"><i class="fa fa-clock text-muted"></i> Booking Time: </span>
                                            <span class="font-weight-sbold text-black fb-5 mb-0 fx-1">05:30</span>
                                        </div>
                                        <div class="w-100 bdr my-2"></div>
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <span class="text-muted mb-1 small"><i class="fa fa-envelope text-muted"></i> Email: </span>
                                            <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">abc@gmail.com</span>
                                        </div>
                                        <div class="w-100 bdr my-2"></div>
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <span class="text-muted mb-1 small"><i class="fa fa-phone text-muted tr"></i> Phone No.: </span>
                                            <span class="font-weight-sbold text-black fb-5 fx-1 mb-0">1234567890</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-light">
                                    <div class="col-lg-12 col-md-12 col-12 text-center">
                                        <a href="#" class="text-muted small text-decoration-none">Email <i class="fa fa-envelope pl-2"></i></a>
                                        <span class="mx-5">|</span>
                                        <a href="#" class="text-muted small text-decoration-none"><i class="fa fa-edit pr-2"></i> Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div> --> 
                        <!--Box End---->
                    </div>

                </div>
<?php




?>
              
@endsection