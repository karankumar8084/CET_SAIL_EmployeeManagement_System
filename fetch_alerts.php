<?php
// DB connection
$conn = new mysqli("localhost", "root", "", "login");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch alerts in descending order (latest first)
$sql = "SELECT title, author, link, date FROM alerts_reports ORDER BY date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="alert-item">
                <div class="alert-icon">🔔</div>
                <div class="alert-content">
                  <a href="' . htmlspecialchars($row["link"]) . '" target="_blank">' . htmlspecialchars($row["title"]) . '</a>
                  <div class="alert-meta">BY: ' . htmlspecialchars($row["author"]) . '  Date: ' . htmlspecialchars($row["date"]) . '</div>
                </div>
              </div>';
    }
} else {
    echo "<p>No alerts found.</p>";
}

$conn->close();
?>
