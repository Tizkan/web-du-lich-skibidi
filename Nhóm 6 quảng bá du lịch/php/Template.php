<?php
            session_start();
            // Giả sử bạn đã lưu tên người dùng vào session sau khi đăng nhập
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            
            if (isset($_SESSION['username'] )) {
                $username = htmlspecialchars($_SESSION['username']);
                $greeting = "Xin chào, " . $username;
            } else {
                $greeting = "";
            }
            ?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://localhost/BT/Nh%c3%b3m%206%20qu%e1%ba%a3ng%20b%c3%a1%20du%20l%e1%bb%8bch/css/style.css">
        <title> QUẢNG BÁ DU LỊCH</title>
    </head>
    <body>
        <header>
            <div class="logo">
                <img src="http://localhost/BT/Nh%c3%b3m%206%20qu%e1%ba%a3ng%20b%c3%a1%20du%20l%e1%bb%8bch/img/logo.png" alt="Travel Haven">
            </div>
            <div class="title">
                <p>Du Lịch Là Hành Trình Của Trái Tim!<p>
            </div>
            <div class ="header">
                <img src="http://localhost/BT/Nh%c3%b3m%206%20qu%e1%ba%a3ng%20b%c3%a1%20du%20l%e1%bb%8bch/img/header.jpg" alt="">
                <div class="overlay">
                <div class="greeting"><?php echo $greeting; ?></div> <!-- Căn trái -->
                <a href="Registerr.php"><button class="button">Đăng ký</button></a>
                <a href="Loginn.php"><button class="button">Đăng nhập</button></a>
                <?php if (isset($_SESSION['username'])): ?>
                    <a href="logout.php"><button class="button">Đăng xuất</button></a>
                <?php endif; ?>
                </div> 
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
                        <button type="submit"><img src="http://localhost/BT/Nh%c3%b3m%206%20qu%e1%ba%a3ng%20b%c3%a1%20du%20l%e1%bb%8bch/img/search.jfif" alt="kính lúp"></button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- Sidebar -->
        <div class="container">
            <div class="filter-container">
            <div class="sidebar">
                <h2>Thanh Lọc</h2>
                <div>
                    <strong>Thời gian:</strong>
                    <input type="number" min="1" max="30" value=" " placeholder="VD: 2"> days
                </div>
                <div>
                    <strong>Thể loại:</strong>
                    <ul class="category">
                        <li>
                            <input type="checkbox" id="Văn hóa" class="toggle-input">
                            <label for="Văn hóa" class="toggle-label">Văn hóa</label>
                            <ul class="sub-category">
                                <li>
                                    <input type="checkbox" id="Văn hóa miền Bắc">
                                    <label for="Văn hóa miền bắc">Văn hóa miền bắc</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="Văn hóa miền Trung">
                                    <label for="Văn hóa miền Trung">Văn hóa miền Trung</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="Văn hóa miền Nam">
                                    <label for="Văn hóa miền Nam">Văn hóa miền Nam</label>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <input type="checkbox" id="Phiêu lưu" class="toggle-input">
                            <label for="Phiêu lưu" class="toggle-label">Phiêu lưu</label>
                            <ul class="sub-category">
                                <li>
                                    <input type="checkbox" id="Tham quan">
                                    <label for="Tham quan">Tham quan</label>
                                </li>                      
                                <li>
                                    <input type="checkbox" id="Gia đình">
                                    <label for="Gia đình">Gia đình</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="Biển">
                                    <label for="Biển">Biển</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="Ẩm thực">
                                    <label for="Ẩm thực">Ẩm thực</label>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <input type="checkbox" id="Phương tiện" class="toggle-input">
                            <label for="Phương tiện" class="toggle-label">Phương tiện</label>
                            <ul class="sub-category">
                                <li>
                                    <input type="checkbox" id="Xe đạp">
                                    <label for="Xe đạp">Xe đạp</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="Xe máy">
                                    <label for="Xe máy">Xe máy</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="Xe khách">
                                    <label for="Xe khách">Xe khách</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="Du thuyền">
                                    <label for="Du thuyền">Du thuyền</label>
                                </li>
                            </ul>
                        </li>              
                        <li>
                            <input type="checkbox" id="thiên nhiên" class="toggle-input">
                            <label for="thiên nhiên" class="toggle-label">thiên nhiên</label>
                            <ul class="sub-category">
                                <li>
                                    <input type="checkbox" id="Cảnh quan">
                                    <label for="Cảnh quan">Cảnh quan</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="Di tích">
                                    <label for="Di tích">Di tích</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="động vật">
                                    <label for="động vật">động vật</label>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            </div>
        

        <!-- Content -->
        <div class="tour-list">
            <div class="tour">
                <div class="tour-image">
                    <img src="http://localhost/BT/Nh%c3%b3m%206%20qu%e1%ba%a3ng%20b%c3%a1%20du%20l%e1%bb%8bch/img/Nha%20Trang.jpg" alt="Tour Image">
                </div>        
                <div class="tour-info">
                    <h3>Du lịch Nha Trang</h3>
                    <p>Văn hóa | Gia đình | biển</p>
                    <p>Đến: Nha Trang</p>
                    <a href="http://localhost/BT/Nh%c3%b3m%206%20qu%e1%ba%a3ng%20b%c3%a1%20du%20l%e1%bb%8bch/php/chi-tiet-nha-trang.php" class="btn">Nhấn xem</a>
                </div>
            </div>
    
            <div class="tour">
                <div class="tour-image">
                    <img src="http://localhost/BT/Nh%c3%b3m%206%20qu%e1%ba%a3ng%20b%c3%a1%20du%20l%e1%bb%8bch/img/Da%20Nang.png" alt="Tour Image">
                </div>        
                <div class="tour-info">
                    <h3>Du lịch Đà Nẵng</h3>
                    <p>Cảnh quan | Văn hóa | Tham quan</p>
                    <p>Đến: Đà Nẵng</p>
                    <a href="http://localhost/BT/Nh%c3%b3m%206%20qu%e1%ba%a3ng%20b%c3%a1%20du%20l%e1%bb%8bch/php/chi-tiet-da-nang.php" class="btn">Nhấn xem</a>
                </div>
            </div>

            <div class="tour">
                <div class="tour-image">
                    <img src="http://localhost/BT/Nh%c3%b3m%206%20qu%e1%ba%a3ng%20b%c3%a1%20du%20l%e1%bb%8bch/img/Quang%20Ngai.jpg" alt="Tour Image">
                </div>  
                <div class="tour-info">
                    <h3>Du lịch Quảng Ngãi</h3>
                    <p>Cảnh quan | Văn hóa | Tham quan</p>
                    <p>Đến: Quảng Ngãi</p>
                    <a href="http://localhost/BT/Nh%c3%b3m%206%20qu%e1%ba%a3ng%20b%c3%a1%20du%20l%e1%bb%8bch/php/chi-tiet-quang-ngai.php" class="btn">Nhấn xem</a>
                </div>
            </div>

            <div class="tour">
                <div class="tour-image">
                    <img src="http://localhost/BT/Nh%c3%b3m%206%20qu%e1%ba%a3ng%20b%c3%a1%20du%20l%e1%bb%8bch/img/Hue.jpg" alt="Tour Image">
                </div>  
                <div class="tour-info">
                    <h3>Du lịch Huế</h3>
                    <p>Ấm thực | Văn hóa | Tham quan</p>
                    <p>Đến: Huế</p>
                    <a href="http://localhost/BT/Nh%c3%b3m%206%20qu%e1%ba%a3ng%20b%c3%a1%20du%20l%e1%bb%8bch/php/chi-tiet-hue.php" class="btn">Nhấn xem</a>
                </div>
            </div>
    
            <div class="tour">
                <div class="tour-image">
                    <img src="http://localhost/BT/Nh%c3%b3m%206%20qu%e1%ba%a3ng%20b%c3%a1%20du%20l%e1%bb%8bch/img/Quy%20Nhon.jpg" alt="Tour Image">
                </div>  
                <div class="tour-info">
                    <h3>Du lịch Quy Nhơn</h3>
                    <p>Văn hóa | Ẩm thực | Tham quan</p>
                    <p>Đến: Quy Nhơn</p>
                    <a href="http://localhost/BT/Nh%c3%b3m%206%20qu%e1%ba%a3ng%20b%c3%a1%20du%20l%e1%bb%8bch/php/chi-tiet-quy-nhon.php" class="btn">Nhấn xem</a>
                </div>
            </div>

            <div class="tour">
                <div class="tour-image">
                    <img src="http://localhost/BT/Nh%c3%b3m%206%20qu%e1%ba%a3ng%20b%c3%a1%20du%20l%e1%bb%8bch/img/Da%20Lat.jpg" alt="Tour Image">
                </div>  
                <div class="tour-info">
                    <h3>Du lịch Đà Lạt</h3>
                    <p>Văn hóa | Ẩm thực | Tham quan</p>
                    <p>Đến: Đà Lạt</p>
                    <a href="#" class="btn">Nhấn xem</a>
                </div>
            </div>

            <div class="tour">
                <div class="tour-image">
                    <img src="http://localhost/BT/Nh%c3%b3m%206%20qu%e1%ba%a3ng%20b%c3%a1%20du%20l%e1%bb%8bch/img/Quang%20Nam.jpeg" alt="Tour Image">
                </div>  
                <div class="tour-info">
                    <h3>Du lịch Quảng Nam</h3>
                    <p>Văn hóa | Ẩm thực | Tham quan</p>
                    <p>Đến: Quảng Nam</p>
                    <a href="http://localhost/BT/Nh%c3%b3m%206%20qu%e1%ba%a3ng%20b%c3%a1%20du%20l%e1%bb%8bch/php/chi-tiet-quang-nam.php" class="btn">Nhấn xem</a>
                </div>
            </div>

            <div class="tour">
                <div class="tour-image">
                    <img src="http://localhost/BT/Nh%c3%b3m%206%20qu%e1%ba%a3ng%20b%c3%a1%20du%20l%e1%bb%8bch/img/Sapa.png" alt="Tour Image">
                </div>  
                <div class="tour-info">
                    <h3>Du lịch Sapa</h3>
                    <p>Văn hóa | Ẩm thực | Tham quan</p>
                    <p>Đến: Sapa </p>
                    <a href="#" class="btn">Nhấn xem</a>
                </div>
            </div>

            <div class="tour">
                <div class="tour-image">
                    <img src="http://localhost/BT/Nh%c3%b3m%206%20qu%e1%ba%a3ng%20b%c3%a1%20du%20l%e1%bb%8bch/img/Gia%20Lai.jpg" alt="Tour Image">
                </div>  
                <div class="tour-info">
                    <h3>Du lịch Gia Lai</h3>
                    <p>Văn hóa | Ẩm thực | Tham quan</p>
                    <p>Đến: Gia Lai </p>
                    <a href="http://localhost/BT/Nh%c3%b3m%206%20qu%e1%ba%a3ng%20b%c3%a1%20du%20l%e1%bb%8bch/php/chi-tiet-gia-lai.php" class="btn">Nhấn xem</a>
                </div>
            </div>
            <!-- Nút đăng bài -->
                <a href="upstt.php" class="add-post-btn">
                    <span>+</span>
                </a>
        </div>
    </div>
    
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
