<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>All Orders History</title>
    <!-- Custom fonts for this template-->
    <link href="public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <!-- <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> -->
    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <link href="public/css/style.css" rel="stylesheet">
    <link href="public/css/custom-style.css" rel="stylesheet">
      <style type="text/css">
   /*body{
  padding: 0;
  margin: 0;
  background-color: #fcdc29;
  text-align: center;
  height:100vh;
  font-family: 'lato';
  font-weight: 100;;
}*/
.wrapperLoader{
  position:absolute;
  top:50%;
  left:50%;
  transform:translate(-50%, -50%); 
  z-index: 11111;
}
.circle{
  display: inline-block;
  width: 15px;
  height: 15px;
  background-color: #fcdc29;
  border-radius: 50%;
  animation: loading 1.5s cubic-bezier(.8, .5, .2, 1.4) infinite;
  transform-origin: bottom center;
  position: relative;
}
@keyframes loading{
  0%{
    transform: translateY(0px);
    background-color: #fcdc29;
  }
  50%{
    transform: translateY(50px);
    background-color: #ef584a;
  }
  100%{
    transform: translateY(0px);
    background-color: #fcdc29;
  }
}
.circle-1{
  animation-delay: 0.1s;
}
.circle-2{
  animation-delay: 0.2s;
}
.circle-3{
  animation-delay: 0.3s;
}
.circle-4{
  animation-delay: 0.4s;
}
.circle-5{
  animation-delay: 0.5s;
}
.circle-6{
  animation-delay: 0.6s;
}
.circle-7{
  animation-delay: 0.7s;
}
.circle-8{
  animation-delay: 0.8s;
}
  </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content" class="mb-5">
                <!-- Begin Page Content -->
                <div class="container-fluid  px-3 px-sm-5 my-2 my-sm-2">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 mb-sm-0 pb-2">
                        <h1 class="col-md-4 h4 mb-0 text-gray-800 mob-back px-0"><a data-id="show_loader_desk" class="deskloader" href="{{route('index')}}"><i id="allloder" class="fa fa-arrow-left"></i> <span>All Orders History</span></a></h1>
                        <!-- Topbar Search -->
                        <form
                            class="form-inline my-2 my-md-0 mw-100 navbar-search border mob-form2">
                            <div class="input-group">
                                <input type="text" id="search_id" class="form-control bg-light border-0 small" placeholder="Search for..."
                                    aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button id="search_btn" class="btn btn-danger" type="button">
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
                        <!--<div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <select id="select_data" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                                    class="fas fa-download fa-sm text-white-50"></i> 
                                <option value="Today">Today</option>
                                <option value="Week">Week</option>
                                <option value="Month">Month</option>

                            </select>
                        </div>-->
<div class="wrapperLoader d-none">
  <span class="circle circle-1"></span>
  <span class="circle circle-2"></span>
  <span class="circle circle-3"></span>
  <span class="circle circle-4"></span>
  <span class="circle circle-5"></span>
  <span class="circle circle-6"></span>
  <span class="circle circle-7"></span>
  <span class="circle circle-8"></span>
