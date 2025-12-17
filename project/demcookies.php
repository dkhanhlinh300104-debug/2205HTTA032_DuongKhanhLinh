<?php
if (!isset($_COOKIE['visiting_count'])) {
    // Lần đầu truy cập
    setcookie('visiting_count', 1, [
        'expires' => time() + 3600,  // hết hạn sau 1 giờ
        'path' => '/',               // dùng cho toàn site
        'secure' => false,           // false khi test localhost
        'httponly' => true           // chống truy cập bằng JS
    ]);
    echo "Lần đầu tiên truy cập.<br>";
} else {
    // Tăng số lần truy cập
    $count = (int)$_COOKIE['visiting_count'] + 1;
    setcookie('visiting_count', $count, [
        'expires' => time() + 3600,
        'path' => '/',
        'secure' => false,
        'httponly' => true
    ]);
    echo "Số lần truy cập: " . htmlspecialchars($count) . "<br>";
}
?>
