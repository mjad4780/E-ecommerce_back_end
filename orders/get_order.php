<?php


include "../connect.php";
include '../functions.php';
$userid =filterRequest("id");


getAllData2("SELECT  orders.*,  adress.* FROM orders
INNER JOIN adress  ON adress.adress_id=  orders.orders_adress AND  adress.adress_userid='$userid'");


