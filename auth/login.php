<?php
include "../connect.php";
include '../functions.php';


$email =filterRequest("email");

$password=filterRequest("password");

getData('user',"user_email='$email' AND  password='$password'");

