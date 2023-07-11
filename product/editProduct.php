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
   <form class="row p-5" method="post" action="updateProduct.php">
     <input type="hidden" name="product_id" value="<?php echo $product['id']?> ">
  <div class="col-md-5">
    <label for="product_name" class="form-label">Product name</label>
    <input type="text" class="form-control" id="product_name" name="product_name" value=" <?php echo $product['product_name']?>"  required>
  </div>
  <div class="col-md-5">
    <label for="price" class="form-label">price</label>
    <input type="number" class="form-control" id="price" name="price" value="<?php echo $product['price']?>" required min="1">
  </div>
  <div class="col-md-5">
    <label for="quantity" class="form-label">quantity</label>
    <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $product['quantity']?>" required min="1">
  </div>
  <div class="col-md-5">
    <label for="brand" class="form-label">brand</label>
    <input type="text" class="form-control" id="brand" name="brand" value="<?php echo $product['brand']?>" required maxlength="7">
  </div>
<div class="col-md-5">
    <label for="color" class="form-label">color</label>
    <input type="text" class="form-control" id="color" name="color" value=" <?php echo $product['color']?>" required maxlength="50">
  </div>
<div class="col-md-5">
    <label for="size" class="form-label">size</label>
    <input type="text" class="form-control" id="size" name="size" value="<?php echo $product['size']?>" required maxlength="2">
  </div>
  <div class="col-md-6">
    <label for="description" class="form-label">description</label>
    <textarea class="form-control" id="description" name="description" rows="4" cols="50"><?php echo $product['description']?></textarea>
  </div>
  <div class="col-12">
    <button class="btn btn-primary mt-3" type="submit">Update product</button>
  </div>
</form>
 <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>