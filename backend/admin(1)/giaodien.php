<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Trị Quảng Bá - Trường Đại Học Thương Mại</title>
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
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --info-color: #17a2b8;
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
            width: 240px;
            background: var(--secondary-color);
            color: white;
            transition: all 0.3s ease;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        
        .logo-container {
            padding: 20px 15px;
            display: flex;
            align-items: center;
            background-color: var(--primary-color);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .logo {
            width: 40px;
            height: 40px;
            margin-right: 10px;
            border-radius: 5px;
        }
        
        .logo-text {
            font-size: 14px;
            font-weight: bold;
            line-height: 1.2;
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
        
        .main-content {
            flex: 1;
            padding: 0;
            overflow-x: hidden;
        }
        
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 25px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .page-title {
            font-size: 18px;
            font-weight: 600;
        }
        
        .user-menu {
            display: flex;
            align-items: center;
            cursor: pointer;
            position: relative;
        }
        
        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 10px;
        }
        
        .user-name {
            margin-right: 5px;
            font-weight: 500;
        }
        
        .user-dropdown {
            position: absolute;
            top: 45px;
            right: 0;
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            width: 150px;
            z-index: 100;
            display: none;
        }
        
        .user-dropdown.active {
            display: block;
        }
        
        .dropdown-item {
            padding: 10px 15px;
            cursor: pointer;
            transition: background 0.2s;
        }
        
        .dropdown-item:hover {
            background-color: #f5f5f5;
        }
        
        .dashboard-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            padding: 25px;
        }
        
        .stat-card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 7px 15px rgba(0, 0, 0, 0.1);
        }
        
        .stat-title {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }
        
        .stat-value {
            font-size: 24px;
            font-weight: bold;
            color: var(--primary-color);
        }
        
        .content-area {
            background-color: white;
            border-radius: 8px;
            margin: 0 25px 25px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        
        .content-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
        }
        
        .content-title span {
            font-size: 18px;
            font-weight: 600;
        }
        
        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #153166;
        }
        
        .tabs {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 1px solid var(--border-color);
        }
        
        .tab {
            padding: 10px 20px;
            cursor: pointer;
            border-bottom: 2px solid transparent;
            transition: all 0.2s;
        }
        
        .tab:hover {
            color: var(--primary-color);
        }
        
        .tab.active {
            color: var(--primary-color);
            border-bottom: 2px solid var(--primary-color);
            font-weight: 500;
        }
        
        .filter-bar {
            display: flex;
            margin-bottom: 20px;
            gap: 15px;
        }
        
        .filter-select {
            padding: 8px 12px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            background-color: white;
            min-width: 180px;
        }
        
        .search-bar {
            display: flex;
            margin-bottom: 20px;
        }
        
        .search-input {
            flex: 1;
            padding: 10px 15px;
            border: 1px solid var(--border-color);
            border-right: none;
            border-radius: 4px 0 0 4px;
        }
        
        .search-btn {
            padding: 0 20px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        thead th {
            background-color: #f8f9fa;
            padding: 12px 15px;
            text-align: left;
            font-weight: 600;
            color: #555;
            border-bottom: 2px solid var(--border-color);
        }
        
        tbody td {
            padding: 12px 15px;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
        }
        
        .preview-thumbnail {
            width: 100px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
        }
        
        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .status-published {
            background-color: rgba(40, 167, 69, 0.1);
            color: var(--success-color);
        }
        
        .status-draft {
            background-color: rgba(108, 117, 125, 0.1);
            color: #6c757d;
        }
        
        .status-scheduled {
            background-color: rgba(255, 193, 7, 0.1);
            color: var(--warning-color);
        }
        
        .action-btn {
            padding: 5px 10px;
            margin-right: 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            transition: all 0.2s;
        }
        
        .view-btn {
            background-color: rgba(23, 162, 184, 0.1);
            color: var(--info-color);
        }
        
        .view-btn:hover {
            background-color: var(--info-color);
            color: white;
        }
        
        .edit-btn {
            background-color: rgba(255, 193, 7, 0.1);
            color: var(--warning-color);
        }
        
        .edit-btn:hover {
            background-color: var(--warning-color);
            color: white;
        }
        
        .delete-btn {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--danger-color);
        }
        
        .delete-btn:hover {
            background-color: var(--danger-color);
            color: white;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        
        .page-btn {
            width: 35px;
            height: 35px;
            margin: 0 5px;
            border: 1px solid var(--border-color);
            background-color: white;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .page-btn:hover {
            background-color: #f5f5f5;
        }
        
        .page-btn.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }
        
        .image-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 15px;
        }
        
        .image-item {
            position: relative;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            overflow: hidden;
            transition: transform 0.3s;
        }
        
        .image-item:hover {
            transform: scale(1.03);
        }
        
        .image-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            display: block;
        }
        
        .image-actions {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: space-around;
            padding: 8px 0;
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .image-item:hover .image-actions {
            opacity: 1;
        }
        
        .image-action-btn {
            cursor: pointer;
            color: white;
            transition: transform 0.2s;
        }
        
        .image-action-btn:hover {
            transform: scale(1.2);
        }
        
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }
        
        .modal.active {
            display: flex;
        }
        
        .modal-content {
            background-color: white;
            border-radius: 8px;
            width: 500px;
            max-width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }
        
        .modal-header {
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
        }
        
        .modal-title {
            font-size: 18px;
            font-weight: 600;
        }
        
        .modal-close {
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #777;
        }
        
        .modal-body {
            padding: 20px;
        }
        
        .modal-footer {
            padding: 15px 20px;
            border-top: 1px solid #eee;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            transition: border-color 0.2s;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            outline: none;
        }
        
        /* Toast notification */
        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: white;
            padding: 12px 20px;
            border-radius: 4px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            z-index: 1100;
            transform: translateX(110%);
            transition: transform 0.3s;
        }
        
        .toast.active {
            transform: translateX(0);
        }
        
        .toast-icon {
            margin-right: 10px;
            font-size: 18px;
        }
        
        .toast-success .toast-icon {
            color: var(--success-color);
        }
        
        .toast-message {
            font-size: 14px;
        }
        
        /* Chart container */
        .chart-container {
            height: 300px;
            margin-top: 20px;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo-container">
                <img src="https://tmu.edu.vn/template_dhtm/images/logo-sm.png" alt="Logo trường" class="logo">
                <div class="logo-text">TRƯỜNG ĐẠI HỌC THƯƠNG MẠI</div>
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
        
        <div class="main-content">
            <div class="top-bar">
                <div class="page-title">Quản lý nội dung </div>
                <div class="user-menu" onclick="toggleUserDropdown()">
                    <div class="user-avatar">A</div>
                    <div class="user-name">Admin</div>
                    <div><i class="fas fa-chevron-down"></i></div>
                    
                    <div class="user-dropdown" id="userDropdown">
                        <div class="dropdown-item"><i class="fas fa-user-circle mr-2"></i> Hồ sơ</div>
                        <div class="dropdown-item"><i class="fas fa-cog mr-2"></i> Cài đặt</div>
                        <div class="dropdown-item"><i class="fas fa-sign-out-alt mr-2"></i> Đăng xuất</div>
                    </div>
                </div>
            </div>
            
            <div class="dashboard-stats">
                <div class="stat-card" onclick="showDetailModal('Tổng số bài viết', 'Số bài viết đã tăng 15% trong tháng này.')">
                    <div class="stat-title">Tổng số bài viết</div>
                    <div class="stat-value">142</div>
                </div>
                <div class="stat-card" onclick="showDetailModal('Lượt truy cập tháng', 'Tăng 22% so với tháng trước.')">
                    <div class="stat-title">Lượt truy cập tháng</div>
                    <div class="stat-value">28,456</div>
                </div>
                <div class="stat-card" onclick="showDetailModal('Tương tác mạng xã hội', 'Facebook: 3,420, Instagram: 1,892, LinkedIn: 470')">
                    <div class="stat-title">Tương tác mạng xã hội</div>
                    <div class="stat-value">5,782</div>
                </div>
                <div class="stat-card" onclick="showDetailModal('Lượt đăng ký thông tin', '75% đăng ký từ trang tuyển sinh')">
                    <div class="stat-title">Lượt đăng ký thông tin</div>
                    <div class="stat-value">324</div>
                </div>
            </div>
            
            <div class="content-area">
                <div class="content-title">
                    <span>Tin tức & Sự kiện</span>
                    <div class="content-actions">
                        <button class="btn btn-primary" onclick="showCreatePostModal()"><i class="fas fa-plus mr-2"></i> Tạo bài viết mới</button>
                    </div>
                </div>
                
                <div class="tabs">
                    <div class="tab active" onclick="activateTab(this)">Tất cả</div>
                    <div class="tab" onclick="activateTab(this)">Đã xuất bản</div>
                    <div class="tab" onclick="activateTab(this)">Bản nháp</div>
                    <div class="tab" onclick="activateTab(this)">Đã lên lịch</div>
                    <div class="tab" onclick="activateTab(this)">Lưu trữ</div>
                </div>
                
                <div class="filter-bar">
                    <select class="filter-select" onchange="filterContent(this.value)">
                        <option value="">Tất cả danh mục</option>
                        <option value="tin-tuc">Tin tức</option>
                        <option value="su-kien">Sự kiện</option>
                        <option value="thong-bao">Thông báo</option>
                        <option value="hoat-dong">Hoạt động</option>
                    </select>
                    
                    <select class="filter-select" onchange="sortContent(this.value)">
                        <option value="">Sắp xếp theo</option>
                        <option value="newest">Mới nhất</option>
                        <option value="oldest">Cũ nhất</option>
                        <option value="views">Lượt xem</option>
                        <option value="name">Tên A-Z</option>
                    </select>
                </div>
                
                <div class="search-bar">
                    <input type="text" class="search-input" placeholder="Tìm kiếm bài viết..." oninput="searchContent(this.value)">
                    <button class="search-btn"><i class="fas fa-search"></i> Tìm kiếm</button>
                </div>
                
                <table>
                    <thead>
                        <tr>
                            <th style="width: 100px">Hình ảnh</th>
                            <th>Tiêu đề</th>
                            <th>Danh mục</th>
                            <th>Ngày tạo</th>
                            <th>Trạng thái</th>
                            <th>Lượt xem</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="https://th.bing.com/th/id/OIP.dDpeCGgGlKP-iKgt1ocjuQHaE8?w=305&h=203&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Thumbnail" class="preview-thumbnail"></td>
                            <td>Lễ kỷ niệm 60 năm thành lập trường Đại học Thương mại</td>
                            <td>Sự kiện</td>
                            <td>15/04/2025</td>
                            <td><span class="status-badge status-published">Đã xuất bản</span></td>
                            <td>1,245</td>
                            <td>
                                <button class="action-btn view-btn" onclick="viewPost(1)"><i class="fas fa-eye"></i> Xem</button>
                                <button class="action-btn edit-btn" onclick="editPost(1)"><i class="fas fa-edit"></i> Sửa</button>
                                <button class="action-btn delete-btn" onclick="deletePost(1)"><i class="fas fa-trash"></i> Xóa</button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://upload.wikimedia.org/wikipedia/vi/2/2a/Logo_%C4%90%E1%BA%A1i_h%E1%BB%8Dc_Th%C6%B0%C6%A1ng_m%E1%BA%A1i.jpg" alt="Thumbnail" class="preview-thumbnail"></td>
                            <td>Thông báo tuyển sinh đại học chính quy năm 2025</td>
                            <td>Thông báo</td>
                            <td>10/04/2025</td>
                            <td><span class="status-badge status-published">Đã xuất bản</span></td>
                            <td>2,189</td>
                            <td>
                                <button class="action-btn view-btn" onclick="viewPost(2)"><i class="fas fa-eye"></i> Xem</button>
                                <button class="action-btn edit-btn" onclick="editPost(2)"><i class="fas fa-edit"></i> Sửa</button>
                                <button class="action-btn delete-btn" onclick="deletePost(2)"><i class="fas fa-trash"></i> Xóa</button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://th.bing.com/th/id/OIP.MzE9FftPIlkjgP9DtuJLOwHaFW?w=229&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Thumbnail" class="preview-thumbnail"></td>
                            <td>Hội thảo khoa học "Phát triển kinh tế số tại Việt Nam"</td>
                            <td>Sự kiện</td>
                            <td>08/04/2025</td>
                            <td><span class="status-badge status-scheduled">Đã lên lịch</span></td>
                            <td>0</td>
                            <td>
                                <button class="action-btn view-btn" onclick="viewPost(3)"><i class="fas fa-eye"></i> Xem</button>
                                <button class="action-btn edit-btn" onclick="editPost(3)"><i class="fas fa-edit"></i> Sửa</button>
                                <button class="action-btn delete-btn" onclick="deletePost(3)"><i class="fas fa-trash"></i> Xóa</button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://th.bing.com/th/id/OIP.hhneV7E4YmI0qo4F1_xIlwHaEo?w=289&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7alt="Thumbnail" class="preview-thumbnail"></td>
                            <td>Sinh viên trường Đại học Thương mại đạt giải nhất cuộc thi Marketing Challenge</td>
                            <td>Tin tức</td>
                            <td>05/04/2025</td>
                            <td><span class="status-badge status-published">Đã xuất bản</span></td>
                            <td>856</td>
                            <td>
                                <button class="action-btn view-btn" onclick="viewPost(4)"><i class="fas fa-eye"></i> Xem</button>
                                <button class="action-btn edit-btn" onclick="editPost(4)"><i class="fas fa-edit"></i> Sửa</button>
                                <button class="action-btn delete-btn" onclick="deletePost(4)"><i class="fas fa-trash"></i> Xóa</button>
                            </td>
                        </tr>
                        <tr>
                            <td><img src="https://th.bing.com/th/id/OIP.cOzvzkOvyRygiEng-OBjJgHaE7?w=256&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="Thumbnail" class="preview-thumbnail"></td>
                            <td>Chương trình trao đổi sinh viên với các trường đại học Châu Âu</td>
                            <td>Tin tức</td>
                            <td>01/04/2025</td>
                            <td><span class="status-badge status-draft">Bản nháp</span></td>
                            <td>0</td>
                            <td>
                                <button class="action-btn view-btn" onclick="viewPost(5)"><i class="fas fa-eye"></i> Xem</button>
                                <button class="action-btn edit-btn" onclick="editPost(5)"><i class="fas fa-edit"></i> Sửa</button>
                                <button class="action-btn delete-btn" onclick="deletePost(5)"><i class="fas fa-trash"></i> Xóa</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="pagination">
                    <button class="page-btn">«</button>
                    <button class="page-btn active">1</button>
                    <button class="page-btn">2</button>
                    <button class="page-btn">3</button>
                    <button class="page-btn">»</button>
                </div>
            </div>
            
            <div class="content-area">
                <div class="content-title">
                    <span>Thông tin tuyển sinh nổi bật</span>
                    <div class="content-actions">
                        <button class="btn btn-primary" onclick="showAddInfoModal()"><i class="fas fa-plus mr-2"></i> Thêm thông tin</button>
                    </div>
                </div>
                
                <table>
                    <thead>
                        <tr>
                            <th>Tiêu đề</th>
                            <th>Chương trình</th>
                            <th>Năm học</th>
                            <th>Trạng thái</th>
                            <th>Lượt xem</th>
                