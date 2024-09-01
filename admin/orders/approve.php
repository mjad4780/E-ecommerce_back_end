

<?php

include "../../connect.php";
include '../../functions.php';


$orderid =filterRequest("orderid");
$userid =filterRequest("userid");
$now =date("Y-m-d H:i:s");
$playerId =filterRequest("playerId");

$data=array(
 "orders_status"=> 1

);
updateData("orders",$data,"orders_id =$orderid AND orders_status = 0");
// insertNotify("success", "the order Has been Approved",$userid,"users$userid","none","none");
pushNotificationId("success",'the order Has been Approved',$now,$playerId,$userid);


  
