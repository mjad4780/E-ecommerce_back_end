<?php
include "../connect.php";
include '../functions.php';


$email =filterRequest("email");
$verymycode =rand(10000, 99999);//بيختار رقم عشواءي
$stmt= $con->prepare("SELECT * FROM  user  WHERE user_email = '$email'  AND   user_improve = 1");
$stmt-> execute();
$count = $stmt-> rowCount();
if ( $count>0) {
    $data = array("user_verymycode" => $verymycode);
    updateData( "user" ,$data, "user_email = '$email' ");
    // sendemail($email ,"verfiy code e-ecommerse", "verfiy Code $verfiycode");
}else {
// لو كان خطا  اظهر له هذه الرساله
    printfailer(' email not fond');

}