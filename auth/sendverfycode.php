<?php
include "../connect.php";
include '../functions.php';
$email =filterRequest("email");
$verfiycode =rand(10000, 99999);
$data= array('user_verymycode'=>$verfiycode);
updateData('user',$data,"user_email= '$email'");
        // sendemail($email ,"verfiy code e-ecommerse", "verfiy Code $verfiycode");
