<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Form Đăng Nhập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .login-container {
            background: #fff;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            width: 350px;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        .login-container h2 {
            margin-bottom: 25px;
            color: #333;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 14px;
            transition: 0.3s;
        }

        .login-container input[type="text"]:focus,
        .login-container input[type="password"]:focus {
            border-color: #667eea;
            outline: none;
            box-shadow: 0 0 8px rgba(102,126,234,0.5);
        }

        .login-container input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-container input[type="submit"]:hover {
            background: linear-gradient(135deg, #764ba2, #667eea);
            transform: scale(1.05);
        }

        .login-container p {
            margin-top: 15px;
            font-size: 13px;
            color: #666;
        }

        .login-container a {
            color: #667eea;
            text-decoration: none;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px);}
            to { opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Đăng Nhập</h2>
        <form method="post" action="login.php">
            <input type="text" name="tentruycap" placeholder="Tên truy cập" required>
            <input type="password" name="matkhau" placeholder="Mật khẩu" required>
            <input type="submit" name="submit" value="Đăng nhập">
        </form>
        <p>Chưa có tài khoản? <a href="#">Đăng ký ngay</a></p>
    </div>
</body>
</html>
