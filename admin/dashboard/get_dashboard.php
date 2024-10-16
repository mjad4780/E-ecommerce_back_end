<?php
include "../../connect.php";
include '../../functions.php';



$allData= [];



$sql = "SELECT items.* ,categories.*,item_price  - ( item_price*item_discount/ 100) AS itemprice_discount FROM items 
INNER JOIN categories on items.item_categories= categories.categories_id ";
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
//
$categories_id = $data[$i]['categories_id'];
$categories_name = $data[$i]['categories_name'];

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
        //
        'categories_id'=>$categories_id,
        'categories_name'=>$categories_name,

    'images'=>$images,
    'size'=>$Size,
];

    $allData[]=$itemData;
}
// echo json_encode($allData);

  $categories=  getAllData('categories',null,null, false);
  $sql = "SELECT  SUM(orders_status != 6) as TotalOrders , SUM(orders_status= 0) as TotalPending,    SUM(orders_status= 1) as TotalApprove , SUM(orders_status= 2) as TotalPrepare,SUM(orders_status= 3) as TotalShipped,SUM(orders_status= 4) as TotalDone ,SUM(orders_status= 5) as TotalCancel FROM `orders` WHERE 1 ";
$stmt =  $con->query($sql);
$stmt->execute();
$data2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode(array("status" => "success", "data" => $allData, "Categories" => $categories,

"Orders"=>$data2));

