<?php
// Kết nối CSDL
include 'db.php'; // file này chứa $conn

$search_query = "";
$search_results = [];

if (isset($_GET['search'])) {
    $search_query = trim($_GET['search']);
    if (!empty($search_query)) {
        $sql = "SELECT * FROM majors WHERE id LIKE '%$search_query%' OR name LIKE '%$search_query%'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $search_results = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    }
}
?>

<div class="sidebar">
    <div class="logo-container">
        <img src="https://tmu.edu.vn/template_dhtm/images/logo-sm.png" alt="Logo trường" class="logo">
        <div class="logo-text">TRƯỜNG ĐẠI HỌC<br>THƯƠNG MẠI</div>
    </div>

    <form method="get" action="" style="padding: 15px;">
        <input type="text" name="search" placeholder="Tìm kiếm ngành..." value="<?= htmlspecialchars($search_query); ?>" style="width: 100%; padding: 8px; border-radius: 4px; border: none;">
    </form>

    <div class="menu-item active" onclick="activateMenuItem(this)">
        <div class="menu-icon"><i class="fas fa-home"></i></div>
        <div>Trang chủ</div>
    </div>
    <div class="menu-item" onclick="activateMenuItem(this)">
        <div class="menu-icon"><i class="fas fa-newspaper"></i></div>
        <div>Tin tức & Sự kiện</div>
    </div>
    <div class="menu-item" onclick="activateMenuItem(this)">
        <div class="menu-icon"><i class="fas fa-graduation-cap"></i></div>
        <div>Tuyển sinh</div>
    </div>
    <div class="menu-item" onclick="activateMenuItem(this)">
        <div class="menu-icon"><i class="fas fa-book"></i></div>
        <div>Đào tạo</div>
    </div>
    <div class="menu-item" onclick="showToast('Bạn có chắc chắn muốn đăng xuất không?')">
        <div class="menu-icon"><i class="fas fa-sign-out-alt"></i></div>
        <div>Đăng xuất</div>
    </div>

    <?php if (!empty($search_results)): ?>
        <div style="padding: 15px; font-size: 14px;">
            <strong>Kết quả tìm kiếm:</strong>
            <ul style="margin-top: 10px;">
                <?php foreach ($search_results as $row): ?>
                    <li style="margin-bottom: 5px;">
                        <a href="detail.php?id=<?= $row['id']; ?>" style="color: #fff; text-decoration: underline;">
                            <?= htmlspecialchars($row['name']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php elseif (isset($_GET['search'])): ?>
        <div style="padding: 15px; font-size: 14px; color: #ffcccb;">🔍 Không tìm thấy kết quả nào.</div>
    <?php endif; ?>
</div>

<script>
    function activateMenuItem(element) {
        const menuItems = document.querySelectorAll('.menu-item');
        menuItems.forEach(item => item.classList.remove('active'));
        element.classList.add('active');
    }

    function showToast(message) {
        alert(message);
    }
</script>
