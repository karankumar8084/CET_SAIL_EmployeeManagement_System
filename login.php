
<?php
session_start();
include 'connect.php';  

// Redirect if already logged in via session
if (isset($_SESSION['SAIL_PNo'])) {
    header("Location: homepage.php");
    exit();
}

if (isset($_POST['signIn'])) {
    $SAIL_PNo = $_POST['SAIL_PNo'];
    $password = md5($_POST['password']);  // Note: MD5 is insecure – consider upgrading

    // Prepare and execute query
    $stmt = $conn->prepare("SELECT * FROM users WHERE SAIL_PNo = ? AND password = ?");
    $stmt->bind_param("ss", $SAIL_PNo, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        $_SESSION['SAIL_PNo'] = $row['SAIL_PNo'];
        $_SESSION['email'] = $row['email']; // ✅ Store email in session
        $_SESSION['username'] = $row['name']; // ✅ Store name in session for group messages

        header("Location: homepage.php");
        exit();
    } else {
        $error = "Invalid SAIL PNo or password!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>SAIL-CET Portal Login</title>
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

    .sail-login-container {
       background: rgba(255, 255, 255, 0.95);
      padding: 2.5rem;
      border-radius: 300px;
      
      width: 400px;
      height:400px;
      border-radius: 300px;
      text-align: center;
      box-shadow: 0 0 500px rgb(0, 170, 254);

    }

    .sail-login-container img {
      width: 150px;
      margin-bottom: 0rem;
    }

    .sail-login-container input[type="text"],
    .sail-login-container input[type="password"] {
      width: 80%;
      padding: 8px;
      margin: 7px 0;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 10px;
    }

    .captcha-row {
      display: flex;
      align-items: center;
      gap: 8px;
      margin: 1rem 0;
      justify-content: center;
      width: 100%;
    }

    .captcha-text {
      width: auto;
      padding: 6px 10px;
      font-weight: bold;
      font-size: 1.1em;
      font-family: monospace;
      letter-spacing: 3px;
      border-radius: 5px;
      color: #fff;
      user-select: none;
      transform: rotate(-1deg);
      text-align: center;
    }

    .captcha-row input[type="text"] {
      width: 40%;
      padding: 6px;
    }

    .refresh-btn {
      background-color: #005a9c;
      color: white;
      padding: 5px 8px;
      border: none;
      cursor: pointer;
      border-radius: 4px;
      font-size: 0.8em;
      transition: background 0.3s;
    }

    .refresh-btn:hover {
      background-color: #004080;
    }

    .login-btn {
      width: 40%;
      background-color: #005a9c;
      color: white;
      padding: 10px;
      margin-top: 10px;
      border: none;
      border-radius: 5px;
      font-size: 1em;
      cursor: pointer;
      transition: background 0.3s;
    }

    .login-btn:hover {
      background-color: #004080;
    }

    .forgot-para {
      margin-top: 10px;
      font-size: 0.85em;
    }

    .forgot-para a {
      color: #005a9c;
      text-decoration: none;
    }

    .copyright {
      font-size: 0.7em;
      margin-top: 15px;
      color:black;
    }

    .error-msg {
      color: red;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="sail-login-container">
    
    <img src="images/laga2.PNG" alt="Profile Logo" class="logo">

    <?php if (isset($error)) echo "<div class='error-msg'>$error</div>"; ?>

    <form method="post" action="" onsubmit="return checkCaptcha();">
      <input type="text" id="txtUid" name="SAIL_PNo" placeholder="SAIL PNo." required>
      <input type="password" id="txtPwd" name="password" placeholder="Password" required>

      <div class="captcha-row">
        <div class="captcha-text" id="captchaText">A1B2C</div>
        <input type="text" id="captchaInput" placeholder="Enter Captcha" required>
        <button type="button" class="refresh-btn" onclick="refreshCaptcha()">⟳</button>
      </div>

      <button type="submit" class="login-btn" name="signIn">Login</button>
      
    </form>

    <div class="forgot-para">
  <a href="forgot_password.php">Forgot Your Password?</a>
</div>

    <div class="copyright">
      <p>Designed &amp; Powered by Arun &amp; Karan</p>
    </div>
  </div>

  <script>
    function generateCaptcha(length = 5) {
      const chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
      let result = "";
      for (let i = 0; i < length; i++) {
        result += chars.charAt(Math.floor(Math.random() * chars.length));
      }
      return result;
    }

    function getRandomColor() {
      const colors = ['#2b5797', '#ff5e57', '#00a859', '#ff9800', '#673ab7', '#009688'];
      return colors[Math.floor(Math.random() * colors.length)];
    }

    let captchaValue = "";

    function refreshCaptcha() {
      captchaValue = generateCaptcha();
      const captchaBox = document.getElementById("captchaText");
      captchaBox.textContent = captchaValue;
      captchaBox.style.backgroundColor = getRandomColor();
    }

    function checkCaptcha() {
      const userInput = document.getElementById("captchaInput").value.trim().toUpperCase();
      if (userInput === captchaValue) {
        return true;
      } else {
        alert("Captcha incorrect. Please try again.");
        refreshCaptcha();
        return false;
      }
    }

    window.onload = refreshCaptcha;
  </script>
</body>
</html>