</div>


                        <div class="select-date mob-select2">
                            <form id="formId" action="{{route('orders')}}" method="get" autocomplete="off">
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
											<div class="input-group input-daterange"> <input type="text" name="start_date" id="input1" class="form-control input1" placeholder="Start Date" readonly> <input type="text" name="end_date" id="input2" class="form-control input2" placeholder="End Date" readonly> <i id="filter_btn" onclick="$('#formId').submit();" class="fa fa-calendar bg-danger text-white px-2 pt-2"></i></div>
										</div>
									</div>
								</form>
			                </div>

                        </div>
                    </div>
                   

                    <div class="row mt-0 mt-sm-2">
                        <div class="col-lg-12 mtp" id="tile-1">
                            <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                                <div class="slider"></div>
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-process-tab" data-toggle="pill" href="#pills-process" role="tab" aria-controls="pills-process" aria-selected="false">All (<span id="newCount">{{$allcount}}</span>)</a>
                                </li>
                              </ul>
                              <div class="tab-content " id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-process" role="tabpanel" aria-labelledby="pills-process-tab">
                                    <div class="row" id="newOrder">
                                        <!--Box Start---->
                                        {!! $allOrder !!}
                                        <!--Box End---->
                                    </div>
                                </div>
                              </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Sticky Bottom Info -->
            <div class="sticky-footer sticky-info bg-white">
                <div class="container my-auto px-0">
                    <div class="text-black text-center my-auto fx-1">
                        <span><i class="fab fa-paypal text-primary"></i> - <span class="m-none">Paypal</span> (<span id="paypalCount">{{$order_Paypal}}</span>)</span>
                        <span class="ml-3"><i class="far fa-money-bill-alt text-primary"></i> - <span class="m-none">Cash</span> (<span id="cashCount">{{$order_cash}}</span>)</span>
                        <!-- <span class="ml-3"> <img class="img-fluid n-img" src="public/img/o_item_img2.jpg"> - <span class="m-none">Food</span> (<span id="foodcount">{{$order_food}}</span>)</span>
                        <span class="ml-3"> <img class="img-fluid n-img1" src="public/img/o_item_img1.jpg"> - <span class="m-none">Bevrages</span> (<span id="beveragecount">{{$order_beverage}}</span>)</span> -->

                         <span class="ml-3"> <img class="img-fluid n-img" src="public/img/food-package.png"> - <span class="m-none">Pickup</span> (<span id="pickupcount">{{$pickup}}</span>)</span>

                          <span class="ml-3"> <img class="img-fluid n-img" src="public/img/food-delivery1.png"> - <span class="m-none">Delivery</span> (<span id="deliverycount">{{$Delivery}}</span>)</span>
                    </div>
                </div>
            </div>
            <!-- Sticky Bottom Info -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
<audio id="pop">
        <source src="https://www.w3schools.com/jsref/horse.mp3" type="audio/mpeg" allow="autoplay"></source>
        
</audio>
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

    <!-- View Detail Modal -->
    <div class="modal fade" id="vvvvvdetailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content outline-1">
                <div class="modal-body">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                    <div class="special-head">Order Detail</div>
                     <form action="" method="post">
                        <select name="select_status" class="form-control" id="select_status">
                            <option value="Created">Created</option>
                            <option value="Confirmed">Confirmed</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Accepted">Accepted</option>
                            <option value="Processing">Processing</option>
                            <option value="Ready to delever">Ready to delever</option>
                            <option value="Kitchen">Kitchen</option>
                            <option value="Pending">Pending</option>
                            <option value="Completed">Completed</option>
                            <option value="Order Pickup">Order Pickup</option>
                        </select>
                        <input type="hidden" id="id"  name="" value="">
                        <input type="hidden" id="email"  name="" value="">
                    </form>
                </div>
                <div class="modal-footer mx-auto border-0">
                    <button type="button" id="order_status" class="btn btn-success">Save changes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- View Detail Modal -->
	
	<!-- Order Detail Modal -->
    <div class="modal fade" id="orderdetailModal" tabindex="-1" role="dialog" aria-labelledby="orderdetailModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content outline-1">
                <div class="modal-body">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                    <div class="special-head">Order Detail</div>
                     <form action="" method="post">
                        <select name="select_status" class="form-control" id="select_status">
                            <option value="Created">Created</option>
                            <option value="Confirmed">Confirmed</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Accepted">Accepted</option>
                            <option value="Processing">Processing</option>
                            <option value="Ready to delever">Ready to delever</option>
                            <option value="Kitchen">Kitchen</option>
                            <option value="Pending">Pending</option>
                            <option value="Completed">Completed</option>
                            <option value="Order Pickup">Order Pickup</option>
                        </select>
                        <input type="hidden" id="id"  name="" value="">
                        <input type="hidden" id="email"  name="" value="">
                    </form>
                </div>
                <div class="modal-footer mx-auto border-0">
                    <button type="button" id="order_status" class="btn btn-success">Save changes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Order Detail Modal -->
