<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/css.css">
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
            </div>
        </header>
        <nav class="navbar">
            <ul class="menu">
                <ul class="nav-links">
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Dịch vụ</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
                    <form action="#" method="get">
                        <input type="search" placeholder="Tìm kiếm..." aria-label="Search">
                        <button type="submit"><img src="img/search.jfif" alt="kính lúp"></button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- Content -->
        <section id ="content">
            <p>Website chuyên cung cấp thông tin về các địa điểm du lịch trong các thành phố ở Việt Nam.</p>
            <h1>Chào mừng bạn đến với TravelHaven</h1>
            <img src="img/upstt.jpg">
            <h5>Đăng bài</h5>
            <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="content-c">
                <div class="formdiadiem">
                    <label for="location">Địa điểm</label>
                    <input type="text" id="location" name="location" required>
                </div>
    
                <div class="mota">
                    <label for="mo-ta">Mô tả địa điểm:</label>
                    <textarea id="mota" name="mota" required></textarea>
                </div>
    
                <div class="inputpicture">
                    <label for="nhap">Nhập hình ảnh</label>
                    <input type="file" id="nhap" name="nhap">
                </div>
                    <button type="submit">Đăng bài</button>
                </form>
            </div>    
        </section>
        </main>
    </div>
    <section class="footer">
        <div class="footer-content">
            <p>&copy; 2025 Website của tôi. All rights reserved.</p>
            <section id="thong-tin-lien-lac">
                <h2>Thông tin liên lạc</h2>
                <p>Thông tin 1</p>
                <p>Số điện thoại: 0336404291</p>
                <p>Email: donhphung360@gmail.com</p>
                <p>Website:</p>
            </section>
            <div class="social-icons">
                <a href="#"><img src="" alt=""></a>
                <a href="#"><img src="" alt=""></a>
                <a href="#"><img src="" alt=""></a>
            </div>
        </div>
    </section>
</body>
</html>