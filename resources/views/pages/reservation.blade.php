@extends('layouts_two.master')
@section('content')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content" class="mb-5">
<div class="container-fluid px-3 px-sm-5 my-2 my-sm-2">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <!--<h1 class="col-md-4 h4 mb-0 text-gray-800 mob-back px-0"><a href="{{route('index')}}"><i class="fa fa-arrow-left"></i> <span>Reservation</span></a></h1>-->
        <!-- Topbar Search -->
        <form class="form-inline my-2 my-md-0 mw-100 navbar-search border mob-form1">
            <div class="input-group">
                <input type="text" id="search_booking" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button id="search_booking_id" class="btn btn-danger" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
        <!-- <div class="select-date">
            <label for="datepicker"><i class="fa fa-calendar"></i>
                <input type="text" id="datepicker" autocomplete="off">
            </label>	
        </div> -->
         <div class="select-date mob-select">
                            <form id="formId" action="" method="get" autocomplete="off">
                                @csrf
                                <div class="flex-row d-flex justify-content-end">
                                <!--<div class="d-sm-flex align-items-center justify-content-between mt-3">-->
                                <div class="mt-3">
                                    <select id="select_data_filter" name="my_filter" class="d-sm-inline-block btn btn-sm btn-secondary shadow-sm" ><i
                                            class="fas fa-download fa-sm text-white-50"></i> 
                                        <option  class="" value="">Filter</option>
                                        <option  class="" value="15">15 days</option>
                                        <option  class=""  value="30">This Month</option>
                                        <option  class="" value="Custom-Date">Custom Date</option>

                                    </select>
                                    <div class='filter_message'>
                                     <?php if(isset($_GET['my_filter'])){ if($_GET['my_filter'] == 15){echo $html ='<h6 class="d-inline f-text">Filter for 15 Days </h6><a class="btn btn-warning b-text d-inline" href="https://sale.harjassinfotech.org/orders">Reset</a>';}}?>

                                      <?php if(isset($_GET['my_filter'])){ if($_GET['my_filter'] == 30){echo $html ='<h6 class="d-inline f-text">Filter for 30 Days </h6><a class="btn btn-warning d-inline b-text" href="https://sale.harjassinfotech.org/orders">Reset</a>';}}?>

                                      <?php if(isset($_GET['start_date'])){if($_GET['start_date']!=""){ echo $html ='<h6 class="d-inline f-text">Filter for '. $_GET["start_date"] .'  To  '.  $_GET["end_date"].'</h6><a class="btn btn-warning d-inline b-text" href="https://sale.harjassinfotech.org/orders">Reset</a>';}}?>
                                    </div>
                                    
                                </div>
                                </div>
                            </form>

                        
			<div class="select-date res d-none" id="custom-date">
				<form autocomplete="off">
					<div class="flex-row d-flex justify-content-end">
						<div class="col-lg-6 col-11 px-0">
							<small class="mt-2 d-block" style="font-size:11px;">Filter By: Start Date | End Date</small>
							<div class="input-group input-daterange"> <input type="text" class="form-control input1" placeholder="Start Date" readonly> <input type="text" class="form-control input2" placeholder="End Date" readonly> <i id="reservation_filter" class="fa fa-calendar bg-danger text-white px-2 pt-2"></i></div>
						</div>
					</div>
				</form>
			</div>
		</div>
    </div>
		<div  id="ajax-loader"><img src="public/img/75 (1).gif"></div>
    <!-- Content Row -->
    <div class="row my-3">
        <div class="col-lg-12">
            <div class="row" id="search_result">
                <!--Box Start---->
                 @if($booking->isEmpty())
                <div class="col-lg-8 mx-auto mt-3 pt-3 text-center ">
                    <img class="img-fluid mb-2 w-80" src="public/img/schedule.png">
                    <h4 class="text-black font-weight-bold">No Booking Found!</h4>
                    <p class="text-black small">New booking will appear here.</p>
                </div>
                 @else
                @foreach($booking as $book)
                <?php 
                //echo "<pre>";
              //  print_r($book);
                ?>
                <div class="col-xl-4 col-md-6 mb-4">
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
                                <a href="#" data-id=" {{$book->email}}" data-toggle="modal" data-target="#reserveModal_email" class="text-muted small text-decoration-none compose_email">Email <i class="fa fa-envelope pl-2"></i></a>
                                <span class="mx-0 mx-md-5">|</span>
                                <a href="#" data-id=" {{$book->id}}" email-id="{{$book->email}}" data-toggle="modal" data-target="#reserveModal" class="text-muted small text-decoration-none status_update"><i class="fa fa-edit pr-2"></i> Edit</a>
                            </div>
                        </div>
                    </div>
                </div>



                 <!--Box Start---->
               
                @endforeach
				 @endif
				<!-- div class="col-lg-8 mx-auto mt-3 pt-3 text-center">
				    <img class="img-fluid mb-2 w-80" src="public/img/schedule.png">
					<h4 class="text-black font-weight-bold">No Booking Found!</h4>
					<p class="text-black small">New booking will appear here.</p>
				</div> -->
                <!--Box End---->

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
                                    
                                    <p class="mb-2"><span class="text-muted mb-1 small">08 Dec 2022</span> <span class="mx-2">|</span>
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

               
                <!--Box End---->


               
            </div>
        </div>
    </div>

