<?php

include "../../connect.php";
include '../../functions.php';


$title =filterRequest("title");
$body =filterRequest("body");

$imagename= imageUpload("../../upload/poster","file");

$data= array(
    "setting_title"=>$title,
    "setting_body"=>$body,
    "setting_image"=>$imagename,
    "setting_datedelvery"=>30,
    
        );

        insertData("setting", $data);


