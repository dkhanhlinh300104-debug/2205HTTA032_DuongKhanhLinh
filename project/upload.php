<?php
// upload.php

// Kiểm tra xem có file được chọn chưa
if (!isset($_FILES['fileupload']) || $_FILES['fileupload']['error'] == UPLOAD_ERR_NO_FILE) {
    echo "Vui lòng chọn file để upload<br>";
    echo '<a href="testupload.php">Quay lại</a>';
    exit;
}

$target_dir = "upload/"; // Thư mục chứa file upload
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true); // Tạo nếu chưa có
}

$file_name = basename($_FILES["fileupload"]["name"]);
$target_file = $target_dir . $file_name;

// Lấy phần mở rộng
$file_ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$allow_file_type = ["jpg", "jpeg", "png", "gif", "pdf", "docx", "txt", "xlsx"];

// Kiểm tra loại file
if (in_array($file_ext, $allow_file_type)) {
    // Nếu file đã tồn tại
    if (file_exists($target_file)) {
        echo "File đã tồn tại.<br>";
    } else {
        // Upload file lên server
        if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)) {
            echo "Upload file thành công!<br>";
        } else {
            echo "Lỗi khi upload file.<br>";
        }
    }
} else {
    echo "File không được phép upload.<br>";
}

echo '<a href="testupload.php">Quay lại</a>';
?>
