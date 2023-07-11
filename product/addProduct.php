<?php
require '../settings/connection.php';
require '../models/Product.php';
if(!empty($_REQUEST)){
  Product::store($_REQUEST);
echo '<script>alert("product has been added")</script>';
}

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
<form class="row p-5" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="col-md-5">
    <label for="product_name" class="form-label">Product name</label>
    <input type="text" class="form-control" id="product_name" name="product_name" value=""  required>
  </div>
  <div class="col-md-5">
    <label for="price" class="form-label">price</label>
    <input type="number" class="form-control" id="price" name="price" value="" required min="1">
  </div>
  <div class="col-md-5">
    <label for="quantity" class="form-label">quantity</label>
    <input type="number" class="form-control" id="quantity" name="quantity" value="" required min="1">
  </div>
  <div class="col-md-5">
    <label for="brand" class="form-label">brand</label>
    <input type="text" class="form-control" id="brand" name="brand" value="" required maxlength="7">
  </div>
<div class="col-md-5">
    <label for="color" class="form-label">color</label>
    <input type="text" class="form-control" id="color" name="color" required maxlength="50">
  </div>
<div class="col-md-5">
    <label for="size" class="form-label">size</label>
    <input type="text" class="form-control" id="size" name="size" required maxlength="2">
  </div>
  <div class="col-md-6">
    <label for="description" class="form-label">description</label>
    <textarea class="form-control" id="description" name="description" rows="4" cols="50"></textarea>
  </div>
  <div class="col-12">
    <button class="btn btn-primary mt-3" type="submit" >Add product</button>
  </div>
</form>
 <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>