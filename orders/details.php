<?php


include "../connect.php";
include '../functions.php';
$product = [];
$product['status']="success";

$orderid =filterRequest("id");


$sql = "SELECT SUM(items.item_price) as items_prices  ,  ( item_price  - ( item_price*item_discount/ 100)) AS itemprice_discount , COUNT(cart.cart_itemid)as countitems,cart.*,items.*,orders.*   FROM cart    
INNER JOIN items ON items.item_id = cart.cart_itemid
INNER JOIN orders ON orders.orders_id=cart.cart_orders
WHERE cart_orders =$orderid
GROUP BY cart.cart_itemid ,cart.cart_userid,cart.cart_orders ";
$stmt =  $con->query($sql);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
// echo json_encode($data);

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
       $items_prices= $data[$i]['items_prices'];
    $itemprice_discount=$data[$i]['itemprice_discount'];
    $countitems=$data[$i]['countitems'];
    $cart_id=$data[$i]['cart_id'];
    $cart_itemid=$data[$i]['cart_itemid'];
    $cart_userid=$data[$i]['cart_userid'];
    $cart_orders=$data[$i]['cart_orders'];
    $cart_size=$data[$i]['cart_size'];
    $cart_color=$data[$i]['cart_color'];
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

$itemData=array(
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
    "items_prices"=> $items_prices,
    "itemprice_discount"=>$itemprice_discount,
    "countitems"=>$countitems,
    "cart_id"=>$cart_id,
    "cart_itemid"=>$cart_itemid,
    "cart_userid"=>$cart_userid,
    "cart_orders"=>$cart_orders,
    'cart_size'=> $cart_size,
    'cart_color'=> $cart_color,
    'images'=>$images,
    'size'=>$Size,
);
$product ['data'][]= $itemData;

}

echo json_encode($product);