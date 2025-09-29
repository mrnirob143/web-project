<?php session_start(); 
if (empty($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password - Doctor System</title>
  <link rel="stylesheet" href="CSS/forgot.css">
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <h2>🩺 Doctor Portal</h2>
    <button onclick="window.location.href='login.php'">👤Login</button>
  </div>

  <!-- Forgot Password Card -->
  <div class="forgot-card <?php echo isset($_SESSION['forgot_success']) ? 'success' : ''; ?>">
    <h2>🔑 Forgot Password</h2>

    <!-- Step 1: Email -->
    <form action="../Controllers/ForgotAction.php" method="post">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter your registered email"
             value="<?php echo $_SESSION['forgot_email'] ?? '' ?>">
      <span class="error"><?php echo $_SESSION['e1'] ?? '' ?></span>
      <button type="submit">Send OTP</button>
    </form>

    <?php if (isset($_SESSION['otp_sent']) && $_SESSION['otp_sent']): ?>
    <!-- Step 2: OTP Verification -->
    <form action="../controllers/OTPAction.php" method="post" id="otpForm">
      <label>Enter OTP</label>
      <div class="otp-container">
        <input type="text" maxlength="1" name="otp1" id="otp1" >
        <input type="text" maxlength="1" name="otp2" id="otp2" >
        <input type="text" maxlength="1" name="otp3" id="otp3" >
        <input type="text" maxlength="1" name="otp4" id="otp4" >
      </div>
      <span class="error"><?php echo $_SESSION['e2'] ?? '' ?></span>
      <button type="submit">Verify OTP</button>
    </form>
    <?php endif; ?>

    <?php if (isset($_SESSION['otp_verified']) && $_SESSION['otp_verified']): ?>
    <!-- Step 3: Recover Password -->
    <form action="../controllers/RecoverAction.php" method="post" id="recoverForm" class="recover-container">
      <label for="newPassword">New Password</label>
      <div class="password-wrapper">
        <input type="password" id="newPassword" name="newPassword" placeholder="Enter new password">
        <span class="toggle-password" onclick="togglePassword('newPassword', this)">Show</span>
      </div>
      <span class="error"><?php echo $_SESSION['e3'] ?? '' ?></span>

      <label for="confirmPassword">Confirm Password</label>
      <div class="password-wrapper">
        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm new password">
        <span class="toggle-password" onclick="togglePassword('confirmPassword', this)">Show</span>
      </div>
      <span class="error"><?php echo $_SESSION['e4'] ?? '' ?></span>

      <button type="submit">Reset Password</button>
    </form>
    <?php endif; ?>

    <p>Remembered your password? <a href="login.php">Login here</a></p>
  </div>

  <!-- <script src="JS/10.js"></script> -->
</body>
</html>