</div>

</div>
            <!-- End of Main Content -->

            <!-- Sticky Bottom Info -->
            <!-- <div class="sticky-footer sticky-info bg-white">
                <div class="container my-auto">
                    <div class="text-black text-center my-auto fx-1">
                        <span><i class="fab fa-paypal text-primary"></i> - Paypal (18 Orders)</span>
                        <span class="ml-3"><i class="far fa-money-bill-alt text-primary"></i> - Cash (25 Orders)</span>
                        <span class="ml-3"><img class="img-fluid w-1" src="img/food-bowl.png"> - Food (25 Orders)</span>
                        <span class="ml-3"><img class="img-fluid w-1" src="img/bottle.png"> - Bevrages (35 Orders)</span>
                    </div>
                </div>
            </div> -->
            <!-- Sticky Bottom Info -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
   
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Reservation Modal -->
    <div class="modal fade" id="reserveModal" tabindex="-1" role="dialog" aria-labelledby="reserveModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content outline-1">
                <div class="modal-body">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                    <div class="special-head">Specialization</div>
                    <form action="" method="post">
                        <select name="select_status" class="form-control" id="select_status">
                            <option value="1">Approved</option>
                            <option value="2">Decline</option>
                        </select>
                        <input type="hidden" id="id"  name="" value="">
                        <input type="hidden" id="email"  name="" value="">
                    </form>
                </div>
                <div class="modal-footer mx-auto border-0">
                    <button type="button" id="ststus_save" class="btn btn-success">Save changes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Reservation Modal -->
