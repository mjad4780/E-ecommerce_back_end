<?php
include "../connect.php";
include '../functions.php';


$email =filterRequest("email");

$password=sha1($_POST["password"]);
$data = array("password" => $password);
updateData( "user" ,$data, "user_email = '$email' AND   user_improve = '1' ");
