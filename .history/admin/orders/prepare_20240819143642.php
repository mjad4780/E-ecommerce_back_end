

<?php
include "../../connect.php";
include '../../functions.php';

$orderid =filterRequest("orderid");
$userid =filterRequest("userid");
$type =filterRequest("type");
if ($type ==0) {
    $data=array("orders_status"=> 2);
    
} else {
        $data=array("orders_status"=> 4);
            
       }

updateData("orders",$data,"orders_id =$orderid AND orders_status = 1");
// insertNotify("success", "Your order has been approved",$userid,"users$userid","none","none");
// if ($type ==0) {
//     sendGCM("waaring", "there is a order awaiting approval","delivery","none","none","image");

// }






  
