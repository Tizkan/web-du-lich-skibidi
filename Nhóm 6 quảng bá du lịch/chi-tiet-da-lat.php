<?php
include 'db.php';

session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $pageTitle = "TOUR ĐÀ LẠT"; // Đổi tên cho từng trang
    $action = "Đã xem trang: $pageTitle";
    $stmt = $conn->prepare("INSERT INTO user_history (user_id, action) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $action);
    $stmt->execute();
    $stmt->close();
}

// Thiết lập số mục trên mỗi trang
$itemsPerPage = 5;
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($currentPage - 1) * $itemsPerPage;

// Lấy tổng số mục
$totalQuery = "SELECT COUNT(*) as total FROM posts WHERE location LIKE N'%Đà Lạt'";
$totalResult = mysqli_query($conn, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult);
$totalItems = $totalRow['total'];
$totalPages = ceil($totalItems / $itemsPerPage);

// Truy vấn để lấy dữ liệu cho trang hiện tại
$query = "SELECT location, descript, img, ggmap FROM posts WHERE location LIKE N'%Đà Lạt' LIMIT $offset, $itemsPerPage"; 
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-chitiet-chung-sql.css">
    <title>TOUR ĐÀ LẠT</title>       
</head>
<body>
    <header>
        <div class="logo">
            <img src="img/logo.jpg" alt="Travel Haven">
        </div>
        <div class="title">
            <p>Du Lịch Là Hành Trình Của Trái Tim!</p>
        </div>
        <div class="header">
            <img src="img/header.jpg" alt="">
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
        </ul>
    </nav>

    <!-- Content -->
    <section class="tour-detail">
        <div class="tour-title">
            <div class="tour-VN">
                <h1>Du lịch Đà Lạt</h1>
                <img src="img/Da Lat.jpg">
                <h2>Gợi ý</h2>
                
                <?php
            if ($result && mysqli_num_rows($result) > 0) {
                $i = $offset + 1; // Để đánh số từ đúng
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div style='display: flex; gap: 20px; font-size: 15px; margin-bottom: 40px; align-items: flex-start;'>";
                    echo "<div style='flex: 1;'>";
                    echo "<h3>Địa điểm $i: " . htmlspecialchars($row['location']) . "</h3>";
                    echo "<p>" . nl2br(htmlspecialchars($row['descript'])) . "</p>";
                    echo "</div>";
                    echo "<div style='flex: 0 0 1;'>";
                    if (!empty($row['img'])) {
                        echo "<div class='img-wrapper'>";
                        echo "<img src='" . htmlspecialchars($row['img']) . "' alt='Image for " . htmlspecialchars($row['location']) . "'>";
                        echo "</div>";
                    }
                    if (!empty($row['ggmap'])) {
                        echo '<iframe class="map-iframe" src="' . htmlspecialchars($row['ggmap']) . '" allowfullscreen="" loading="lazy"></iframe>';
                    }
                    echo "</div>"; 
                    echo "</div>"; 
                    $i++;
                }
            } else {
                echo "<p>Không có dữ liệu.</p>";
            }
            ?>
            <div class="pagination">
                <?php if ($currentPage > 1): ?>
                    <a href="?page=<?php echo $currentPage - 1; ?>">Trang trước</a>
                <?php endif; ?>
                
                <form action="" method="get" style="display: inline;">
                    <input type="number" name="page" class="page-input" min="1" max="<?php echo $totalPages; ?>" value="<?php echo $currentPage; ?>">
                    <button class="button-page" type="submit">Đi</button>
                </form>
                
                <?php if ($currentPage < $totalPages): ?>
                    <a href="?page=<?php echo $currentPage + 1; ?>">Trang tiếp theo</a>
                <?php endif; ?>
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
