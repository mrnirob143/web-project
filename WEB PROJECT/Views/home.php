<?php 
    session_start(); 
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
  <title>Doctor Home</title>
<link rel="stylesheet" href="CSS/home.css">
</head>
<body>
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
    <div class="navbar">
      <a href="profile.php">

         <button>🧑‍⚕️ Profile</button>
      </a>

     <a href="../Controllers/logout.php">
      <button>🚪 Logout</button>
      </a>
    </div>

    <div class="content">
      <div class="card">
        <div class="icon">👥</div>
        <div>
          <h3>Patient Details</h3>
          <p>Check patient records and medical history.</p>
        </div>
      </div>
      <div class="card">
        <div class="icon">📋</div>
        <div>
          <h3>Applications</h3>
          <p>Manage pending applications and requests.</p>
        </div>
      </div>
      <div class="card">
        <div class="icon">💊</div>
        <div>
          <h3>Prescription</h3>
          <p>Create and assign prescriptions to patients.</p>
        </div>
      </div>
      <div class="card">
        <div class="icon">📅</div>
        <div>
          <h3>Appointment Schedule</h3>
          <p>Check your upcoming appointments.</p>
        </div>
      </div>
      <div class="card">
        <div class="icon">💉</div>
        <div>
          <h3>Request Medicine & Equipment</h3>
          <p>Send requests for medical supplies.</p>
        </div>
      </div>
      <div class="card">
        <div class="icon">📨</div>
        <div>
          <h3>Leave Request</h3>
          <p>Submit a leave request for approval.</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
