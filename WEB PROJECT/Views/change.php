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
  <title>Change Password - Doctor System</title>
  <link rel="stylesheet" href="CSS/change.css">
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <h2>🩺 Doctor Portal</h2>
    <a href="../Controllers/logout.php">
      <button>🚪Logout</button>
    </a>
  </div>

  <!-- Change Password Card -->
  <div class="change-card <?php echo isset($_SESSION['password_changed']) ? 'success' : ''; ?>">
    <h2>🔄 Change Password</h2>
    <form action="../Controllers/ChangePasswordAction.php" method="post">

      <label for="current">Current Password</label>
      <div class="password-wrapper">
        <input type="password" id="current" name="current" placeholder="Enter current password">
        <span class="show-password" onclick="togglePassword('current', this)">Show</span>
      </div>
      <span class="error"><?php echo $_SESSION['e1'] ?? '' ?></span>

      <label for="new">New Password</label>
      <div class="password-wrapper">
        <input type="password" id="new" name="new" placeholder="Enter new password">
        <span class="show-password" onclick="togglePassword('new', this)">Show</span>
      </div>
      <span class="error"><?php echo $_SESSION['e2'] ?? '' ?></span>

      <label for="confirm">Confirm New Password</label>
      <div class="password-wrapper">
        <input type="password" id="confirm" name="confirm" placeholder="Confirm new password">
        <span class="show-password" onclick="togglePassword('confirm', this)">Show</span>
      </div>
      <span class="error"><?php echo $_SESSION['e3'] ?? '' ?></span>

      <button type="submit" class="<?php echo isset($_SESSION['password_changed']) ? 'success-btn' : ''; ?>">Change Password</button>
    </form>

    <p><a href="home.php">← Back to Dashboard</a></p>
  </div>
  <!-- <script src="JS/11.js"></script> -->
</body>
</html>