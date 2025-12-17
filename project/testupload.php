<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Upload file</title>
</head>
<body>
    <h1>Upload file to server</h1>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="fileupload" id="fileupload">
        <input type="submit" name="upload" value="Upload">
    </form>
</body>
</html>
