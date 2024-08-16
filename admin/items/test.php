<?php
include "../../connect.php";
include '../../functions.php';

$imageNames=array();
$imageold=filterRequest("old");

$color=filterRequest("color");
$size=filterRequest("size");
$quantity=filterRequest("quantity");

if (is_string($imageold)) {
  $imageolds =explode(',',$imageold);
}
$imageNames['detailas_image']=$imageolds;

if (is_string($color)) {
  $Colors =explode(', ',$color);
}
$imageNames['color']=$Colors;

if (is_string($size)) {
    $sizes =explode(', ',$size);
  }
$imageNames['detailas_size']=$sizes;
$imageNames['quantity']=$quantity;


addListDetailas('color',$imageNames,$id);
addListDetailas('detailas_size',$imageNames,$id);
addListDetailas('detailas_image',$imageNames,$id);

echo json_encode(array("status" => "success"));












  //  for ($i=0; $i < count($imageNames); $i++) { 
  // // foreach ($imageNames as $index) {

  //   $data=array(
  //     "item_deitalis"=>$id,
  //     "detailas_image"=>$imageNames['image'][$i],
  //     "color"=>$imageNames['color'][$i],
  //     "detailas_size"=>$imageNames['size'][$i],
  //     "quantity"=>$imageNames['quantity'],
  //     );
  //     insertData('detailas',$data);  }





/////////////////EditListDetailas//////////
// EditListDetailas('color',$imageNames,$id);
// EditListDetailas('detailas_size',$imageNames,$id);
// function EditListDetailass($String,$imageNames,$id){
//     global $con;
//     foreach ($imageNames[$String] as $index => $value) {
//         $C=$value;
        
//         $stmt= $con->prepare(" SELECT * FROM detailas WHERE $String = ? AND item_deitalis =? ");
//         $stmt-> execute(array($C ,$id));
//         $count = $stmt-> rowCount();
//         if ($count > 0) {
//             echo 'success';
//         }else{
//         $data=array(
//         $String=>$C,
//         'item_deitalis'=>$id,
//         "quantity"=>$imageNames['quantity'],
//         );
//             insertData('detailas',$data);
      
//         }
//         }
// }


// $data=array(
//  "color"=> $imageNames['color'][$index],
//     );
//                 updateData('detailas',$data,"item_deitalis='$id'");


//////////edit/////

// $imageNames=array();



// $Image= imagesUploads('../../upload/item','images');
// $imageNames['image'] =$Image;
// $old=filterRequest2("imageold");
// $color=filterRequest("color");

// if (is_string($old)) {
//         $imageold =explode(', ',$old);
// }
// if (is_string($color)) {
//   $oldcolr =explode(', ',$color);
// }
// echo json_encode()
// $imageNames['imageold'] =$imageold;
// $imageNames['color']=$oldcolr;
// $id=64;

// if ($Image=="empty") {
      
//   foreach ($imageNames['image'] as $index => $value) {


//         $data=array(
//           "color"=> $imageNames['color'][$index],
//             );
//             updateData('detailas',$data,"item_deitalis='$id'");
//           }
//       }else {


//       foreach ($imageNames['image'] as $index => $value) {
//         deleteFile("../../upload/item",$imageNames['imageold'][$index]);
//         $data=array(
//           "detailas_image"=>$value,
//         );
            
//         $image=$imageNames['imageold'][$index];
//         updateData('detailas',$data,"detailas_image='$image'");
//       }
//       }










// $imageNames = array();
// // $imageNames['image'][] = imagesUploads('../../upload/item','images');
// $Image= imagesUploads('../../upload/item','images');
// $imageNames['image'] =$Image;
// foreach ($imageNames['image']as $index => $value) {

// //    for ($i=0; $i < count($imageNames); $i++) { 
//  $data=array(
//         "item_deitalis"=>64,
//         "detailas_image"=>$value ,

//         );
//         insertData('detailas',$data);


// }




   
























