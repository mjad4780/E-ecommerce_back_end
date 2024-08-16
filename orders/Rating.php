<?php

include "../connect.php";
include '../functions.php';


$orderid =filterRequest("id");
$orderRating =filterRequest("rating");
$orderRatingComment =filterRequest("comment");


$data=  array(
"orders_rating"=>$orderRating,
"orders_rating_commint"=>$orderRatingComment
) ;
updateData('orders',$data,"orders_id =$orderid");