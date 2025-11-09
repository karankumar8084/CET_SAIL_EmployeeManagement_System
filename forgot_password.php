<?php
session_start();
include 'connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['submit'])) {

    if (isset($_SESSION['last_verification_sent']) && time() - $_SESSION['last_verification_sent'] < 30) {
        $error = "Please wait " . (30 - (time() - $_SESSION['last_verification_sent'])) . " seconds before requesting a new code.";
    } else {
        $_SESSION['last_verification_sent'] = time();

        $SAIL_PNo = $_POST['SAIL_PNo'];

        $stmt = $conn->prepare("SELECT email FROM users WHERE SAIL_PNo = ?");
        $stmt->bind_param("s", $SAIL_PNo);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $email = $row['email'];

            $code = rand(100000, 999999);
            $_SESSION['verification_code'] = $code;
            $_SESSION['reset_email'] = $email;
            $_SESSION['code_time'] = time();

            $mail = new PHPMailer(true);
            try {
                $mail->SMTPDebug = 0;
                $mail->Debugoutput = 'html';

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = '17022005arun@gmail.com';
                $mail->Password = 'nrch adcy oavp jkpt';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('17022005arun@gmail.com', 'SAIL CET Portal');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = 'Password Reset Code';
                $mail->Body    = "Your password reset code is: <strong>$code</strong>";

                $mail->send();
                header("Location: verify_code.php");
                exit();
            } catch (Exception $e) {
                $error = "Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            $error = "SAIL PNo not found.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Forgot Password</title>
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
      margin:10px;
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

    .btn + a {
      margin-top: 15px;
      width: 90%;
      display: block;
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
    <h3>Forgot Your Password</h3>

    <?php
    if (isset($error)) echo "<div class='error-msg'>{$error}</div>";
    else echo "<div class='error-msg'>&nbsp;</div>";
    $remaining = 0;
    if (isset($_SESSION['last_verification_sent'])) {
        $remaining = 30 - (time() - $_SESSION['last_verification_sent']);
        if ($remaining < 0) $remaining = 0;
    }
    ?>

    <form method="post" autocomplete="off">
      <input type="text" name="SAIL_PNo" placeholder="Enter your SAIL PNo" required />
      <input type="hidden" id="cooldown_time" value="<?php echo $remaining; ?>">
      <button type="submit" class="btn" name="submit">Send Code</button>
    </form>

    <a href="login.php" class="back-btn">Back to Login</a>

    <div class="copyright">Designed &amp; Powered by Arun &amp;Karan</div>
  </div>

  <script>
    const cooldownInput = document.getElementById("cooldown_time");
    const submitBtn = document.querySelector("button[name='submit']");
    const errorMsg = document.querySelector(".error-msg");

    let cooldown = parseInt(cooldownInput.value);
    if (cooldown > 0) {
      submitBtn.disabled = true;

      const interval = setInterval(() => {
        cooldown--;
        errorMsg.textContent = `Please wait ${cooldown}s before requesting a new code.`;
        if (cooldown <= 0) {
          clearInterval(interval);
          errorMsg.textContent = "";
          submitBtn.disabled = false;
        }
      }, 1000);
    }
  </script>
</body>
</html>
