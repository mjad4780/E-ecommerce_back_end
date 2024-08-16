<?php
include "../../connect.php";
include '../../functions.php';

 $Table="categories";
 $id =filterRequest("id");
$name =filterRequest("name");
$namear =filterRequest("namear");
$imageold =filterRequest("imageold");

$imagename= imageUpload("../../upload/categories","file");
if ($imagename=="empty") {
    $data= array(
        "categories_name"=>$name,
        "categories_name_ar"=>$namear
        );
}else {
    deleteFile("../../upload/categories",$imageold);
    $data= array(
        "categories_name"=>$name,
        "categories_name_ar"=>$namear,
        "categories_Image"=>$imagename,
        );}

updateData($Table,$data,"categories_id= $id");