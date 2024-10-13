<?php
include "../connect.php";
include '../functions.php';
$userid =filterRequest("userid");


$stmt= $con->prepare("SELECT SUM(items.item_price) as items_prices  ,  ( item_price  - ( item_price*item_discount/ 100))*COUNT(cart.cart_itemid) AS  itemprice_discount , COUNT(cart.cart_itemid)as countitems 
, cart.*,items.*   FROM cart INNER JOIN items ON items.item_id=cart.cart_itemid

WHERE cart_userid=$userid AND  cart_orders= 0
 GROUP BY cart.cart_itemid ,cart.cart_userid,cart.cart_orders");

$stmt->execute();
$datacountandprice=$stmt->fetchAll(PDO::FETCH_ASSOC);
$TotalPrice=0;
$TotalPriceOffers=0;
$TotalCount=0;

for ($i=0; $i <count($datacountandprice) ; $i++) { 
    $TotalPriceOffers += $datacountandprice[$i]['itemprice_discount'];
    $TotalPrice += $datacountandprice[$i]['items_prices'];
    $TotalCount += $datacountandprice[$i]['countitems'];

}

echo json_encode(array(

    "status"=> "success",
    "datacart"=>$datacountandprice,
    "TotapriceOffers"=>$TotalPriceOffers,
    "Totaprice"=>$TotalPrice,
    "counts"=>$TotalCount,

));
// item_price - ( item_price*item_discount/ 100)
// SELECT * FROM `cartview` WHERE ( item_price  - ( item_price*item_discount/ 100)) AS itemprice_discount 

// include "../connect.php";
// include '../functions.php';
// $userid =filterRequest("userid");
// $data =getAllData('cartview ',"cart_userid=$userid AND cart_orders= 0", null, false);
// $stmt= $con->prepare("SELECT SUM(items.item_price) as items_prices  ,  ( item_price  - ( item_price*item_discount/ 100)) AS itemprice_discount , COUNT(cart.cart_itemid)as countitems,   cart.*,items.* FROM cart 
// INNER JOIN items ON items.item_id=cart.cart_itemid

// WHERE cart_orders= 0
// GROUP BY cart.cart_itemid ,cart.cart_userid,cart.cart_orders ");

// $stmt->execute();
// $datacountandprice=$stmt->fetch(PDO::FETCH_ASSOC);
// echo json_encode(array(

//     "status"=> "success",
//     // "datacart"=>$data,
//     "countprice"=>$datacountandprice



// ));