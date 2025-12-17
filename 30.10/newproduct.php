<?php
require_once "db.php";
$db = new DbHelper();
$cats = $db->select("SELECT * FROM categories");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>New Product</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="col-lg-5 p-3 border rounded bg-light shadow">
    <h3>New Product</h3>
    <form method="post" action="insertproduct.php" class="was-validated">
      <div class="my-3">
        <label class="form-label">Product Name</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="my-3">
        <label class="form-label">Category</label>
        <select name="catid" class="form-select">
          <?php foreach ($cats as $c): ?>
          <option value="<?= $c->id ?>"><?= $c->name ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="my-3">
        <label class="form-label">Price</label>
        <input type="number" name="price" class="form-control" required>
      </div>
      <div class="my-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
</body>
</html>
