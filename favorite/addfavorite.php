<?php


include "../connect.php";
include '../functions.php';
$itemid =filterRequest("id");
$userid =filterRequest("userid");
$data=array(

    "favorite_itemsid"=>$itemid,
    "favorite_userid"=>$userid,
);


insertData('favorite',$data);