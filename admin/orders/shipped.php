<?php

include "../../connect.php";
include '../../functions.php';


$orderid =filterRequest("orderid");
$userid =filterRequest("userid");
$now =date("Y-m-d H:i:s");
$playerId =filterRequest("playerId");

$data=array(
 "orders_status"=> 3,


);
updateData("orders",$data,"orders_id =$orderid AND orders_status = 2");
// insertNotify("success", "Your order  is on the way",$userid,"users$userid","none","none");
// sendGCM("waaring", "the order has been approved by delivery","services","none","none","image");
pushNotificationId("success",'Your order  is on the way',$now,$playerId,$userid);

