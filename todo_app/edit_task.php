<?php
// edit_task.php
require_once 'auth.php';
require_login();
$user_id = current_user_id();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = :id AND user_id = :uid LIMIT 1");
$stmt->execute(['id'=>$id,'uid'=>$user_id]);
$task = $stmt->fetch();
if (!$task) {
    header('Location: index.php');
    exit;
}

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $due_date = $_POST['due_date'] ?: null;
    $status = $_POST['status'] ?? 'pending';
    if ($title === '') $errors[] = "Tiêu đề không được để trống.";
    if (!in_array($status, ['pending','in_progress','completed'])) $status = 'pending';

    if (empty($errors)) {
        $u = $pdo->prepare("UPDATE tasks SET title=:title, description=:desc, due_date=:due, status=:status WHERE id=:id AND user_id=:uid");
        $u->execute([
            'title'=>$title,
            'desc'=>$description ?: null,
            'due'=>$due_date ?: null,
            'status'=>$status,
            'id'=>$id,
            'uid'=>$user_id
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
  <title>Chỉnh sửa công việc</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <a href="index.php" class="btn btn-link">&larr; Quay lại</a>
  <div class="card p-3">
    <h4>Chỉnh sửa công việc</h4>
    <?php if($errors): ?><div class="alert alert-danger"><?=implode('<br>', $errors)?></div><?php endif; ?>
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Tiêu đề</label>
        <input name="title" class="form-control" value="<?=htmlspecialchars($task['title'])?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Mô tả</label>
        <textarea name="description" class="form-control"><?=htmlspecialchars($task['description'])?></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Ngày hết hạn</label>
        <input name="due_date" type="date" class="form-control" value="<?=htmlspecialchars($task['due_date'])?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Trạng thái</label>
        <select name="status" class="form-select">
          <option value="pending" <?= $task['status']==='pending'?'selected':'' ?>>Pending</option>
          <option value="in_progress" <?= $task['status']==='in_progress'?'selected':'' ?>>In Progress</option>
          <option value="completed" <?= $task['status']==='completed'?'selected':'' ?>>Completed</option>
        </select>
      </div>
      <button class="btn btn-primary">Lưu thay đổi</button>
    </form>
  </div>
</div>
</body>
</html>
