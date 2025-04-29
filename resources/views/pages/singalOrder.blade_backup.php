<div class="col-xl-4 col-md-6 mb-4 search_div">
    <div class="card shadow bg-white">
        <div class="card-header bg-white p-2">
            <div class="d-flex justify-content-between">
                <div class="row">
                    <div class="col-lg-4 col-4">
                        @if($singalOrder->order_pick_up == "self")
                        <img class="border border-radius-5 " style="width:44px;" src="public/img/food-package.png">
                        @elseif($singalOrder->order_pick_up == "delivery")
                        <img class="border border-radius-5" src="public/img/food-delivery1.png">
                        @endif
                    </div>
                    <div class="col-lg-8 col-8 font-weight-sbold text-black">
                        <span>{{$singalOrder->full_name}}</span><br>
                        <small class="text-muted">
                            @if($singalOrder->order_pick_up == 'self')
                            Self Pikup
                            @elseif($singalOrder->order_pick_up == 'delivery')
                            {{$singalOrder->address}}
                            @else
                            NA
                            @endif
                        </small> 
                    </div>
                </div>
                <div>
                    <button class="btn edit-btn p-0 order_edit" data-id="{{$singalOrder->order_id}}" email-id="{{$singalOrder->email}}"  data-toggle="modal" data-target="#detailModal"><i class="fa fa-edit text-muted"></i></button>
                    <h6 class="text-black mb-1 mt-1 text-center fx-1 font-weight-sbold">Order: <br>{{$singalOrder->order_id}}</h6>
                </div>
            </div>
        </div>
        <div class="card-body p-2">
             @foreach($singalOrder->order_items as $order_items)
            <div class="row pb-2">
                <div class="col-lg-2 col-2 px-0 text-center">
                    <div class="brew">
                        @if($order_items->beverage == '1')
                         <img class="img-fluid" src="public/img/bottle.png">
                         @else
                        <img class="img-fluid" src="public/img/food-bowl.png">
                        @endif
                    </div>
                </div>
                <div class="col-lg-9 col-9 px-0">
                    <span class="text-black font-weight-sbold fx-1"><span class="text-muted"> {{$order_items->item_qty}} x </span> {{$order_items->item_name}} </span><span class="text-black font-weight-sbold fx-1">&nbsp;{{$order_items->item_price;}}</span><br>
                    <?php
                    $addons =  json_decode($order_items->product_add_ons);
                        
                    echo  $addons->product->addOnsString;


                    ?>
                    <span class="text-black font-weight-sbold fx-1"></span>
                    <!-- <small class="text-muted">Flavoured Food</small> -->
                </div> 
            </div>
            
             @endforeach  
            
            <div class="row pb-2 border-top py-2">
                <div class="col-lg-6 col-6">
                    <p class="text-secondary fx-1 mb-2"><?php  echo date('d-F-Y', strtotime($singalOrder->created_at)); ?></p>
                    <p class="fx-1 mb-0"><a href="javascript:void(0);" class="text-danger" >View Detail <i class="fa fa-angle-right"></i></a></p>
                </div>   
                <div class="col-lg-6 col-6 t-right pr-3">   
                    <p class="mb-1">
                        <span class="text-black font-weight-sbold fx-1"> &#8364;{{$singalOrder->after_discount}}</span>

                        <span class="">
                             @if($singalOrder->payment_mode =='Cash' || $singalOrder->payment_mode == 'Cash Payment')
                             <i class="far fa-money-bill-alt text-primary"></i>
                             @else
                            <i class="fab fa-paypal text-primary"></i>
                            @endif
                        </span>
                    </p> 

                    @if($singalOrder->payment_mode =='Paypal')  
                    @if($singalOrder->p_status == 'Complete') 
                    <p class="fx-1 text-black mb-0">Payment Status:  <i class="fa fa-check text-success fx-2" aria-hidden="true"></i></p>
                    @else
                     <p class="fx-1 text-black mb-0">Payment Status: <i class="fa fa-spinner fa-spin text-warning fx-2"></i></p>
                     @endif
                     @endif
                    <input type="hidden"  name="id">
                </div>
            </div>
        </div>
    </div>
</div>
