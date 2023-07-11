<?php
require '../settings/connection.php';
require '../models/Product.php';
$id=$_REQUEST['product_id'];
$result = Product::destroy($id);
echo $result;
?>