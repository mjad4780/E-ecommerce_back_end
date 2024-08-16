
<?php
include "../connect.php";
include '../functions.php';
$itemid =filterRequest("itemid");
$userid =filterRequest("userid");
deleteData('cart', "cart_id =(SELECT cart_id FROM cart WHERE cart_itemid=$itemid AND cart_userid=$userid AND cart_orders= 0 LIMIT 1 )");