<?php
include 'db.php';
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Khởi tạo biến
$username = '';
$password = '';
$remember = '';

// Kiểm tra xem cookie có được thiết lập không
if (isset($_COOKIE['remember_username']) && isset($_COOKIE['remember_password'])) {
    $username = $_COOKIE['remember_username'];
    $password = $_COOKIE['remember_password'];
}

// Xử lý khi người dùng gửi form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];    
    // Sử dụng Prepared Statements
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username=?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Lấy dữ liệu
        $stmt->bind_result($userId, $dbUsername, $hashed_password);
        $stmt->fetch();

        // Kiểm tra mật khẩu
        if (password_verify($pass, $hashed_password)) {
            // Đăng nhập thành công
            $_SESSION['user_id'] = $userId;
            $_SESSION["username"] = $dbUsername;

            // Xử lý cookie nhớ mật khẩu
            if (isset($_POST['remember'])) {
    setcookie('username', $user, time() + (86400 * 30), "/"); // Lưu tên đăng nhập
    setcookie('password', $pass, time() + (86400 * 30), "/"); // Lưu mật khẩu
} else {
    // Xóa cookie nếu không nhớ mật khẩu
    setcookie('username', '', time() - 3600, "/");
    setcookie('password', '', time() - 3600, "/");
}

            header("Location: Template.php");
            exit();
        } else {
            echo "Tên đăng nhập hoặc mật khẩu không đúng.";
        }
    } else {
        echo "Tên đăng nhập hoặc mật khẩu không đúng.";
    }
}
$stmt->close();
$conn->close();
?>