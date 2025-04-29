
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"># <?=$order->order_id ?><i>New</i> <br /><span><span id="qtychange">4</span>x item, <?php if($order->after_discount > 0) { echo Helper::formatPrice($order->after_discount+$order->delivery_charge+$order->tip )." €"; } else { echo Helper::formatPrice($order->after_discount+$order->tip)."€"; } ?> </span></h5>
                    <a type="button" class="printbutton printData">
                        <img class="printdata" src="public/img/popup-img/print.png" />
                    </a>
                </div>
                <div class="modal-body">
                    <div class="boxitems">

                        <ul>
                            <?php $foodItemPrice = $drinkItemPrice = 0;$price = 0;$TotalQTY=0;
                            foreach($order->order_items as $myitems){ ?>
                             <?php $product_array = json_decode($myitems->product_add_ons); ?>
                            
                            <li>
                                    <?php if($myitems->beverage == 0) { //'Food'?>
                                              <img src="public/img/popup-img/food.png" />
                                                 <?php }else{ ?>
                                                 <img src="public/img/popup-img/drink.png" />
                                                 <?php } ?>
                                
                                <?= $myitems->item_qty ?> x <?= $myitems->item_name ?><span class="priceright"><?= Helper::formatPrice($myitems->item_price * $myitems->item_qty); ?> € </span></li>
                            <?php if(!empty($product_array->product->addOnsString)){  ?>
                            <li class="customize">- <?=$product_array->product->addOnsString?></li>
                                <?php } ?>
                                                <?php
                                                    $TotalQTY=$TotalQTY+$myitems->item_qty; 
                                                 $price += $myitems->item_price * $myitems->item_qty; 
                            if($myitems->is_discount == 2) {
                                
                                $foodItemPrice = 0;
                                $drinkItemPrice = 0;
                                
                            } else if($myitems->beverage == 0) { //'Food'
                            
                                $foodItemPrice += ($myitems->item_price*$myitems->item_qty);
                                
                            } else if($myitems->beverage == 1) { //'Drink'
                            
                                $drinkItemPrice += ($myitems->item_price*$myitems->item_qty);
                                
                            }
                            ?>
                           
                           <?php } ?>
<input type="hidden" id='totalqtyvalue' value='<?=$TotalQTY;?>'/>
                        </ul>

                        <ul class="billbxcd">
                            <li>Zwischensumme  <span class="priceright"><?= Helper::formatPrice($price);?>€ </span></li>
                                                               <?php 
                          $amt = $price+$order->delivery_charge;
                          $discontamount = 0;
                          if($order->discount > 0 && $order->order_pick_up == 'self') {     
                          
                                $totalTypeAmt = $foodItemPrice+$drinkItemPrice;
                                
                                if($order->food_discount == 1 && $order->drink_discount == 1) {
                                    
                                    $discontamount  = ($totalTypeAmt*$order->discount)/100;
                                    $amt = ($totalTypeAmt - $discontamount)+$order->delivery_charge;
                                    
                                } else if($order->food_discount == 1) {
                                    
                                    $discontamount  = ($foodItemPrice*$order->discount)/100;
                                    $amt = ($drinkItemPrice + ($foodItemPrice - $discontamount))+$order->delivery_charge;
                                    
                                } else if($order->drink_discount == 1) {
                                    
                                    $discontamount  = ($drinkItemPrice*$order->discount)/100;
                                    $amt = ($foodItemPrice + ($drinkItemPrice - $discontamount))+$order->delivery_charge;
                                    
                                }
                                
                          ?>
                                        <td colspan="2" class="text-danger fx-6"> </td>
                                        <td class="text-right fx-6">-<?=$discontamount?> €</td>
                                         <li><?=$order->discount?>% Abholerrabatt  <span class="priceright"><?=$discontamount?> € </span></li>
                            <?php } if($order->discount > 0 && $order->order_pick_up == 'delivery') {
                                    
                                    $totalTypeAmt = $foodItemPrice+$drinkItemPrice;
                                
                                    if($order->food_discount == 1 && $order->drink_discount == 1) {
                                        
                                        $discontamount  = ($totalTypeAmt*$order->discount)/100;
                                        $amt = ($totalTypeAmt - $discontamount)+$order->delivery_charge;
                                        
                                    } else if($order->food_discount == 1) {
                                        
                                        $discontamount  = ($foodItemPrice*$order->discount)/100;
                                        $amt = ($drinkItemPrice + ($foodItemPrice - $discontamount))+$order->delivery_charge;
                                        
                                    } else if($order->drink_discount == 1) {
                                        
                                        $discontamount  = ($drinkItemPrice*$order->discount)/100;
                                        $amt = ($foodItemPrice + ($drinkItemPrice - $discontamount))+$order->delivery_charge;
                                        
                                    }
                                    
                                ?>
                                 <li><?=$order->discount?>% Lieferrabatt  <span class="priceright"><?= Helper::formatPrice($discontamount);?>€ </span></li>
                                
                                <?php } ?>
                                 <?php if($order->order_pick_up == "delivery") {?>
                            <li>Lieferkosten  <span class="priceright"><?= Helper::formatPrice($order->delivery_charge); ?>€ </span></li>
                               <?php } ?>
                                <?php if($order->tip > 0) { $amt = $amt + $order->tip; ?>
                            <li>Tip <span class="priceright"><?= Helper::formatPrice($order->tip);?>€ </span></li>
                               <?php } ?>
                            
                            <li class="totalbillsd">Zahlung<span class="priceright"><?php if($order->after_discount > 0) { echo  Helper::formatPrice($order->after_discount+$order->delivery_charge+$order->tip); } else { echo  Helper::formatPrice($amt+$order->tip); } ?>€ </span></li>
                        </ul>
                    </div>
                    <div class="boxitems padnessd">
                        <div class="leftdd">
                            <h2 class="odr_name"><?= $order->full_name ?>
                                
                            </h2>
                            <span><?php if($order->order_pick_up == 'self'){ ?>
                                Self Pikup
                               <?php }elseif($order->order_pick_up == 'delivery'){ ?>
                                 <?php if(!empty($order->address)){ ?>
                                    <?php if(!empty($order->floor)){ echo $order->floor.', ';}?><?php if(!empty($order->address)){ echo $order->address.', ';}?><?php if(!empty($order->pin_code)){ echo $order->pin_code.', ';}?><?php if(!empty($order->city)){ echo $order->city;}?></p>
                                <?php }?>
                                <?php }else{
                                    echo 'NA';
                                }?>
                                </span><br />
                            <!-- <span>Sector 74, Mohali (2Kms, 8 mins away)</span> -->
                            <span>
                                <?= $order->order_note ?>
                            </span>
                        </div>
                        <div class="flotrightd">
                            <span><img src="public/img/popup-img/phone.png" /> :<?= $order->phone ?> </span>
                            <span><img src="public/img/popup-img/mail.png" />: <?= $order->email ?></span>
                        </div>
                    </div>
                    <div class="boxlst">
                        <div class="boxorder boxitems">
                            <?php  if($order->order_pick_up == "self"){ ?>
                            <span><img src="public/img/popup-img/takeway.png" /> Take away </span>
                           <?php } elseif($order->order_pick_up == "delivery"){ ?>
                             <span><img src="public/img/fast-delivery.png" /> Delivery </span>
                            <?php } ?>
                            <span><img src="public/img/popup-img/watch.png" /><?= $order->desired_delivery_time ?></span>
                        </div>
                        <div class="boxorderrigt boxitems">
                            <?php if($order->payment_mode =='Cash' || $order->payment_mode == 'Cash Payment'){ ?>
                            <span><img src="public/img/popup-img/cash.png" /> Cash </span>
                            <?php }else{ ?>
                             <span><img src="public/img/paypal.png" /> Paypal </span>
                             <?php } ?>
                        </div>
                    </div>
                                        
                   <div id="printdiv" style="display:none;">
                    <div id="printArea" style="font-family: 'PT Sans Narrow', sans-serif; color: #000000;font-size: 1rem;font-weight: 400;line-height: 1.5;width:8cm; margin: 1.5rem 1.5rem 3rem;box-sizing: border-box;">
                       <div style="display: flex;flex-wrap: wrap;box-sizing: border-box;">
                           <div style="flex: 0 0 auto;width: 100%;box-sizing: border-box;">
                               <div style="padding-bottom: 8px; border-bottom: 2px dotted #000000; text-align: center;box-sizing: border-box;">
                                   <h3 style="font-size: 30px; font-weight: 600;line-height: 1.2em;margin-bottom: .25rem;box-sizing: border-box;"><?=$user->name?></h3>
                                   <p style="font-size: 24px; margin: 0; padding: 0 0 3px;line-height: 1.2em;box-sizing: border-box;"><?=$user->address?></p>
                                   <p style="font-size: 24px; margin: 0; padding: 0 0 3px;line-height: 1.2em;box-sizing: border-box;">Tel:<?=$user->mobile?></p>
                               </div>
                               <div style="text-align:center;box-sizing: border-box;">
                                   <div style="flex: 0 0 auto;width: 100%;display:flex; justify-content: space-between; align-items:center;padding-top: .5rem;box-sizing: border-box;">
                                       <span style="width:50%; background-color: #eaeaea; text-align:center;padding:5px 0; height:40px;box-sizing: border-box;">
                                       <?php if($order->payment_mode =='Cash' || $order->payment_mode == 'Cash Payment'){ ?>
                                         <img src="public/img/popup-img/cash.png" style="width:40px;max-width: 100%;height: auto;"  />
                                           <?php }else{ ?>
                                            <img src="public/img/paypal.png" style="width:40px;max-width: 100%;height: auto;" /> 
                                            <?php } ?>
                                       </span>
                                       <span style="width:50%; height:40px; background-color: #000000; color:#fff;font-size:26px; line-height:40px; font-weight:500;text-transform: uppercase; text-align: center; font-family:Times New Roman;box-sizing: border-box;"><?php if($order->order_pick_up == 'self'){ ?>
                                           Abholen                               <?php }elseif($order->order_pick_up == 'delivery'){ ?>
                                               Lieferung
                                               <?php }?>
                                       </span>
                                   </div>
                               </div> 
                               <h6 style="width:50%; float: left; font-size:20px;margin-top: 0;margin-bottom: .5rem;font-weight: 500;line-height: 1.2;box-sizing: border-box;">Datum: <?=date('d.m.Y h:s',strtotime($order->created_at))?></h6>
                               <p style="width: 50%; float: left; text-align: right;font-size:20px; margin:0; line-height:1.2;box-sizing: border-box;">FBEE</p>
                               <h5 style="font-size:24px;margin-top: 3rem;margin-bottom: 0rem;font-weight: 500;line-height: 1.2;box-sizing: border-box;">Kopie</h5>
                               <h6 style="font-size:24px; margin-bottom: 2px;margin-top: 0;font-weight: 500;line-height: 1.2;box-sizing: border-box;">LIEFERZEIT: <?php if($order->desired_delivery_time=='ASAP'){ echo "SOFRT";}else{ echo $order->desired_delivery_time;}?></h6>
                               <h6 style="font-size:24px;margin-top: 0;margin-bottom: .5rem;font-weight: 500;line-height: 1.2;box-sizing: border-box;">Rechnungs-Nr <?=$order->order_id ?></h6>
                               <div style="margin-top: 1.5rem;box-sizing: border-box;">
                                   <h5 style="font-size:24px; margin-bottom: 2px;margin-top: 0;font-weight: 500;line-height: 1.2;box-sizing: border-box;">*********KUNDEN DATEN***********</h5>
                                   <span style="font-size: 18px; display:block; line-height: 22px;box-sizing: border-box;"><?= $order->full_name ?></span>
                                   <span style="font-size: 18px; display:block; line-height: 22px;box-sizing: border-box;"><?= $order->phone ?></span>
                                   <span style="font-size: 18px; display:block; line-height: 22px;box-sizing: border-box;"><?php if(!empty($order->address)){ ?>
                                       <?php if(!empty($order->floor)){ echo $order->floor.', ';}?><?php if(!empty($order->address)){ echo $order->address.', ';}?><?php if(!empty($order->pin_code)){ echo $order->pin_code.', ';}?><?php if(!empty($order->city)){ echo $order->city;}?>
                                  
                                   <?php }else{
                                       echo 'NA';
                                   }?></span>
                                   <span style="font-size:18px; padding-bottom: 5px; line-height: 22px; display:block;box-sizing: border-box;">Email: <?= $order->email ?></span>
                                   <div style="border-top:2px dotted #6c6764; border-bottom: 2px dotted #6c6764;height: 35px; padding-top: 2px; margin-top: 5px;box-sizing: border-box;">
                                       <span style="font-size: 20px; width: 50%; float: left;box-sizing: border-box;">ID ARTIKEL</span>
                                       <span style="font-size: 20px; width: 50%; text-align: right; float: right;box-sizing: border-box;">EUR</span>
                                   </div>
                                  
                                       <?php 
                                           foreach($order->order_items as $myitemsprint){ ?>
                                            <?php
                                            $product_arrayprint='';
                                            $product_arrayprint = json_decode($myitemsprint->product_add_ons); ?>
                                               <?php if($myitemsprint->item_qty!=1){ ?>
                                               <p style="margin-bottom: 0px;">
                                               <span style="font-size: 16px; width: 100%; margin-top: 0px; margin-bottom: 5px;box-sizing: border-box;"><?=$myitemsprint->item_qty?>x<?= Helper::formatPrice($myitemsprint->item_price); ?></span>
                                               </p>
                                               <?php } ?>
                                   
                                   <span style="font-size: 18px; width: 70%; float: left; margin-top: 2px;box-sizing: border-box; "> <?php if(!empty($product_arrayprint->product->sku)){ echo $product_arrayprint->product->sku; }else{ echo  $myitemsprint->id ;} ?><?= $myitemsprint->item_name ?> <?php if(!empty($product_arrayprint->product->addOnsString)){  ?>
                                           ( <?=$product_arrayprint->product->addOnsString?>)
                                               <?php } ?>
                                       </span>
                                   <span style="font-size: 18px; width: 30%; margin-top: 2px; float:left; text-align: right;box-sizing: border-box;"><?= Helper::formatPrice($myitemsprint->item_price * $myitemsprint->item_qty); ?></span>
               <br>
                                   <?php }?>
                                   
                                   <span style="font-size: 24px; width: 50%; float: left; margin-top: 0px; margin-bottom: 10px; padding-left:70px;box-sizing: border-box;">Summe:</span>
                                   <span
                                       style="font-size: 24px; width: 50%; float: left; margin-top: 0px;  margin-bottom: 10px; text-align: right;box-sizing: border-box;"><?= Helper::formatPrice($price);?>€</span>
                               </div>
                               <div style="border-top:2px dotted; border-bottom: 2px dotted;height: 80px; padding-top: 5px;clear: both;box-sizing: border-box;">
                                   <ul style="display: flex; justify-content: space-between; padding-right: 10px;margin-top: 0;margin-bottom: 1rem;padding-left: 2rem; list-style: none;box-sizing: border-box;">
                                   <?php if($order->discount > 0 && $order->order_pick_up == 'delivery') { ?><li>Lieferrabatt</li><?php }?>
                                   <?php if($order->discount > 0 && $order->order_pick_up == 'self') {?><li>Abholerrabatt</li><?php }?>
                                   <?php if($order->order_pick_up == "delivery") {?> <li>Lieferkosten</li><?php } ?>
                                   <?php if($order->tip > 0) {  ?><li>Tipp</li><?php }?>
                                       <li>Brutto</li>
                                   </ul>
                                   <ul style="display: flex; justify-content: space-between; padding-right: 10px;margin-top: 0;margin-bottom: 1rem;padding-left: 2rem; list-style:none;box-sizing: border-box;">
                                   <?php if($order->discount > 0 && $order->order_pick_up == 'delivery') { ?><li><?=$order->discount?>%</li><?php }?>
                                   <?php if($order->discount > 0 && $order->order_pick_up == 'self') {?><li><?=$order->discount?>%</li><?php } ?>
                                   <?php if($order->order_pick_up == "delivery") {?><li><?= Helper::formatPrice($order->delivery_charge); ?>€</li><?php } ?>
                                   <?php if($order->tip > 0) {  ?>   <li><?= Helper::formatPrice($order->tip);?>€</li><?php  }?>
                                       <li><?php if($order->after_discount > 0) { echo  Helper::formatPrice($order->after_discount+$order->delivery_charge+$order->tip); } else { echo  Helper::formatPrice($amt+$order->tip); } ?>€</li>
                                   </ul>
                               </div>
                               <div style="clear: both;box-sizing: border-box;">
                                   <span style="font-size: 24px;font-weight: 600; width: 50%; float: left; margin-top: 5px; padding-left:10px;box-sizing: border-box;"><?php if($order->payment_mode =='Cash' || $order->payment_mode == 'Cash Payment'){ ?>
               Mit Bargeld<?php }else{?>Online <?php } ?> Bezahlt:</span>
                                   <span style="font-size: 24px;font-weight: 600; width: 50%; float: left; margin-top: 5px; text-align: right;box-sizing: border-box;"><?php if($order->after_discount > 0) { echo  Helper::formatPrice($order->after_discount+$order->delivery_charge+$order->tip); } else { echo  Helper::formatPrice($amt+$order->tip); } ?>€</span>
                               </div>
                               <p style="text-align: center; font-size: 18px; line-height:22px;margin-bottom: 3rem;padding-top:32px;box-sizing: border-box;"><br>Vielen Dank foodbee Team<br>Preise inkle, Mwst
                               </p>
                               
                           </div>
                       </div>
                   </div>
               </div>
                   

                </div>

                <script>
  document.getElementById("qtychange").textContent= document.getElementById("totalqtyvalue").value;
</script>
                   
            
