<?php


include "../connect.php";
include '../functions.php';


$userid =filterRequest("userid");
$orders_id =filterRequest("id");

$data=array(
    "orders_status"=> 5 
   );
   updateData("orders",$data,"orders_id =$orderid AND orders_status = 0");
   insertNotify("success", "Your order Has Been deleted",$userid,"users$userid","none","none");
   sendGCM("waaring", "the order has been deleted to the custemrs","services","none","none","image");
