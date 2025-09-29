
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
  <title>My Appointment Schedule - Doctor System</title>
<link rel="stylesheet" href="CSS/appointment.css">
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h2>🩺 Doctor Portal</h2>
       <a href="1.php">🏠 Home</a>

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

    <!-- Appointment Schedule Content -->
    <div class="container">
      <h3>My Appointment Schedule (Today)</h3>
      <table>
        <tr>
          <th>Time</th>
          <th>Patient</th>
          <th>Reason</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        <tr>
          <td>09:00 AM</td>
          <td>Rahim</td>
          <td>General Checkup</td>
          <td><span class="status done">Done</span></td>
            <td>
            <button class="btn accept">Accept</button>
            <button class="btn reject">Reject</button>
          </td>
        </tr>
        <tr>
          <td>10:30 AM</td>
          <td>Karim</td>
          <td>Follow-up</td>
          <td><span class="status pending">Pending</span></td>
            <td>
            <button class="btn accept">Accept</button>
            <button class="btn reject">Reject</button>
          </td>
        </tr>
        <tr>
          <td>12:00 PM</td>
          <td>Ayesha</td>
          <td>Consultation</td>
          <td><span class="status confirmed">Confirmed</span></td>
            <td>
            <button class="btn accept">Accept</button>
            <button class="btn reject">Reject</button>
          </td>
        </tr>
        <tr>
          <td>02:00 PM</td>
          <td>Mahmud</td>
          <td>Dental Check</td>
          <td><span class="status confirmed">Confirmed</span></td>
            <td>
            <button class="btn accept">Accept</button>
            <button class="btn reject">Reject</button>
          </td>
        </tr>
        <tr>
          <td>04:00 PM</td>
          <td>Sara</td>
          <td>Skin Allergy</td>
          <td><span class="status pending">Pending</span></td>
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
