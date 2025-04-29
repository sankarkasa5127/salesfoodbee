<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
     <link rel="icon" type="image/x-icon" href="{{asset('public/img/favicon_io/favicon-16x16.png')}}">
     <link rel="icon" href="{{asset('public/img/favicon_io/favicon-16x16.png')}}" type="image/png" sizes="16x16"/>
     <link rel="icon" href="{{asset('public/img/favicon_io/favicon-32x32.png')}}" type="image/png" sizes="32x32"/>
    <title>Sales dashboard</title>
    <!-- Custom fonts for this template-->
    <link href="{{asset('public/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <!-- <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> -->
    <!-- Custom styles for this template-->
    <link href="{{asset('public/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/custom-style.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script src="/cdn-cgi/apps/head/RiGPiTA9FLo_B7STsw_moiA-aS4.js"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
    <script src="public/vendor/jquery/jquery.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
 
</head> 
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
       @include('layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

               @include('layouts.header')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                
                @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('pages.settingPopup')
            @include('layouts.footer')
            <!-- End of Footer -->

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
                    <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
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
   
    <script src="{{asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('public/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('public/js/main.min.js')}}"></script>
    <!-- Page level plugins -->
    <script src="{{asset('public/vendor/chart.js/Chart.min.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{asset('public/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('public/js/demo/chart-pie-demo.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.9/adapters/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

    <script>
    //   $( function() {
    //     $( "#datepicker" ).datepicker({
    //         dateFormat: "dd-mm-yy"
    //         ,    duration: "fast"
    //     });
    // } );
    $(document).ready(function(){
        $('.input1').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true
        });

         $('.input2').datepicker({
        format: 'dd-mm-yyyy',
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
                  $('#serchresult').html(data)
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
    $(document).ready(function () {
    $('#example').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{secure_url('get_all_reservation')}}",
             columns: [
                 { data: 'reservation_id' },
                 { data: 'no_of_person' },
                 { data: 'name' },
                 { data: 'email' },
                 { data: 'phone_no' },
                 { data: 'message' },
                 { data: 'slot' },
                 { data: 'date' },
                 { data: 'status' },
             ]
         
    });


    $('#example1').DataTable({
        processing: true,
        serverSide: true,
       "lengthChange": true,
       "dom": '<"top"i>rt<"bottom"flp><"clear">',
       "lengthMenu": [[10,25, 50, 100, 500, 1000],[10,25, 50, 100, 500, "Max"]],
       "pageLength": 10,
        ajax: "{{secure_url('get_all_orders')}}",
             columns: [
                 { data: 'order_id' },
                 { data: 'full_name' },
                 { data: 'email' },
                 { data: 'phone' },
                 { data: 'order_status' },
                 { data: 'payment_mode' },
                 { data: 'order_pick_up' },
                 { data: 'total_price' },
                 { data: 'item_name' },
                 { data: 'item_price' },
                 { data: 'item_qty' },
             ]
         
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
        $(document).ready(function () {
             $("#ajax_loader").hide();
            $("#select_data").change(function(){
              $(this).attr("selected", true);
               var option = $(this).val();

              
               if(option == "Week"){
                // alert('week');
                 url = '{{secure_url("week_data")}}';
                 $("#ajax_loader").show();
                $.ajax({
                url: url,
                type: "get",
                async: true,
                data: { 
                       _token: "{{ csrf_token() }}",
                        
                        },
                    success:function(data){
                        
                      $.each(data,function(key,value){
                        // console.log(value.total_revenue);
                        $("#order_count").text(value.count);
                        $("#order_delv").text(value.deliverd_count);
                        $("#order_can").text(value.cancel_count);
                        $(".total_revenue").text(value.total_revenue);
                        $(".total_reservation").text(value.bookingCount);
                           
                        });
                    },
                     complete: function () {
                        $("#ajax_loader").hide(); //Request is complete so hide spinner
                    },   
                     error: function (xhr, exception) {
                     }
                    });
               }



               if(option == "Month"){
                // alert('Month');
                 url = '{{secure_url("month_data")}}';
                  $("#ajax_loader").show();
                $.ajax({
                url: url,
                type: "get",
                async: true,
                data: { 
                       _token: "{{ csrf_token() }}",
                        
                        },
                    success:function(data){
                        // console.log(value.total_revenue);
                        $.each(data,function(key,value){
                                   // console.log(value.total_revenue);
                        $("#order_count").text(value.count);
                        $("#order_delv").text(value.deliverd_count);
                        $("#order_can").text(value.cancel_count);
                        $(".total_revenue").text(value.total_revenue);
                         $(".total_reservation").text(value.bookingCount);
                           
                        });
                        
                     
                    },
                     complete: function () {
                        $("#ajax_loader").hide(); //Request is complete so hide spinner
                    },   
                     error: function (xhr, exception) {
                     }
                    });
               }

               if(option == "Today"){
                // alert('week');
                 url = '{{secure_url("today_data")}}';
                 $("#ajax_loader").show();
                $.ajax({
                url: url,
                type: "get",
                async: true,
                data: { 
                       _token: "{{ csrf_token() }}",
                        
                        },
                    success:function(data){
                        
                      $.each(data,function(key,value){
                        // console.log(value.total_revenue);
                        $("#order_count").text(value.count);
                        $("#order_delv").text(value.deliverd_count);
                        $("#order_can").text(value.cancel_count);
                        $(".total_revenue").text(value.total_revenue);
                         $(".total_reservation").text(value.bookingCount);
                           
                        });
                    },
                     complete: function () {
                        $("#ajax_loader").hide(); //Request is complete so hide spinner
                    },   
                     error: function (xhr, exception) {
                     }
                    });
               }
               
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
        $(document).ready(function(){
        $(".status_update").click(function() {
        var id = $(this).attr('data-id');
        var email = $(this).attr('email-id');
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
       
        $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:5
                    }
                }
            })
 
    </script>



</body>
</html>