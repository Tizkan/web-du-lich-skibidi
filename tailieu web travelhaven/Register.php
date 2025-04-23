<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $fullname = trim($_POST['fullname']);
    $dob = $_POST['dob'];
    $gender = $_POST['gender'] ?? '';
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone']?? '');

    // Kiểm tra mật khẩu
    if ($password !== $confirm_password) {
        die("Mật khẩu không khớp!");
    }

    // Kiểm tra xem tên đăng nhập đã tồn tại chưa
    $check_username_sql = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($check_username_sql);
    if (!$stmt) {
        die("Lỗi trong truy vấn: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        die("Tên đăng nhập đã tồn tại. Vui lòng chọn tên khác.");
    }

    // Mã hóa mật khẩu trước khi lưu trữ
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Chuẩn bị câu lệnh SQL để chèn dữ liệu
    $sql = "INSERT INTO users (username, password, fullname, dob, gender, email, phone) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Lỗi trong truy vấn: " . $conn->error);
    }
    var_dump($gender, $phone); 
    $stmt->bind_param("sssssss", $username, $hashed_password, $fullname, $dob, $gender, $email, $phone);

    if ($stmt->execute()) {
        echo "Đăng ký thành công!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Không có dữ liệu gửi đến.";
}

$conn->close();
?>