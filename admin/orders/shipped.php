<?php

include "../../connect.php";
include '../../functions.php';


$orderid =filterRequest("orderid");
$userid =filterRequest("userid");

$data=array(
 "orders_status"=> 3,


);
updateData("orders",$data,"orders_id =$orderid AND orders_status = 2");
insertNotify("success", "Your order  is on the way",$userid,"users$userid","none","none");
sendGCM("waaring", "the order has been approved by delivery","services","none","none","image");
