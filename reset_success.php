<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Password Reset Successful</title>
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
      gap: 20px;
    }

    .container img {
      width: 150px;
      margin-bottom: 20px;
    }

    .container h3 {
      font-weight: 600;
      color: #003366;
      font-size: 20px;
      margin: 0;
    }

    p {
      font-size: 16px;
      color: #333;
      margin: 0 0 20px 0;
    }

    .btn {
      width: 50%;
      padding: 10px;
      font-size: 15px;
      border-radius: 6px;
      border: none;
      cursor: pointer;
      color: white;
      background-color: #005a9c;
      transition: background-color 0.3s;
      text-decoration: none;
      display: inline-block;
      text-align: center;
    }

    .btn:hover {
      background-color: #004080;
    }

    .copyright {
      font-size: 0.65em;
      color: #555;
      margin-top: 20px;
      user-select: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <img src="images/laga2.PNG" alt="Logo" />
    <h3>Password Reset Successful!</h3>
    <p>You may now login with your new password.</p>
    <a href="login.php" class="btn">Go to Login</a>
    <div class="copyright">Designed &amp; Powered by Arun &amp; Karan</div>
  </div>
</body>
</html>
