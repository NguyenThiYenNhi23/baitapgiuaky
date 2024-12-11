-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 11, 2024 lúc 04:06 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `QLSV_NguyenThiYenNhi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_Students`
--

CREATE TABLE `table_Students` (
  `id` int(50) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `gender` int(10) NOT NULL,
  `hometown` varchar(250) NOT NULL,
  `level` int(11) NOT NULL,
  `group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `table_Students`
--

INSERT INTO `table_Students` (`id`, `fullname`, `dob`, `gender`, `hometown`, `level`, `group`) VALUES
(1, 'Nguyễn Thị Yến Nhi', '2004-09-23', 0, 'Thái Bình ', 3, 4),
(2, 'Phạm Ngọc Ánh', '2005-05-23', 0, 'Thái Bình ', 3, 4),
(3, 'Đỗ Hà Duyên ', '2005-10-15', 0, 'Nam Định ', 3, 4),
(4, 'Ninh Thị Lành ', '2005-01-18', 0, 'Nam Định ', 3, 4),
(5, 'Hoàng Thị Hiền ', '2005-06-23', 0, 'Hải Phòng ', 3, 4),
(6, 'Đỗ Thị Lan Hương ', '2005-03-21', 0, 'Hải Phòng ', 3, 4),
(7, 'Trần Thị Thu Huyền ', '2005-11-19', 0, 'Hà Nội ', 3, 4);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `table_Students`
--
ALTER TABLE `table_Students`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
