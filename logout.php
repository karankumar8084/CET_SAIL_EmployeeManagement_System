<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Clear the login cookie (make sure path matches the cookie path)
setcookie("SAIL_PNo", "", time() - 3600, "/");

// Redirect to login page
header("Location: login.php");
exit();
