<?php


include "../connect.php";
include '../functions.php';
$name =filterRequest("name");
$city =filterRequest("city");
$street =filterRequest("street");
$lat =filterRequest("lat");
$long =filterRequest("long");
$userid =filterRequest("userid");
$data=array(

    "adress_userid"=>$userid,
    "adress_city"=>$city,
    "adress_name"=>$name,
    "adress_street"=>$street,
    "adress_lat"=>$lat,
    "adress_long"=>$long,

);


insertData('adress',$data);