<!-- View Detail Modal 
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-body">
                   
                    <div class="row">
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
                                    <tr class="item_div">
                                        <td align="center"><img class="img-fluid" src="public/img/o_item_img2.jpg"></td>
                                        <td>
                                            <div class="pro_qty_prc">
                                                <p class="m-0 fx-6"><strong class="item_qty"></strong> x
                                                
                                                    <span class="font-weight-sbold "><strong class="item_name"></strong></span><br>
                                                    <small style="font-style:italic">Large</small>
                                                </p>
                                            </div>
                                        </td>
                                        <td class="text-right fx-6 itm_price"> €</td>
                                    </tr>
                                    <div  id="ajax-loader"><img src="public/img/75 (1).gif"></div>
                                   
                                    <tr class="totalRow border-top">
                                        <td colspan="2" class="fx-6">Zwischensumme</td>
                                        <td class="text-right fx-6 subtotal" >26,20 €</td>
                                    </tr>
                                    <tr class="totalRow MainRow">
                                        <td colspan="2" class="text-danger fx-6"> 5% Lieferrabatt</td>
                                        <td class="text-right fx-6 del_descount">-1,25 €</td>
                                    </tr>
                                    <tr class="totalRow MainRow">
                                        <td colspan="2" class="fx-6">Lieferkosten</td>
                                        <td class="text-right fx-6 delivery_cost">2,50 €</td>
                                    </tr>
                                    <tr class="totalRow MainRow">
                                        <td colspan="2" class="fx-6"> <b>Zahlung</b> </td>
                                        <td class="text-right fx-6 total_prc"><b>27,45 €</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6 text-black  bg-dlt">
                            <h4 class="pt-2 text-black fx-6 font-weight-bold mb-1 "># :<strong class="my_orderid"> </strong> </h4>
                            <h4 class="pt-2 text-black fx-6 font-weight-bold user_name">Rahul Sharma</h4>
                            <p class="mb-0 fx-6"><i class="fa fa-phone text-danger ph "></i> :<span class="phone_no"></span></p>
                            <p class="mb-0 fx-6"><i class="fa fa-envelope text-danger "></i> : <span class="user_email"></span></p>
                            <p class="mb-0 fx-6"><i class="fa fa-map-marker text-danger "></i> :<span class="user_address"></span></p>
                            <p class="mb-1 fx-6 font-weight-bold"></p>
                            <h4 class="text-success fx-6 font-weight-bold my_order_status"></h4>
                        </div>
                    </div>
                </div>

                <div class="modal-footer mx-auto border-0">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- View Detail Modal -->
      <!-- View Detail Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                

                    <div  id="ajax-loader"><img src="public/img/75 (1).gif"></div>
                    <div class="card-image" id="card_img"></div>
                   <div id="loadDetails">
                       
                   </div>
                    
               
                <div class="modal-footer mx-auto border-0">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php $user = Session::get('user');?>
    <input type="hidden" name="" id="user" value="<?php echo $user->userId;?>">
    <!-- View Detail Modal -->
    <!-- Bootstrap core JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="public/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="public/js/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <script type="text/javascript">
     $( document ).ready(function() {
                $( "#allloder" ).click(function() {
                      $('.wrapperLoader').removeClass('d-none');  
                });
            });
