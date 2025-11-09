<?php
$host = "localhost";
$username = "root";       // default XAMPP/WAMP user
$password = "";           // default XAMPP/WAMP password is empty
$database = "login";    // your database name

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
