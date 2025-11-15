<?php
// create_task.php
require_once 'auth.php';
require_login();

$user_id = current_user_id();
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $due_date = $_POST['due_date'] ?? null;

    if ($title === '') $errors[] = "Tiêu đề không được để trống.";

    if (empty($errors)) {
        $stmt = $pdo->prepare("INSERT INTO tasks (user_id, title, description, due_date) VALUES (:uid, :title, :desc, :due)");
        $stmt->execute([
            'uid' => $user_id,
            'title' => $title,
            'desc' => $description ?: null,
            'due' => $due_date ?: null
        ]);
        header('Location: index.php');
        exit;
    }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Thêm công việc</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <a href="index.php" class="btn btn-link">&larr; Quay lại</a>
  <div class="card p-3">
    <h4>Thêm công việc mới</h4>
    <?php if($errors): ?><div class="alert alert-danger"><?=implode('<br>', $errors)?></div><?php endif; ?>
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Tiêu đề</label>
        <input name="title" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Mô tả</label>
        <textarea name="description" class="form-control"></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Ngày hết hạn</label>
        <input name="due_date" type="date" class="form-control">
      </div>
      <button class="btn btn-primary">Lưu</button>
    </form>
  </div>
</div>
</body>
</html>
