<?php


include "../../connect.php";
include '../../functions.php';

getAllData('ordersview', "1=1  AND orders_status = 1");