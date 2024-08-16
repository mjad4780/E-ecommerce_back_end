<?php
include "../../connect.php";
include '../../functions.php';

 $Table="categories";

$id =filterRequest("id");
$imagename =filterRequest("file");

deleteFile("../../upload/categories",$imagename);
deleteData($Table,"categories_id =$id");