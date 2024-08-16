<?php
include "../../connect.php";
include '../../functions.php';


$email =filterRequest("email");

$password=sha1($_POST["password"]);

getData('admin','Admin_email = ?  AND  password =? ',array($email,$password));

