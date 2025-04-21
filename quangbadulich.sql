
-- Tạo cơ sở dữ liệu
CREATE DATABASE IF NOT EXISTS quangbadulich;
USE quangbadulich;

-- Tạo bảng người dùng
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE KEY,
    password VARCHAR(255) NOT NULL,
    fullname VARCHAR(100),
    dob VARCHAR(10),
    gender VARCHAR(10),
    email VARCHAR(100),
    income VARCHAR(50)
);

-- Thêm dữ liệu mẫu
INSERT INTO users (username, password, fullname, dob, gender, email, income) VALUES
('nguyenvana', '$2y$10$1234567890abcdefghijklmnopqrstuv', 'Nguyễn Văn A', '01/1995', 'Nam', 'vana@example.com', '12000000'),
('tranthib', '$2y$10$abcdefghij1234567890klmnopqrstuv', 'Trần Thị B', '03/1998', 'Nữ', 'thib@example.com', '8500000'),
('letrongc', '$2y$10$zxcvbnmasdfghjklqwertyuiop123456', 'Lê Trọng C', '07/1992', 'Nam', 'trongc@example.com', '15000000');


CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL,
  `location` varchar(40) NOT NULL,
  `descript` text NOT NULL,
  `img` varbinary(6550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`);

ALTER TABLE `posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT;