

<?php
include "../../connect.php";
include '../../functions.php';

$orderid =filterRequest("orderid");
$userid =filterRequest("userid");
$type =filterRequest("type");
$now =date("Y-m-d H:i:s");
$playerId =filterRequest("playerId");

// if ($type ==0) {

    $data=array("orders_status"=> 2);


updateData("orders",$data,"orders_id =$orderid AND orders_status = 1");
pushNotificationId("success",'this order is under preparation',$now,$playerId,$userid);

// insertNotify("success", "Your order has been approved",$userid,"users$userid","none","none");
// if ($type ==0) {
//     sendGCM("waaring", "there is a order awaiting approval","delivery","none","none","image");

// }






  
