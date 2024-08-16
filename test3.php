
<?php

include "connect.php";
include 'functions.php';



// $imageNames = array();
// $imageNames2 = imageUpload("../../upload/item", "file2");
// $imageNames3 = imageUpload("../../upload/item", "file3");
    // foreach ($imageNames as $index) {

        $data=array(
            "detailas_image"=>$imagename,
            );
            insertData('detailas',$data);









  

// function imageUpload2($dir, $imageRequest) {







    
//     global $msgError;
//     $results = []; // Array to store upload results
  
//     if (isset($imageRequest) && is_array($imageRequest)) {
//       foreach ($imageRequest['name'] as $key => $imageName) { // Iterate through each image
//         $imagename = rand(1000, 10000) . $imageName;
//         $imagetmp = $imageRequest['tmp_name'][$key];
//         $imagesize = $imageRequest['size'][$key];
//         $allowExt = array("jpg", "png", "gif", "mp3", "pdf");
//         $strToArray = explode(".", $imagename);
//         $ext = end($strToArray);
//         $ext = strtolower($ext);
  
//         $msgError = ""; // Reset error message for each image
  
//         if (!empty($imagename) && !in_array($ext, $allowExt)) {
//           $msgError = "EXT";
//         } 
//         if ($imagesize > 2 * MB) {
//           $msgError = "size";
//         }
  
//         if (empty($msgError)) {
//           move_uploaded_file($imagetmp, $dir . "/" . $imagename);
//           $results[] = $imagename; // Add successful filename to results
//         } else {
//           $results[] = $msgError; // Add error message to results
//         }
//       }
//       return $results; // Return array of upload results
//     } else {
//       return ["empty"]; // Return empty array if no images provided
//     }
//   }








































///////////success
// $sizes = filterRequest("sizes"); 

// $colors = filterRequest("colors");

// if (is_string($sizes)) {
//   $sizes2 = explode(",", $sizes);
// }



// if (is_string($colors)) {
//     $colors2 = explode(",", $colors);
//   }
  
//   $data2 = array(
//     "item_sizes" => $sizes2,
//     "item_colors" => $colors2,
//   );

// for ($i=0; $i < count($data2); $i++) { 
//   $data=array(
//     "color"=>$data2['item_colors'][$i] ,
//     "detailas_size"=>$data2['item_sizes'][$i],
//     );
//     insertData('detailas',$data,false);}
