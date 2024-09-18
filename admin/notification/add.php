<?php

include "../../connect.php";
include '../../functions.php';


$title =filterRequest("title");
$body =filterRequest("body");
$image =filterRequest("image");
$now =date("Y-m-d H:i:s");

sendMessage($title,$body,$image,$now,);
    
function sendMessage($title,$body,$image,$now,){
    global $con;

    $headings = array(
        "en" => $title // عنوان الإشعار
    );
    $content = array(
        "en" =>$body
        );

    $fields = array(
        'app_id' => "9c37a804-6bb8-4055-96f4-a56308ae8b63",
        // "include_player_ids"=>array("2bbb5b65-5cd4-4fc7-bbfb-ee58659c8674") , // هنا يتم تحديد المستخدم بواسطة Device Token
        'included_segments' => array('All'),
        'data' => array("foo" => "bar"),
        'large_icon' =>"ic_launcher_round.png",
        'headings'=>$headings,
        'contents' => $content,
        'big_picture' => $image,  // الصورة الكبيرة للإشعار في Android

    );

    $fields = json_encode($fields);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                               'Authorization: Basic YTBiZmZhY2QtYjJkYS00Zjc4LWI5MWUtMTg2MTA0ZTJkNzhh'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    

    $response = curl_exec($ch);
$data=json_decode($response,true);
// echo json_encode($dd);

// echo $dd['id'];

    $stmt=$con->prepare("INSERT INTO `notification`(`notification_all`, `notification_title`, `notification_body`,`notification_image`,`notification_datetime`,`notification_id_signal`) VALUES (1,?,?,?,?,?)");
   $stmt->execute(array($title,$body,$image,$now,$data['id']));
   $count =$stmt->rowCount();
   curl_close($ch);

   result($count,'Sorry try agin')   ;


}















// insertNotifyimage($title,$body,'1','all','none','none',$image,$now);


