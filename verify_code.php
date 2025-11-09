<?php
session_start();
include 'connect.php';

$message = '';
if (!isset($_SESSION['verification_code']) || !isset($_SESSION['reset_email'])) {
    header("Location: forgot_password.php");
    exit();
}

if (isset($_POST['submit_code'])) {
    $user_code = trim($_POST['code']);
    $stored_code = $_SESSION['verification_code'];
    $code_time = $_SESSION['code_time'];

    if (time() - $code_time > 900) {
        session_unset();
        session_destroy();
        $message = "Verification code expired. Please request again.";
    } else if ($user_code == $stored_code) {
        $_SESSION['verified'] = true;
        header("Location: reset_password.php");
        exit();
    } else {
        $message = "Incorrect verification code.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Verify Code</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url(images/kala.JPG);
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-position: calc(100% + 19px) calc(50% + 30px);
    }

    .container {
      background: rgba(255, 255, 255, 0.95);
      width: 420px;
      height: 420px;
      border-radius: 300px;
      box-shadow: 0 0 500px rgb(0, 170, 254);
      padding: 2rem;
      text-align: center;

      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      gap: 10px;
    }

    .container img {
      width: 150px;
      margin-bottom: 20px;
    }

    .container h3 {
      margin: -20px;
      font-weight: 600;
      color: #003366;
      font-size: 20px;
    }

    input[type="text"] {
      width: 90%;
      padding: 8px;
      font-size: 14px;
      border-radius: 8px;
      border: 1px solid #ccc;
      box-sizing: border-box;
      margin: 10px;
    }

    .btn {
      width: 70%;
      padding: 10px;
      font-size: 15px;
      border-radius: 6px;
      border: none;
      cursor: pointer;
      color: white;
      background-color: #005a9c;
      transition: background-color 0.3s;
      margin-top: 5px;
    }

    .btn:hover {
      background-color: #004080;
    }

    .back-btn {
      background-color: #888;
      width: 40%;
      padding: 5px;
      border-radius: 8px;
      border: none;
      font-size: 15px;
      color: white;
      cursor: pointer;
      text-decoration: none;
      text-align: center;
      display: inline-block;
      transition: background-color 0.3s;
      margin-top: 10px;
    }

    .back-btn:hover {
      background-color: #666;
    }

    .error-msg {
      color: red;
      font-size: 0.85em;
      margin-top: 5px;
      min-height: 18px;
    }

    .copyright {
      font-size: 0.65em;
      color: #555;
      margin-top: 10px;
      user-select: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <img src="images/laga2.PNG" alt="Logo" />
    <h3>Enter Verification Code</h3>

    <?php if ($message) echo "<div class='error-msg'>{$message}</div>"; else echo "<div class='error-msg'>&nbsp;</div>"; ?>

    <form method="POST" autocomplete="off">
      <input type="text" name="code" placeholder="6-digit Code" required maxlength="6" pattern="\d{6}">
      <button type="submit" class="btn" name="submit_code">Verify Code</button>
    </form>

    <a href="forgotpassword.php" class="back-btn">Back to login</a>

    <div class="copyright">Designed &amp; Powered by Arun &amp;Karan</div>
  </div>
</body>
</html>
