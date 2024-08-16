<?php

include "../connect.php";
include '../functions.php';


$userid =filterRequest("userid");
$adressid =filterRequest("adressid");
$ordertype =filterRequest("ordertype");
$pricedelivery =filterRequest("pricedelivery");
$orderprice =filterRequest("orderprice");
$couponid =filterRequest("couponid");
$paymentmethod =filterRequest("paymentmethod");
$coupondiscount =filterRequest("coupondiscount");
if ($ordertype =='1') {
$pricedelivery =0;
}

$TotalPrice =$orderprice+$pricedelivery;
$now =date("Y-m-d H:i:s");
$checkcoupon=getData('coupon',"coupon_id ='$couponid'  AND coupon_data <'$now' AND copon_endDate >'$now'  AND coupon_count > 0  AND copon_maxuser > 0 ",false,null,false);
// getData('coupon',"coupon_id ='$couponid' AND  coupon_data <'$now' AND coupon_count > 0 ", null,false);
if ($checkcoupon > 0) {
 $TotalPrice =$TotalPrice -($TotalPrice*$coupondiscount /100);  
 $stmt= $con->prepare("UPDATE `coupon` SET `coupon_count`=`coupon_count`-1 WHERE coupon_id ='$couponid'");
 $stmt->execute();
}

$data= array(
"orders_userid"=> $userid,
"orders_adress"=> $adressid,
"orders_type"=> $ordertype,
"orders_pricedelivery"=> $pricedelivery,
"orders_price"=> $orderprice,
"orders_coupon"=> $couponid,
"order_Toatalprice"=>$TotalPrice,
"orders_paymentmets"=> $paymentmethod
);


$count= insertData("orders",$data, false);
if ($count >0) {
$stmt =$con->prepare("SELECT MAX(orders_id) from orders") ;
$stmt->execute();
$maxid= $stmt->fetchColumn();
$data= array( "cart_orders"=> $maxid);
updateData('cart', $data ,"cart_userid =$userid  AND cart_orders= 0");
}else {
    echo 'bbbbbbbbbbbbbbbbbbb';
}