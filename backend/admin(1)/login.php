<?php
$loginError = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    if ($username === 'admin' && $password === '123456') {
        header("Location: giaodien.php");
        exit();
    } else {
        $loginError = "Sai tên đăng nhập hoặc mật khẩu!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Đăng nhập - Trường Đại Học Thương Mại</title>
    <link rel="stylesheet" href="login.css">
    <style>
        body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #0b326b;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.login-wrapper {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.login-container {
    background: #ffffff;
    padding: 50px 30px;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    width: 100%;
    max-width: 380px;
    min-height: 600px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.login-header {
    text-align: center;
}

.logo {
    width: 100px; /* TO HƠN */
    margin-bottom: 12px;
}

h1 {
    font-size: 22px;
    margin: 10px 0;
    color: #0b326b;
}

.subtitle {
    color: #555;
    font-size: 14px;
    margin-bottom: 30px;
}

.login-form {
    flex-grow: 1;
}

.form-group {
    margin-bottom: 18px;
}

.form-group label {
    display: block;
    margin-bottom: 6px;
    font-weight: bold;
    color: #333;
}

.input-group {
    display: flex;
    align-items: center;
    border: 1px solid #ccc;
    border-radius: 6px;
    padding: 10px;
    background-color: #fafafa;
}

.input-group .icon {
    margin-right: 8px;
    font-size: 18px;
}

.input-group input {
    border: none;
    outline: none;
    background: transparent;
    width: 100%;
    font-size: 15px;
}

.toggle-password {
    cursor: pointer;
    font-size: 16px;
    color: #888;
    transition: color 0.3s ease;
}
.toggle-password:hover {
    color: #000;
}

.form-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 22px;
    font-size: 13px;
    color: #444;
}

.remember {
    display: flex;
    align-items: center;
    font-size: 13px;
}
.remember input {
    margin-right: 6px;
}

.forgot {
    text-decoration: none;
    color: #0b326b;
    font-weight: 500;
    transition: color 0.2s ease;
}
.forgot:hover {
    color: #09264d;
}

.login-button {
    background-color: #0b326b;
    color: #fff;
    border: none;
    padding: 13px;
    width: 100%;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
    font-size: 15px;
    transition: background-color 0.3s ease;
}
.login-button:hover {
    background-color: #09264d;
}

.login-footer {
    text-align: center;
    margin-top: 20px;
    font-size: 12px;
    color: #777;
}

.error {
    color: red;
    font-size: 14px;
    text-align: center;
    margin-bottom: 16px;
    font-weight: 500;
}
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-container">
            <div>
                <div class="login-header">
                    <img src="https://upload.wikimedia.org/wikipedia/vi/2/2a/Logo_%C4%90%E1%BA%A1i_h%E1%BB%8dc_Th%C6%B0%C6%A1ng_m%E1%BA%A1i.jpg" alt="Logo trường" class="logo">
                    <h1>TRƯỜNG ĐẠI HỌC THƯƠNG MẠI</h1>
                    <div class="subtitle">Hệ thống Quản lý</div>
                </div>

                <?php if (!empty($loginError)): ?>
                    <div class="error"><?= $loginError ?></div>
                <?php endif; ?>

                <form method="POST" class="login-form">
                    <div class="form-group">
                        <label>Tên đăng nhập</label>
                        <div class="input-group">
                            <span class="icon">👤</span>
                            <input type="text" name="username" placeholder="Nhập tên đăng nhập" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <div class="input-group">
                            <span class="icon">🔒</span>
                            <input type="password" name="password" placeholder="Nhập mật khẩu" required>
                            <span class="toggle-password" onclick="togglePassword(this)">👁</span>
                        </div>
                    </div>

                    <div class="form-options">
                        <label class="remember">
                            <input type="checkbox"> Ghi nhớ đăng nhập
                        </label>
                        <a href="#" class="forgot">Quên mật khẩu?</a>
                    </div>

                    <button type="submit" class="login-button">Đăng nhập</button>
                </form>
            </div>

            <div class="login-footer">
                <?= date("Y-m-d H:i:s") ?> (UTC)<br>
                &copy; 2025 Trường Đại học Thương mại. All rights reserved.
            </div>
        </div>
    </div>

    <script>
        function togglePassword(el) {
            const input = el.previousElementSibling;
            if (input.type === "password") {
                input.type = "text";
                el.textContent = "🙈";
            } else {
                input.type = "password";
                el.textContent = "👁";
            }
        }
    </script>
</body>
</html>
