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
        <link rel="stylesheet" href="css/style.css">
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
                    <form id="searchForm" action="#" method="get">
                        <input type="search" id="searchInput" placeholder="Tìm kiếm..." aria-label="Search" style="width:35vh; height:5vh; padding-top:10px; font-size:15px">
                        <button type="submit" style="padding-top: 3px"><img src="img/search.jfif" alt="kính lúp"></button>
                    </form>
            </ul>
        </nav>
        <script>
        document.addEventListener('DOMContentLoaded', () => {
        const searchForm = document.getElementById('searchForm');
        const searchInput = document.getElementById('searchInput');
        const tours = document.querySelectorAll('.tour');
        const loadMoreButton = document.getElementById('loadMoreButton');

        searchForm.addEventListener('submit', (event) => {
            event.preventDefault();
            const searchTerm = searchInput.value.trim().toLowerCase();
            
            let hasVisibleTours = false;

            tours.forEach(tour => {
                const tourName = tour.getAttribute('data-name').toLowerCase();
                if (tourName.includes(searchTerm)) {
                    tour.style.display = 'block'; // Hiển thị tour nếu khớp
                    hasVisibleTours = true;
                } else {
                    tour.style.display = 'none'; // Ẩn tour nếu không khớp
                }
            });
            loadMoreButton.style.display = hasVisibleTours ? 'none' : 'block';
            
            searchInput.value = ''; // Xóa ô tìm kiếm
                });
                
            });
        </script>
        <!-- Sidebar -->
        <div class="container">
            <div class="filter-container">
            <div class="sidebar">
                <h2>Thanh Lọc</h2>
                <div>
                    <label for="duration"><strong>Thời gian:</strong></label>
                    <input type="number" id="duration" min="1" max="30" placeholder=""> days
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
        <div class="tour-list" id="tour-container">
            <div class="tour" data-name="Nha Trang">
                <div class="tour-image">
                    <img src="img/Nha%20Trang.jpg" alt="Tour Image">
                </div>        
                <div class="tour-info">
                    <h3>Du lịch Nha Trang</h3>
                    <p>Văn hóa | Gia đình | biển</p>
                    <p>Đến: Nha Trang</p>
                    <a href="chi-tiet-nha-trang.php" class="btn">Nhấn xem</a>
                </div>
            </div>
    
            <div class="tour" data-name="Đà Nẵng">
                <div class="tour-image">
                    <img src="img/Da%20Nang.png" alt="Tour Image">
                </div>        
                <div class="tour-info">
                    <h3>Du lịch Đà Nẵng</h3>
                    <p>Cảnh quan | Văn hóa | Tham quan</p>
                    <p>Đến: Đà Nẵng</p>
                    <a href="chi-tiet-da-nang.php" class="btn">Nhấn xem</a>
                </div>
            </div>

            <div class="tour" data-name="Huế">
                <div class="tour-image">
                    <img src="img/Hue.jpg" alt="Tour Image">
                </div>  
                <div class="tour-info">
                    <h3>Du lịch Huế</h3>
                    <p>Ấm thực | Văn hóa | Tham quan</p>
                    <p>Đến: Huế</p>
                    <a href="chi-tiet-hue.php" class="btn">Nhấn xem</a>
                </div>
            </div>
    
            <div class="tour" data-name="Quy Nhơn">
                <div class="tour-image">
                    <img src="img/Quy%20Nhon.jpg" alt="Tour Image">
                </div>  
                <div class="tour-info">
                    <h3>Du lịch Quy Nhơn</h3>
                    <p>Văn hóa | Ẩm thực | Tham quan</p>
                    <p>Đến: Quy Nhơn</p>
                    <a href="chi-tiet-quy-nhon.php" class="btn">Nhấn xem</a>
                </div>
            </div>

            <div class="tour" data-name="Đà Lạt">
                <div class="tour-image">
                    <img src="img/Da%20Lat.jpg" alt="Tour Image">
                </div>  
                <div class="tour-info">
                    <h3>Du lịch Đà Lạt</h3>
                    <p>Văn hóa | Ẩm thực | Tham quan</p>
                    <p>Đến: Đà Lạt</p>
                    <a href="chi-tiet-da-lat.php" class="btn">Nhấn xem</a>
                </div>
            </div>

             <div class="tour hidden" data-name="Quảng Nam">
                <div class="tour-image">
                    <img src="img/Quang%20Nam.jpeg" alt="Tour Image">
                </div>  
                <div class="tour-info">
                    <h3>Du lịch Quảng Nam</h3>
                    <p>Văn hóa | Ẩm thực | Tham quan</p>
                    <p>Đến: Quảng Nam</p>
                    <a href="chi-tiet-quang-nam.php" class="btn">Nhấn xem</a>
                </div>
            </div>

             <div class="tour hidden" data-name="Sapa">
                <div class="tour-image">
                    <img src="img/Sapa.png" alt="Tour Image">
                </div>  
                <div class="tour-info">
                    <h3>Du lịch Sapa</h3>
                    <p>Văn hóa | Ẩm thực | Tham quan</p>
                    <p>Đến: Sapa </p>
                    <a href="chi-tiet-sapa.php" class="btn">Nhấn xem</a>
                </div>
            </div>

             <div class="tour hidden" data-name="Gia Lai">
                <div class="tour-image">
                    <img src="img/Gia%20Lai.jpg" alt="Tour Image">
                </div>  
                <div class="tour-info">
                    <h3>Du lịch Gia Lai</h3>
                    <p>Văn hóa | Ẩm thực | Tham quan</p>
                    <p>Đến: Gia Lai </p>
                    <a href="chi-tiet-gia-lai.php" class="btn">Nhấn xem</a>
                </div>
            </div>
            <!-- Nút đăng bài -->
                <button onclick="loadMorePages(event)" id="loadMoreButton">+</button>
        </div>
    </div>
    
    <script>
        function loadMorePages(event) {
            event.preventDefault();
            const hiddenTours = document.querySelectorAll('.tour.hidden');
            hiddenTours.forEach(tour => {
                tour.classList.remove('hidden'); // Hiển thị tất cả các tour ẩn
            });
            event.target.style.display = 'none'; // Ẩn nút "Xem thêm" sau khi nhấn
        }
    </script>
    <div>
        <p id="closeAd" style="cursor: pointer; position:fixed; bottom: 110px; float: right; font-size: 18px; color: #ccc;display: none; bottom:149px; right: 55.1vh; z-index: 10">
            <button style="background: red; cursor: pointer; border: none; color: inherit; font-size: 18px; width:50px;">&times;</button>
        </p>
        <a href="https://hotzz.uk.com" class="ad-popup" id="adPopup" style="display: none; position: fixed; width: 100vh; height: 160px; background-size:cover; z-index:5; 
        bottom: 10px; right:55vh; background-image: url('https://abstractai.uk.com/wp-content/uploads/2025/03/banner-qq88.webp.webp'); 
        border: 1px solid #ccc; box-shadow: 0 2px 10px rgba(0,0,0,0.1);"> 
        </a>
    </div>


<script>
    // Hiển thị quảng cáo sau 2 giây
    setTimeout(function() {
        document.getElementById('adPopup').style.display = 'block';
        document.getElementById('closeAd').style.display = 'block'; 
    }, 1000);

    // Đóng quảng cáo khi nhấp vào nút "X"
    document.getElementById('closeAd').onclick = function(event) {
        event.stopPropagation(); // Ngăn chặn chuyển đến liên kết
        document.getElementById('adPopup').style.display = 'none';
        document.getElementById('closeAd').style.display = 'none';  // Ẩn quảng cáo
    };
</script>
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