-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 20, 2025 lúc 08:35 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tuyensinhtmu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `noidung_bantin`
--

CREATE TABLE `noidung_bantin` (
  `id` int(11) NOT NULL,
  `muc` varchar(50) DEFAULT NULL,
  `tieude` varchar(255) DEFAULT NULL,
  `noidung` text DEFAULT NULL,
  `last_update` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hinhanh` varchar(255) DEFAULT NULL,
  `ngaydang` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `noidung_bantin`
--

INSERT INTO `noidung_bantin` (`id`, `muc`, `tieude`, `noidung`, `last_update`, `hinhanh`, `ngaydang`) VALUES
(1, 'Thông báo', 'Tin tức tuyển sinh | ĐH Thương mại', '<style>\r\n    body { font-family: Arial, sans-serif; background: linear-gradient(135deg, #003c71, #00538d); color: #333; margin: 0; }\r\n    .container { max-width: 800px; margin: 60px auto; background: #fff; border-radius: 12px; padding: 40px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); }\r\n    h1 { color: #003c71; font-size: 28px; margin-bottom: 20px; }\r\n    ul { padding-left: 20px; }\r\n    .note { background: #e6f3ff; padding: 10px 16px; border-left: 5px solid #0071c2; border-radius: 4px; margin-bottom: 24px; }\r\n  </style>\r\n</head>\r\n<body>\r\n  <div class=\"container\">\r\n    <h1>Tin tức mới nhất</h1>\r\n    <div class=\"note\">\r\n      Cập nhật các thông báo và tin tức quan trọng liên quan đến tuyển sinh năm 2025.\r\n    </div>\r\n    <ul>\r\n      <li>Ngày 15/04/2025: Công bố đề án tuyển sinh chính thức năm 2025.</li>\r\n      <li>Ngày 20/04/2025: Mở cổng đăng ký xét tuyển sớm trực tuyến.</li>\r\n      <li>Tháng 5/2025: Bắt đầu nhận hồ sơ xét tuyển kết hợp.</li>\r\n    </ul>\r\n  </div>\r\n\r\n', '2025-04-21 01:01:43', NULL, '2025-04-20 16:14:49'),
(2, 'Thông báo', 'Lịch tư vấn trực tuyến | ĐH Thương mại', '<style>\r\n    body { font-family: Arial, sans-serif; background: linear-gradient(135deg, #003c71, #00538d); color: #333; margin: 0; }\r\n    .container { max-width: 800px; margin: 60px auto; background: #fff; border-radius: 12px; padding: 40px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); }\r\n    h1 { color: #003c71; font-size: 28px; margin-bottom: 20px; }\r\n    ul { padding-left: 20px; }\r\n    .note { background: #e6f3ff; padding: 10px 16px; border-left: 5px solid #0071c2; border-radius: 4px; margin-bottom: 24px; }\r\n  </style>\r\n</head>\r\n<body>\r\n  <div class=\"container\">\r\n    <h1>Lịch tư vấn trực tuyến</h1>\r\n    <div class=\"note\">\r\n      Tham gia các buổi livestream tư vấn tuyển sinh và định hướng ngành nghề.\r\n    </div>\r\n    <ul>\r\n      <li>24/04/2025 (19h00): Giải đáp xét tuyển thẳng và ưu tiên.</li>\r\n      <li>01/05/2025 (20h00): Hỏi đáp chương trình chất lượng cao và liên kết quốc tế.</li>\r\n      <li>10/05/2025 (18h30): Tư vấn chọn ngành theo xu hướng thị trường.</li>\r\n    </ul>\r\n  </div>\r\n', '2025-04-21 01:08:01', NULL, '2025-04-20 16:14:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `noidung_dean`
--

CREATE TABLE `noidung_dean` (
  `id` int(11) NOT NULL,
  `muc` varchar(50) DEFAULT NULL,
  `tieude` varchar(255) DEFAULT NULL,
  `noidung` text DEFAULT NULL,
  `last_update` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hinhanh` varchar(255) DEFAULT NULL,
  `ngaydang` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `noidung_dean`
--

INSERT INTO `noidung_dean` (`id`, `muc`, `tieude`, `noidung`, `last_update`, `hinhanh`, `ngaydang`) VALUES
(1, 'Thông báo', 'Ngưỡng đảm bảo chất lượng đầu vào | ĐH Thương mại', '<style>\r\n    body { font-family: Arial, sans-serif; background: linear-gradient(135deg, #003c71, #00538d); color: #333; margin: 0; }\r\n    .container { max-width: 800px; margin: 60px auto; background: #fff; border-radius: 12px; padding: 40px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); }\r\n    h1 { color: #003c71; font-size: 28px; }\r\n    h2 { color: #00538d; font-size: 20px; margin-top: 30px; }\r\n    ul { padding-left: 20px; }\r\n    .note { background: #e6f3ff; padding: 10px 16px; border-left: 5px solid #0071c2; margin-bottom: 20px; border-radius: 4px; }\r\n    a { color: #003c71; text-decoration: none; }\r\n    a:hover { text-decoration: underline; }\r\n  </style>\r\n</head>\r\n<body>\r\n  <div class=\"container\">\r\n    <h1>Ngưỡng đảm bảo chất lượng đầu vào năm 2025</h1>\r\n    <div class=\"note\">\r\n      <strong>Cập nhật theo:</strong> Quy định của Bộ GD&ĐT và thông báo của Trường ĐH Thương mại.\r\n    </div>\r\n\r\n    <h2>Ngưỡng điểm tối thiểu</h2>\r\n    <p>Ngưỡng đảm bảo chất lượng đầu vào được áp dụng cho từng tổ hợp xét tuyển theo ngành. Mức điểm dao động từ 18 đến 23 điểm tùy theo ngành.</p>\r\n\r\n    <h2>Lưu ý</h2>\r\n    <ul>\r\n      <li>Điểm sàn áp dụng cho phương thức xét tuyển dựa trên điểm thi tốt nghiệp THPT;</li>\r\n      <li>Các phương thức khác có thể có ngưỡng riêng (chứng chỉ, giải HSG...);</li>\r\n      <li>Thông tin cụ thể được cập nhật thường xuyên trên website của trường.</li>\r\n    </ul>\r\n\r\n    <h2>Thông tin liên hệ</h2>\r\n    <ul>\r\n      <li>Website: <a href=\"https://tmu.edu.vn\">tmu.edu.vn</a></li>\r\n      <li>Email: tuyensinh@tmu.edu.vn</li>\r\n      <li>Hotline: 024.3764.3219</li>\r\n    </ul>\r\n  </div>\r\n', '2025-04-21 01:34:53', '', '0000-00-00 00:00:00'),
(2, 'Thông báo', 'Điểm chuẩn 2024 | ĐH Thương mại', ' <style>\r\n    body { font-family: Arial, sans-serif; background: linear-gradient(135deg, #003c71, #00538d); color: #333; margin: 0; }\r\n    .container { max-width: 800px; margin: 60px auto; background: #fff; border-radius: 12px; padding: 40px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); }\r\n    h1 { color: #003c71; font-size: 28px; }\r\n    h2 { color: #00538d; font-size: 20px; margin-top: 30px; }\r\n    table { width: 100%; border-collapse: collapse; margin-top: 20px; }\r\n    th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }\r\n    th { background-color: #e6f3ff; }\r\n    .note { background: #e6f3ff; padding: 10px 16px; border-left: 5px solid #0071c2; margin-bottom: 20px; border-radius: 4px; }\r\n  </style>\r\n</head>\r\n<body>\r\n  <div class=\"container\">\r\n    <h1>Điểm chuẩn trúng tuyển năm 2024</h1>\r\n    <div class=\"note\">\r\n      <strong>Lưu ý:</strong> Điểm chuẩn có thể thay đổi mỗi năm. Dưới đây là bảng điểm chuẩn năm 2024 để tham khảo.\r\n    </div>\r\n\r\n    <table>\r\n      <thead>\r\n        <tr>\r\n          <th>Ngành</th>\r\n          <th>Tổ hợp môn</th>\r\n          <th>Điểm chuẩn</th>\r\n        </tr>\r\n      </thead>\r\n      <tbody>\r\n        <tr>\r\n          <td>Kinh tế quốc tế</td>\r\n          <td>D01</td>\r\n          <td>27.50</td>\r\n        </tr>\r\n        <tr>\r\n          <td>Marketing</td>\r\n          <td>A01, D01</td>\r\n          <td>26.75</td>\r\n        </tr>\r\n        <tr>\r\n          <td>Tài chính - Ngân hàng</td>\r\n          <td>A00, D01</td>\r\n          <td>25.50</td>\r\n        </tr>\r\n        <tr>\r\n          <td>Quản trị kinh doanh</td>\r\n          <td>A01, D01</td>\r\n          <td>26.25</td>\r\n        </tr>\r\n      </tbody>\r\n    </table>\r\n  </div>\r\n', '2025-04-21 01:35:04', '\r\n', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `noidung_phuongthuc`
--

CREATE TABLE `noidung_phuongthuc` (
  `id` int(11) NOT NULL,
  `muc` varchar(50) DEFAULT NULL,
  `tieude` varchar(255) DEFAULT NULL,
  `noidung` text DEFAULT NULL,
  `last_update` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hinhanh` varchar(255) DEFAULT NULL,
  `ngaydang` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `noidung_phuongthuc`
--

INSERT INTO `noidung_phuongthuc` (`id`, `muc`, `tieude`, `noidung`, `last_update`, `hinhanh`, `ngaydang`) VALUES
(1, 'Thông báo', 'Xét tuyển thẳng, ưu tiên xét tuyển | ĐH Thương mại', '<style>\r\n    body{ font-family: Arial, sans-serif; max-width: 720px; margin: 32px auto; background: #f8f9fa; padding: 24px; }\r\n    h1 { color: #0071c2; }\r\n    h2 { color: #222; margin-top: 24px; }\r\n    .note { background: #e6f7ff; border-left: 5px solid #0071c2; padding: 12px 16px; margin-bottom: 24px; }\r\n    ul { margin: 0 0 16px 24px; }\r\n  </style>\r\n</head>\r\n<body>\r\n  <h1>Xét tuyển thẳng, ưu tiên xét tuyển</h1>\r\n  <div class=\"note\">\r\n    <b>Căn cứ:</b> Điều 7 Thông tư 08/2022/TT-BGDĐT; Thông báo số 63/TB-ĐHTM ngày 03/4/2024 của ĐH Thương mại.\r\n  </div>\r\n\r\n  <h2>Đối tượng xét tuyển thẳng, ưu tiên xét tuyển</h2>\r\n  <ul>\r\n    <li>Thí sinh đạt giải quốc tế, quốc gia các môn văn hóa, thể thao, nghệ thuật;</li>\r\n    <li>Thí sinh là học sinh các trường chuyên/năng khiếu;</li>\r\n    <li>Thí sinh thuộc diện ưu tiên khác theo quy chế hiện hành (người dân tộc thiểu số, vùng đặc biệt khó khăn...);</li>\r\n    <li>Các đối tượng khác theo quy định của Bộ GD&ĐT và nhà trường.</li>\r\n  </ul>\r\n\r\n  <h2>Hồ sơ đăng ký</h2>\r\n  <ul>\r\n    <li>Đơn đăng ký xét tuyển thẳng, ưu tiên xét tuyển (theo mẫu của trường);</li>\r\n    <li>Bản sao giấy tờ minh chứng: giải thưởng, giấy xác nhận đối tượng ưu tiên, ...</li>\r\n    <li>Bản sao học bạ THPT.</li>\r\n  </ul>\r\n\r\n  <h2>Thông tin liên hệ</h2>\r\n  <ul>\r\n    <li>Website: <a href=\"https://tmu.edu.vn/\" target=\"_blank\">https://tmu.edu.vn/</a></li>\r\n    <li>Email: tuyensinh@tmu.edu.vn</li>\r\n    <li>Hotline: 024.3764.3219</li>\r\n  </ul>\r\n', '2025-04-21 01:31:12', '', '2025-04-20 15:58:47'),
(4, 'thongbao', 'Xét tuyển THPT 2025 | ĐH Thương mại', '<style>\r\n    body { font-family: Arial, sans-serif; background: linear-gradient(135deg, #003c71, #00538d); color: #333; margin: 0; }\r\n    .container { max-width: 800px; margin: 60px auto; background: #fff; border-radius: 12px; padding: 40px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); }\r\n    h1 { color: #003c71; font-size: 28px; }\r\n    h2 { color: #00538d; font-size: 20px; margin-top: 30px; }\r\n    ul { padding-left: 20px; }\r\n    .note { background: #e6f3ff; padding: 10px 16px; border-left: 5px solid #0071c2; margin-bottom: 20px; border-radius: 4px; }\r\n    a { color: #003c71; text-decoration: none; }\r\n    a:hover { text-decoration: underline; }\r\n  </style>\r\n</head>\r\n<body>\r\n  <div class=\"container\">\r\n    <h1>Xét tuyển theo kết quả thi tốt nghiệp THPT năm 2025</h1>\r\n    <div class=\"note\">\r\n      <strong>Căn cứ:</strong> Quy chế tuyển sinh đại học chính quy năm 2025 do Bộ GD&ĐT ban hành.\r\n    </div>\r\n\r\n    <h2>Điều kiện xét tuyển</h2>\r\n    <ul>\r\n      <li>Thí sinh đã tham dự kỳ thi tốt nghiệp THPT năm 2025;</li>\r\n      <li>Điểm tổ hợp môn xét tuyển đạt ngưỡng đảm bảo chất lượng đầu vào theo từng ngành;</li>\r\n      <li>Đăng ký nguyện vọng xét tuyển đúng thời gian quy định trên hệ thống của Bộ GD&ĐT.</li>\r\n    </ul>\r\n\r\n    <h2>Tổ hợp môn xét tuyển</h2>\r\n    <p>Tùy theo ngành, các tổ hợp có thể bao gồm:</p>\r\n    <ul>\r\n      <li>A00 (Toán, Lý, Hóa), A01 (Toán, Lý, Anh);</li>\r\n      <li>D01 (Toán, Văn, Anh), C00 (Văn, Sử, Địa)...</li>\r\n    </ul>\r\n\r\n    <h2>Thông tin liên hệ</h2>\r\n    <ul>\r\n      <li>Website: <a href=\"https://tmu.edu.vn\">tmu.edu.vn</a></li>\r\n      <li>Email: tuyensinh@tmu.edu.vn</li>\r\n      <li>Hotline: 024.3764.3219</li>\r\n    </ul>\r\n  </div>\r\n', '2025-04-21 01:31:37', '', '2025-04-20 21:12:40'),
(5, 'thongbao', 'Đánh giá năng lực | ĐH Thương mại', '<style>\r\n    body { font-family: Arial, sans-serif; background: linear-gradient(135deg, #003c71, #00538d); color: #333; margin: 0; }\r\n    .container { max-width: 800px; margin: 60px auto; background: #fff; border-radius: 12px; padding: 40px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); }\r\n    h1 { color: #003c71; font-size: 28px; }\r\n    h2 { color: #00538d; font-size: 20px; margin-top: 30px; }\r\n    ul { padding-left: 20px; }\r\n    .note { background: #e6f3ff; padding: 10px 16px; border-left: 5px solid #0071c2; margin-bottom: 20px; border-radius: 4px; }\r\n    a { color: #003c71; text-decoration: none; }\r\n    a:hover { text-decoration: underline; }\r\n  </style>\r\n</head>\r\n<body>\r\n  <div class=\"container\">\r\n    <h1>Xét tuyển theo kết quả thi Đánh giá năng lực / Đánh giá tư duy</h1>\r\n    <div class=\"note\">\r\n      <strong>Căn cứ:</strong> Kết quả thi ĐGNL/ĐGTD của các trường ĐH Bách Khoa HN, ĐHQG Hà Nội, ĐHQG TP.HCM.\r\n    </div>\r\n\r\n    <h2>Yêu cầu xét tuyển</h2>\r\n    <ul>\r\n      <li>Thí sinh có chứng chỉ kết quả kỳ thi ĐGNL hoặc ĐGTD năm 2025;</li>\r\n      <li>Đạt mức điểm tối thiểu theo quy định của ĐH Thương mại;</li>\r\n      <li>Nộp bản sao chứng chỉ cùng hồ sơ đăng ký.</li>\r\n    </ul>\r\n\r\n    <h2>Thông tin liên hệ</h2>\r\n    <ul>\r\n      <li>Website: <a href=\"https://tmu.edu.vn\">tmu.edu.vn</a></li>\r\n      <li>Email: tuyensinh@tmu.edu.vn</li>\r\n      <li>Hotline: 024.3764.3219</li>\r\n    </ul>\r\n  </div>\r\n', '2025-04-21 01:31:58', '', '2025-04-20 21:13:29');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `noidung_bantin`
--
ALTER TABLE `noidung_bantin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `noidung_dean`
--
ALTER TABLE `noidung_dean`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `noidung_phuongthuc`
--
ALTER TABLE `noidung_phuongthuc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `noidung_bantin`
--
ALTER TABLE `noidung_bantin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `noidung_dean`
--
ALTER TABLE `noidung_dean`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `noidung_phuongthuc`
--
ALTER TABLE `noidung_phuongthuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
