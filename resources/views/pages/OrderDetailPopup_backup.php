
<div class="row">
                        <div class="col-lg-8">
                            <table class="table  table-borderless text-black" cellspacing="0" cellpadding="0">
                                <thead>
                                    <tr>
                                        <th class="fx-6">Anz.</th>
                                        <th class="fx-6">Produktname</th>
                                        <th class="text-right fx-6">Gesamt</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php $foodItemPrice = $drinkItemPrice = 0;$price = 0; ?>
                                  <?php
                                  
                                  if(!empty($order->order_items)){
                                  foreach($order->order_items as $item){
                                   $product_array = json_decode($item->product_add_ons); ?>
                                  
                                    <tr>
                                        <td align="center">
                                            	 <?php if($item->beverage == 0) { //'Food'?>
                                            	 <img class="img-fluid" src="public/img/o_item_img2.jpg">
                                            	 <?php }else{ ?>
                                            	 <img class="img-fluid" src="public/img/o_item_img1.jpg">
                                            	 <?php } ?>
                                            </td>
                                        <td>
                                            <div class="pro_qty_prc">
                                                <p class="m-0 fx-6"><?=$item->item_qty?> x
                                                    
                                                    <span class="font-weight-sbold"><?=$item->item_name?> [<em><?= Helper::formatPrice($item->item_price);?> €</em>]</span><br>
                                                    <small style="font-style:italic"><?=$product_array->product->addOnsString?></small>
                                                    <?php if (trim($item->item_note) != ""): ?>
									   <br><small style="font-style:italic">*<?=$item->item_note?></small>
									<?php endif; ?>
                                                </p>
                                            </div>
                                        </td>
                                        <td class="text-right fx-6"><?= Helper::formatPrice($item->item_price * $item->item_qty); ?> €</td>
                                    </tr>
                                     <?php $price += $item->item_price * $item->item_qty; 
							if($item->is_discount == 2) {
								
								$foodItemPrice = 0;
								$drinkItemPrice = 0;
								
							} else if($item->beverage == 0) { //'Food'
							
								$foodItemPrice += ($item->item_price*$item->item_qty);
								
							} else if($item->beverage == 1) { //'Drink'
							
								$drinkItemPrice += ($item->item_price*$item->item_qty);
								
							}
							?>
                                    <?php } }?>
                                    <!--tr>
                                        <td align="center"><img class="img-fluid" src="public/img/o_item_img1.jpg"></td>
                                        <td>
                                            <div class="pro_qty_prc">
                                                <p class="m-0 fx-6">1 x
                                                    <span class="font-weight-sbold">New Testing foodbee items [<em>25,00 €</em>]</span><br>
                                                    <small style="font-style:italic">Klein</small>
                                                </p>
                                            </div>
                                        </td>
                                        <td class="text-right fx-6">25,00 €</td>
                                    </tr-->
                                    
                         
                                    <tr class="totalRow border-top">
                                        <td colspan="2" class="fx-6">Zwischensumme</td>
                                        <td class="text-right fx-6"><?= Helper::formatPrice($price);?> €</td>
                                    </tr>
                                    <tr class="totalRow MainRow">
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
                                        <td colspan="2" class="text-danger fx-6"> <?=$order->discount?>% Abholerrabatt</td>
                                        <td class="text-right fx-6">-<?=$discontamount?> €</td>
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
								 <td colspan="2" class="text-danger fx-6"> <?=$order->discount?>% Lieferrabatt</td>
                                        <td class="text-right fx-6">-<?= Helper::formatPrice($discontamount);?> €</td>
								<?php } ?>
                                    </tr>
                                    <?php if($order->order_pick_up == "delivery") {?> <tr class="totalRow MainRow">
                                        <td colspan="2" class="fx-6">Lieferkosten</td>
                                        <td class="text-right fx-6"><?= Helper::formatPrice($order->delivery_charge); ?> €</td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($order->tip > 0) { $amt = $amt + $order->tip; ?>
                                    <tr class="totalRow MainRow">
                                        <td colspan="2" class="fx-6">Tip</td>
                                        <td class="text-right fx-6"><?= Helper::formatPrice($order->tip);?> €</td>
                                    </tr>
                                    <?php } ?>
                                    <tr class="totalRow MainRow">
                                        <td colspan="2" class="fx-6"> <b>Zahlung</b> </td>
                                        <td class="text-right fx-6"><b><?php if($order->after_discount > 0) { echo  Helper::formatPrice($order->after_discount+$order->delivery_charge+$order->tip); } else { echo  Helper::formatPrice($amt+$order->tip); } ?> €</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-4 text-black  bg-dlt h-100">
                            <h4 class="pt-2 text-black fx-6 font-weight-bold mb-1"># : <?=$order->order_id?></h4>
                            <h4 class="pt-2 text-black fx-6 font-weight-bold"><?=$order->full_name?></h4>
                            <p class="mb-0 fx-6"><i class="fa fa-phone text-danger ph"></i> : <?=$order->phone?></p>
                            <p class="mb-0 fx-6"><i class="fa fa-envelope text-danger"></i> : <?=$order->email?></p>
                            <?php if(!empty($order->address)){ ?>
                            <p class="mb-0 fx-6"><i class="fa fa-map-marker text-danger"></i> : <?php if(!empty($order->floor)){ echo $order->floor.', ';}?><?php if(!empty($order->address)){ echo $order->address.', ';}?><?php if(!empty($order->pin_code)){ echo $order->pin_code.', ';}?><?php if(!empty($order->city)){ echo $order->city;}?></p>
                           
                           <?php }?> <p class="mb-1 fx-6 font-weight-bold"><?=$order->order_note?></p>
                            <h4 class="text-success fx-6 font-weight-bold"><?=$order->order_status?></h4>
                        </div>
                    </div>