<?php
// register.php
require_once 'config.php';

$errors = [];
$username = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $email = trim($_POST['email'] ?? '');

    if ($username === '' || $password === '') {
        $errors[] = "Username và password là bắt buộc.";
    }

    // Thêm kiểm tra độ dài cơ bản (có thể tùy chỉnh)
    if (strlen($username) > 50) {
        $errors[] = "Username quá dài.";
    }
    if (strlen($password) < 6) {
        $errors[] = "Password phải có ít nhất 6 ký tự.";
    }
    // Bạn có thể thêm validation email ở đây nếu cần

    if (empty($errors)) {
        // --- BẮT ĐẦU SỬA LỖI LOGIC DÒNG 18 ---
        
        // 1. Xây dựng truy vấn SQL động
        $sql = "SELECT id FROM users WHERE username = :u";
        $params = ['u' => $username];
        
        // 2. Chỉ thêm điều kiện kiểm tra email nếu người dùng đã nhập
        if ($email !== '') {
            $sql .= " OR email = :e";
            $params['e'] = $email;
        }

        $sql .= " LIMIT 1";

        // 3. Thực thi truy vấn đã sửa đổi
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        
        // --- KẾT THÚC SỬA LỖI LOGIC DÒNG 18 ---

        if ($stmt->fetch()) {
            $errors[] = "Username hoặc email đã được sử dụng.";
        } else {
            // Chuẩn bị dữ liệu để INSERT
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $email_insert = $email ?: null; // Gán NULL cho email nếu rỗng

            $ins = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (:u, :p, :e)");
            $ins->execute([
                'u' => $username, 
                'p' => $hash, 
                'e' => $email_insert
            ]);
            
            header('Location: login.php?registered=1');
            exit;
        }
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4">
                <h3 class="mb-3">Đăng ký</h3>
                <?php if($errors): ?>
                    <div class="alert alert-danger">
                        <?php foreach($errors as $e) echo "<div>{$e}</div>"; ?>
                    </div>
                <?php endif; ?>
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input name="username" class="form-control" required 
                            value="<?php echo htmlspecialchars($username); ?>" 
                            maxlength="50">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email (tùy chọn)</label>
                        <input name="email" type="email" class="form-control" 
                            value="<?php echo htmlspecialchars($email); ?>"
                            maxlength="100">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" required minlength="6">
                    </div>
                    <button class="btn btn-primary">Đăng ký</button>
                    <a href="login.php" class="btn btn-link">Đã có tài khoản? Đăng nhập</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>