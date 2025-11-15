<?php
// index.php
require_once 'auth.php';
require_login();

$user_id = current_user_id();

// lọc và sắp xếp
$status_filter = $_GET['status'] ?? '';
$sort = $_GET['sort'] ?? 'due_date'; // or created_at

$sql = "SELECT * FROM tasks WHERE user_id = :uid";
$params = ['uid' => $user_id];

if ($status_filter && in_array($status_filter, ['pending','in_progress','completed'])) {
    $sql .= " AND status = :status";
    $params['status'] = $status_filter;
}

$allowedSort = ['due_date','created_at'];
if (!in_array($sort, $allowedSort)) $sort = 'due_date';
$sql .= " ORDER BY " . ($sort === 'due_date' ? "COALESCE(due_date, '9999-12-31')" : "created_at") . " ASC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$tasks = $stmt->fetchAll();
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Dashboard - ToDo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand bg-light mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">My ToDo</a>
    <div class="ms-auto">
      <span class="me-3">Hello, <?=htmlspecialchars($_SESSION['username'])?></span>
      <a href="logout.php" class="btn btn-outline-secondary btn-sm">Logout</a>
    </div>
  </div>
</nav>

<div class="container">
  <div class="d-flex justify-content-between mb-3">
    <h4>Công việc của bạn</h4>
    <a href="create_task.php" class="btn btn-primary">Thêm công việc</a>
  </div>

  <form class="row g-2 mb-3" method="get">
    <div class="col-auto">
      <select name="status" class="form-select">
        <option value="">-- Tất cả trạng thái --</option>
        <option value="pending" <?= $status_filter==='pending'?'selected':'' ?>>Pending</option>
        <option value="in_progress" <?= $status_filter==='in_progress'?'selected':'' ?>>In Progress</option>
        <option value="completed" <?= $status_filter==='completed'?'selected':'' ?>>Completed</option>
      </select>
    </div>
    <div class="col-auto">
      <select name="sort" class="form-select">
        <option value="due_date" <?= $sort==='due_date'?'selected':'' ?>>Sắp theo ngày hết hạn</option>
        <option value="created_at" <?= $sort==='created_at'?'selected':'' ?>>Sắp theo ngày tạo</option>
      </select>
    </div>
    <div class="col-auto">
      <button class="btn btn-secondary">Áp dụng</button>
    </div>
  </form>

  <?php if(empty($tasks)): ?>
    <div class="alert alert-info">Chưa có công việc nào.</div>
  <?php else: ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Tiêu đề</th>
          <th>Due Date</th>
          <th>Trạng thái</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($tasks as $t): ?>
        <tr>
          <td><?=htmlspecialchars($t['title'])?><br><small><?=nl2br(htmlspecialchars($t['description']))?></small></td>
          <td><?= $t['due_date'] ? htmlspecialchars($t['due_date']) : '-' ?></td>
          <td><?=htmlspecialchars($t['status'])?></td>
          <td>
            <a href="edit_task.php?id=<?=$t['id']?>" class="btn btn-sm btn-outline-primary">Sửa</a>
            <a href="delete_task.php?id=<?=$t['id']?>" onclick="return confirm('Xóa công việc?')" class="btn btn-sm btn-outline-danger">Xóa</a>

            <?php if($t['status']!=='completed'): ?>
              <a href="change_status.php?id=<?=$t['id']?>&action=completed" class="btn btn-sm btn-success">Đánh dấu hoàn thành</a>
            <?php else: ?>
              <a href="change_status.php?id=<?=$t['id']?>&action=pending" class="btn btn-sm btn-warning">Đặt lại Pending</a>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
</body>
</html>
