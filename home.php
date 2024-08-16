<?php
include 'connect.php';
include 'functions.php';


$allData= array();


$allData['status']="success";

$setting= getAllData("setting",null,null, false);
$allData['setting']=$setting;


$categories= getAllData("categories",null,null, false);
$allData['categories']= $categories;


$productone=[];

$sql = "SELECT * FROM `itemtopselling` WHERE 1=1 ORDER BY countorders DESC  ";
$stmt =  $con->query($sql);

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

for ($i=0; $i <count($data) ; $i++) { 
    $item_id =  $data[$i]['item_id'];
    $images = [];
    $Size = [];

$sql = "SELECT * FROM `detailas`WHERE item_deitalis = '$item_id'";
$result =  $con->query($sql);


$ff=$result->fetchAll(PDO::FETCH_ASSOC);

    foreach ($ff as $index) {
    $images[] = $index['detailas_image'];
        $detailas_size = $index['detailas_size'];
        $quantity = $index['quantity'];
        $color = $index['color'];
        $id = $index['detailas_id'];

        $Size[]=[  'id'=>$id , 'size'=>$detailas_size,'quantity'=>$quantity,'color'=>$color];
    }

$itemData=[
    'item_id' => $item_id,
    'item_name' => $data[$i]['item_name'],
    'item_name_ar' => $data[$i]['item_name_ar'],
    'item_decs' => $data[$i]['item_decs'],
    'item_decs_ar' => $data[$i]['item_decs_ar'],
    'item_image' => $data[$i]['item_image'],
    'item_count' => $data[$i]['item_count'],
    'item_active' => $data[$i]['item_active'],
    'item_price' => $data[$i]['item_price'],
    'item_discount' => $data[$i]['item_discount'],
    'item_data' => $data[$i]['item_data'],
    'item_categories' => $data[$i]['item_categories'],
    "itemprice_discount"=>$data[$i]['itemprice_discount'],
    "countorders"=>$data[$i]['countorders'],
    "cart_id"=>$data[$i]['cart_id'],
    "cart_itemid"=>$data[$i]['cart_itemid'],
    "cart_userid"=>$data[$i]['cart_userid'],
    "cart_orders"=>$data[$i]['cart_orders'],
    'images'=>$images,
    'size'=>$Size,
];
$productone[]=$itemData;


}

$allData['itemtopselling']=$productone;

$product=[];
$sql = "SELECT * FROM `item1view` WHERE item_discount != 0  ";
$stmt =  $con->query($sql);

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

for ($i=0; $i <count($data) ; $i++) { 
    $item_id =  $data[$i]['item_id'];
    $images = [];
    $Size = [];

$sql = "SELECT * FROM `detailas`WHERE item_deitalis = '$item_id'";
$result =  $con->query($sql);


$ff=$result->fetchAll(PDO::FETCH_ASSOC);

    foreach ($ff as $index) {
    $images[] = $index['detailas_image'];
        $detailas_size = $index['detailas_size'];
        $quantity = $index['quantity'];
        $color = $index['color'];
        $id = $index['detailas_id'];

        $Size[]=[  'id'=>$id , 'size'=>$detailas_size,'quantity'=>$quantity,'color'=>$color];
    }

$itemData=[
    'item_id' => $item_id,
    'item_name' => $data[$i]['item_name'],
    'item_name_ar' => $data[$i]['item_name_ar'],
    'item_decs' => $data[$i]['item_decs'],
    'item_decs_ar' => $data[$i]['item_decs_ar'],
    'item_image' => $data[$i]['item_image'],
    'item_count' => $data[$i]['item_count'],
    'item_active' => $data[$i]['item_active'],
    'item_price' => $data[$i]['item_price'],
    'item_discount' => $data[$i]['item_discount'],
    'item_data' => $data[$i]['item_data'],
    'item_categories' => $data[$i]['item_categories'],
    'images'=>$images,
    'size'=>$Size,
];
$product[]=$itemData;


}
$allData['item1view']=$product;


echo json_encode($allData);
