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
  <title>Request Medicine & Equipment - Doctor System</title>
  <link rel="stylesheet" href="CSS/request.css">
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h2>🩺 Doctor Portal</h2>
   <a href="home.php">🏠 Home</a>
    <a href="patient.php">👥 Patient Details</a>
    <a href="application.php">📋 Applications</a>
    <a href=" prescription.php">💊 Prescription</a>
    <a href="appointment.php">📅 Appointment Schedule</a>
    <a href=" request.php">💉 Request Utilities</a>
    <a href=" leave.php">📨 Leave Request</a>
  </div>

  <div class="main">
    <!-- Top Navbar -->
    <div class="navbar">
      <a href="profile.php"><button>🧑‍⚕️ Profile</button></a>
      <a href="../Controllers/logout.php">
        <button>🚪 Logout</button>
      </a>
    </div>

    <h3>Request Medicine & Equipment</h3>

    <!-- Request Form -->
    <div class="form-container-wrapper">
      <div class="form-container <?php echo isset($_SESSION['request_saved']) ? 'success' : ''; ?>">
        <form action="../Controllers/RequestAction.php" method="post">
          <label for="doctor-name">Doctor Name</label>
          <input type="text" id="doctor-name" name="doctor-name" placeholder="Enter your name"
                 value="<?php echo $_SESSION['doctor_name'] ?? '' ?>">
          <span class="error"><?php echo $_SESSION['e1'] ?? '' ?></span>

          <label for="item">Item Name</label>
          <input type="text" id="item" name="item" placeholder="Enter medicine or equipment name"
                 value="<?php echo $_SESSION['item'] ?? '' ?>">
          <span class="error"><?php echo $_SESSION['e2'] ?? '' ?></span>

          <label for="quantity">Quantity</label>
          <input type="number" id="quantity" name="quantity" placeholder="Enter quantity"
                 value="<?php echo $_SESSION['quantity'] ?? '' ?>">
          <span class="error"><?php echo $_SESSION['e3'] ?? '' ?></span>

          <label for="notes">Additional Notes</label>
          <textarea id="notes" name="notes" placeholder="Enter any special instructions"><?php echo $_SESSION['notes'] ?? '' ?></textarea>
          <span class="error"><?php echo $_SESSION['e4'] ?? '' ?></span>

          <button type="submit" class="<?php echo isset($_SESSION['request_saved']) ? 'success-btn' : ''; ?>">Submit Request</button>
        </form>
      </div>
    </div>

    <!-- Previous Requests -->
    <h3>Previous Requests</h3>
    <table>
      <tr>
        <th>Item</th>
        <th>Quantity</th>
        <th>Date</th>
        <th>Status</th>
      </tr>
      <tr>
        <td>Paracetamol 500mg</td>
        <td>50</td>
        <td>2025-09-01</td>
        <td><span class="status approved">Approved</span></td>
      </tr>
      <tr>
        <td>Stethoscope</td>
        <td>2</td>
        <td>2025-09-01</td>
        <td><span class="status pending">Pending</span></td>
      </tr>
      <tr>
        <td>Gloves (Box)</td>
        <td>10</td>
        <td>2025-09-02</td>
        <td><span class="status rejected">Rejected</span></td>
      </tr>
    </table>
  </div>

  <!-- <script src="JS/6.js"></script> -->
</body>
</html>