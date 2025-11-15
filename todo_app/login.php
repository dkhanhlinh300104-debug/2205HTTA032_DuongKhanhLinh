<?php
// login.php
require_once 'config.php';

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $errors[] = "Vui lòng nhập username và password.";
    } else {
        $stmt = $pdo->prepare("SELECT id, password FROM users WHERE username = :u LIMIT 1");
        $stmt->execute(['u' => $username]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            // đăng nhập thành công
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $username;
            header('Location: index.php');
            exit;
        } else {
            $errors[] = "Sai username hoặc password.";
        }
    }
}
$registered = isset($_GET['registered']);
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card p-4">
        <h3 class="mb-3">Đăng nhập</h3>
        <?php if($registered): ?>
          <div class="alert alert-success">Đăng ký thành công, vui lòng đăng nhập.</div>
        <?php endif; ?>
        <?php if($errors): ?>
          <div class="alert alert-danger">
            <?php foreach($errors as $e) echo "<div>{$e}</div>"; ?>
          </div>
        <?php endif; ?>
        <form method="post">
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input name="username" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="password" type="password" class="form-control" required>
          </div>
          <button class="btn btn-primary">Đăng nhập</button>
          <a href="register.php" class="btn btn-link">Tạo tài khoản mới</a>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
