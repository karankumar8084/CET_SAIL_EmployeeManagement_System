<?php
session_start();

if (!isset($_SESSION["username"])) {
    die("Not logged in");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["message"])) {
    $message = trim($_POST["message"]);
    $sender = $_SESSION["username"];

    $conn = new mysqli("localhost", "root", "", "login");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO group_messages (sender, message) VALUES (?, ?)");
    $stmt->bind_param("ss", $sender, $message);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

// Redirect back to homepage
header("Location: homepage.php");
exit;
?>
