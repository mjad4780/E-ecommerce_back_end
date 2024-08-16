<?php


include "../connect.php";
include '../functions.php';
$userid =filterRequest("userid");

getAllData('myfavorite', "favorite_userid = '$userid'");