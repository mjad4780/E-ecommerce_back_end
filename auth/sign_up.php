<?php

include "../connect.php";
include '../functions.php';


$username =filterRequest("username");
$password =filterRequest("password");
$email =filterRequest("email");
$phone =filterRequest("phone");
$verfiycode =rand(10000, 99999);//بيختار رقم عشواءي
//اول الحاجه  نتأكد  اذا كان الايميل او تلفون متسجل قبل كده رجع خطا
 $stmt= $con->prepare(" SELECT * FROM user WHERE user_email = ? AND user_phone =? ");
 $stmt-> execute(array($email ,$phone));
 $count = $stmt-> rowCount();
 if ($count > 0) {
        //اول الحاجه  نتأكد  اذا كان الايميل او تلفون متسجل قبل كده رجع خطا
        printfailer('PHONE OR EMAIL THERE IN FIND ');
 }else{
    // لو الايميل غير غير موجود او الهاتف ضيف هذه البيانات الي قاعده البيانات
    $data= array(
        "user_name"=>$username,
        "password"=>$password,
        "user_email"=>$email,
        "user_phone"=>$phone,
        "user_verymycode"=>$verfiycode,
        
            );
        // verfiycodeهنا المفروض بعد مايدخل الشخص بياناته يبعت رساله الي ايميله يوجد فيها
        // sendemail($email ,"verfiy code e-ecommerse", "verfiy Code $verfiycode");
            insertData("user", $data);
          

 }