<?php
include "../connect.php";
include '../functions.php';


$email =filterRequest("email");

$password=sha1($_POST["password"]);

$stmt= $con->prepare("SELECT * FROM  user  WHERE user_email = '$email'  AND   user_improve = '1'");

$stmt-> execute();
$count = $stmt-> rowCount();
if ( $count>0) {


    printSuccess('okay');
    $data = array("password" => $password);
updateData( "user" ,$data, "user_email = '$email' ");


}else {
// لو كان خطا  اظهر له هذه الرساله
    printfailer(' email not fond');


}