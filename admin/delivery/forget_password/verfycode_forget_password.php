
<?php

include "../../../connect.php";
include '../../../functions.php';


$email =filterRequest("email");
$verfycode=filterRequest("verfycode");
$stmt= $con->prepare("SELECT * FROM  user  WHERE user_email = '$email'  AND user_verymycode ='$verfycode'");
$stmt-> execute();
$count = $stmt-> rowCount();
if ( $count>0) {
    printSuccess();
}else {
// لو كان خطا  اظهر له هذه الرساله
    printfailer(' Verfycode Not Correct');


}