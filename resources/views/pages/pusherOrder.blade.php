
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"># {{$singalOrder->order_id}} <i>New</i> <br /><span><span id="qtychange">4</span>x item, <?php if($singalOrder->after_discount > 0) { echo Helper::formatPrice($singalOrder->after_discount+$singalOrder->delivery_charge+$singalOrder->tip )." €"; } else { echo Helper::formatPrice($singalOrder->after_discount+$singalOrder->tip)."€"; } ?> </span></h5>
                    <a type="button" class="printDatapusher">
                        <img class="printDatapusher123" src="{{asset('public/img/popup-img/print.png')}}" />
                    </a>
                </div>
                <div class="modal-body">
                    <div class="boxitems">

                        <ul>
                            <?php $foodItemPrice = $drinkItemPrice = 0;$price = 0;$TotalQTY=0; ?>
                            @foreach($singalOrder->order_items as $items)
                             <?php $product_array = json_decode($items->product_add_ons); ?>
                            <li>
                                    <?php if($items->beverage == 0) { //'Food'?>
                                              <img src="{{asset('public/img/popup-img/food.png')}}" />
                                                 <?php }else{ ?>
                                                 <img src="{{asset('public/img/popup-img/drink.png')}}" />
                                                 <?php } ?>
                                
                                {{$items->item_qty}} x {{$items->item_name}}<span class="priceright"><?= Helper::formatPrice($items->item_price * $items->item_qty); ?> € </span></li>
                            @if(!empty($product_array->product->addOnsString))
                            <li class="customize">- <?=$product_array->product->addOnsString?></li>
                                @endif
                                                <?php
                                                    $TotalQTY=$TotalQTY+$items->item_qty; 
                                                 $price += $items->item_price * $items->item_qty; 
                            if($items->is_discount == 2) {
                                
                                $foodItemPrice = 0;
                                $drinkItemPrice = 0;
                                
                            } else if($items->beverage == 0) { //'Food'
                            
                                $foodItemPrice += ($items->item_price*$items->item_qty);
                                
                            } else if($items->beverage == 1) { //'Drink'
                            
                                $drinkItemPrice += ($items->item_price*$items->item_qty);
                                
                            }
                            ?>
                           
                            @endforeach
