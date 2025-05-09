<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8"> 
    <title>Đăng nhập</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url('https://images.pexels.com/photos/8513049/pexels-photo-8513049.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow-y: hidden;
            transition: background-image 0.3s;
        }
        img {
            width: 100vmax;
            margin-top: -19.8vmin;
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.221);
            padding: 80px;
            border-radius: 20px;
            height: 380px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.75);
            position: absolute;
            transition: background-color 0.3s;
        }

        h2 {
            margin-bottom: 15px;
            text-align: center;
        }
        .login-container img {
            width: 220px;
            margin-left: 28px;
            margin-top: -50px;
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 2px;
        }
        .remember-me {
            margin-bottom: 12px;
        }
        .remember-me label {
            margin-right: 30px;
            justify-content: space-between;
        }   
        .remember-me a:hover {
            color: #ffffff;
        }
        p a:hover {
            color: #ffffff;
        }
        .login-button {
            background-color: rgb(59, 132, 216);
            color: #fcfcfc;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            width: 55%;
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
            background: url('https://images.pexels.com/photos/2874066/pexels-photo-2874066.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');
            background-size: cover; 
            background-position: center; 
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
    <div class="login-container">
        <img src="http://localhost/BT/Nh%c3%b3m%206%20qu%e1%ba%a3ng%20b%c3%a1%20du%20l%e1%bb%8bch/img/logo.png" alt="TravelHaven">
        <h2>Đăng nhập</h2>
        <form action="Login.php" method="post">
            <div class="form-group">
                <input type="text" id="username" name="username" placeholder="Tài khoản" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Mật khẩu" required>
            </div>
            <div class="remember-me">
                <label><input type="checkbox" name="remember">Nhớ mật khẩu</label>
                <a href="#">Quên mật khẩu?</a>
            </div>
            <button type="submit" class="login-button">Đăng nhập</button>
            <p>Chưa có tài khoản?<a href="Register.html"> Đăng ký </a></p>
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
    </script>
</body>
</html>