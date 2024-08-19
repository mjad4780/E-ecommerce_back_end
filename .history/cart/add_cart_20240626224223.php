
<?php
include "../connect.php";
include '../functions.php';
$itemid =filterRequest("itemid");
$userid =filterRequest("userid");

$data= array(
    'cart_itemid'=> $itemid,
    'cart_userid'=> $userid,


);
insertData('cart',$data);