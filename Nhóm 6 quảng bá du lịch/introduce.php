<?php session_start(); ?>
<?php
include 'db.php'; // Kết nối đến cơ sở dữ liệu

function getPageTitle($url) {
    $titles = [
        'index.php' => 'Trang chủ',
        'introduce.php' => 'Giới thiệu',
        'user_history.php' => 'Lịch sử người dùng',
        'Template.php' => 'Địa điểm'    
    ];
    return isset($titles[$url]) ? $titles[$url] : 'Trang không xác định';
}

// Lấy tên file từ URL
$currentUri = basename($_SERVER['REQUEST_URI']); // Lấy tên file

// Lấy tên trang
$pageTitle = getPageTitle($currentUri);

// Tạo thông báo hành động
$action = "Đã xem trang: " . $pageTitle;

// Xử lý lưu hành động vào cơ sở dữ liệu
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Lưu vào cơ sở dữ liệu
    $stmt = $conn->prepare("INSERT INTO user_history (user_id, action) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $action);

    if (!$stmt->execute()) {
        echo "Lỗi lưu vào cơ sở dữ liệu: " . $stmt->error;
    }

    $stmt->close();

    // Lưu vào session (nếu cần)
    if (!isset($_SESSION['history'])) {
        $_SESSION['history'] = [];
    }
    $_SESSION['history'][] = date('Y-m-d H:i:s') . " - " . $action;
}
?>
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
                    <div class="user-info" style="color: yellow; font-size: 18px; display: flex; align-items: center; padding: 10px; ">
                        <?php echo htmlspecialchars($_SESSION["username"]); ?>
                        <div class="dropdown" style="position: relative; display: inline-block;">
                        <button class="button" style="margin-left: 10px;">▼</button>
                        <div class="dropdown-content" style="display: none; right:10px; text-align:right; position: absolute; min-width: 180px; box-shadow: 0px 4px 8px 0px rgba(0,0,0,0); z-index: 1;">
                        <a href="user_history.php" style="text-decoration: none;"><button class="button">Lịch sử người dùng</button></a>
                        <a href="logout.php" style="color: white; text-decoration: none;"><button class="button">Đăng xuất</button></a>
                    </div>
                <?php endif; ?>
                </div> 
                <script>
                    document.querySelector('.dropdown button').addEventListener('click', function() {
                        var content = document.querySelector('.dropdown-content');
                        content.style.display = content.style.display === 'block' ? 'none' : 'block';
                    });

                    window.onclick = function(event) {
                        if (!event.target.matches('.dropdown button')) {
                            var dropdowns = document.getElementsByClassName("dropdown-content");
                            for (var i = 0; i < dropdowns.length; i++) {
                                dropdowns[i].style.display = "none";
                            }
                        }
                    }
                </script>
            </div>
        </header>
        <nav class="navbar">
            <ul class="menu">
                <ul class="nav-links">
                    <li><a href="index.php">Trang chủ</a></li>
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
        <!-- Content -->
        <section class="tour-detail">
            <div class="tour-title">
                <div class="tour-VN">
                    <h1>GIỚI THIỆU CHUNG VỀ TRAVEL HAVEN</h1>
                    <img src="img/AnhGioithieu.jpg" alt="Introduce Pic">
                    <div class="description">
                        <h2>- LỜI MỞ ĐẦU</h2>
                            <p>
                                Việt Nam, một đất nước với nền văn hóa phong phú và cảnh quan thiên nhiên hùng vĩ, đang ngày càng thu hút sự chú ý của du khách trong và ngoài nước. Để giúp bạn khám phá vẻ đẹp của quê hương, chúng tôi xin giới thiệu trang web du lịch Việt Nam mang tên Travel Haven - một cẩm nang hữu ích cho mọi tín đồ mê du lịch.
                            </p>
                        <h2>- NỘI DUNG TRANG WEB</h2>
                            <p>
                                Trang web du lịch Việt Nam không chỉ cung cấp thông tin về các địa điểm như Đà Lạt, Nha Trang, Phú Thọ, Quảng Nam,… mà còn đưa bạn đến những góc khuất ít người biết đến. Mỗi điểm đến đều được mô tả chi tiết với hình ảnh sinh động, giúp du khách dễ dàng hình dung và lên kế hoạch cho chuyến đi của mình.
                            </p>
                        <h2>- HƯỚNG DẪN DU LỊCH</h2>
                            <p>
                                Ngoài việc giới thiệu địa điểm , trang web còn cung cấp các hướng dẫn chi tiết về cách di chuyển, nơi lưu trú và các lưu ý cần thiết khi du lịch. Bạn sẽ tìm thấy các bài viết về:
                            </p>
                            <li>Phương tiện di chuyển: Từ xe khách, phương tiện hai bánh giúp bạn lựa chọn phương tiện phù hợp.</li>
                            <li>Khách sạn và homestay: Đánh giá và gợi ý các địa điểm lưu trú từ bình dân đến cao cấp.</li>
                            <li>Gợi ý địa điểm: Travel Haven gợi ý những địa điểm phù hợp, giúp bạn tìm thấy được những trải nghiệm thú vị 1 cách trọn vẹn nhất.</li>
                        <h2>- CỘNG ĐỒNG DU LỊCH</h2>
                            <p>
                                Travel Haven còn là nơi kết nối cộng đồng yêu thích du lịch. Bạn có thể chia sẻ kinh nghiệm, hình ảnh và những câu chuyện thú vị từ chuyến đi của mình. Diễn đàn trao đổi thông tin giúp bạn tìm kiếm bạn đồng hành hoặc nhận được lời khuyên từ những người đã trải nghiệm. 
                            </p>
                        <h2>- ĐỘI NGŨ CHÚNG TÔI:</h2>
                            <li>Võ Trọng Tín</li>
                            <li>Phùng Văn Đông</li>
                            <li>Bùi Khánh Dương</li>
                            <li>Nguyễn Lê Minh Nhựt</li>
                            <li>Trịnh Quốc Đạt</li>
                            <li>Trần Ca Huy</li>
                            <li>Trần Trương Thạch</li>   
                        <h2>- KẾT LUẬN</h2>
                            <p>
                                Với những thông tin phong phú và hữu ích, trang web du lịch Việt Nam Travel Haven là người bạn đồng hành lý tưởng cho mỗi chuyến khám phá. Hãy truy cập ngay hôm nay để bắt đầu hành trình của bạn và khám phá những điều kỳ diệu mà Việt Nam mang lại!
                            </p> 
                    </div>
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