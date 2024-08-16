<?php


include "../connect.php"; 
include '../functions.php';
$id =filterRequest("id");
$name =filterRequest("name");
$city =filterRequest("city");
$street =filterRequest("street");
$lat =filterRequest("lat");
$long =filterRequest("long");
$userid =filterRequest("userid");
$data=array(
    "adress_city"=>$city,
    "adress_name"=>$name,
    "adress_street"=>$street,
    "adress_lat"=>$lat,
    "adress_long"=>$long,
);


updateData('adress',$data,"adress_id='$id 'AND adress_userid='$userid'");