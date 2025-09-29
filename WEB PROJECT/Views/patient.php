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
  <title>View Patient Details</title>
 <link rel="stylesheet" href="CSS/patient.css">
</head>
<body>

  <!-- Sidebar Dashboard -->
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

    <!-- Patient Details Content -->
    <div class="container">
      <h3>Patient Details</h3>
      <table>
        <tr>
          <th>Name</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Condition</th>
          <th>Action</th>
        </tr>
        <tr>
          <td>Rahim</td>
          <td>35</td>
          <td>Male</td>
          <td>Diabetes</td>
          <td><button class="action-btn">View</button></td>
        </tr>
        <tr>
          <td>Ayesha</td>
          <td>29</td>
          <td>Female</td>
          <td>Asthma</td>
          <td><button class="action-btn">View</button></td>
        </tr>
        <tr>
          <td>Karim</td>
          <td>42</td>
          <td>Male</td>
          <td>High BP</td>
          <td><button class="action-btn">View</button></td>
        </tr>
      </table>
    </div>
  </div>

</body>
</html>