<?php $user = Session::get('user');?>
    <input type="hidden" name="" id="user" value="<?php echo $user->userId;?>">
     <!--email Modal -->
    <div class="modal fade" id="reserveModal_email" tabindex="-1" role="dialog" aria-labelledby="reserveModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content outline-1">
            <div class="modal-body">
                 <div class="special-head">Specialization</div>
                 <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="email_to" placeholder="name@example.com" readonly>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="subject">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                  <textarea class="form-control" name="email_text" id="message" rows="3"></textarea>
                </div>
            </div>
            <!--  <input type="hidden" id="email"  name="" value=""> -->
            <div class="modal-footer mx-auto border-0">
                <button type="button" class="btn btn-success" id="send_email">Send Email</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->


    <script>
    //   $( function() {
    //     $( "#datepicker" ).datepicker({
    //         dateFormat: "dd-mm-yy"
    //         ,    duration: "fast"
    //     });
    // } );
    $(document).ready(function(){
        $('.input1').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
        });
        $('.input2').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
        });
    });
    </script>
     <script type="text/javascript">
        $(document).ready(function(){
        $("#ajax-loader").hide();
        $("#search_booking_id" ).click(function() {
         var search = $('#search_booking').val();
          var url ="{{secure_url('search_booking')}}";
        $("#ajax-loader").show();
         $.ajax({
            url: url,
            type: "post",
            async: true,
            data: { 
                   _token: "{{ csrf_token() }}",
                    search:search,
                    },
                success:function(data){
                    if(!data){

                     $('#search_result').html('<h3>No matching data </h3>');
                    }else{
                        $('#search_result').html(data);
                    }

                  // console.log(data);
                },
                 complete: function () {
                    $("#ajax-loader").hide(); //Request is complete so hide spinner
                },   
                 error: function (xhr, exception) {
                 }
                });
        

     });

    });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
        $("#ajax-loader").hide();
        $("#reservation_filter" ).click(function() {
        var startdate = $('.input1').val();
        var enddate = $('.input2').val();
        var url =" {{secure_url('filter_orders_reservation')}}";
        $("#ajax-loader").show();
         $.ajax({
            url: url,
            type: "post",
            async: true,
            data: { 
                   _token: "{{ csrf_token() }}",
                    startdate:startdate,
                    enddate:enddate
                    },
                success:function(data){
                  if(!data){
                     $('#search_result').html('<h3>No matching data </h3>');
                    }else{
                        $('#search_result').html(data);
                    }
                },
                 complete: function () {
                    $("#ajax-loader").hide(); //Request is complete so hide spinner
                },   
                 error: function (xhr, exception) {
                 }
                });
        

     });

    });
    </script>


    <script type="text/javascript">
        $(document).ready(function(){
        $(document).on("click", ".status_update", function () {
        var id = $(this).attr('data-id');
        var email = $(this).attr('email-id');
          // alert(id);
          // alert(email);
        $('#id').val(id);
        $('#email').val(email);
    });
        $("#ststus_save").click(function() {
        var status = $('#select_status').find(":selected").val();
        var id = $('#id').val();
        var email = $('#email').val();
        var url =" {{secure_url('statusUpdate')}}";
        $("#ajax-loader").show();
         $.ajax({
            url: url,
            type: "post",
            async: true,
            data: { 
                   _token: "{{ csrf_token() }}",
                    id:id,
                    status:status,
                    email:email
                    },
                success:function(data){
                    swal("success!","email send successFully...!!!", "success");
                     location.reload();
                  console.log(data);
                },
                 complete: function () {
                    $("#ajax-loader").hide(); //Request is complete so hide spinner
                },   
                 error: function (xhr, exception) {
                    var err = eval("(" + xhr.responseText + ")");
                     swal("error!", err , "error"); 
                 }
                });
        

     });

        

    });
    </script>


    <script type="text/javascript">
        $(document).ready(function(){
        $(function () {
          $('textarea[name="email_text"]').ckeditor();
        });
    });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
        $(".compose_email").click(function() {
        var email = $(this).attr('data-id');
        // alert(id);
        $('#email_to').val(email);
    });
        $("#send_email").click(function() {
        var email = $('#email_to').val(); 
        var subject = $('#subject').val();
        var message = $('#message').val();
        var url =" {{secure_url('send_custom_email')}}";
        $("#ajax-loader").show();
         $.ajax({
            url: url,
            type: "post",
            async: true,
            data: { 
                   _token: "{{ csrf_token() }}",
                    email:email,
                    subject:subject,
                    message:message
                    },
                success:function(data){
                    swal("success!","email send successFully...!!!", "success");
                    location.reload();
                  console.log(data);
                },
                 complete: function () {
                    $("#ajax-loader").hide(); //Request is complete so hide spinner
                },   
                 error: function (xhr, exception) {
                    var err = eval("(" + xhr.responseText + ")");
                     swal("error!", err , "error");    
                 }
                });
        

     });

        

    });
    </script>

        <script type="text/javascript">
        $(document).ready(function () {
            $("#select_data_filter").change(function(){
               var option = $(this).val();
            
               if(option == 'Custom-Date'){
                $("#ajax-loader").addClass('d-none');
                $("#custom-date").removeClass('d-none');
               }
               if(option == '15'){
                $("#custom-date").addClass('d-none');
                 
               }
               if(option == '30'){
                $("#custom-date").addClass('d-none');
                
               } 
            });


        });

    </script>

    <script type="text/javascript">
        $(document).ready(function(){
        $("#ajax-loader").hide();
        $("#select_data_filter").change(function(){
         var option = $(this).val();
        var url =" {{secure_url('filter_reservation')}}";
        $("#ajax-loader").show();
         $.ajax({
            url: url,
            type: "post",
            async: true,
            data: { 
                   _token: "{{ csrf_token() }}",
                   option:option,
                    },
                success:function(data){
                  if(!data){
                     $('#search_result').html('<h3>No matching data </h3>');
                    }else{
                        $('#search_result').html(data);
                    }
                },
                 complete: function () {
                    $("#ajax-loader").hide(); //Request is complete so hide spinner
                },   
                 error: function (xhr, exception) {
                 }
                });
        

     });

    });
    </script>
    <script type="text/javascript">
        
        $(document).ready(function (){
           var user = $('#user').val();
           // alert(user);
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = false;
            var pusher = new Pusher('<?= env('PUSHER_APP_KEY') ?>', {
              cluster: '<?= env('PUSHER_APP_CLUSTER') ?>'
            });
            var channel = pusher.subscribe('foodbeeApp');
            channel.bind('ReservationStatus'+user, function(data) {
                console.log(data.message.data); 
            var reservationId = data.message.data;
            // console.log(data);
            var url = '{{secure_url("push_reservation")}}';
            $.ajax({
            url: url,
            type: "post",
            data: { 
                   _token: "{{ csrf_token() }}",
                    reservationId:reservationId
                    },
                success:function(data){
                   
                 $("#search_result").prepend(data);
                 // var times = 4;
                 // var loop = setInterval(repeat, 3000); 
                 //  function repeat() {
               

                    var  audio = new Audio('https://sale.harjassinfotech.org/public/img/restaurant-bell-101396.mp3');
                    audio.play();
                // }

                //         repeat(); 
               
                  // var audio = new Audio('https://sale.harjassinfotech.org/public/img/restaurant-bell-101396.mp3');
                  //   audio.play();

                
                },
                 complete: function () {
                    $("#ajax-loader").hide(); //Request is complete so hide spinner
                    $("#card_img").hide(); //Request is complete so hide spinner
                },   
                 error: function (xhr, exception) {
                    console.log()
                 }
                });
            });
        });

    </script>
@endsection
