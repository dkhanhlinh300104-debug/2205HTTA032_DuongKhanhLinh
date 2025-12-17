<?php
require_once "db.php";
$db = new DbHelper();
$id = $_GET['id'] ?? "";
$product = $db->select("SELECT * FROM products WHERE id = ?", [$id], true);
$cats = $db->select("SELECT * FROM categories");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Product</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
  <div class="col-lg-6 mx-auto border rounded p-4 bg-light shadow">
    <h3>Edit Product</h3>
    <form method="post" action="editproduct.php?id=<?= $id ?>">
      <div class="mb-3">
        <label class="form-label">Product Name</label>
        <input type="text" name="name" value="<?= $product[0]->name ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Category</label>
        <select name="catid" class="form-select">
          <?php foreach ($cats as $c): ?>
            <option value="<?= $c->id ?>" <?= $c->id == $product[0]->catid ? 'selected' : '' ?>>
              <?= $c->name ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" name="price" value="<?= $product[0]->price ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control"><?= $product[0]->description ?></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</div>
</body>
</html>
