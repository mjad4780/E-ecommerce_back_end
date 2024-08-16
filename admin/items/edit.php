<?php
include "../../connect.php";
include '../../functions.php';

$Table="items";
$imageNames=array();

$id =filterRequest("id");

$name =filterRequest("name");
$namear =filterRequest("namear");
$decs =filterRequest("decs");
$decsar =filterRequest("decsar");
$count =filterRequest("count");
$active =filterRequest("active");
$price =filterRequest("price");
$discount =filterRequest("discount");
$itemcategories =filterRequest("itemcategories");
$imagename= imageUpload("../../upload/item","file");
$imageold1 =filterRequest("imageold1");
// $id=filterRequest("id");
$Image= imagesUploads('../../upload/item','images');
$imageNames['image'] =$Image;
$old=filterRequest("imageold");
$size=filterRequest("size");
$color=filterRequest("color");
 if (is_string($old)) {
      $imageold = explode(", ", $old);
    }

    
if (is_string($color)) {
  $oldcolr =explode(', ',$color);
}

if (is_string($size)) {
    $oldsize =explode(', ',$size);
  }
  $imageNames['detailas_size']=$oldsize;
  $imageNames['color']=$oldcolr;
  $imageNames['imageold'] =$imageold;

if ($imagename=="empty") {
    $data= array(
        "item_name"=>$name,
        "item_name_ar"=>$namear,
        "item_decs"=>$decs,
        "item_decs_ar"=>$decsar,
        "item_count"=>$count,
        "item_active"=>$active,
        "item_price"=>$price,
        "item_discount"=>$discount,
        "item_categories"=>$itemcategories
        );
}else {
    deleteFile("../../upload/item",$imageold1);
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
        "item_categories"=>$itemcategories
        );

}
updateData($Table,$data,"item_id= $id",false);
EditListDetailas('color',$imageNames,$id);
EditListDetailas('detailas_size',$imageNames,$id);
if ($Image=="empty") {
// echo 'emptyyyyyyyyyy';
}else {

foreach ($imageNames['image']as $index => $value) {

  deleteFile("../../upload/item",$imageNames['imageold'][$index]);
  $data=array(
    "detailas_image"=>$value,);
      
  $image=$imageNames['imageold'][$index];
  updateData('detailas',$data,"detailas_image='$image'AND item_deitalis='$id' ",false);
}
}
echo json_encode(array("status" => "success"));






