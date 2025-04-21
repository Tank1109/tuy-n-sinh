<?php
// Kết nối database
$host = '127.0.0.1';
$dbname = 'db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Không thể kết nối đến database: " . $e->getMessage());
}

// Lấy dữ liệu từ database
function getNewsItems($pdo, $type) {
    $sql = "SELECT * FROM baiviet WHERE theloai = :type ORDER BY ngay_dang DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':type' => $type]);

    $newsItems = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $newsItems[] = [
            'title' => $row['tieu_de'],
            'image' => 'uploads/' . $row['hinhanh'],
            'link' => $row['duongdan'],
            'category' => strtoupper($row['chuyenmuc']),
            'date' => date('d/m/Y', strtotime($row['ngay_dang'])),
            'hot' => (bool)$row['hot']
        ];
    }
    return $newsItems;
}

// Danh mục
$news_categories = [
    'highlight' => [
        'title' => 'Tin tức nổi bật',
        'items' => getNewsItems($pdo, 'tin_tuc')
    ],
    'general' => [
        'title' => 'Sự kiện nổi bật',
        'items' => getNewsItems($pdo, 'su_kien')
    ]
];

// Xác định danh mục đang được chọn
$active_category = $_GET['category'] ?? 'highlight';
if (!array_key_exists($active_category, $news_categories)) {
    $active_category = 'highlight';
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tin tức - Trường Đại học</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức - Trường Đại học</title>
 
    <style>
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    color: #333;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.breadcrumb {
    display: flex;
    margin-bottom: 30px;
    font-size: 18px;
    font-weight: bold;
}

.breadcrumb a {
    color: #0056b3;
    text-decoration: none;
    text-transform: uppercase;
}

.breadcrumb .separator {
    margin: 0 10px;
    color: #0056b3;
}

.breadcrumb .current {
    color: #0056b3;
    text-transform: uppercase;
}

.tabs {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    margin-bottom: 30px;
}

.tab {
    padding: 12px 20px;
    border-radius: 30px;
    font-weight: bold;
    text-align: center;
    cursor: pointer;
    text-decoration: none;
    color: #666;
    border: 1px solid #ddd;
    transition: all 0.3s ease;
    font-size: 14px;
}

.tab.active {
    background-color: #0d6efd;
    color: #fff;
    border-color: #0d6efd;
}

.tab:hover:not(.active) {
    background-color: #fd7e14;
}

.news-heading {
    color: #0056b3;
    font-size: 28px;
    margin-bottom: 20px;
    position: relative;
    padding-bottom: 10px;
}

.news-heading::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100px;
    height: 3px;
    background-color: #ff7700;
}

.news-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 30px;
}

.news-item {
    display: flex;
    gap: 15px;
    text-decoration: none;
    color: inherit;
}

.news-image-container {
    position: relative;
    width: 170px;
    min-width: 170px;
}

.news-image {
    width: 100%;
    height: 120px;
    object-fit: cover;
}

.hot-label {
    position: absolute;
    top: 0;
    left: 0;
    background-color: #ff4d4d;
    color: white;
    padding: 3px 8px;
    font-size: 12px;
    font-weight: bold;
}

.news-content {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.news-title {
    font-size: 16px;
    font-weight: bold;
    color: #333;
    margin-bottom: 8px;
    line-height: 1.4;
}

.news-meta {
    display: flex;
    justify-content: space-between;
    margin-top: auto;
}

.news-category {
    color: #0056b3;
    font-size: 14px;
    font-weight: bold;
}

.news-date {
    color: #777;
    font-size: 13px;
    font-style: italic;
}

.news-item:hover .news-title {
    color: #ff7700;
}

@media (max-width: 768px) {
    .news-grid {
        grid-template-columns: 1fr;
    }

    .tabs {
        flex-direction: column;
    }
}
</style>
</head>
<body>
<div class="container">
    <div class="breadcrumb">
        <a href="index.php">TRANG CHỦ</a>
        <span class="separator">›</span>
        <span class="current">TIN TỨC VÀ SỰ KIỆN</span>
    </div>

    <div class="tabs">
        <?php foreach ($news_categories as $key => $category): ?>
            <a href="?category=<?= $key ?>" class="tab <?= ($active_category === $key) ? 'active' : '' ?>">
                <?= $category['title'] ?>
            </a>
        <?php endforeach; ?>
    </div>

    <h2 class="news-heading"><?= $news_categories[$active_category]['title'] ?></h2>

    <div class="news-grid">
        <?php foreach ($news_categories[$active_category]['items'] as $item): ?>
            <a href="<?= $item['link'] ?>" class="news-item">
                <div class="news-image-container">
                    <img src="<?= $item['image'] ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="news-image">
                    <?php if ($item['hot']): ?>
                        <span class="hot-label">HOT</span>
                    <?php endif; ?>
                </div>
                <div class="news-content">
                    <h3 class="news-title"><?= htmlspecialchars($item['title']) ?></h3>
                    <div class="news-meta">
                        <div class="news-category"><?= $item['category'] ?></div>
                        <div class="news-date"><?= $item['date'] ?></div>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
