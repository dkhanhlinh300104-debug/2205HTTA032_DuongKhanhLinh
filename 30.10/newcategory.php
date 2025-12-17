<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>New Category</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="col-lg-4 p-3 border rounded bg-light shadow">
    <h3>New Category</h3>
    <form method="post" action="insertcategory.php" class="was-validated">
      <div class="my-3">
        <label class="form-label">Category Name</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="my-3">
        <label class="form-label">Branch</label>
        <input type="text" name="branch" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
</body>
</html>
