<?php 
session_start();

// Default login card color
$cardColor = '#ffffff'; // white by default

// Check if cookie exists and is still valid
if(isset($_COOKIE['login_card_color']) && isset($_COOKIE['login_card_color_time'])) {
    $expireTime = intval($_COOKIE['login_card_color_time']);
    if(time() <= $expireTime) {
        $cardColor = $_COOKIE['login_card_color']; // use cookie color
    } else {
        // Cookie expired → remove
        setcookie('login_card_color', '', time() - 3600, "/");
        setcookie('login_card_color_time', '', time() - 3600, "/");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Doctor System</title>
<link rel="stylesheet" href="CSS/login.css">
<style>
  .login-card {
    background-color: <?php echo $cardColor; ?>;
  }
</style>
</head>
<body>

<div class="navbar">
  <h2>🩺 Doctor Portal</h2>
  <a href="signup.php"><button>✏️ Sign-up</button></a>
</div>

<div class="login-card">
  <h2>🔐 Login</h2>

  <form method="POST" action="../Controllers/loginAction.php">
    <label for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="Enter your email"
           value="<?php echo $_SESSION['email'] ?? '' ?>">
    <span class="error"><?php echo $_SESSION['e1'] ?? '' ?></span>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Enter password">
    <span class="error"><?php echo $_SESSION['e2'] ?? '' ?></span>

    <span class="error"><?php echo $_SESSION['loginError'] ?? '' ?></span>

    <button type="submit">Login</button>
  </form>

  <p><a href="forgot.php">Forgot Password?</a></p>
</div>

</body>
</html>
