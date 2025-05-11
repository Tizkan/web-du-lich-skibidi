<?php

include 'db.php';
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Lấy thông tin từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Sử dụng Prepared Statements
    $stmt = $conn->prepare("SELECT password FROM users WHERE username=?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Lấy mật khẩu đã mã hóa từ cơ sở dữ liệu
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Kiểm tra mật khẩu
        if (password_verify($pass, $hashed_password)) {
            // Đăng nhập thành công, chuyển hướng đến trang chính
            $_SESSION['username'] = $user;
            header("Location: Template.php");
            exit();
        } else {
            // Đăng nhập thất bại
            echo "Tên đăng nhập hoặc mật khẩu không đúng.";
        }
    } else {
        // Tên đăng nhập không tồn tại
        echo "Tên đăng nhập hoặc mật khẩu không đúng.";
    }
    if ($username === 'user' && $password === 'pass') {
        $_SESSION['username'] = $username; // Lưu tên người dùng vào session
        header("Location: Template.php"); // Chuyển hướng đến trang chính
        exit();
    } else {
        $error = "Tên đăng nhập hoặc mật khẩu không đúng.";
    }
}

$conn->close();
?>
