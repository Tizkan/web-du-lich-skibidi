<?php
include 'db.php';

session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $pageTitle = "TOUR GIA LAI"; // Đổi tên cho từng trang
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
$totalQuery = "SELECT COUNT(*) as total FROM posts WHERE location LIKE N'%Gia Lai'";
$totalResult = mysqli_query($conn, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult);
$totalItems = $totalRow['total'];
$totalPages = ceil($totalItems / $itemsPerPage);

// Truy vấn để lấy dữ liệu cho trang hiện tại
$query = "SELECT location, descript, img, ggmap FROM posts WHERE location LIKE N'%Gia Lai' LIMIT $offset, $itemsPerPage"; 
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-chitiet-chung-sql.css">
    <title>TOUR GIA LAI</title>
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
                <h1>Du lịch Gia Lai</h1>
                <img src="img/Gia%20Lai.jpg">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style tybe="text/css">
            .fa-facebook{  margin-bottom: 5px;
                font-size: 35px;
            color: blue}
            .fa-instagram{ margin-bottom: 5px;
                font-size: 35px;
            color: pink}
            .fa-telegram{ margin-bottom: 5px;
                font-size: 35px;
            color: PaleTurquoise}
            .fa-tiktok{ margin-bottom: 5px;
                font-size: 35px;
            color: white}
    </style>   
            <div class="row">
                <div class="boxcenter2">
                    <div class="boxfooter1"> 
                        <h4>Liên hệ:</h4>
                        <div class="add"><a href="https://www.facebook.com/tuoitreitqnu?locale=vi_VN" target="_blank"> <i class="fa-brands fa-facebook"></i></a></div>
                          <div class="add"><a href="https://www.instagram.com/explore/locations/574687296282392/qnu-truong-ai-hoc-quy-nhon/" target="_blank"> <i class="fa-brands fa-instagram"></i></a></div>                        
                        <div class="add"> <a href="https://www.tiktok.com/@itqnu1992" target="_blank"> <i class="fa-brands fa-tiktok"></i></a></div>
                    </div>
                    <div class="boxfooter2">
                        <h4>Địa chỉ:</h4>
                        <div class="add">Địa chỉ 1: 70 An Dương Vương, Quy Nhơn, Bình Định, Việt Nam</div>
                        <div class="add">ĐỊa chỉ 2: Khoa công nghệ thông tin đại học quy nhơn</div>
                    </div>
                    <div class="boxfooter3">
                        <h4>Đối tác liên kết:</h4>
              <div class="add"><a href="https://www.agoda.com/search?city=4682&site_id=1922896&tag=badcebe4-e8d7-4f9f-a1ba-4e2e9b3cac9f&gad_source=1&gad_campaignid=21041750858&gbraid=0AAAAAD-GdVn4e-s6_hnP9_SooeuaLV_MM&device=c&network=g&adid=702728244461&rand=13488154135053900020&expid=&adpos=&aud=kwd-2263450249162&gclid=Cj0KCQjw_8rBBhCFARIsAJrc9yCfM-vFlJHnQgdhdqHwCRv6av40joAC1uuHxaxa7uVfwtBcKISv61waAsvlEALw_wcB&pslc=1&ds=Mq0EFBBJtst0%2BnJ2" target="_blank"><img src="img/agoda.png" alt="Agoda" style="height:40px; margin-top:8px;"></a></div>
              <div class="add"><a href="https://jtexpress.vn/vi" target="_blank"><img src="img/JT.png" alt="JT" style="height:40px; margin-top:8px;"></a></div> 
            <div class="add"><a href="https://www.momo.vn/" target="_blank"><img src="img/MM.png" alt="MM" style="height:40px; margin-top:8px;"></a>
    </div>
    </section>
</body>
</html>
