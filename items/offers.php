
<?php
include "../connect.php";
include '../functions.php';

$stmt =$con->prepare("SELECT item1view.*,1 AS favorite ,( item_price - ( item_price*item_discount/ 100)) AS itemprice_discount FROM item1view
INNER JOIN favorite ON favorite.favorite_itemsid =item1view.item_id WHERE item_discount != 0

UNION ALL 
SELECT *,0 AS favorite ,( item_price -( item_price*item_discount/ 100)) AS itemprice_discount    FROM item1view
WHERE    item_discount != 0 AND   item_id NOT IN(SELECT item1view.item_id FROM item1view
INNER JOIN favorite ON favorite.favorite_itemsid =item1view.item_id )");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();
if ( $count >0) {
    echo json_encode(array("status" => "success", "data" => $data));
}else {
    echo json_encode(array("status" => "failer",));
}