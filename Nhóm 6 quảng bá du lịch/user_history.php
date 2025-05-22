<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: Loginn.php');
    exit;
}

$user_id = $_SESSION['user_id'];

// Xóa lịch sử nếu nhấn nút
if (isset($_POST['clear'])) {
    $stmt = $conn->prepare("DELETE FROM user_history WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->close();
}

// Lấy lịch sử
$stmt = $conn->prepare("SELECT action, created_at FROM user_history WHERE user_id = ? ORDER BY created_at DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Lịch Sử Người Dùng</title>
    <style>
        body { background: #f5f5f5; font-family: Arial; }
        .history-container { max-width: 600px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 8px; }
        h2 { text-align: center; }
        ul { list-style: none; padding: 0; }
        li { margin-bottom: 10px; border-bottom: 1px solid #eee; padding-bottom: 8px; }
        .btn-clear { background: #e74c3c; color: #fff; border: none; padding: 8px 20px; border-radius: 4px; cursor: pointer; display: block; margin: 20px auto; }
    </style>
</head>
<body>
    <div class="history-container">
        <h2>Lịch Sử Người Dùng</h2>
        <form method="post">
            <button type="submit" name="clear" class="btn-clear">Xóa Lịch Sử</button>
        </form>
        <ul>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <li><?php echo htmlspecialchars($row['action']) . " <br><small>(" . $row['created_at'] . ")</small>"; ?></li>
                <?php endwhile; ?>
            <?php else: ?>
                <li>Không có lịch sử nào.</li>
            <?php endif; ?>
        </ul>
        <a href="index.php">Quay lại trang chính</a>
    </div>
</body>
</html>
<?php $stmt->close(); ?>