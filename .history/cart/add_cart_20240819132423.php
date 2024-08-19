
<?php
include "../connect.php";
include '../functions.php';
$itemid =filterRequest("itemid");
$userid =filterRequest("userid");
$size =filterRequest("size");
$color =filterRequest("color");

$data= array(
    'cart_itemid'=> $itemid,
    'cart_userid'=> $userid,
    'cart_size'=> $size,
    'cart_color'=> $color,



);
insertData('cart',$data);