<input type="hidden" id='totalqtyvalue' value='<?=$TotalQTY;?>'/>
                        </ul>

                        <ul class="billbxcd">
                            <li>Zwischensumme  <span class="priceright"><?= Helper::formatPrice($price);?>€ </span></li>
                                                               <?php 
                          $amt = $price+$singalOrder->delivery_charge;
                          $discontamount = 0;
                          if($singalOrder->discount > 0 && $singalOrder->order_pick_up == 'self') {     
                          
                                $totalTypeAmt = $foodItemPrice+$drinkItemPrice;
                                
                                if($singalOrder->food_discount == 1 && $singalOrder->drink_discount == 1) {
                                    
                                    $discontamount  = ($totalTypeAmt*$singalOrder->discount)/100;
                                    $amt = ($totalTypeAmt - $discontamount)+$singalOrder->delivery_charge;
                                    
                                } else if($singalOrder->food_discount == 1) {
                                    
                                    $discontamount  = ($foodItemPrice*$singalOrder->discount)/100;
                                    $amt = ($drinkItemPrice + ($foodItemPrice - $discontamount))+$singalOrder->delivery_charge;
                                    
                                } else if($singalOrder->drink_discount == 1) {
                                    
                                    $discontamount  = ($drinkItemPrice*$singalOrder->discount)/100;
                                    $amt = ($foodItemPrice + ($drinkItemPrice - $discontamount))+$singalOrder->delivery_charge;
                                    
                                }
                                
                          ?>
                                        <td colspan="2" class="text-danger fx-6"> </td>
                                        <td class="text-right fx-6">-<?=$discontamount?> €</td>
                                         <li><?=$singalOrder->discount?>% Abholerrabatt  <span class="priceright"><?=$discontamount?> € </span></li>
                            <?php } if($singalOrder->discount > 0 && $singalOrder->order_pick_up == 'delivery') {
                                    
                                    $totalTypeAmt = $foodItemPrice+$drinkItemPrice;
                                
                                    if($singalOrder->food_discount == 1 && $singalOrder->drink_discount == 1) {
                                        
                                        $discontamount  = ($totalTypeAmt*$singalOrder->discount)/100;
                                        $amt = ($totalTypeAmt - $discontamount)+$singalOrder->delivery_charge;
                                        
                                    } else if($singalOrder->food_discount == 1) {
                                        
                                        $discontamount  = ($foodItemPrice*$singalOrder->discount)/100;
                                        $amt = ($drinkItemPrice + ($foodItemPrice - $discontamount))+$singalOrder->delivery_charge;
                                        
                                    } else if($singalOrder->drink_discount == 1) {
                                        
                                        $discontamount  = ($drinkItemPrice*$singalOrder->discount)/100;
                                        $amt = ($foodItemPrice + ($drinkItemPrice - $discontamount))+$singalOrder->delivery_charge;
                                        
                                    }
                                    
                                ?>
                                 <li><?=$singalOrder->discount?>% Lieferrabatt  <span class="priceright"><?= Helper::formatPrice($discontamount);?>€ </span></li>
                                
                                <?php } ?>
                                 <?php if($singalOrder->order_pick_up == "delivery") {?>
                            <li>Lieferkosten  <span class="priceright"><?= Helper::formatPrice($singalOrder->delivery_charge); ?>€ </span></li>
                               <?php } ?>
                                <?php if($singalOrder->tip > 0) { $amt = $amt + $singalOrder->tip; ?>
                            <li>Tip <span class="priceright"><?= Helper::formatPrice($singalOrder->tip);?>€ </span></li>
                               <?php } ?>
                            
                            <li class="totalbillsd">Zahlung<span class="priceright"><?php if($singalOrder->after_discount > 0) { echo  Helper::formatPrice($singalOrder->after_discount+$singalOrder->delivery_charge+$singalOrder->tip); } else { echo  Helper::formatPrice($amt+$singalOrder->tip); } ?>€ </span></li>
                        </ul>
                    </div>
                    <div class="boxitems padnessd">
                        <div class="leftdd">
                            <h2 class="odr_name">{{$singalOrder->full_name}}</h2>
                            <span>@if($singalOrder->order_pick_up == 'self')
                                Self Pikup
                                @elseif($singalOrder->order_pick_up == 'delivery')
                                 <?php if(!empty($singalOrder->address)){ ?>
                                    <?php if(!empty($singalOrder->floor)){ echo $singalOrder->floor.', ';}?><?php if(!empty($singalOrder->address)){ echo $singalOrder->address.', ';}?><?php if(!empty($singalOrder->pin_code)){ echo $singalOrder->pin_code.', ';}?><?php if(!empty($singalOrder->city)){ echo $singalOrder->city;}?></p>
                                <?php }?>
                                @else
                                NA
                                @endif</span><br />
                            <!-- <span>Sector 74, Mohali (2Kms, 8 mins away)</span> -->
                            <span>
                                {{$singalOrder->order_note}}
                            </span>
                        </div>
                        <div class="flotrightd">
                            <span><img src="{{asset('public/img/popup-img/phone.png')}}" /> :{{$singalOrder->phone}} </span>
                            <span><img src="{{asset('public/img/popup-img/mail.png')}}" />: {{$singalOrder->email}}</span>
                        </div>
                    </div>
                    <div class="boxlst">
                        <div class="boxorder boxitems">
                            @if($singalOrder->order_pick_up == "self")
                            <span><img src="{{asset('public/img/popup-img/takeway.png')}}" /> Take away </span>
                            @elseif($singalOrder->order_pick_up == "delivery")
                             <span><img src="{{asset('public/img/fast-delivery.png')}}" /> Delivery </span>
                             @endif
                            <span><img src="{{asset('public/img/popup-img/watch.png')}}" />{{$singalOrder->desired_delivery_time}}</span>
                        </div>
                        <div class="boxorderrigt boxitems">
                            @if($singalOrder->payment_mode =='Cash' || $singalOrder->payment_mode == 'Cash Payment')
                            <span><img src="{{asset('public/img/popup-img/cash.png')}}" /> Cash </span>
                             @else
                             <span><img src="{{asset('public/img/paypal.png')}}" /> Paypal </span>
                             @endif
                        </div>
                    </div>
                    <div class="bgwdhhs">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus" data-field="">
                                    -
                                </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number timeTrack"  value="30" min="1" max="100">
                            <span class="input-group-btn">
                                <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                    +
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="lastbox">
                        <button type="button" style="background: #e74a3b" id="remClass" class="btn btn-secondary odrCancelled" data-status="Cancelled" data-id="{{$singalOrder->order_id}}"><img src="{{asset('public/img/popup-img/cancel.png')}}" /> Rejected</button>
                        <button type="button" style="background: #19a671" id="remClass2" data-status="Accepted" data-id="{{$singalOrder->order_id}}" class="btn btn-primary odrAccepted"><img src="{{asset('public/img/popup-img/accept.png')}}" /> Accepted</button>
                    </div>

                </div>
                                                        <div id="printdiv" style="display:none;">
    <div id="printAreapusher"
        style="font-family: 'PT Sans Narrow', sans-serif; color: #000000;font-size: 1rem;font-weight: 400;line-height: 1.5;width:9cm; margin: 1.5rem 1.5rem 3rem;box-sizing: border-box;">
        <div style="display: flex;flex-wrap: wrap;box-sizing: border-box;">
            <div style="flex: 0 0 auto;width: 100%;box-sizing: border-box;">
                <div
                    style="padding-bottom: 8px; border-bottom: 2px dotted #000000; text-align: center;box-sizing: border-box;">
                    <h3
                        style="font-size: 30px; font-weight: 600;line-height: 1.2em;margin-bottom: .25rem;box-sizing: border-box;">
                        <?=$user->name?></h3>
                    <p style="font-size: 24px; margin: 0; padding: 0 0 3px;line-height: 1.2em;box-sizing: border-box;">
                        <?=$user->address?></p>
                    <p style="font-size: 24px; margin: 0; padding: 0 0 3px;line-height: 1.2em;box-sizing: border-box;">
                        Tel:<?=$user->mobile?></p>
                </div>
                <div style="text-align:center;box-sizing: border-box;">
                    <div
                        style="flex: 0 0 auto;width: 100%;display:flex; justify-content: space-between; align-items:center;padding-top: .5rem;box-sizing: border-box;">
                        <span
                            style="width:50%; background-color: #eaeaea; text-align:center;padding:5px 0; height:40px;box-sizing: border-box;">
                            <?php if($singalOrder->payment_mode =='Cash' || $singalOrder->payment_mode == 'Cash Payment'){ ?>
                            <img src="public/img/popup-img/cash.png" style="width:40px;max-width: 100%;height: auto;" />
                            <?php }else{ ?>
                            <img src="public/img/paypal.png" style="width:40px;max-width: 100%;height: auto;" />
                            <?php } ?>
                        </span>
                        <span
                            style="width:50%; height:40px; background-color: #000000; color:#fff;font-size:26px; line-height:40px; font-weight:500;text-transform: uppercase; text-align: center; font-family:Times New Roman;box-sizing: border-box;">
                            <?php if($singalOrder->order_pick_up == 'self'){ ?>
                            Abholen
                            <?php }elseif($singalOrder->order_pick_up == 'delivery'){ ?>
                            Lieferung
                            <?php }?>
                        </span>
                    </div>
                </div>
                <!--h5
                    style="padding-top: 1.5rem;font-size:26px;margin-top: 0;margin-bottom: .5rem;font-weight: 500;line-height: 1.2;box-sizing: border-box;">
                    TISCH: 99</h5--->
                <h6
                    style="width:50%; float: left; font-size:20px;margin-top: 0;margin-bottom: .5rem;font-weight: 500;line-height: 1.2;box-sizing: border-box;">
                    Datum:
                    <?=date('d.m.Y h:s',strtotime($singalOrder->created_at))?>
                </h6>
                <p
                    style="width: 50%; float: left; text-align: right;font-size:20px; margin:0; line-height:1.2;box-sizing: border-box;">
                    FBEE</p>
                <h5
                    style="font-size:24px;margin-top: 3rem;margin-bottom: 0rem;font-weight: 500;line-height: 1.2;box-sizing: border-box;">
                    Kopie</h5>
                <h6
                    style="font-size:24px; margin-bottom: 2px;margin-top: 0;font-weight: 500;line-height: 1.2;box-sizing: border-box;">
                    LIEFERZEIT:
                    <?php if($singalOrder->desired_delivery_time=='ASAP'){ echo "SOFRT";}else{ echo $singalOrder->desired_delivery_time;}?>
                </h6>
                <h6
                    style="font-size:24px;margin-top: 0;margin-bottom: .5rem;font-weight: 500;line-height: 1.2;box-sizing: border-box;">
                    Rechnungs-Nr <?=$singalOrder->order_id ?></h6>
                <div style="margin-top: 1.5rem;box-sizing: border-box;">
                    <h5
                        style="font-size:24px; margin-bottom: 2px;margin-top: 0;font-weight: 500;line-height: 1.2;box-sizing: border-box;">
                        *********KUNDEN DATEN***********</h5>
                    <span style="font-size: 18px; display:block; line-height: 22px;box-sizing: border-box;">
                        <?= $singalOrder->full_name ?>
                    </span>
                    <span style="font-size: 18px; display:block; line-height: 22px;box-sizing: border-box;">
                        <?= $singalOrder->phone ?>
                    </span>
                    <span style="font-size: 18px; display:block; line-height: 22px;box-sizing: border-box;">
                        <?php if(!empty($singalOrder->address)){ ?>
                        <?php if(!empty($singalOrder->floor)){ echo $singalOrder->floor.', ';}?>
                        <?php if(!empty($singalOrder->address)){ echo $singalOrder->address.', ';}?>
                        <?php if(!empty($singalOrder->pin_code)){ echo $singalOrder->pin_code.', ';}?>
                        <?php if(!empty($singalOrder->city)){ echo $singalOrder->city;}?>

                        <?php }else{
                                       echo 'NA';
                                   }?>
                    </span>
                    <span
                        style="font-size:18px; padding-bottom: 5px; line-height: 22px; display:block;box-sizing: border-box;">Email:
                        <?= $singalOrder->email ?>
                    </span>
                    <div
                        style="border-top:2px dotted #6c6764; border-bottom: 2px dotted #6c6764;height: 35px; padding-top: 2px; margin-top: 5px;box-sizing: border-box;">
                        <span style="font-size: 20px; width: 50%; float: left;box-sizing: border-box;">ID ARTIKEL</span>
                        <span
                            style="font-size: 20px; width: 50%; text-align: right; float: right;box-sizing: border-box;">EUR</span>
                    </div>

                    <?php 
                                           foreach($singalOrder->order_items as $myitemsprint){ ?>
                    <?php $product_arrayprint = json_decode($myitemsprint->product_add_ons); ?>
                    <?php if($myitemsprint->item_qty!=1){ ?>
                    <p style="margin-bottom: 0px;">
                        <span
                            style="font-size: 18px; width: 100%; margin-top: 0px; margin-bottom: 5px;box-sizing: border-box;"><?=$myitemsprint->item_qty?>x
                            <?= Helper::formatPrice($myitemsprint->item_price); ?>
                        </span>
                    </p>
                    <?php } ?>

                    <span style="font-size: 18px; width: 70%; float: left; margin-top: 2px;box-sizing: border-box; ">
                        <?= $myitemsprint->id ?> <?= $myitemsprint->item_name ?>
                        <?php if(!empty($product_arrayprint->product->addOnsString)){  ?>
                        ( <?=$product_arrayprint->product->addOnsString?>)
                        <?php } ?>
                    </span>
                    <span
                        style="font-size: 18px; width: 30%; margin-top: 2px; float:left; text-align: right;box-sizing: border-box;">
                        <?= Helper::formatPrice($myitemsprint->item_price * $myitemsprint->item_qty); ?>
                    </span>
                    <br>
                    <?php }?>
                    <span
                        style="font-size: 24px; width: 50%; float: left; margin-top: 0px; margin-bottom: 10px; padding-left:70px;box-sizing: border-box;">Summe:</span>
                    <span
                        style="font-size: 24px; width: 50%; float: left; margin-top: 0px;  margin-bottom: 10px; text-align: right;box-sizing: border-box;">
                        <?= Helper::formatPrice($price);?>€
                    </span>
                </div>
                <div
                    style="border-top:2px dotted; border-bottom: 2px dotted;height: 80px; padding-top: 5px;clear: both;box-sizing: border-box;">
                    <ul
                        style="display: flex; justify-content: space-between; padding-right: 10px;margin-top: 0;margin-bottom: 1rem;padding-left: 2rem; list-style: none;box-sizing: border-box;">
                        <?php if($singalOrder->discount > 0 && $singalOrder->order_pick_up == 'delivery') { ?>
                        <li>Lieferrabatt</li>
                        <?php }?>
                        <?php if($singalOrder->discount > 0 && $singalOrder->order_pick_up == 'self') {?>
                        <li>Abholerrabatt</li>
                        <?php }?>
                        <?php if($singalOrder->order_pick_up == "delivery") {?>
                        <li>Lieferkosten</li>
                        <?php } ?>
                        <?php if($singalOrder->tip > 0) {  ?>
                        <li>Tipp</li>
                        <?php }?>
                        <li>Brutto</li>
                    </ul>
                    <ul
                        style="display: flex; justify-content: space-between; padding-right: 10px;margin-top: 0;margin-bottom: 1rem;padding-left: 2rem; list-style:none;box-sizing: border-box;">
                        <?php if($singalOrder->discount > 0 && $singalOrder->order_pick_up == 'delivery') { ?>
                        <li><?=$singalOrder->discount?>%</li>
                        <?php }?>
                        <?php if($singalOrder->discount > 0 && $singalOrder->order_pick_up == 'self') {?>
                        <li><?=$singalOrder->discount?>%</li>
                        <?php } ?>
                        <?php if($singalOrder->order_pick_up == "delivery") {?>
                        <li>
                            <?= Helper::formatPrice($singalOrder->delivery_charge); ?>€
                        </li>
                        <?php } ?>
                        <?php if($singalOrder->tip > 0) {  ?>
                        <li>
                            <?= Helper::formatPrice($singalOrder->tip);?>€
                        </li>
                        <?php  }?>
                        <li>
                            <?php if($singalOrder->after_discount > 0) { echo  Helper::formatPrice($singalOrder->after_discount+$singalOrder->delivery_charge+$singalOrder->tip); } else { echo  Helper::formatPrice($amt+$singalOrder->tip); } ?>€
                        </li>
                    </ul>
                </div>
                <div style="clear: both;box-sizing: border-box;">
                    <span
                        style="font-size: 24px;font-weight: 600; width: 50%; float: left; margin-top: 5px; padding-left:10px;box-sizing: border-box;">
                        <?php if($singalOrder->payment_mode =='Cash' || $singalOrder->payment_mode == 'Cash Payment'){ ?>
                        Mit Bargeld
                        <?php }else{?>Online
                        <?php } ?> Bezahlt:
                    </span>
                    <span
                        style="font-size: 24px;font-weight: 600; width: 50%; float: left; margin-top: 5px; text-align: right;box-sizing: border-box;">
                        <?php if($singalOrder->after_discount > 0) { echo  Helper::formatPrice($singalOrder->after_discount+$singalOrder->delivery_charge+$singalOrder->tip); } else { echo  Helper::formatPrice($amt+$singalOrder->tip); } ?>€
                    </span>
                </div>
                <p
                    style="text-align: center; font-size: 18px; line-height:22px;margin-bottom: 3rem;padding-top:32px;box-sizing: border-box;">
                   <br>Vielen Dank foodbee Team<br>Preise inkle, Mwst
                </p>

            </div>
        </div>
    </div>
</div>
                   <script>
  document.getElementById("qtychange").textContent= document.getElementById("totalqtyvalue").value;
</script>
@if($singalOrder->order_status == "Created")

<script type="text/javascript">
                                            
    // $(document).ready(function(){ 
        //  $('#removeclass').removeClass('new-order1');
        // $('#removeclass').addClass('new-order');                                
    //  var times = 4;
    //  var loop = setInterval(repeat, 3000); 
    // function repeat() {
    // var  audio = new Audio('https://sale.harjassinfotech.org/public/img/OrderReceivedNotification.mp3');
    // audio.play();
    // }

    //     repeat(); 
         // });
</script>
@endif
