<?php
require '../settings/connection.php';
require '../models/Product.php';
$products = Product::get();
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
                    <a class="nav-link" href="addproduct.php">Add product</a>
                </li>
            </ul>
        </div>
    </nav>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th  colspan="3"> Actions </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($products['data'] as $product):?>
    <tr>  
      <th scope="row"><?php echo $product['id']?></th>
      <td><?php echo $product['product_name']?></td>
      <td><?php echo $product['price']?></td>
      <td> <form action="showProduct.php">
        <input type="hidden" name="product_id" value="<?php echo $product['id']?> ">
        <button class="btn btn-success"> Show Details</button>
      </form>
      </td>
      <td>
        <form action="editProduct.php">
        <input type="hidden" name="product_id" value="<?php echo $product['id']?> ">
        <button class="btn btn-primary"> Edit Product</button>
      </form>
      </td>
      <td>
        <button  class="delete-product btn btn-danger" data-product-id='<?php echo $product['id']?>'> Delete Product </button>
      </td>
    </tr>
     <?php endforeach ?>
  </tbody>
</table>
<?php if($products['total_pages']>1):?>
   <?php for ($page = 1; $page <= $products['total_pages'] ; $page++):?>
            <a type="button" class="btn btn-primary" href='<?php echo "?page=$page"; ?>'>
            <?php  echo $page; ?>
        </a>
    <?php endfor; ?>
    <?php endif; ?>
 <script src="../js/product.js"></script>
 <script src="../js/bootstrap.bundle.min.js"></script>

</body>
</html>
