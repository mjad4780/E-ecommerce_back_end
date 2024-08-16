<?php
include "../../connect.php";
include '../../functions.php';

 $Table="items";
$name =filterRequest("name");
$namear =filterRequest("namear");
$decs =filterRequest("decs");
$decsar =filterRequest("decsar");
$count =filterRequest("count");
$active =filterRequest("active");
$price =filterRequest("price");
$discount =filterRequest("discount");
$imagename= imageUpload("../../upload/item","file");
$itemcategories =filterRequest("itemcategories");

$data= array(
"item_name"=>$name,
"item_name_ar"=>$namear,
"item_decs"=>$decs,
"item_decs_ar"=>$decsar,
"item_image"=>$imagename,
"item_count"=>$count,
"item_active"=>$active,
"item_price"=>$price,
"item_discount"=>$discount,
"item_categories"=>$itemcategories,

);
insertData($Table,$data,false);
$id= getData("items","item_name= '$name'",true,null,);

//////////////details//////////////
$imageNames = array();

$Image= imagesUploads('../../upload/item','images');
$imageNames['detailas_image'] =$Image;
$color=filterRequest("color");
$size=filterRequest("size");

if (is_string($color)) {
  $Colors =explode(', ',$color);
}
$imageNames['color']=$Colors;

if (is_string($size)) {
    $sizes =explode(', ',$size);
  }
$imageNames['detailas_size']=$sizes;


addListDetailas('color',$imageNames,$id);
addListDetailas('detailas_size',$imageNames,$id);
addListDetailas('detailas_image',$imageNames,$id);

echo json_encode(array("status" => "success"));

  



