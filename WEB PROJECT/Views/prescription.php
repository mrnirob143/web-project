<?php
session_start();
require("../Models/Prescriptiondb.php");

if (empty($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    exit();
}

$prescriptions = getAllPrescriptions();
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

<div class="sidebar">
<h2>🩺 Doctor Portal</h2>
<a href="home.php">🏠 Home</a>
<a href="patient.php">👥 Patient Details</a>
<a href="application.php">📋 Applications</a>
<a href="prescription.php">💊 Prescription</a>
<a href="appointment.php">📅 Appointment Schedule</a>
<a href="request.php">💉 Request Utilities</a>
<a href="leave.php">📨 Leave Request</a>
</div>

<div class="main">
<div class="navbar">
<a href="profile.php"><button>🧑‍⚕️ Profile</button></a>
<a href="../Controllers/logout.php"><button>🚪 Logout</button></a>
</div>

<div class="container">
<?php if(isset($_SESSION['prescription_saved']) && $_SESSION['prescription_saved'] === true): ?>
<p class="success">✅ Prescription saved successfully!</p>
<?php unset($_SESSION['prescription_saved']); endif; ?>

<h2>💊 Prescription List</h2>
<table>
<tr>
<th>ID</th>
<th>Patient</th>
<th>Medicine</th>
<th>Dosage</th>
<th>Notes</th>
<th>Date</th>
</tr>
<?php foreach($prescriptions as $p): ?>
<tr>
<td><?php echo $p['id']; ?></td>
<td><?php echo $p['patient']; ?></td>
<td><?php echo $p['medicine']; ?></td>
<td><?php echo $p['dosage']; ?></td>
<td><?php echo $p['notes']; ?></td>
<td><?php echo $p['date']; ?></td>
</tr>
<?php endforeach; ?>
</table>

<!-- Centered Add New Prescription Form -->
<h2>➕ Add New Prescription</h2>
<div class="form-container-wrapper">
<div class="form-container <?php echo isset($_SESSION['prescription_saved']) ? 'success' : ''; ?>">
<form action="../Controllers/PrescriptionAction.php" method="post">
<label>Patient Name</label>
<input type="text" name="patient" value="<?php echo $_SESSION['patient'] ?? '' ?>">
<span class="error"><?php echo $_SESSION['e1'] ?? '' ?></span>

<label>Medicine</label>
<input type="text" name="medicine" value="<?php echo $_SESSION['medicine'] ?? '' ?>">
<span class="error"><?php echo $_SESSION['e2'] ?? '' ?></span>

<label>Dosage</label>
<input type="text" name="dosage" value="<?php echo $_SESSION['dosage'] ?? '' ?>">
<span class="error"><?php echo $_SESSION['e3'] ?? '' ?></span>

<label>Notes</label>
<textarea name="notes"><?php echo $_SESSION['notes'] ?? '' ?></textarea>
<span class="error"><?php echo $_SESSION['e4'] ?? '' ?></span>

<button type="submit">Save Prescription</button>
</form>
</div>
</div>

</div>
</div>
</body>
</html>
