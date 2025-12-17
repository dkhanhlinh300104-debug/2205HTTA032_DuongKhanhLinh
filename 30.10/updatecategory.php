<?php
require_once "db.php";
$id = $_GET['id'] ?? "";
$db = new DbHelper();
$category = $db->select("SELECT * FROM categories WHERE id = ?", [$id], true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Category</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
  <div class="col-lg-5 mx-auto border rounded p-4 bg-light shadow">
    <h3>Edit Category</h3>
    <form method="post" action="editcategory.php?id=<?= $id ?>">
      <div class="mb-3">
        <label class="form-label">Category Name</label>
        <input type="text" name="name" value="<?= $category[0]->name ?>" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Branch</label>
        <input type="text" name="branch" value="<?= $category[0]->branch ?>" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</div>
</body>
</html>
