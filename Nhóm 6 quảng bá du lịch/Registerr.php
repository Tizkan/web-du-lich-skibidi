<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng Ký Khách Hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://images.pexels.com/photos/6726717/pexels-photo-6726717.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');
            display: flex;
            justify-content: center;
            align-items: center;
            height: 30vh;
            margin: 0;
        }
        img{
            width: 100vmax;
            height: 65vmax;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.208);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.75);
            width: 400px;
            margin-top: 50%;
            position: absolute;
        }
        h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .section {
            border: 2px solid #007bff; /* Đường viền màu xanh */
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 10px;
        }
        .section-title {
            margin-bottom: 10px;
            font-weight: bold;
            text-align: center;
            font-size: 18px; /* Kích thước chữ lớn hơn */
        }
        .form-group {
            margin-bottom: 5px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .gender-group {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .required {
            color: red;
        }
        .register-button {
            background-color: rgb(59, 132, 216);
            color: white;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            width: 30%;
            margin-left: 50px;
            margin-top: 10px;
            font-size: 16px; /* Kích thước chữ cho nút */
        }
        .register-button:hover {
            background-color: #0056b3;
        }
        .login-button {
            background-color: rgb(59, 132, 216);
            color: white;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            width: 30%;
            margin-left: 50px;
            margin-top: 10px;
            font-size: 16px; 
        }
        .login-button:hover {
            background-color: #0056b3;
        }
        .theme-switch-wrapper {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .theme-switch {
            display: inline-block;
            height: 34px;
            position: relative;
            width: 60px;
        }
        .theme-switch input {
            display: none;
        }
        .slider {
            background-color: #ffffff;
            bottom: 0;
            cursor: pointer;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            transition: .4s;
        }
        .slider:before {
            background-color: rgb(255, 255, 255);
            bottom: 4px;
            content: "";
            height: 26px;
            left: 4px;
            position: absolute;
            transition: .4s;
            width: 26px;
        }
        input:checked + .slider {
            background-color: #000000;
        }
        input:checked + .slider:before {
            transform: translateX(26px);
            background-color: #ccc;
        }
        .slider.round {
            border-radius: 34px;
        }
        .slider.round:before {
            border-radius: 50%;
            background-color: #000000;
        }
        [data-theme="dark"] body {
            background: url('https://images.pexels.com/photos/29268076/pexels-photo-29268076/free-photo-of-b-u-tr-i-dem-tuy-t-d-p-tran-ng-p-nh-ng-vi-sao-va-c-c-quang-r-c-r.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2'); /* Thay thế bằng link hình ảnh của bạn */
            background-size: cover; /* Đảm bảo hình ảnh phủ toàn bộ */
            background-position: center; /* Căn giữa hình ảnh */
        }
    </style>
</head>
<body>
    <div class="theme-switch-wrapper">
        <label class="theme-switch" for="checkbox">
            <input type="checkbox" id="checkbox" />
            <div class="slider round"></div>
        </label>
    </div>
<div class="container">
    <h2>Đăng Ký Khách Hàng</h2>
    <form action="Register.php" method="post">
    <div class="section">
        <div class="section-title">Thông Tin Đăng Nhập</div>
        <div class="form-group">
            <label for="username">Tên đăng nhập</label>
            <input type="text" name="username" placeholder="Nhập tên đăng nhập" required>
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" placeholder="Nhập mật khẩu" required>
        </div>
        <div class="form-group">
            <label for="confirm-password">Nhập lại mật khẩu <span class="required">*</span></label>
            <input type="password" name="confirm-password" placeholder="Nhập lại mật khẩu" required>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Thông Tin Chi Tiết Cá Nhân</div>
        <div class="form-group">
            <label for="fullname">Họ tên khách hàng</label>
            <input type="text" name="fullname" placeholder="Nhập họ tên" required>
        </div>
        <div class="form-group" >
            <label for="dob">Ngày sinh <span class="required">*</span></label>
            <input type="text" name="dob" placeholder="MM/YYYY" required>
        </div>
        <div class="gender-group">
            <label>Giới tính</label>
            <input type="radio" name="gender" value="Nam" required>Nam
            <input type="radio" name="gender" value="Nữ" required>Nữ
            <input type="radio" name="gender" value="Khác" required>Khác
        </div>
        <div class="form-group">
            <label for="email">Địa chỉ email <span class="required">*</span></label>
            <input type="email" name="email" placeholder="Nhập email" required>
        </div>
        <div class="form-group">
            <label for="phone">SĐT</label>
            <input type="text" name="phone" placeholder="Nhập số điện thoại" required>
        </div>
    </div>
    <center><i>Bạn phải điền đầy đủ thông tin có đánh dấu (*)</i></center>
    <button class="register-button">Đăng ký</button>
    <a href="Login.html"><button class="login-button">Đăng Nhập</button></a>
</form>
</div>
<script>
    const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
    const currentTheme = localStorage.getItem('theme');

    if (currentTheme) {
        document.documentElement.setAttribute('data-theme', currentTheme);
        toggleSwitch.checked = currentTheme === 'dark';
    }

    function switchTheme(e) {
        const theme = e.target.checked ? 'dark' : 'light';
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
    }

    toggleSwitch.addEventListener('change', switchTheme);

    function kiemtra() {
        const email = document.getElementById('email').value;
 
    }
</script>
</body>
</html>