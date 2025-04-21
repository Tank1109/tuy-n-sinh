<?php
$conn = new mysqli("localhost", "root", "", "db");
$conn->set_charset("utf8");

// Lấy ID nếu đang sửa
$id = $_GET['id'] ?? null;
$edit_data = null;

if ($id) {
    $stmt = $conn->prepare("SELECT * FROM baiviet WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    $edit_data = $res->fetch_assoc();
}

// Xử lý khi submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tieude = $conn->real_escape_string($_POST['tieude'] ?? '');
    $noidung = $conn->real_escape_string($_POST['noidung'] ?? '');
    $theloai = $conn->real_escape_string($_POST['theloai'] ?? '');
    $chuyenmuc = $conn->real_escape_string($_POST['chuyenmuc'] ?? '');
    $hot = intval($_POST['hot'] ?? 0);
    $duongdan = $conn->real_escape_string($_POST['duongdan'] ?? '');
    $filename = '';

    // Xử lý upload ảnh
    if (!empty($_FILES['hinhanh']['name'])) {
        $upload_dir = "uploads/";
        if (!is_dir($upload_dir)) mkdir($upload_dir);
        $filename = time() . "_" . basename($_FILES['hinhanh']['name']);
        $target_file = $upload_dir . $filename;

        // Kiểm tra loại tệp và kích thước
        $file_type = mime_content_type($_FILES['hinhanh']['tmp_name']);
        if (!in_array($file_type, ['image/jpeg', 'image/png', 'image/gif'])) {
            echo "⚠️ Tệp không phải là hình ảnh hợp lệ.";
            exit();
        }

        if ($_FILES['hinhanh']['size'] > 5000000) { // 5MB
            echo "⚠️ Tệp hình ảnh quá lớn.";
            exit();
        }

        if (!move_uploaded_file($_FILES['hinhanh']['tmp_name'], $target_file)) {
            echo "⚠️ Có lỗi khi upload ảnh.";
            exit();
        }
    }

    if (!empty($_POST['id'])) {
        // Cập nhật bài viết
        $update_id = intval($_POST['id']);
        $query = "UPDATE baiviet SET tieu_de=?, mo_ta_ngan=?, theloai=?, chuyenmuc=?, hot=?, duongdan=?";
        if ($filename) {
            $query .= ", hinhanh=?";
        }
        $query .= " WHERE id=?";
        
        $stmt = $conn->prepare($query);
        if ($filename) {
            $stmt->bind_param("ssssisis", $tieude, $noidung, $theloai, $chuyenmuc, $hot, $duongdan, $filename, $update_id);
        } else {
            $stmt->bind_param("ssssisi", $tieude, $noidung, $theloai, $chuyenmuc, $hot, $duongdan, $update_id);
        }
        $stmt->execute();
    } else {
        // Thêm mới bài viết
        $stmt = $conn->prepare("INSERT INTO baiviet (tieu_de, mo_ta_ngan, hinhanh, theloai, chuyenmuc, hot, ngay_dang, duongdan) 
                                VALUES (?, ?, ?, ?, ?, ?, NOW(), ?)");
        $stmt->bind_param("ssssiss", $tieude, $noidung, $filename, $theloai, $chuyenmuc, $hot, $duongdan);
        $stmt->execute();
    }

    header("Location: baivietlist.php");
    exit();
}

// Xóa bài viết
if (isset($_GET['delete'])) {
    $delete_id = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM baiviet WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    header("Location: baivietlist.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Bài viết</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.1/tinymce.min.js"></script>
    <script>tinymce.init({ selector: 'textarea' });</script>
</head>
<body>

<a href="index.php" class="button-link">← Quay về trang chính</a>

<h2>Quản lý bài viết</h2>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= htmlspecialchars($edit_data['id'] ?? '') ?>">

    <label for="hinhanh">Hình ảnh:</label>
    <input type="file" name="hinhanh" accept="image/*">
    <?php if (!empty($edit_data['hinhanh']) && file_exists("uploads/" . $edit_data['hinhanh'])): ?>
        <p>Ảnh hiện tại: <img src="uploads/<?= htmlspecialchars($edit_data['hinhanh']) ?>" width="100"></p>
    <?php endif; ?>

    <label for="tieude">Tiêu đề:</label>
    <input type="text" name="tieude" id="tieude" required style="width:100%;" value="<?= htmlspecialchars($edit_data['tieu_de'] ?? '') ?>">

    <label for="noidung">Nội dung:</label>
    <textarea name="noidung" id="noidung"><?= htmlspecialchars($edit_data['mo_ta_ngan'] ?? '') ?></textarea>

    <label for="theloai">Thể loại:</label>
    <select name="theloai" id="theloai" required>
        <option value="tin_tuc" <?= (isset($edit_data) && $edit_data['theloai'] == 'tin_tuc') ? 'selected' : '' ?>>Tin tức</option>
        <option value="su_kien" <?= (isset($edit_data) && $edit_data['theloai'] == 'su_kien') ? 'selected' : '' ?>>Sự kiện</option>
    </select>

    <label for="chuyenmuc">Chuyên mục:</label>
    <input type="text" name="chuyenmuc" id="chuyenmuc" required value="<?= htmlspecialchars($edit_data['chuyenmuc'] ?? '') ?>">

    <label for="hot">HOT:</label>
    <select name="hot" id="hot" required>
        <option value="0" <?= (isset($edit_data) && $edit_data['hot'] == 0) ? 'selected' : '' ?>>Không</option>
        <option value="1" <?= (isset($edit_data) && $edit_data['hot'] == 1) ? 'selected' : '' ?>>HOT</option>
    </select>

    <label for="duongdan">Đường dẫn:</label>
    <input type="text" name="duongdan" id="duongdan" required value="<?= htmlspecialchars($edit_data['duongdan'] ?? '') ?>">

    <button type="submit" class="submit-button">
        <?= $edit_data ? 'Cập nhật' : 'Lưu bài viết' ?>
    </button>

    <?php if ($edit_data): ?>
        <a href="baivietlist.php" class="button-link">Huỷ sửa</a>
    <?php endif; ?>
</form>

<hr>
<h3>Danh sách bài viết</h3>

<table border="1" cellpadding="10" cellspacing="0" class="table">
    <tr>
        <th>ID</th>
        <th>Tiêu đề</th>
        <th>Hình ảnh</th>
        <th>Thể loại</th>
        <th>Chuyên mục</th>
        <th>HOT</th>
        <th>Ngày đăng</th>
        <th>Thao tác</th>
    </tr>
    <?php
    $stmt = $conn->prepare("SELECT * FROM baiviet ORDER BY id DESC");
    $stmt->execute();
    $res = $stmt->get_result();
    while ($r = $res->fetch_assoc()):
    ?>
        <tr>
            <td><?= $r['id'] ?></td>
            <td><?= htmlspecialchars($r['tieu_de']) ?></td>
            <td>
                <?php if (!empty($r['hinhanh']) && file_exists("uploads/" . $r['hinhanh'])): ?>
                    <img src="uploads/<?= htmlspecialchars($r['hinhanh']) ?>" width="80">
                <?php else: ?>
                    -
                <?php endif; ?>
            </td>
            <td><?= $r['theloai'] ?></td>
            <td><?= $r['chuyenmuc'] ?></td>
            <td><?= $r['hot'] ? '🔥' : 'Không' ?></td>
            <td><?= $r['ngay_dang'] ?></td>
            <td>
                <a href="?id=<?= $r['id'] ?>">Sửa</a> |
                <a href="?delete=<?= $r['id'] ?>" onclick="return confirm('Bạn chắc chắn muốn xoá bài viết này?')">Xoá</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
