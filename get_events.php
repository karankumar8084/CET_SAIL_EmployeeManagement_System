<?php
$host = "localhost";
$db = "login";
$user = "user001"; // 👈 Replace with actual username
$pass = "@arun17"; // 👈 Replace with actual password

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT message FROM important_events ORDER BY created_at DESC";
$result = $conn->query($sql);

$messages = [];
while ($row = $result->fetch_assoc()) {
    $messages[] = $row['message'];
}

echo implode(" 🔔 ", $messages); // separate messages with bell emoji
$conn->close();
?>
