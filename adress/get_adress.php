<?php


include "../connect.php";
include '../functions.php';
$userid =filterRequest("userid");

getAllData('adress', "adress_userid = '$userid'",null);