<?php
session_start();
include 'db.php';

if (isset($_SESSION['user_id']) && isset($_POST['action'])) {
    $user_id = $_SESSION['user_id'];
    $action = htmlspecialchars($_POST['action']);
    $stmt = $conn->prepare("INSERT INTO user_history (user_id, action) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $action);
    $stmt->execute();
    $stmt->close();
}
?>