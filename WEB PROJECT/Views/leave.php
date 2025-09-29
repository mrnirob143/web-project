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
  <title>Leave Requests - Doctor System</title>
  <link rel="stylesheet" href="CSS/leave.css">
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
      <a href="profile.php">
        <button>🧑‍⚕️ Profile</button>
      </a>
      <a href="../Controllers/logout.php">
        <button>🚪 Logout</button>
      </a>
    </div>
    
    <h2>Leave Request</h2>

    <div class="form-container-wrapper">
      <div class="form-container <?php echo isset($_SESSION['leave_saved']) ? 'success' : ''; ?>">
        <form action="../Controllers/LeaveAction.php" method="post">
          <label for="doctor-name">Doctor Name</label>
          <input type="text" id="doctor-name" name="doctor-name" placeholder="Enter your name"
                 value="<?php echo $_SESSION['doctor_name'] ?? '' ?>">
          <span class="error"><?php echo $_SESSION['e1'] ?? '' ?></span>

          <label for="start-date">Start Date</label>
          <input type="date" id="start-date" name="start-date"
                 value="<?php echo $_SESSION['start_date'] ?? '' ?>">
          <span class="error"><?php echo $_SESSION['e2'] ?? '' ?></span>

          <label for="end-date">End Date</label>
          <input type="date" id="end-date" name="end-date"
                 value="<?php echo $_SESSION['end_date'] ?? '' ?>">
          <span class="error"><?php echo $_SESSION['e3'] ?? '' ?></span>

          <label for="reason">Reason</label>
          <textarea id="reason" name="reason" placeholder="Enter leave reason"><?php echo $_SESSION['reason'] ?? '' ?></textarea>
          <span class="error"><?php echo $_SESSION['e4'] ?? '' ?></span>

          <button type="submit" class="<?php echo isset($_SESSION['leave_saved']) ? 'success-btn' : ''; ?>">Submit Leave Request</button>
        </form>
      </div>
    </div>

    <h3>Previous Leave Requests</h3>
    <table>
      <tr>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Reason</th>
        <th>Status</th>
      </tr>
      <tr>
        <td>2025-09-10</td>
        <td>2025-09-12</td>
        <td>Personal Work</td>
        <td><span class="status approved">Approved</span></td>
      </tr>
      <tr>
        <td>2025-09-20</td>
        <td>2025-09-22</td>
        <td>Medical</td>
        <td><span class="status pending">Pending</span></td>
      </tr>
      <tr>
        <td>2025-09-25</td>
        <td>2025-09-26</td>
        <td>Family Emergency</td>
        <td><span class="status rejected">Rejected</span></td>
      </tr>
    </table>
  </div>

  <!-- <script src="JS/7.js"></script> -->
</body>
</html>