<?php
include "../connect.php";
include '../functions.php';


$email =filterRequest("email");

$password=sha1($_POST["password"]);

getData('user',"user_email='$email' AND  password='$password'");

