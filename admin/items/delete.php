<?php
include "../../connect.php";
include '../../functions.php';

 $Table="items";

$id =filterRequest("id");
$imagename =filterRequest("file");

deleteFile("../../upload/item",$imagename);
deleteData($Table,"item_id =$id");