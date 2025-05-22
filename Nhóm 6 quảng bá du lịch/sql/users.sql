-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 21, 2025 lúc 02:22 AM
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
-- Cơ sở dữ liệu: `quangbadulich`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(255) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `dob` varchar(10) NOT NULL,
  `gender` enum('Nam','Nữ','Khác') DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `Role` int(11) NOT NULL,
  `auth_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `dob`, `gender`, `email`, `phone`, `Role`, `auth_token`) VALUES
(1, 'nguyenvana', '$2y$10$1234567890abcdefghijklmnopqrstuv', 'Nguyễn Văn A', '01/1995', 'Nam', 'vana@example.com', '084594573', 0, ''),
(2, 'tranthib', '$2y$10$abcdefghij1234567890klmnopqrstuv', 'Trần Thị B', '03/1998', 'Nữ', 'thib@example.com', '084629573', 0, ''),
(3, 'ADMIN', 'ADMIN1', 'ADMIN', '', '', '', '', 1, ''),
(74, 'buikhanhduong', '$2y$10$KGLaaL..fuNUrTJmFdbQpel4M1bajBN4btPhyXzXO7Dd2zlSHAGnG', 'Bui Van Chuoi', '18/02/2005', 'Khác', 'buivanchuoi18@gmail.com', '0399894235', 0, '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
