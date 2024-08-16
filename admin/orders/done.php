

<?php

include "../../connect.php";
include '../../functions.php';


$orderid =filterRequest("orderid");
$userid =filterRequest("userid");
$data=array(
 "orders_status"=> 4

);
updateData("orders",$data,"orders_id =$orderid AND orders_status = 3");
// insertNotify("success", "Your order Has Been delivery",$userid,"users$userid","none","none");
// sendGCM("waaring", "the order has been delivery to the custemrs","services","none","none","image");


  
