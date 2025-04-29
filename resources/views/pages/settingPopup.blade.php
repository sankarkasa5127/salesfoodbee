<?php  $user = Session::get('user'); ?>
     <div class="menu-wrap">
                <nav class="menu">
                  <div class="icon-list">
                    <ul class="pl-1 pt-5 text-white">
                        <li class="border-bottom pb-3">
                            <h5 class="fx-6 text-black font-weight-sbold">Restaurant Status</h5>
                            <button type="button" class="rest_status btn btn-toggle"  data-id="{{$user->userId}}" data-toggle="button" aria-pressed="false" autocomplete="off">
                                <div class="handle"></div>
                            </button>
                        </li>
    
                        <li class="py-3 border-bottom">
                            <h5 class="fx-6 text-black font-weight-sbold">Pickup Status</h5>
                            <button type="button" class="Pickup_status btn btn-toggle btn-toggle1" data-toggle="button" data-id="{{$user->userId}}" aria-pressed="false" autocomplete="off">
                                <div class="handle"></div>
                            </button>
                        </li>
    
                        <li class="py-3 border-bottom">
                            
                            <h6 class="fx-6 text-black font-weight-sbold mt-3 mb-0">Delivery Status</h6>
                            <button type="button" class="Deliverytype btn btn-toggle btn-toggle2" data-id="{{$user->userId}}" data-toggle="button" aria-pressed="false" autocomplete="off">
                                <div class="handle"></div>
                            </button>
                        </li>
                        
                        <li class="py-3 border-bottom">
                            <h5 class="fx-6 text-black font-weight-sbold">Payment Type</h5>
                            <h6 class="fx-6 text-black font-weight-sbold mb-0">COD</h6>
                            <button type="button" class="cash_payment btn btn-toggle btn-toggle3" data-id="{{$user->userId}}" data-rel="COD" data-toggle="button" aria-pressed="false" autocomplete="off">
                                <div class="handle"></div>
                            </button>
                            <h6 class="fx-6 text-black font-weight-sbold mt-3 mb-0">Paypal</h6>
                            <button type="button" class="paymenttype btn btn-toggle btn-toggle2  " data-rel="paypal" data-id="{{$user->userId}}" data-toggle="button" aria-pressed="false" autocomplete="off">
                                <div class="handle"></div>
                            </button>
                        </li>

                        <li class="py-3 border-bottom">
                            
                            <h6 class="fx-6 text-black font-weight-sbold mt-3 mb-0">Reservation Status</h6>
                            <button type="button" class="Reservationtype btn btn-toggle btn-toggle2" data-id="{{$user->userId}}" data-toggle="button" aria-pressed="false" autocomplete="off">
                                <div class="handle"></div>
                            </button>
                        </li>
                    </ul>
                  </div>
                  <button class="close-button btn btn-warning" id="close-button"><i class="fas fa-fw fa-cog"></i></button>
                </nav>
              </div>
              <button class="menu-button btn btn-warning d-none" id="open-button"><i class="fas fa-fw fa-cog"></i></button>
 <script>
        (function($) {
        "use strict";
        var openBtn = $("#open-button"),
            colseBtn = $("#close-button"),
            menu = $(".menu-wrap");
        // Open menu when click on menu button
        openBtn.on("click", function() {
            menu.addClass("active");
        });
        // Close menu when click on Close button
        colseBtn.on("click", function() {
            menu.removeClass("active");
        });

        })(jQuery);
    </script>
    <script type="text/javascript">
        
        $(document).ready(function(){

           $('.Reservationtype').on("click", function() {
              // alert($(this).attr('aria-pressed'));
              // alert($(this).attr('data-rel'));

              var ariapressed = $(this).attr('aria-pressed');
              // var paypal = $(this).attr('data-rel');
              var id = $(this).attr('data-id');
              var url = '{{secure_url("Reservation_type")}}';
              $.ajax({
                url: url,
                type: "post",
                async: true,
                data: { 
                       _token: "{{ csrf_token() }}",
                       id:id,
                       ariapressed:ariapressed
                       
                        
                        },
                    success:function(data){
                        console.log(data);
                    },
                     complete: function () {
                       
                    },   
                     error: function (xhr, exception) {
                     }
                    });
           });








           $('.paymenttype').on("click", function() {
              // alert($(this).attr('aria-pressed'));
              // alert($(this).attr('data-rel'));

              var ariapressed = $(this).attr('aria-pressed');
              var paypal = $(this).attr('data-rel');
              var id = $(this).attr('data-id');
              var url = '{{secure_url("paypal_status")}}';
              $.ajax({
                url: url,
                type: "post",
                async: true,
                data: { 
                       _token: "{{ csrf_token() }}",
                       id:id,
                       ariapressed:ariapressed,
                       paypal:paypal
                        
                        },
                    success:function(data){
                        console.log(data);
                    },
                     complete: function () {
                       
                    },   
                     error: function (xhr, exception) {
                     }
                    });
           });

           $('.cash_payment').on("click", function() {
              var ariapressed = $(this).attr('aria-pressed');
              var COD = $(this).attr('data-rel');
              var id = $(this).attr('data-id');
              var url = '{{secure_url("cod_status")}}';
              $.ajax({
                url: url,
                type: "post",
                async: true,
                data: { 
                       _token: "{{ csrf_token() }}",
                       id:id,
                       ariapressed:ariapressed,
                       COD:COD
                        
                        },
                    success:function(data){
                        console.log(data);
                        if(data.cod_status == '1'){
                         $(this).attr('aria-pressed' ,'true'); 
                         $(this).attr('autocomplete' ,'on'); 
                        }
                    },
                     complete: function () {
                        
                    },   
                     error: function (xhr, exception) {
                     }
                    });
           });




          $('.rest_status').on("click", function() {
                var ariapressed = $(this).attr('aria-pressed');
                var id = $(this).attr('data-id'); 
                 url = '{{secure_url("restaurent_status")}}';
                $.ajax({
                url: url,
                type: "post",
                async: true,
                dataType:'json',
                data: { 
                       _token: "{{ csrf_token() }}",
                       id:id,
                       ariapressed:ariapressed
                        
                        },
                    success:function(data){
                        console.log(data);
                        if(data.res_status=='1'){
                           $('.online_offline').html('<img src="{{asset('public/img/check.png')}}" height="20px" width="20px">&nbsp;<span style="font-size: small;">Online</span>');
                        }else{
                          $('.online_offline').html('<img src="{{asset('public/img/delete.png')}}" height="20px" width="20px">&nbsp;<span style="font-size: small;">Offline</span>');
                        }
                    },
                     complete: function () {
                        
                    },   
                     error: function (xhr, exception) {
                     }
                    });
              });


          $('.Pickup_status').on("click", function() {
                var ariapressed = $(this).attr('aria-pressed');
                var id = $(this).attr('data-id'); 
                 url = '{{secure_url("pickup_status")}}';
                $.ajax({
                url: url,
                type: "post",
                async: true,
                data: { 
                       _token: "{{ csrf_token() }}",
                       id:id,
                       ariapressed:ariapressed
                        
                        },
                    success:function(data){
                        console.log(data);
                    },
                     complete: function () {
                        
                    },   
                     error: function (xhr, exception) {
                     }
                    });
              });


           $('.Deliverytype').on("click", function() {
                var ariapressed = $(this).attr('aria-pressed');
                var id = $(this).attr('data-id'); 
                 url = '{{secure_url("delivery_status")}}';

                 $("#ajax_loader").show();
                $.ajax({
                url: url,
                type: "post",
                async: true,
                data: { 
                       _token: "{{ csrf_token() }}",
                       id:id,
                       ariapressed:ariapressed
                        
                        },
                    success:function(data){
                        console.log(data);
                    },
                     complete: function () {
                    },   
                     error: function (xhr, exception) {
                     }
                    });
              });
        });
    </script>
    <script type="text/javascript">
      
      $(document).ready(function(){
       var url = '{{secure_url("setting_data")}}';
            $.ajax({
                url: url,
                type: "post",
                async: true,
                dataType:'json',
                data: { 
                       _token: "{{ csrf_token() }}"
                        },
                    success:function(data){
                      console.log(data.Pickup_Status);
                        if(data.status == '1'){
                            $('.rest_status').attr('aria-pressed' ,'true');
                             $('.rest_status').attr('autocomplete' ,'on'); 
                             $('.rest_status').addClass('active');
                             $('.online_offline').html('<img src="{{asset('public/img/check.png')}}" height="20px" width="20px">&nbsp;<span style="font-size: small;">Online</span>');
                        }else{
                          $('.rest_status').attr('aria-pressed' ,'false');
                           $('.rest_status').attr('autocomplete' ,'off');
                           $('.rest_status').removeClass('active'); 
                           $('.online_offline').html('<img src="{{asset('public/img/delete.png')}}" height="20px" width="20px">&nbsp;<span style="font-size: small;">Offline</span>'); 
                        }

                        if(data.Pickup_Status == '1'){
                            $('.Pickup_status').attr('aria-pressed' ,'true');
                            $('.Pickup_status').attr('autocomplete' ,'on');
                            $('.Pickup_status').addClass('active');  
                        }else{
                           $('.Pickup_status').attr('aria-pressed' ,'false');
                           $('.Pickup_status').attr('autocomplete' ,'off'); 
                           $('.Pickup_status').removeClass('active');
                        }


                        if(data.reservation == '1'){
                            $('.Reservationtype').attr('aria-pressed' ,'true');
                            $('.Reservationtype').attr('autocomplete' ,'on');
                            $('.Reservationtype').addClass('active');  
                        }else{
                           $('.Reservationtype').attr('aria-pressed' ,'false');
                           $('.Reservationtype').attr('autocomplete' ,'off'); 
                           $('.Reservationtype').removeClass('active');
                        }


                        if(data.deliveryStatus == '1'){
                            $('.Deliverytype').attr('aria-pressed' ,'true');
                            $('.Deliverytype').attr('autocomplete' ,'on'); 
                            $('.Deliverytype').addClass('active');  
                        }else{
                           $('.Deliverytype').attr('aria-pressed' ,'false');
                           $('.Deliverytype').attr('autocomplete' ,'off'); 
                           $('.Deliverytype').removeClass('active');  
                        }

                        if(data.cashPayment == '1'){
                            $('.cash_payment').attr('aria-pressed' ,'true');
                            $('.cash_payment').attr('autocomplete' ,'on');
                            $('.cash_payment').addClass('active');  
                        }else{
                           $('.cash_payment').attr('aria-pressed' ,'false');
                           $('.cash_payment').attr('autocomplete' ,'off');
                           $('.cash_payment').removeClass('active'); 
                        }

                        if(data.paypal == '1'){
                            $('.paymenttype').attr('aria-pressed' ,'true');
                            $('.paymenttype').attr('autocomplete' ,'on'); 
                            $('.paymenttype').addClass('active');
                        }else{
                           $('.paymenttype').attr('aria-pressed' ,'false');
                           $('.paymenttype').attr('autocomplete' ,'off'); 
                           $('.paymenttype').removeClass('active'); 
                        }
                        
                        $('#open-button').removeClass('d-none');
                    },
                     complete: function () {
                        
                    },   
                     error: function (xhr, exception) {
                     }
                    });

      });
    </script>