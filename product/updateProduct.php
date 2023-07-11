<?php
require '../settings/connection.php';
require '../models/Product.php';
$id = $_REQUEST['product_id'];
$product = Product::find($id);
if($_SERVER["REQUEST_METHOD"] == "POST"){
 if(!empty($_POST)){
    Product::update($_POST,$id);
    echo '<script>alert("product has been updated")</script>';
    header('Location:index.php');
 }
}
?>