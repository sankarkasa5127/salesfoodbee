<!--Box Start---->
                                         @if($singalOrder->order_status == "Created")
                                        <div id="removeclass" class="col-xl-4 col-lg-4 col-md-6 mb-4 new-order search_div">
                                        @else
                                        <div id="removeclass" class="col-xl-4 col-lg-4 col-md-6 mb-4 new-order1 search_div">
                                        @endif
                                            <div class="card shadow bg-white">
                                                <!--@if($singalOrder->desired_delivery_time != 'ASAP')
                                                <div class="pre-order" style="background: url(public/img/pre-icon.png) no-repeat left top / contain;">Pre</div>
                                                @endif-->
                                                <div class="card-header bg-white p-2">
                                                    <div class="row">
                                                        <div class="col-lg-2 col-2">
                                                            <div class="rounded-circle border bg-white img-bg">
                                                              @if($singalOrder->order_pick_up == "self")
                                                                <img class="" src="public/img/food-package.png">
                                                                  <span class="icon-delivery-text">Takeway</span>
                                                                @elseif($singalOrder->order_pick_up == "delivery")
                                                                <img class="" src="public/img/food-delivery1.png">
                                                                <span class="icon-delivery-text">Delivery</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-6 font-weight-sbold text-black">
                                                            <span class="fx-6 font-weight-sbold order"># : {{$singalOrder->order_id}}</span><br>
                                                            
                                                            <small class="text-secondary fx-7"><?php  echo date('d-F-Y', strtotime($singalOrder->created_at)); ?></small>
                                                            <h6 class="text-secondary mb-0 mt-0 fx-6 font-weight-sbold">{{$singalOrder->full_name}}</h6>
                                                        </div>
                                                        <div class="col-lg-4 col-4 t-right">
                                                            <p class="mb-1">
                                                               <!--  <span class="text-black font-weight-sbold fx-2">€{{$singalOrder->after_discount}}</span> -->

                                                                 <span class="text-black font-weight-sbold fx-2"><?php if($singalOrder->after_discount > 0) { echo Helper::formatPrice($singalOrder->after_discount+$singalOrder->delivery_charge+$singalOrder->tip )." €"; } else { echo Helper::formatPrice($singalOrder->after_discount+$singalOrder->tip)."€"; } ?></span>
                                                                <span class="fx-7 d-block"><?php echo $singalOrder->beverageQty+$singalOrder->foodQty?> x Items</span>
                                                            </p> 
                                                            <p class="mb-0">
                                                                <select  data-order="{{$singalOrder->order_id}}" data-email="{{$singalOrder->email}}" name="my_filter" class="d-sm-inline-block btn btn-sm btn-light shadow-sm  fx-7 select_data_status"><i
                                                                        class="fas fa-download fa-sm text-white-50 "></i> 
                                                                    <option   value="">Change Status</option>
                                                                    <option value="Accepted" {{ $singalOrder->order_status == 'Accepted' ? 'selected' : '' }}  >Accepted</option>
                                                                    <option   value="Ready to delever" {{ $singalOrder->order_status == 'Ready to delever' ? 'selected' : '' }}>Ready</option>
                                                                    <option   value="Delivered" {{ $singalOrder->order_status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                                                    <option   value="Cancelled" {{ $singalOrder->order_status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>

                                                                </select>
                                                                <!-- <a href="#" class="border border-radius icon-bg"><img class="img-fluid" src="public/img/close.png"></a>
                                                                <a href="#" class="border border-radius icon-bg"><img class="img-fluid" src="public/img/tick.png"></a> -->
                                                                
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body p-2">
                                                    <div class="row pt-2 pb-3">
                                                        <div class="col-lg-4 col-4 text-center">
                                                            <div class="d-inline-block brew">
                                                              <img class="img-fluid" src="public/img/o_item_img2.jpg">
                                                            </div>
                                                            <div class="d-inline-block i-count bg-dlt rounded-circle text-black"><?php if(!empty($singalOrder->foodQty)){ echo $singalOrder->foodQty; }else{ echo "0";}?></div>
                                                        </div>
                                                         
                                                        <div class="col-lg-4 col-4">
                                                            <div class="d-inline-block brew">
                                                                 <img class="img-fluid" src="public/img/o_item_img1.jpg">
                                                            </div>
                                                            <div class="d-inline-block i-count bg-dlt rounded-circle text-black"><?php if(!empty($singalOrder->beverageQty)){ echo $singalOrder->beverageQty; }else{ echo "0";}?></div>
                                                        </div>
                                                         
                                                      
                                                        
                                                        <div class="col-lg-4 col-4 text-center">
                                                            <div class="bg-dlt text-black py-2 px-0 px-sm-1 px-md-0 mt-1"><i class="far fa-clock pr-2 pr-md-0"></i> | <span class="fx-7 pl-2 pl-md-0 font-weight-sbold">{{$singalOrder->desired_delivery_time}}</span></div>
                                                        </div>   
                                                    </div>
                                                    <div class="row pb-2 border-top py-2">
                                                        <div class="col-lg-8 col-8">
                                                            <p class="text-secondary fx-1 mb-2">
                                                                @if($singalOrder->order_pick_up == 'self')
                                                                Self Pikup
                                                                @elseif($singalOrder->order_pick_up == 'delivery')
                                                                <?php if(!empty($singalOrder->address)){ ?>
                                                                <i class="fa fa-map-marker text-danger"></i> <?php if(!empty($singalOrder->floor)){ echo $singalOrder->floor.', ';}?><?php if(!empty($singalOrder->address)){ echo $singalOrder->address.', ';}?><?php if(!empty($singalOrder->pin_code)){ echo $singalOrder->pin_code.', ';}?><?php if(!empty($singalOrder->city)){ echo $singalOrder->city;}?></p>
                                                                <?php }?>
                                                                @else
                                                                NA
                                                                @endif

                                                                
                                                            <p class="fx-1 mb-0"><a data-id="{{$singalOrder->order_id}}" href="javascript:void(0);" class="text-danger view_details_pop" data-toggle="modal" data-target="#detailModal">View Detail <i class="fa fa-angle-right"></i></a></p>

                                                            <p class="text-success fx-1">@if($singalOrder->order_status=='Ready to delever')
                                                            Ready to Delivery 
                                                            @else
                                                            {{$singalOrder->order_status}}
                                                            @endif
                                                            </p>
															
                                                        </div> 
														<div class="col-lg-1 col-1">
														   @if($singalOrder->desired_delivery_time != 'ASAP')
															<div class="pre-order" style="background: url(public/img/pre-icon.png) no-repeat left top / contain;">Pre</div>
															@endif
														</div>

                                                         

                                                        <div class="col-lg-3 col-3 t-right pr-3">   
                                                            <div class="d-inline-block brew1">
                                                                 @if($singalOrder->payment_mode =='Cash' || $singalOrder->payment_mode == 'Cash Payment')
                                                                     <i class="far fa-money-bill-alt text-primary"></i>
                                                                     @else
                                                                     <img class="img-fluid" src="public/img/paypal.png">
                                                                    @endif
                                                             
                                                            </div>
                                                             @if($singalOrder->payment_mode =='Paypal')  
                                                            <p class="fx-1 text-black mb-0">Payment Status: @if($singalOrder->p_status == 'Complete')   <i class="fa fa-check text-success fx-2" aria-hidden="true"></i> @else<i class="fa fa-spinner fa-spin text-warning fx-2"></i>@endif
                                                             @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if($singalOrder->order_status == "Created")

                                            <script type="text/javascript">
                                                
                                                 // $(document).ready(function(){ 
                                                 //    $('#removeclass').removeClass('new-order1');
                                                 //    $('#removeclass').addClass('new-order');
                                                //  var times = 4;
                                                //  var loop = setInterval(repeat, 3000); 
                                                //   function repeat() {
                                               

                                                //     var  audio = new Audio('https://sale.harjassinfotech.org/public/img/OrderReceivedNotification.mp3');
                                                //     audio.play();
                                                // }

                                                //         repeat(); 
                                                //     });
                                            </script>
                                        @endif
                                        
                                        