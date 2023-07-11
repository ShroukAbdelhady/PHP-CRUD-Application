<?php
require '../settings/connection.php';
require '../models/Product.php';
$id = $_REQUEST['product_id'];
$product = Product::find($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Php Task </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">All Products</a>
                </li>
            </ul>
        </div>
    </nav>
  <div class="card" style="width: 18rem; margin: 10px;" >
  <div class="card-body">
    <h5 class="card-title">Product Name: <?php echo $product['product_name']?></h5>
    <p class="card-text"><?php echo $product['description']?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">price: <?php echo $product['price']?></li>
    <li class="list-group-item">quantity: <?php echo $product['quantity']?></li>
    <li class="list-group-item">brand: <?php echo $product['brand']?></li>
    <li class="list-group-item">color: <?php echo $product['color']?></li>
    <li class="list-group-item">size: <?php echo $product['size']?></li>
  </ul>
</div>
</table>
 <script src="../js/bootstrap.bundle.min.js"></script> 
</body>
</html>