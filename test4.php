


<?php

include "connect.php";
include 'functions.php';



$stmt= $con->prepare("SELECT items.* ,detailas.*  FROM detailas
INNER JOIN items ON items.item_id= detailas.item_deitalis");
 $stmt-> execute();
 $data = $stmt->fetch(PDO::FETCH_ASSOC);
 $count  = $stmt->rowCount();
$image=array();
 foreach ( $data as $index) {
$image[]=$index['detailas_image'];
$detailas_size[]=$index['detailas_size'];
$color[]=$index['color'];
$quantity[]=$index['quantity'];

$item=array(
    ''
);

}
 echo json_encode(array("status" => "success", "data" => $data));

//  echo json_encode(array("status" => "success", "data" => $image));

//  echo json_encode(array("status" => "success", "data" => $detailas_size));
//  echo json_encode(array("status" => "success", "data" => $color));
//  echo json_encode(array("status" => "success", "data" => $quantity));
