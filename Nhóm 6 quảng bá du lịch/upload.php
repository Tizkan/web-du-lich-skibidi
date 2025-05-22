<?php
include 'db.php'; // Kết nối đến cơ sở dữ liệu

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = $_POST['location'];
    $descript = $_POST['mota'];
    
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["nhap"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Kiểm tra lỗi tải lên
    if ($_FILES["nhap"]["error"] !== UPLOAD_ERR_OK) {
        switch ($_FILES["nhap"]["error"]) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                echo "File quá lớn.";
                exit();
            case UPLOAD_ERR_PARTIAL:
                echo "File chỉ được tải lên một phần.";
                exit();
            case UPLOAD_ERR_NO_FILE:
                echo "Không có file nào được tải lên.";
                exit();
            default:
                echo "Có lỗi không xác định.";
                exit();
        }
    }

    // Kiểm tra xem file có phải là hình ảnh không
    $check = getimagesize($_FILES["nhap"]["tmp_name"]);
    if ($check === false) {
        echo "File không phải là hình ảnh.";
        exit();
    }

    // Kiểm tra kích thước file
    if ($_FILES["nhap"]["size"] > 5000000) { // 5MB
        echo "Xin lỗi, file của bạn quá lớn.";
        exit();
    }

    // Kiểm tra định dạng file
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo "Xin lỗi, chỉ cho phép định dạng JPG, JPEG, PNG & GIF.";
        exit();
    }

    if (move_uploaded_file($_FILES["nhap"]["tmp_name"], $target_file)) {
        // Lưu thông tin vào cơ sở dữ liệu
        $sql = "INSERT INTO posts (location, descript, image) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $location, $descript, $target_file);
        if ($stmt->execute()) {
            echo "Thông tin đã được lưu thành công!";
            header("Location: chi-tiet-gia-lai.php");
            exit();
        } else {
            echo "Lỗi: " . $stmt->error;
        }
    } else {
        echo "Xin lỗi, có lỗi xảy ra khi tải file lên.";
    }
}

$conn->close();
?>