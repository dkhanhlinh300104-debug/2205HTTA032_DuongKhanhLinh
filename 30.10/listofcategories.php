<?php
require_once "db.php";
$db = new DbHelper();
$categories = $db->select("SELECT * FROM categories");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>List of Categories</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container p-3">
  <div class="card">
    <div class="card-header text-center text-primary">
      <h3>Category List</h3>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Branch</th>
          <th>Action</th>
        </tr>
        <?php foreach ($categories as $c): ?>
        <tr>
          <td><?= $c->id ?></td>
          <td><?= $c->name ?></td>
          <td><?= $c->branch ?></td>
          <td>
            <a href="updatecategory.php?id=<?= $c->id ?>" class="btn btn-sm btn-outline-warning">Edit</a>
            <a href="deletecategory.php?id=<?= $c->id ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this category?')">Delete</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </table>
      <a href="newcategory.php" class="btn btn-primary">+ Add Category</a>
    </div>
  </div>
</div>
</body>
</html>
