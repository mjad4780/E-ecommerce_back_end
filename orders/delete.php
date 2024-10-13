<?php


include "../connect.php";
include '../functions.php';


$userid =filterRequest("userid");
$orderid =filterRequest("id");

$data=array(
    "orders_status"=> 5 
   );
   updateData("orders",$data,"orders_id =$orderid AND orders_status = 0");

