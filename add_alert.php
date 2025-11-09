<?php
// DB connection
$conn = new mysqli("localhost", "root", "", "login");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form values
$title = $_POST['title'];
$author = $_POST['author'];
$link = $_POST['link'];
$date = $_POST['date'];

// Insert into database
$sql = "INSERT INTO alerts_reports (title, author, link, date) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $title, $author, $link, $date);

if ($stmt->execute()) {
    echo "Alert added successfully.";
    echo "<br><a href='admin.html'>Go back</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
