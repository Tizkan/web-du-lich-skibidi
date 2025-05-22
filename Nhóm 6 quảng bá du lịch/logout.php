<?php
session_start();

session_destroy(); // Hủy phiên
header("Location: Loginn.php"); // Chuyển hướng về trang đăng nhập
exit();
?>  
