-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2025 at 04:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quangbadulich`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `location` varchar(40) NOT NULL,
  `descript` text NOT NULL,
  `img` varbinary(6550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_post`, `location`, `descript`, `img`) VALUES
(1, 'Cù Lao Xanh - Quy Nhơn', 'Đến với Quy Nhơn bạn không thể bỏ qua Cù Lao Xanh - Một hòn đảo quân sự, nằm cách cửa biển Quy Nhơn 13 hải lý. Cù Lao Xanh có diện tích khoảng 70ha san hô rộng lớn bao quanh đảo, nơi đây có rất nhiều loại hải sản quý hiếm, các rặng san hô đầy sắc màu và làn nước xanh mát lôi cuốn.\r\n\r\nThời gian thích hợp nhất để đi Cù Lao Xanh là từ tháng 2 - 9, thời điểm này biển lặng, nắng đẹp, nước biển trong xanh, bạn có thể thoải mái tắm biển, lặn ngắm san hô quanh đảo. Lưu ý, từ tháng 10 - 2 là thời điểm mưa nhiều, biển động, có nhiều sóng lớn nên không phù hợp để đi du lịch Cù Lao Xanh mùa này.\r\n\r\nPhương tiện đến Cù Lao Xanh có 2 loại chính đó là cano và tàu gỗ:\r\n\r\nThời gian đi cano mất khoảng 25 phút, giá vé là 200.000đ/người/lượt.\r\nThời gian đi bằng tàu gỗ mất khoảng 2 tiếng, giá vé 35.000đ/người/lượt.\r\nDu lịch Cù Lao Xanh bạn sẽ có cơ hội tham gia vào các hoạt động như:\r\n\r\nTắm biển, lặn ngắm san hô (chi phí khoảng 100.000đ/người), trải nghiệm cảm giác mạnh với trò chơi mô tô nước hay câu mực,...\r\nKhám phá các địa điểm tham quan hấp dẫn trên đảo như: Khu dã ngoại Cù Lao Xanh (giá vé vào cổng khoảng 10.000đ/người), Bãi Đá Thảo Nguyên - nơi check in vô cùng lý tưởng, với những bãi đá nhiều hình thù lạ mắt, ngọn Hải Đăng, cột cờ chủ quyền, Bãi Nam,...\r\nThưởng thức các món đặc sản vô cùng hấp dẫn như: Cua đá (600.000đ - 800.000đ/kg), mực lá (350.000đ - 500.000đ/kg), nhím biển, ốc mặt trăng, vú nàng nướng mỡ hành, rượu vú zẻ,...', 0x123456),
(2, 'Mongo Land Dalat', 'Mongo Land Đà Lạt là địa điểm du lịch vui chơi nổi tiếng cách trung tâm thành phố Đà Lạt khoảng 20km về phía Tây Nam. Sau khoảng 30 phút lái xe, bạn có thể đến với Mongo Land nơi được mệnh danh là “tiểu vương quốc” Mông Cổ giữa xứ sở ngàn hoa. Khi đến đây, bạn sẽ có cơ hội hưởng trọn không khí trong lành và cảm nhận những làn gió se lạnh của Đà Lạt. Không những thế, bao quanh Mongo Land là những ngọn đồi núi trập trùng, xa xa là những trang trại cà phê bạt ngàn giữa đồi thông rộng lớn chắc chắn sẽ làm thỏa mãn thị giác của bạn. Theo kinh nghiệm du lịch Đà Lạt đây là điểm đến lý tưởng cho những ai yêu thích trải nghiệm, các gia đình có con nhỏ đang tìm kiếm không gian rộng lớn và mát mẻ cho trẻ em vui chơi, nô đùa. ', 0x123123);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `dob` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `income` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `dob`, `gender`, `email`, `income`) VALUES
(1, 'nguyenvana', '$2y$10$1234567890abcdefghijklmnopqrstuv', 'Nguyễn Văn A', '01/1995', 'Nam', 'vana@example.com', '12000000'),
(2, 'tranthib', '$2y$10$abcdefghij1234567890klmnopqrstuv', 'Trần Thị B', '03/1998', 'Nữ', 'thib@example.com', '8500000'),
(3, 'letrongc', '$2y$10$zxcvbnmasdfghjklqwertyuiop123456', 'Lê Trọng C', '07/1992', 'Nam', 'trongc@example.com', '15000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
