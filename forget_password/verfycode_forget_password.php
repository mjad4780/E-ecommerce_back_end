
<?php

include "../connect.php";
include '../functions.php';


$email =filterRequest("email");
$verfycode=filterRequest("verfycode");
$stmt= $con->prepare("SELECT * FROM  user  WHERE user_email = '$email'  AND user_verymycode ='$verfycode'");
$stmt-> execute();
$count = $stmt-> rowCount();
result($count,' Verfycode Not Correct');
