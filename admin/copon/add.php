<?php
include "../../connect.php";
include '../../functions.php';

$couponName =filterRequest("coupon");
// $now =date("Y-m-d H:i:s");
$now =filterRequest("startdata");

$endDate=filterRequest("endData");

$count =filterRequest("count");
$discount =filterRequest("discount");
$maxuser =filterRequest("maxuser");

$data= array(
    "coupon_name"=>$couponName,
    "coupon_count"=>$count,
    "coupon_data"=>$now,
    "coupon_discount"=>$discount,
    "copon_endDate"=>$endDate,
    "copon_maxuser"=>$maxuser,


        );

        insertData("coupon", $data);













