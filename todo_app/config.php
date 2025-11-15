<?php
// config.php
session_start();

$host = '127.0.0.1';
$db = 'todo_app';
$user = 'root';
$pass = ''; // thay bằng mật khẩu nếu bạn có đặt cho MySQL
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Kết nối thành công!";
} catch (PDOException $e) {
    echo " Kết nối thất bại: " . $e->getMessage();
    exit;
}
?>
