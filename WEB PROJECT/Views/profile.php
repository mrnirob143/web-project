
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
  <title>Doctor Profile - Dashboard</title>
<link rel="stylesheet" href="CSS/profile.css">
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

      

         <button>🧑‍⚕️ Profile</button>
       <a href="login.php">
      <button>🚪 Logout</button>
      </a>
    </div>

    <h2>Doctor Profile</h2>

    <!-- Profile Card -->
    <div class="profile-card">
      <img src="PHOTO/download.jpeg" alt="Doctor Photo">
      <h3>Dr. Nirob Khan</h3>
      <p class="role">Cardiologist</p>

      <div class="info-grid">
        <div class="info-item">
          <strong>Email</strong>
          <span>Nirob.khan@example.com</span>
        </div>
        <div class="info-item">
          <strong>Phone</strong>
          <span>+880 1234 567 890</span>
        </div>
        <div class="info-item">
          <strong>Department</strong>
          <span>Cardiology</span>
        </div>
        <div class="info-item">
          <strong>Experience</strong>
          <span>5 Years</span>
        </div>
        <div class="info-item">
          <strong>Specialization</strong>
          <span>Heart Surgery</span>
        </div>
        <div class="info-item">
          <strong>Availability</strong>
          <span>Mon - Fri, 9 AM - 5 PM</span>
        </div>
      </div>
       <!-- Change Password Button inside card -->


       <a href="change.php">
      <button class="change-pass-btn">🔑 Change Password</button>
      </a>
    </div>

  </div>

</body>
</html>
