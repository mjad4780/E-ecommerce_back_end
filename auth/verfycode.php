
<?php

include "../connect.php";
include '../functions.php';


$email =filterRequest("email");

$verfycode=filterRequest("verfycode");

$stmt= $con->prepare("SELECT * FROM  user  WHERE user_email = '$email'  AND user_verymycode ='$verfycode'");

$stmt-> execute();
$count = $stmt-> rowCount();
if ( $count>0) {
    //لو الايميل هو نفسه 
    // وخليها 1user_improve عدل علي قيمه
$data = array("user_improve" => "1");
updateData( "user" ,$data, "user_email = '$email' ");

}else {
// لو كان خطا  اظهر له هذه الرساله
    printfailer(' Verfycode Not Correct');


}