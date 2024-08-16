

<?php

include "connect.php";
include 'functions.php';


$product = [];

$sql = "SELECT * FROM `items`";
$stmt =  $con->query($sql);

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
for ($i=0; $i <count($data) ; $i++) { 
    $item_id =  $data[$i]['item_id'];
    $item_name = $data[$i]['item_name'];
    $item_name_ar = $data[$i]['item_name_ar'];
    $item_decs = $data[$i]['item_decs'];
    $item_decs_ar = $data[$i]['item_decs_ar'];
    $item_image = $data[$i]['item_image'];
    $item_count = $data[$i]['item_count'];
    $item_active = $data[$i]['item_active'];
    $item_price = $data[$i]['item_price'];
    $item_discount = $data[$i]['item_discount'];
    $item_i = $data[$i]['item_data'];
    $item_categories = $data[$i]['item_categories'];

    $images = [];
    $Size = [];

$sql = "SELECT  `detailas_image`, `detailas_size`, `quantity`, `color`  FROM detailas WHERE item_deitalis = '$item_id'";
$result =  $con->query($sql);


$ff=$result->fetchAll(PDO::FETCH_ASSOC);

    foreach ($ff as $index) {
        $image_url = $index['detailas_image'];
        $detailas_size = $index['detailas_size'];
        $quantity = $index['quantity'];
        $color = $index['color'];

        $images[]=['image'=>$image_url];
        $Size[]=['size'=>$detailas_size,'quantity'=>$quantity,'color'=>$color];
    }

$itemData=[
    'item_id' => $item_id,
    'item_name' => $item_name,
    'item_name_ar' => $item_name_ar,
    'item_decs' => $item_decs,
    'item_decs_ar' => $item_decs_ar,
    'item_image' => $item_image,
    'item_count' => $item_count,
    'item_active' => $item_active,
    'item_price' => $item_price,
    'item_discount' => $item_discount,
    'item_data' => $item_i,
    'item_categories' => $item_categories,
    'images'=>$images,
    'size'=>$Size
];

    $product[]=$itemData;
}
echo json_encode($product);