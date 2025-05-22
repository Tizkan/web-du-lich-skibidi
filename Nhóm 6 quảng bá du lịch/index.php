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
        <link rel="stylesheet" href="css/style-index.css">
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
            </ul>
        </nav>

        <div class="advertisement">
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">Youtube</a>
        <p>
            <a href="https://shopee.vn/(GIFT)-G%E1%BA%A5u-b%C3%B4ng-tr%C3%A1i-b%C6%A1-tr%C3%B2n-nh%E1%BB%8F-size-15cm-cho-b%C3%A9-xinh-cute-G%E1%BA%A5u-Xinh-G12.1-i.622469888.14439680395" style="color: black; text-decoration: none;">
                <img src="img/các.webp" alt="Quảng cáo" style="width:100%; height:30vh">
                <p>Khám phá sản phẩm mới tại Example.com!</p>
            </a>
        </p>
        </div>
        
        <!-- Sidebar -->
        

        <!-- Content -->
<section id="destinations">
    <h1>Điểm Đến Nổi Bật</h1>
    <div class="carousel">
        <div class="container" id="destinationContainer">
            <?php
                $destinations = [
                    ["name" => "Nha Trang", "price" => "1.596.996 VND", "image" => "img/Nha Trang.jpg"],
                    ["name" => "Đà Nẵng", "price" => "835.226 VND", "image" => "img/Da Nang.png"],
                    ["name" => "Quy Nhơn", "price" => "951.549 VND", "image" => "img/Quy Nhon.jpg"],
                    ["name" => "Huế", "price" => "1.045.598 VND", "image" => "img/Hue.jpg"],
                    ["name" => "Quảng Nam", "price" => "1.380.186 VND", "image" => "img/Quang Nam.jpeg"],
                    ["name" => "Phú Thọ", "price" => "1.380.186 VND", "image" => "img/Phu Tho.jpg"],
                    ["name" => "Hà Giang", "price" => "1.380.186 VND", "image" => "img/Ha Giang.jpg"],
                    ["name" => "Sa Pa", "price" => "1.380.186 VND", "image" => "img/Sapa.png"],
                    ["name" => "Đà Lạt", "price" => "1.380.186 VND", "image" => "img/Da Lat.jpg"],
                    ["name" => "Gia Lai", "price" => "1.380.186 VND", "image" => "img/Gia Lai.jpg"],
                ];

                foreach ($destinations as $destination) {
                    echo '<div class="destination">';
                    echo '<img src="' . $destination['image'] . '" alt="' . $destination['name'] . '">';
                    echo '<h3>' . $destination['name'] . '</h3>';
                    echo '<p>' . $destination['price'] . '</p>';
                    echo '</div>';
                }
            ?>
        </div>
        <div class="buttons">
            <button onclick="moveSlide(-1)">&#10094;</button>
            <button onclick="moveSlide(1)">&#10095;</button>
        </div>
    </div>
</section>  

<script>
    let currentIndex = 0;       
    function moveSlide(direction) {
        const container = document.getElementById('destinationContainer');
        const destinations = document.querySelectorAll('.destination');
        const totalDestinations = destinations.length;

        currentIndex += direction;

        // Kiểm tra giới hạn
        if (currentIndex < 0) {
            currentIndex = totalDestinations - 1;
        } else if (currentIndex >= totalDestinations) {
            currentIndex = 0;
        }

        // Cập nhật vị trí của container
        const slideWidth = destinations[0].offsetWidth + 20; // Tính toán chiều rộng với margin
        container.style.transform = `translateX(-${currentIndex * slideWidth}px)`;

    }
</script>
    
    <div class="advertisement">
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">Youtube</a>
        <p>
            <a href="https://shopee.vn/(GIFT)-G%E1%BA%A5u-b%C3%B4ng-tr%C3%A1i-b%C6%A1-tr%C3%B2n-nh%E1%BB%8F-size-15cm-cho-b%C3%A9-xinh-cute-G%E1%BA%A5u-Xinh-G12.1-i.622469888.14439680395" style="color: black; text-decoration: none;">
                <img src="img/Quảng Cáo.webp" alt="Quảng cáo">
                Khám phá sản phẩm mới tại Example.com!
            </a>
        </p>
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