</script>

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

        $("#filter_btn" ).click(function() {
         var startdate = $('.input1').val();
         var enddate = $('.input2').val();
         var url =" {{secure_url('filter_orders')}}";
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
                  // $('#serchresult').html(data);
                  console.log(data);
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
        $("#search_btn" ).click(function() {
         var search = $('#search_id').val();
         // alert(search);
          var url =" {{secure_url('search_orders')}}";
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

                  // $('#serchresult').html(data);
                  console.log(data);
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
    <script>
        $("#tile-1 .nav-tabs a").click(function() {
        var position = $(this).parent().position();
        var width = $(this).parent().width();
            $("#tile-1 .slider").css({"left":+ position.left,"width":width});
        });
        var actWidth = $("#tile-1 .nav-tabs").find(".active").parent("li").width();
        var actPosition = $("#tile-1 .nav-tabs .active").position();
        $("#tile-1 .slider").css({"left":+ actPosition.left,"width": actWidth});
    </script>

    <script type="text/javascript">
        
        $("#search_id").keyup(function() {
            // alert('hello');
      // Retrieve the input field text and reset the count to zero
      var filter = $(this).val(),
        count = 0;

      // Loop through the comment list
      $('.search_div').each(function() {
        // If the list item does not contain the text phrase fade it out
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
          $(this).hide();  // MY CHANGE

          // Show the list item if the phrase matches and increase the count by 1
        } else {
          $(this).show(); // MY CHANGE
          count++;
        }

      });

    });
    </script>

    <script type="text/javascript">
       
      
        $(document).on("change",".select_data_status",function() {
        var id = $(this).attr('data-order');
         var status = $(this).find(":selected").val();
         // alert(email);
        
       
        var url = '{{secure_url("order_status_update")}}';
        $("#ajax-loader").show();
         $.ajax({
            url: url,
            type: "post",
            async: true,
            data: { 
                   _token: "{{ csrf_token() }}",
                    id:id,
                    status:status
                    },
                success:function(data){
                    location.reload();
                  console.log(data);
                },
                 complete: function () {
                    $("#ajax-loader").hide(); //Request is complete so hide spinner
                },   
                 error: function (xhr, exception) {
                    console.log()
                 }
                });
        

     });
    </script>


     <script type="text/javascript">
        $(document).ready(function(){
            $('body').on('click', '.view_details_pop', function() {
        var order_id = $(this).attr('data-id');
        console.log(order_id);
        var url = '{{secure_url("view_order_details")}}';
        $("#ajax-loader").show();
        $("#card_img").show();
        $("#loadDetails").html("");
         $.ajax({
            url: url,
            type: "post",
            async: true,
            data: { 
                   
                    order_id:order_id,
                    },
                success:function(data){
                    console.log(data);
                    $("#loadDetails").html(data);
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

    <script type="text/javascript">
        $(document).ready(function () {
            $("#select_data_filter").change(function(){
               var option = $(this).val();
            
               if(option == 'Custom-Date'){
                $("#custom-date").removeClass('d-none');
               }
               if(option == '15'){
                $("#custom-date").addClass('d-none');
                 this.form.submit();
               }
               if(option == '30'){
                $("#custom-date").addClass('d-none');
                this.form.submit();
               } 
            });


        });

    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            var user = $('#user').val();
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = false;
            var pusher = new Pusher('<?= env('PUSHER_APP_KEY') ?>', {
              cluster: '<?= env('PUSHER_APP_CLUSTER') ?>'
            });
            var channel = pusher.subscribe('foodbeeApp');
            channel.bind('NewOrder-'+user, function(data) {
            var orderId=data['message']['oredrid'];

            var url = '{{secure_url("view_order_pusher")}}';
            $.ajax({
            url: url,
            type: "post",
            dataType: 'json',
            data: { 
                   _token: "{{ csrf_token() }}",
                    orderId:orderId,
                    },
                success:function(data){
                    console.log(data.singlehtml);
                $("#newOrder").prepend(data.singlehtml);

                var beveragecount = $("#beveragecount").text();
                var beveragecnt = parseInt(beveragecount)+parseInt(data.beverageQty);
                $("#beveragecount").text(beveragecnt);

                var foodcount = $("#foodcount").text();
                var foodcnt = parseInt(foodcount)+parseInt(data.foodQty);
                $("#foodcount").text(foodcnt);

                 var pickupcount = $("#pickupcount").text();
                 var pickupcnt = parseInt(pickupcount) +parseInt(data.ordertypeself);
                 $("#pickupcount").text(pickupcnt);

                  var deliverycount = $("#deliverycount").text();
                 var deliverycnt = parseInt(deliverycount) +parseInt(data.orderTypeDelivery);
                 $("#deliverycount").text(deliverycnt);
                
                

                  $orderCount =  $("#pills-process-tab").text();
                  var newcount = $("#newCount").text();
        		  var neworder = parseInt(newcount)+1;
        		  $("#newCount").text(neworder);

                  var paypalCount = $("#paypalCount").text();
                  if(data.paypal == 1){
                    var paypalcnt = parseInt(paypalCount)+1;
                    $("#paypalCount").text(paypalcnt);
                  }
                   var cashCount = $("#cashCount").text();
                   if(data.cash == 1){
                    var cashcnt = parseInt(cashCount)+1;
                    $("#cashCount").text(cashcnt);
                  }
                   
                  var audio = new Audio('https://sale.harjassinfotech.org/public/img/OrderReceivedNotification.mp3');
                    audio.play();
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
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
            $(document).ready(function () {
                 $('body').on('click', '.printData', function() {
                        $("#printArea").print();
                 });
            });
    </script>
</body>
</html>