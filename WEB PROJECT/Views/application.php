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
  <title>Applications - Doctor System</title>
<link rel="stylesheet" href="CSS/application.css">
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
       <a href="login.php">
      <button>🚪 Logout</button>
      </a>
    </div>

    <!-- Applications Content -->
    <div class="container">
      <h3>Application Requests</h3>
      <table>
        <tr>
          <th>Applicant</th>
          <th>Type</th>
          <th>Date</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        <tr>
          <td>Rahim</td>
          <td>Leave Request</td>
          <td>2025-09-01</td>
          <td>Pending</td>
          <td>
            <button class="btn accept">Accept</button>
            <button class="btn reject">Reject</button>
          </td>
        </tr>
        <tr>
          <td>Ayesha</td>
          <td>Prescription Request</td>
          <td>2025-09-01</td>
          <td>Pending</td>
          <td>
            <button class="btn accept">Accept</button>
            <button class="btn reject">Reject</button>
          </td>
        </tr>
        <tr>
          <td>Karim</td>
          <td>Appointment Change</td>
          <td>2025-09-02</td>
          <td>Pending</td>
          <td>
            <button class="btn accept">Accept</button>
            <button class="btn reject">Reject</button>
          </td>
        </tr>
      </table>
    </div>
  </div>

</body>
</html>
