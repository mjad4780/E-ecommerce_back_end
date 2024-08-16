<?php
include "../../connect.php";
include '../../functions.php';

 $Table="categories";

$name =filterRequest("name");
$namear =filterRequest("namear");
$imagename= imageUpload("../../upload/categories","file");

$data= array(
"categories_name"=>$name,
"categories_name_ar"=>$namear,
"categories_Image"=>$imagename,


);
insertData($Table,$data);

