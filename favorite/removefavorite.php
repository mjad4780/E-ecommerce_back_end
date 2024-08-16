<?php


include "../connect.php";
include '../functions.php';

$id =filterRequest("id");

$userid=filterRequest('userid');
deleteData('favorite',"favorite_itemsid  ='$id' AND favorite_userid = '$userid '" );