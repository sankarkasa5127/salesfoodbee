<?php

namespace App\Http\Controllers\Api;
use Auth,DB,Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function save_order(Request $request){
        
        $msg="Data Inserted Successfully";

        $alldata=$request->all();

        foreach($alldata as $next){

        $ownerval=$next['owner'];
        
        $orderparams=[
            'order_id'=>$next['id'],
            'closingDate'=>$next['closingDate'],
            'activeDate'=>$next['activeDate'],
            'receivedTime'=>$next['receivedTime'],
            'deletedItemsCount'=>$next['deletedItemsCount'],
            'deletedItemsAmount'=>$next['deletedItemsAmount'],
            'movedItemsCount'=>$next['movedItemsCount'],
            'ticketid'=>$next['ticketid'],
            'movedItemsAmount'=>$next['movedItemsAmount'],
            'creationHour'=>$next['creationHour'],
            'paid'=>$next['paid'],
            'soldGutschein'=>$next['soldGutschein'],
            'printed'=>$next['printed'],
            'voided'=>$next['voided'],
            'splitPayment'=>$next['splitPayment'],
            'gutscheinHausbon'=>$next['gutscheinHausbon'],
            'closed'=>$next['closed'],
            'discountAmount'=>$next['discountAmount'],
            'deliveryCost'=>$next['deliveryCost'],
            'taxAmount'=>$next['taxAmount'],
            'totalAmount'=>$next['totalAmount'],
            'tipAmount'=>$next['tipAmount'],
            'cardAmount'=>$next['cardAmount'],
            'ticketType'=>$next['ticketType'],
            'cashPayment'=>$next['cashPayment'],
            'gutscheinPayment'=>$next['gutscheinPayment'],
            'onlinePayment'=>$next['onlinePayment'],
            'debitorPayment'=>$next['debitorPayment'],
            'onlineBarPayment'=>$next['onlineBarPayment'],
            'split'=>$next['split'],
            'cardpaymenttype'=>$next['cardpaymenttype'],
            'discountAtSpeisen'=>$next['discountAtSpeisen'],
            'stornoreason'=>$next['stornoreason'],
            'deviceId'=>$next['deviceId'],
            'zwsCount'=>$next['zwsCount'],
            'discountType'=>$next['discountType'],
            'discountId'=>$next['discountId'],
            'deliveryTime'=>$next['deliveryTime'],
            'reOpened'=>$next['reOpened'],
            'customerId'=>$next['customerId'],
            'voidedBy'=> $next['voidedBy'],
            'couponAndDiscounts'=>$next['couponAndDiscounts']!='' ? implode(',',$next['couponAndDiscounts']):'',
            'tseClientId'=>$next['tseClientId'],
            'tseTxRevisionNr'=>$next['tseTxRevisionNr'],
            'tseReceiptTxId'=>$next['tseReceiptTxId'],
            'tseReceiptTxRevisionNr'=>$next['tseReceiptTxRevisionNr'],
            'tseReceiptDataId'=>$next['tseReceiptDataId'],
            'deletedItems'=>$next['deletedItems']!='' ? implode(',',$next['deletedItems']):'',
            'priceIncludesTax'=>$next['priceIncludesTax']
       ];


       $count=DB::table('pos_order_details')->where('order_id',$next['id'])->count();

       $orderId=$next['id'];

       if($count>0){
        $updateddata=DB::table('pos_order_details')->where('order_id',$next['id'])->update($orderparams);
        $msg="Data Updated Successfully";
       }else{
        $success=DB::table('pos_order_details')->insert($orderparams);
       }
      
       if($orderId){
           
        if(isset($next['owner'])){
        $odata=[
               'userId' =>$ownerval['userId'],
               'password' =>$ownerval['password'],
               'secondpassword'=>$ownerval['secondpassword'],
               'addimatpassword' =>$ownerval['addimatpassword'],
               'firstName' => $ownerval['firstName'],
               'lastName'=>$ownerval['lastName'],
               'aliasName'=>$ownerval['aliasName'],
               'driver'=>$ownerval['driver'],
               'type'=>json_encode($ownerval['type']),
        ];


        
       $counted=DB::table('pos_order_owners')->where('userId',$ownerval['userId'])->count();

       if($counted>0){
        $upddata=DB::table('pos_order_owners')->where('userId',$ownerval['userId'])->update($odata);
       }else{
        $sent=DB::table('pos_order_owners')->insertGetId($odata);
        $updatedb=DB::table('pos_order_details')->where('order_id',$orderId)->update(['owner_id'=>$sent]);
       }

    }
           
          
    if(is_array($next['ticketItems'])){

       foreach ($next['ticketItems'] as $row) {
           
           $menuparam=[
                   'order_id'=>$orderId,
                   'itemId'=>$row['itemId'] ,
                   'gdpu'=>$row['gdpu'],
                   'itemCount'=>$row['itemCount'] ,
                   'name'=>$row['name'],
                   'groupName'=>$row['groupName'],
                   'tableNumber'=>$row['tableNumber'],
                   'disconnectionReason'=>$row['disconnectionReason'],
                   'categoryName'=>$row['categoryName'],
                   'unitPrice'=>$row['unitPrice'] ,
                   'menuItemId'=>$row['menuItemId'] ,
                   'discountRate'=>$row['discountRate'] ,
                   'taxRate'=>$row['taxRate'] ,
                   'subtotalAmount'=>$row['subtotalAmount'] ,
                   'subtotalAmountWithoutModifiers'=>$row['subtotalAmountWithoutModifiers'] ,
                   'discountAmount'=>$row['discountAmount'] ,
                   'rabattAmount'=>$row['rabattAmount'] ,
                   'taxAmount'=>$row['taxAmount'] ,
                   'taxAmountWithoutModifiers'=>$row['taxAmountWithoutModifiers'] ,
                   'totalAmount'=>$row['totalAmount'] ,
                   'totalAmountWithoutModifiers'=>$row['totalAmountWithoutModifiers'] ,
                   'beverage'=>$row['beverage'] ,
                   'shouldPrintToKitchen'=>$row['shouldPrintToKitchen'] ,
                   'hasModifiers'=>$row['hasModifiers'] ,
                   'printedToKitchen'=>$row['printedToKitchen'] ,
                   'printorder'=>$row['printorder'] ,
                   'gaeng'=>$row['gaeng'] ,
                   'ausserhaus'=>$row['ausserhaus'] ,
                   'divItem'=>$row['divItem'] ,
                   'sishaa'=>$row['sishaa'] ,
                   'bon'=>$row['bon'] ,
                   'stornoreason'=>$row['stornoreason'] ,
                   'sku_no'=>$row['sku_no'] ,
                   'extraPrinter'=>$row['extraPrinter'] ,
                   'extraPrinter1'=>$row['extraPrinter1'] ,
                   'extraPrinter2'=>$row['extraPrinter2'] ,
                   'extraPrinter3'=>$row['extraPrinter3'] ,
                   'extraPrinter4'=>$row['extraPrinter4'] ,
                   'smartShank'=>$row['smartShank'] ,
                   'existDiscount'=>$row['existDiscount'] ,
                   'menuitemInternalId'=>$row['menuitemInternalId'] ,
                   'barDruck'=>$row['barDruck'] ,
                   'ticketItemModifierGroups'=>json_encode($row['ticketItemModifierGroups']),
                   'cookingInstructions'=>json_encode($row['cookingInstructions']),
                   'priceIncludesTax'=>$row['priceIncludesTax'] ,
                   'tableRowNum'=>$row['tableRowNum'] 
               ];
           
            $counter=DB::table('pos_order_items')->where('id',$row['id'])->count();

            if($counter>0){
                $status=DB::table('pos_order_items')->where('id',$row['id'])->update($menuparam);
            }else{
                $status=DB::table('pos_order_items')->insert($menuparam);
            }

       }
    }  
       
    if(is_array($next['tables'])){

        foreach ($next['tables'] as $data) {
           
           $tableparam=[
                   'order_id'=>$orderId,
                   'number'=>$data['number'],
                   'x'=>$data['x'],
                   'y'=>$data['y'],
                   'floor'=>$data['floor'],
                   'occupied'=>$data['occupied'],
                   'username'=>$data['username'],
                   'totalAmount'=>$data['totalAmount'],
                   'userId'=>$data['userId'],
                   'tickettype'=>$data['tickettype'],
                   'booked'=>$data['booked'],
                   'splitted'=>$data['splitted']
               ];
           
            $counteds=DB::table('pos_order_tables')->where('id',$row['id'])->count();

            if($counteds>0){
                $status=DB::table('pos_order_tables')->where('id',$data['id'])->update($tableparam);
            }else{
                $status=DB::table('pos_order_tables')->insert($tableparam);
            }  

        }
           
       }

    }

    }
                    
       return response()->json(['status' => true,'message' => $msg]);
   
    }

    public function save_category(Request $request){

        $alldata=$request->all();

        foreach($alldata as $next){

        $msg="Data Inserted Successfully";

        $orderparams=[
            'cat_id'=>$next['id'],
            'name'=>$next['name'],
            'beverage'=>$next['beverage'],
            'zutaten'=>$next['zutaten'],
            'type'=>$next['type'],
            'bon'=>$next['bon'],
            'categoryid'=>$next['categoryid'],
            'sishaa'=>$next['sishaa'],
            'kitchenPrint'=>$next['kitchenPrint'],
            'visible'=>$next['visible'],
            'taxId'=>$next['taxId'],
            'menuGroupList'=>$next['menuGroupList'],
            'extraPrinter'=>$next['extraPrinter'],
            'extraPrinter1'=>$next['extraPrinter1'],
            'extraPrinter2'=>$next['extraPrinter2'],
            'extraPrinter3'=>$next['extraPrinter3'],
            'extraPrinter4'=>$next['extraPrinter4'],
            'uniqueId'=>$next['uniqueId'],
       ];

       $count=DB::table('pos_order_category')->where('cat_id',$next['id'])->count();

       $orderId=$next['id'];

       if($count>0){
        $updateddata=DB::table('pos_order_category')->where('cat_id',$next['id'])->update($orderparams);
        $msg="Data Updated Successfully";
       }else{
        $success=DB::table('pos_order_category')->insert($orderparams);
       }

    }
                    
    return response()->json(['status' => true,'message' => $msg]);
   
    }


    public function save_group(Request $request){

        $alldata=$request->all();

        foreach($alldata as $next){

        $parent=$next['parent'];

        $msg="Data Inserted Successfully";

        $orderparams=[
            'group_id'=>$next['id'],
            'gaeng'=>$next['gaeng'],
            'name'=>$next['name'],
            'visible'=>$next['visible'],
            'groupid'=>$next['groupid'],
            'price'=>$next['price'],
            'bonGrpEnable'=>$next['bonGrpEnable'],
            'bon'=>$next['bon'],
            'uniqueId'=>$next['uniqueId'],
            'cat_id'=>$parent['id'],
            'name_c'=>$parent['name'],
            'beverage'=>$parent['beverage'],
            'zutaten'=>$parent['zutaten'],
            'type'=>$parent['type'],
            'bon_c'=>$parent['bon'],
            'categoryid'=>$parent['categoryid'],
            'sishaa'=>$parent['sishaa'],
            'kitchenPrint'=>$parent['kitchenPrint'],
            'visible_c'=>$parent['visible'],
            'taxId'=>$parent['taxId'],
            'menuGroupList'=>$parent['menuGroupList'],
            'extraPrinter'=>$parent['extraPrinter'],
            'extraPrinter1'=>$parent['extraPrinter1'],
            'extraPrinter2'=>$parent['extraPrinter2'],
            'extraPrinter3'=>$parent['extraPrinter3'],
            'extraPrinter4'=>$parent['extraPrinter4'],
            'parent_id'=>$parent['id']
       ];

       $count=DB::table('pos_order_group')->where('group_id',$next['id'])->count();

       $groupId=$next['id'];

       if($count>0){
        $updateddata=DB::table('pos_order_group')->where('group_id',$next['id'])->update($orderparams);
        $msg="Data Updated Successfully";
       }else{
        $success=DB::table('pos_order_group')->insert($orderparams);
       }

       if(isset($next['parent'])){

        $odata=[
            'cat_id'=>$parent['id'],
            'name'=>$parent['name'],
            'beverage'=>$parent['beverage'],
            'zutaten'=>$parent['zutaten'],
            'type'=>$parent['type'],
            'bon'=>$parent['bon'],
            'categoryid'=>$parent['categoryid'],
            'sishaa'=>$parent['sishaa'],
            'kitchenPrint'=>$parent['kitchenPrint'],
            'visible'=>$parent['visible'],
            'taxId'=>$parent['taxId'],
            'menuGroupList'=>$parent['menuGroupList'],
            'extraPrinter'=>$parent['extraPrinter'],
            'extraPrinter1'=>$parent['extraPrinter1'],
            'extraPrinter2'=>$parent['extraPrinter2'],
            'extraPrinter3'=>$parent['extraPrinter3'],
            'extraPrinter4'=>$parent['extraPrinter4'],
        ];
        
       $counted=DB::table('pos_order_category')->where('cat_id',$parent['id'])->count();

       if($counted>0){
        $upddata=DB::table('pos_order_category')->where('cat_id',$parent['id'])->update($odata);
       }else{
        $sent=DB::table('pos_order_category')->insert($odata);
       }

    }

    }
                    
    return response()->json(['status' => true,'message' => $msg]);
   
    }

    public function save_item(Request $request){

        $alldata=$request->all();

        foreach($alldata as $next){

        $parent=$next['parent'];
        $grand=$next['parent']['parent'];

        $msg="Data Inserted Successfully";

        $orderparams=[
            'item_id'=>$next['id'],
            'discountRate'=>$next['discountRate'],
            'name'=>$next['name'],
            'itemId'=>$next['itemId'],
            'subitemid'=>$next['subitemid'],
            'price'=>$next['price'],
            'weight'=>$next['weight'],
            'gaenge'=>$next['gaenge'],
            'happyPrice'=>$next['happyPrice'],
            'sishaa'=>$next['sishaa'],
            'smartShank'=>$next['smartShank'],
            'beverage'=>$next['beverage'],
            'changeprice'=>$next['changeprice'],
            'discount'=>$next['discount'],
            'ausserhaus'=>$next['ausserhaus'],
            'kitchenPrint'=>$next['kitchenPrint'],
            'bon'=>$next['bon'],
            'bonEnable'=>$next['bonEnable'],
            'bonCatEnable'=>$next['bonCatEnable'],
            'menuItemModiferGroups'=>json_encode($next['menuItemModiferGroups']),
            'menuitemprice'=>json_encode($next['menuitemprice']),
            'menuitemquantity'=>json_encode($next['menuitemquantity']),
            'uniqueId'=>$next['uniqueId'],
            'tax'=>json_encode($next['tax']),
            'group_id'=>$parent['id'],
            'gid'=>$parent['id'],
            'gname'=>$parent['name'],
            'gvisible'=>$parent['visible'],
            'ggroupid'=>$parent['groupid'],
            'gprice'=>$parent['price'],
            'gbonGrpEnable'=>$parent['bonGrpEnable'],
            'gbon'=>$parent['bon'],
            'guniqueId'=>$parent['uniqueId'],
            'category_id'=>$grand['id'],
            'cid'=>$grand['id'],
            'cname'=>$grand['name'],
            'cbeverage'=>$grand['beverage'],
            'czutaten'=>$grand['zutaten'],
            'ctype'=>$grand['type'],
            'cbon'=>$grand['bon'],
            'categoryid'=>$grand['categoryid'],
            'csishaa'=>$grand['sishaa'],
            'ckitchenPrint'=>$grand['kitchenPrint'],
            'cvisible'=>$grand['visible'],
            'ctaxId'=>$grand['taxId'],
            'cmenuGroupList'=>$grand['menuGroupList'],
            'cextraPrinter'=>$grand['extraPrinter'],
            'cextraPrinter1'=>$grand['extraPrinter1'],
            'cextraPrinter2'=>$grand['extraPrinter2'],
            'cextraPrinter3'=>$grand['extraPrinter3'],
            'cextraPrinter4'=>$grand['extraPrinter4'],
       ];

       $count=DB::table('pos_order_item_details')->where('item_id',$next['id'])->count();

       $groupId=$next['id'];

       if($count>0){
        $updateddata=DB::table('pos_order_item_details')->where('item_id',$next['id'])->update($orderparams);
        $msg="Data Updated Successfully";
       }else{
        $success=DB::table('pos_order_item_details')->insert($orderparams);
       }

    }
                    
    return response()->json(['status' => true,'message' => $msg]);
   
    }

}
