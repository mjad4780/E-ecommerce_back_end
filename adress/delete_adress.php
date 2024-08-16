<?php


include "../connect.php";
include '../functions.php';

$id =filterRequest("id");

deleteData('adress',"adress_id  ='$id'" );