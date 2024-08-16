<?php

include "../../connect.php";
include '../../functions.php';


$userid =filterRequest("userid");
$title =filterRequest("title");
$body =filterRequest("body");
$now =date("Y-m-d H:i:s");
$imagename= imageUpload("../../upload/notefication","file");









$data= array(
    "notification_title"=>$title,
    "notification_body"=>$body,
    "notification_image"=>$imagename,
    "notification_datetime"=>$now,
    "notification_userid"=>$userid,


        );
        insertData("notification", $data);
