<?php
$host = 'localhost';
$username = 'root';
$password = ''; // nếu bạn dùng XAMPP/MAMP mặc định thì để rỗng
$database = 'db'; // <-- sửa lại tên DB bạn đang dùng

$conn = new mysqli($host, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
