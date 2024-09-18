<?php


include "../connect.php";
include '../functions.php';
$allData= [];

$userid =filterRequest("userid");

// getAllData2('
// SELECT favorite.* ,items.* ,user.user_id FROM favorite
// INNER JOIN user ON user.user_id =favorite.favorite_userid
// INNER JOIN items ON items.item_id =favorite.favorite_itemsid', "favorite_userid = '$userid'");



$home ="SELECT favorite.* ,items.* ,user.user_id,( item_price - ( item_price*item_discount/ 100)) AS itemprice_discount,1 AS favorite, 1 AS Notfavorite  FROM favorite
INNER JOIN user ON user.user_id =favorite.favorite_userid
INNER JOIN items ON items.item_id =favorite.favorite_itemsid WHERE
favorite_userid =$userid";


$product=[];

$stmt =  $con->query($home);

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
    'favorite'=>$data[$i]['favorite'],
    'itemprice_discount'=>$data[$i]['itemprice_discount'],
    'Notfavorite'=>$data[$i]['Notfavorite'],
    'images'=>$images,
    'size'=>$Size,
];
$product['data'][]=$itemData;


}
$allData['item1view']=$product;




echo json_encode($allData);