<?php
include "../connect.php";
include '../functions.php';
$userid =filterRequest("userid");



$stmt2= $con->prepare("SELECT cart.*,items.* FROM cart 
INNER JOIN items ON items.item_id=cart.cart_itemid
WHERE cart_userid=$userid AND cart_orders= 0
GROUP BY cart.cart_itemid ,cart.cart_userid") ;





$stmt2->execute();
$data = $stmt2->fetchAll(PDO::FETCH_ASSOC);





$stmt= $con->prepare("SELECT SUM(items.item_price) as items_prices  ,  ( item_price  - ( item_price*item_discount/ 100)) AS itemprice_discount , COUNT(cart.cart_itemid)as countitems  FROM cart INNER JOIN items ON items.item_id=cart.cart_itemid

WHERE cart_userid=$userid AND  cart_orders= 0
 GROUP BY cart.cart_itemid ,cart.cart_userid,cart.cart_orders");

$stmt->execute();
$datacountandprice=$stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode(array(

    "status"=> "success",
    "datacart"=>$data,
    "countprice"=>$datacountandprice

    // cart\getcart.php

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