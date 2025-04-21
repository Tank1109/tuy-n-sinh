<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar - Trường Đại Học Thương Mại</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        :root {
            --primary-color: #1f4287;
            --secondary-color: #071e3d;
            --accent-color: #278ea5;
            --light-color: #f5f5f5;
            --text-color: #333;
            --border-color: #ddd;
        }
        
        body {
            background-color: #f8f9fa;
            color: var(--text-color);
        }
        
        .container {
            display: flex;
            min-height: 100vh;
        }
        
        .sidebar {
            width: 300px;
            background: var(--secondary-color);
            color: white;
            transition: all 0.3s ease;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        
        .logo-container {
            padding: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: var(--primary-color);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .logo {
            width: 80px;
            height: 80px;
            margin-bottom: 12px;
            border-radius: 5px;
        }
        
        .logo-text {
            font-size: 20px;
            font-weight: bold;
            line-height: 1.4;
            text-align: center;
            letter-spacing: 0.5px;
        }
        
        .menu-item {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            cursor: pointer;
            transition: all 0.2s;
            border-left: 3px solid transparent;
        }
        
        .menu-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-left: 3px solid var(--accent-color);
        }
        
        .menu-item.active {
            background-color: rgba(255, 255, 255, 0.15);
            border-left: 3px solid var(--accent-color);
        }
        
        .menu-icon {
            margin-right: 12px;
            width: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo-container">
                <img src="https://tmu.edu.vn/template_dhtm/images/logo-sm.png" alt="Logo trường" class="logo">
                <div class="logo-text">TRƯỜNG ĐẠI HỌC<br>THƯƠNG MẠI</div>
            </div>
            
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
        </div>
    </div>

    <script>
        function activateMenuItem(element) {
            // Remove active class from all menu items
            const menuItems = document.querySelectorAll('.menu-item');
            menuItems.forEach(item => {
                item.classList.remove('active');
            });
            
            // Add active class to clicked item
            element.classList.add('active');
        }
        
        function showToast(message) {
            alert(message);
        }
    </script>
</body>
</html>