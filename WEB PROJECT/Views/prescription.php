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
  <title>Prescriptions - Doctor System</title>
  <link rel="stylesheet" href="CSS/prescription.css">
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

    <!-- Prescriptions Content -->
    <div class="container">
      <h3>Prescription List</h3>
      <table>
        <tr>
          <th>ID</th>
          <th>Patient</th>
          <th>Medicine</th>
          <th>Dosage</th>
          <th>Date</th>
        </tr>
        <tr>
          <td>P001</td>
          <td>Rahim</td>
          <td>Paracetamol</td>
          <td>500mg, 3x daily</td>
          <td>2025-09-01</td>
        </tr>
        <tr>
          <td>P002</td>
          <td>Ayesha</td>
          <td>Amoxicillin</td>
          <td>250mg, 2x daily</td>
          <td>2025-09-01</td>
        </tr>
        <tr>
          <td>P003</td>
          <td>Karim</td>
          <td>Vitamin D</td>
          <td>1 tablet daily</td>
          <td>2025-09-02</td>
        </tr>
      </table>

      <div class="container">
        <h3>Add New Prescription</h3>
        <div class="form-container-wrapper">
          <div class="form-container <?php echo isset($_SESSION['prescription_saved']) ? 'success' : ''; ?>">
            <form action="../Controllers/PrescriptionAction.php" method="post">
              <label for="patient">Patient Name</label>
              <input type="text" id="patient" name="patient" placeholder="Enter patient name" 
                     value="<?php echo $_SESSION['patient'] ?? '' ?>">
              <span class="error"><?php echo $_SESSION['e1'] ?? '' ?></span>

              <label for="medicine">Medicine</label>
              <input type="text" id="medicine" name="medicine" placeholder="Enter medicine name" 
                     value="<?php echo $_SESSION['medicine'] ?? '' ?>">
              <span class="error"><?php echo $_SESSION['e2'] ?? '' ?></span>

              <label for="dosage">Dosage</label>
              <input type="text" id="dosage" name="dosage" placeholder="Enter dosage (e.g., 500mg, 2x daily)" 
                     value="<?php echo $_SESSION['dosage'] ?? '' ?>">
              <span class="error"><?php echo $_SESSION['e3'] ?? '' ?></span>

              <label for="notes">Additional Notes <span class="required">*</span></label>
              <textarea id="notes" name="notes" placeholder="Enter notes..." ><?php echo $_SESSION['notes'] ?? '' ?></textarea>
              <span class="error"><?php echo $_SESSION['e4'] ?? '' ?></span>

              <button type="submit" class="<?php echo isset($_SESSION['prescription_saved']) ? 'success-btn' : ''; ?>">Save Prescription</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <script src="JS/4.js"></script> -->
</body>
</html>