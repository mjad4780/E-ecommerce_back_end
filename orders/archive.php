<?php


include "../connect.php";
include '../functions.php';
$userid =filterRequest("id");

getAllData('ordersview', "orders_userid = '$userid' AND orders_status = 4");