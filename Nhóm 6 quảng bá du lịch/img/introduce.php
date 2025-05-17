<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style-chitiet-chung-sql.css">
        <title> QUẢNG BÁ DU LỊCH</title>
    </head>
    <body>
        <header>
            <div class="logo">
                <img src="img/logo.jpg" alt="Travel Haven">
            </div>
            <div class="title">
                <p>Du Lịch Là Hành Trình Của Trái Tim!<p>
            </div>
            <div class ="header">
                <img src="img/header.jpg" alt="">
                <div class="overlay">
                <?php if (!isset($_SESSION["user_id"])): ?>
                    <a href="Registerr.php"><button class="button">Đăng ký</button></a>
                    <a href="Loginn.php"><button class="button">Đăng nhập</button></a>
                <?php else: 
                    $avatar = isset($_SESSION["avatar"]) ? $_SESSION["avatar"] : "default-avatar.png";
                ?>
                    <div class="user-info" style="color: yellow; font-size: 18px; display: flex; align-items: center; padding: 30px; ">
                        <?php echo htmlspecialchars($_SESSION["username"]); ?>
                    <button class="button"><a href="logout.php" style="color: white; text-decoration: none;">Đăng xuất</a></button>
                    </div>
                <?php endif; ?>
                </div> 
            </div>
        </header>
        <nav class="navbar">
            <ul class="menu">
                <ul class="nav-links">
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="introduce.php">Giới thiệu</a></li>
                    <li><a href="Template.php">Địa điểm</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
                    <form action="#" method="get">
                        <input type="search" placeholder="Tìm kiếm..." aria-label="Search">
                        <button type="submit"><img src="img/search.jfif" alt="kính lúp"></button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- Sidebar -->
        <section class="tour-detail">
            <div class="tour-title">
                <div class="tour-VN">
                    
                </div>
            </div>
    </section>
    
     <!-- Footer -->
    <section class="footer">
        <div class="footer-content">
            <p>&copy; 2025 Website của tôi. All rights reserved.</p>
            <div class="social-icons">
                <a href="#"><img src="" alt=""></a>
                <a href="#"><img src="" alt=""></a>
                <a href="#"><img src="" alt=""></a>
            </div>
        </div>
    </section>
</body>
</html>