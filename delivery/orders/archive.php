<?php


include "../../connect.php";
include '../../functions.php';
$id =filterRequest("id");

getAllData2('SELECT   orders.*, adress.* FROM orders
INNER JOIN adress  ON adress.adress_id=  orders.orders_adress ', "1=1 AND orders_status = 4 AND orders_delivery =$id");