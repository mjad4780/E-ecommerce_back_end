<?php
include "../../connect.php";
include '../../functions.php';

$Table="items";
$imageNames=array();

$id =filterRequest("id");
$color =filterRequest("color");
$size =filterRequest("size");
$quantity =filterRequest("quantity");

$Image= imagesUploads('../../upload/item','images');

$old =filterRequest("imageold1");

if (is_string($old)) {
  $imageold = explode(",", $old);
}



$imageNames['image'] =$Image;
$imageNames['var']['size']=$size;
$imageNames['var']['color']=$color;
$imageNames['var']['quantity']=$quantity;
$imageNames['imageold'] =$imageold;




if ($Image=="empty") {
  $data=array(
    "color"=> $imageNames['var']['color'],
    "quantity"=> $imageNames['var']['quantity'],
    "detailas_size"=> $imageNames['var']['size'],
      );
      updateData('detailas',$data,"item_deitalis='$id'");
}else {
  
foreach ($imageNames['image']as $index => $value) {
  deleteFile("../../upload/item",$imageNames['imageold'][$index]);
  $data=array(
    "color"=> $imageNames['var']['color'],
    "detailas_size"=>$imageNames['var']['size'],
    "quantity"=>$imageNames['var']['quantity'],
    "detailas_image"=>$value,);
      
  $image=$imageNames['imageold'][$index];
  updateData('detailas',$data,"detailas_image='$image' ");
}
}
