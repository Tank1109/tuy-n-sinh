-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2025 at 08:27 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

CREATE TABLE `baiviet` (
  `id` int(11) NOT NULL,
  `tieu_de` varchar(255) NOT NULL,
  `mo_ta_ngan` text DEFAULT NULL,
  `hinhanh` varchar(255) DEFAULT NULL,
  `theloai` enum('tin_tuc','su_kien') NOT NULL,
  `chuyenmuc` varchar(100) DEFAULT NULL,
  `hot` tinyint(1) DEFAULT 0,
  `ngay_dang` date DEFAULT NULL,
  `duongdan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baiviet`
--

INSERT INTO `baiviet` (`id`, `tieu_de`, `mo_ta_ngan`, `hinhanh`, `theloai`, `chuyenmuc`, `hot`, `ngay_dang`, `duongdan`) VALUES
(1, 'Lễ Khai giảng Đào tạo Từ xa Khoá 7', 'Khai giảng Đào tạo Từ xa Khoá 7', '469509898_122159529398309206_2152851404526705231_n.jpg', 'tin_tuc', 'Đào tạo', 1, '2025-04-15', '/tin-tuc/khoa-7'),
(2, 'Gặp mặt thân mật nhân dịp kỷ niệm 80 năm thành lập QĐND Việt Nam và 35 năm ngày hội Quốc phòng', 'Gặp mặt nhân dịp kỷ niệm 80 năm thành lập QĐND VN và 35 năm ngày hội QP', 'img2.jpg', 'tin_tuc', 'Hội cựu chiến binh', 1, '2025-04-05', '/tin-tuc/qdnd-80'),
(3, 'Lễ trao giấy chứng nhận đạt chuẩn AUN-QA', 'Giấy chứng nhận kiểm định chương trình đào tạo theo tiêu chuẩn AUN-QA', 'img3.jpg', 'tin_tuc', 'Hội đồng giáo sư', 1, '2025-04-10', '/tin-tuc/aun-qa'),
(4, 'Cập nhật thông tin công khai đối với cơ sở giáo dục Đại học năm 2024', NULL, 'img4.jpg', 'tin_tuc', 'Báo cáo công khai', 0, '2025-04-01', '/tin-tuc/thong-tin'),
(5, 'Lễ tốt nghiệp khóa 2020-2024', 'Tốt nghiệp khóa 2020-2024', 'img5.jpg', 'su_kien', 'Sự kiện', 1, '2025-04-12', '/su-kien/tot-nghiep'),
(6, 'Đại hội đại biểu Đoàn TNCS Hồ Chí Minh nhiệm kỳ 2024-2026', 'Đại hội Đoàn TNCS Hồ Chí Minh nhiệm kỳ 2024-2026', 'img6.jpg', 'su_kien', 'Đoàn thanh niên', 1, '2025-04-05', '/su-kien/dai-hoi-doan'),
(7, 'Hội nghị Công chức, Viên chức và Người lao động năm học 2024-2025', 'Hội nghị Công chức, Viên chức và Người lao động năm học 2024-2025', 'img7.jpg', 'su_kien', 'Hội nghị', 0, '2025-04-08', '/su-kien/hoi-nghi'),
(8, 'Chào mừng ngày Nhà giáo Việt Nam 20/11', NULL, 'img8.jpg', 'su_kien', 'Sự kiện', 0, '2025-04-02', '/su-kien/20-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
