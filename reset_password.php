<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['verified']) || $_SESSION['verified'] !== true || !isset($_SESSION['reset_email'])) {
    header("Location: forgot_password.php");
    exit();
}

$message = '';

if (isset($_POST['reset_password'])) {
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if ($password === $confirm) {
        // Hash password (using md5 here to match your DB)
        $hashed_password = md5($password);
        $email = $_SESSION['reset_email'];

        // Update password and clear reset token if you use one
        $update = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
        $update->bind_param("ss", $hashed_password, $email);

        if ($update->execute()) {
            // Clear session variables
            session_unset();
            session_destroy();
            // Redirect to success page
            header("Location: reset_success.php");
            exit();
        } else {
            $message = "Failed to update password. Try again.";
        }
    } else {
        $message = "Passwords do not match.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Reset Password</title>
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

    input[type="password"] {
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

    .success-msg {
      color: green;
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
    <h3>Reset Password</h3>

    <?php
      if ($message) {
          $class = strpos($message, 'login') !== false ? 'success-msg' : 'error-msg';
          echo "<div class='$class'>{$message}</div>";
      } else {
          echo "<div class='error-msg'>&nbsp;</div>";
      }
    ?>

    <?php if (empty($message) || strpos($message, 'login') === false): ?>
    <form method="POST" autocomplete="off">
      <input type="password" name="password" placeholder="New Password" required minlength="6" />
      <input type="password" name="confirm_password" placeholder="Confirm Password" required minlength="6" />
      <button type="submit" class="btn" name="reset_password">Reset Password</button>
    </form>
    <?php endif; ?>

    <a href="forgotpassword.php" class="back-btn">Back to login</a>

    <div class="copyright">Designed &amp; Powered by Arun &amp;Karan</div>
  </div>
</body>
</html>
