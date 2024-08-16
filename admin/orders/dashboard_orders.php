<?php


include "../../connect.php";
include '../../functions.php';
// $product = [];
// $product['status']="success";



$sql = "SELECT  SUM(orders_status != 6) as TotalOrders , SUM(orders_status= 0) as TotalPending,    SUM(orders_status= 1) as TotalApprove , SUM(orders_status= 2) as TotalPrepare,SUM(orders_status= 3) as TotalShipped,SUM(orders_status= 4) as TotalDone ,SUM(orders_status= 5) as TotalCancel FROM `orders` WHERE 1 ";
$stmt =  $con->query($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt-> rowCount();
if ($count > 0){
echo json_encode(array("status" => "success","data"=>$data))  ; 

   } else {
       printfailer('Sorry try agin');

   }
