<?php
// Kết nối đến cơ sở dữ liệu
$conn = new mysqli("localhost", "root", "", "tuyensinhtmu");
$conn->set_charset("utf8");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy loại chương trình từ query string
$type = $_GET['type'] ?? '';

// Lấy dữ liệu từ bảng tương ứng
if ($type == 'phuong_thuc') {
    $result = $conn->query("SELECT * FROM noidung_phuongthuc");
} elseif ($type == 'de_an') {
    $result = $conn->query("SELECT * FROM noidung_dean");
} elseif ($type == 'ban_tin') {
    $result = $conn->query("SELECT * FROM noidung_bantin");

} else {
    die("Loại chương trình không hợp lệ.");
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Tuyển sinh </title>
  <link rel="stylesheet" href="stydetails.css">
</head>
<body>
  <div class="container">
    <h1>Tuyển sinh </h1>
    <div class="details-section">
    <?php while ($row = $result->fetch_assoc()): ?>
      <div class="post-item">
        <div class="post-image">
          <img src="viu/uploads/<?= $row['hinhanh']; ?>" alt="Hình ảnh">
        </div>
        <div class="post-content">
          <h2 class="toggle-title">
            <?= $row['tieude']; ?> <span style="font-size: 16px;">▼</span>
          </h2>
          <div class="post-details">
            <div class="post-meta">
              <span>🕒 <?= $row['ngaydang']; ?></span>
            </div>
            <p><?= $row['noidung']; ?></p>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
    </div>
    <a href="user.php" class="back-link">← Quay lại</a>
  </div>
  <script src="detailsts.js"></script>
</body>
</html>

<?php
// Đóng kết nối
$conn->close();
?>
