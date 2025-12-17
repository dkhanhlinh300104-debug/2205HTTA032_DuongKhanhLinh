<?php
require_once "db.php";
$db = new DbHelper();
$sql = "SELECT p.id, p.name, p.price, p.description, c.name AS category 
        FROM products p 
        JOIN categories c ON p.catid = c.id";
$products = $db->select($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>List of Products</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container p-3">
  <div class="card">
    <div class="card-header text-center text-primary">
      <h3>Product List</h3>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Category</th>
          <th>Price</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
        <?php foreach ($products as $p): ?>
        <tr>
          <td><?= $p->id ?></td>
          <td><?= $p->name ?></td>
          <td><?= $p->category ?></td>
          <td><?= $p->price ?></td>
          <td><?= $p->description ?></td>
          <td>
            <a href="updateproduct.php?id=<?= $p->id ?>" class="btn btn-sm btn-outline-warning">Edit</a>
            <a href="deleteproduct.php?id=<?= $p->id ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this product?')">Delete</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </table>
      <a href="newproduct.php" class="btn btn-primary">+ Add Product</a>
    </div>
  </div>
</div>
</body>
</html>
