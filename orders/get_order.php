<?php


include "../connect.php";
include '../functions.php';
$userid =filterRequest("id");

getAllData('orders', "orders_userid = '$userid'");