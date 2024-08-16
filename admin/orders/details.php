<?php


include "../../connect.php";
include '../../functions.php';
$id =filterRequest("id");

getAllData('ordersdetailasview', "cart_orders =$id");