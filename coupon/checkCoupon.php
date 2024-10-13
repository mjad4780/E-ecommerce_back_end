<?php
include "../connect.php";
include '../functions.php';

$couponName =filterRequest("coupon");
$now =date("Y-m-d H:i:s");
$orderprice =filterRequest("orderprice");

// getData('coupon',"coupon_name='$couponName' AND coupon_data <'$now' AND copon_endDate >'$now'  AND coupon_count > 0  AND copon_maxuser > 0 ");
//  getData('coupon',"coupon_id ='$couponid' AND  coupon_data <'$now' AND coupon_count > 0 ", null,false);


//  $check=getData('coupon',"coupon_name ='$couponName'  AND coupon_data <'$now' AND copon_endDate >'$now'  AND coupon_count > 0  AND copon_maxuser > 0 ",);
 $stmt= $con->prepare("SELECT * FROM  coupon  WHERE coupon_name ='$couponName'  AND coupon_data <'$now' AND copon_endDate >'$now'  AND coupon_count > 0  AND copon_maxuser > 0 ");

 $stmt-> execute();
 $data = $stmt->fetch(PDO::FETCH_ASSOC);

 $count = $stmt-> rowCount();
 if ( $count>0) {
        $TotalPrice =$orderprice -($orderprice*$data['coupon_discount'] /100);  
        $stmt= $con->prepare("UPDATE `coupon` SET `coupon_count`=`coupon_count`-1 WHERE coupon_name ='$couponName'");
        $stmt->execute();
        echo json_encode(array("TotalPrice" =>$TotalPrice, "data" =>   $data));

       }else{
        printfailer('This Coupon No Working');
       }


  
 

