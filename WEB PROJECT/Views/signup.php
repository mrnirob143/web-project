<?php session_start(); 

session_start();
if (!empty($_SESSION['isLoggedIn'])) {
    header("Location: login.php"); // Dashboard
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup - Doctor System</title>
  <link rel="stylesheet" href="CSS/signup.css">
</head>
<body>
  <div class="navbar">
    <h2>🩺 Doctor Portal</h2>
    <a href="login.php">
      <button type="button">👤Login</button>
    </a>
  </div>

  <div class="signup-card <?php echo isset($_SESSION['signup_success']) ? 'success' : ''; ?>">
    <h2>📝 Create Account</h2> 
    <form action="../Controllers/SignupAction.php" method="post">
      <label for="fullname">Full Name</label>
      <input type="text" id="fullname" name="fullname" placeholder="Enter your full name"
             value="<?php echo $_SESSION['fullname'] ?? '' ?>">
      <span class="error"><?php echo $_SESSION['e1'] ?? '' ?></span>

      <label for="email">Email</label>
      <input type="text" id="email" name="email" placeholder="Enter your email"
             value="<?php echo $_SESSION['email'] ?? '' ?>">
      <span class="error"><?php echo $_SESSION['e2'] ?? '' ?></span>

      <label for="phone">Phone</label>
      <input type="tel" id="phone" name="phone" placeholder="Enter phone number"
             value="<?php echo $_SESSION['phone'] ?? '' ?>">
      <span class="error"><?php echo $_SESSION['e3'] ?? '' ?></span>

      <label for="password">Password</label>
      <div class="password-wrapper">
        <input type="password" id="password" name="password" placeholder="Enter password">
        <span class="show-password" onclick="togglePassword('password', this)">Show</span>
      </div>
      <span class="error"><?php echo $_SESSION['e4'] ?? '' ?></span>

      <label for="confirm-password">Confirm Password</label>
      <div class="password-wrapper">
        <input type="password" id="confirm-password" name="confirm-password" placeholder="Re-enter password">
        <span class="show-password" onclick="togglePassword('confirm-password', this)">Show</span>
      </div>
      <span class="error"><?php echo $_SESSION['e5'] ?? '' ?></span>

      <button type="submit" class="<?php echo isset($_SESSION['signup_success']) ? 'success-btn' : ''; ?>">Sign-up</button>
    </form>

    <p>Already have an account? <a href="login.php">Login here</a></p>
  </div>
</body>
</html>
