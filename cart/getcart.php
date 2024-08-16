<?php
include "../connect.php";
include '../functions.php';
$userid =filterRequest("userid");
$data =getAllData('cartview ',"cart_userid=$userid AND cart_orders= 0", null, false);
$stmt= $con->prepare("SELECT SUM(items_prices  - ( item_price*item_discount/ 100)) as totalprice , SUM(countitems)as totalcount

  FROM `cartview` 
WHERE cartview.cart_userid=$userid
GROUP BY cart_userid ");

$stmt->execute();
$datacountandprice=$stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode(array(

    "status"=> "success",
    "datacart"=>$data,
    "countprice"=>$datacountandprice



));
// item_price - ( item_price*item_discount/ 100)
// SELECT * FROM `cartview` WHERE ( item_price  - ( item_price*item_discount/ 100)) AS itemprice_discount 