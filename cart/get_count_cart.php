<?php
include "../connect.php";
include '../functions.php';
$itemid =filterRequest("itemid");
$userid =filterRequest("userid");
$stmt=$con->prepare(" SELECT COUNT(cart.cart_id) as countitems FROM `cart` WHERE cart_itemid=$itemid AND cart_userid=$userid AND cart_orders= 0 ");
$stmt->execute();
$count = $stmt-> rowCount();
$data= $stmt-> fetchColumn();

if ( $count >0) {

        echo json_encode(array("status" => "success", "data" => $data));
        } else {
            printfailer('Not count');
        }