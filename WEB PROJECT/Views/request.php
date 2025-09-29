<?php
session_start();
require("../Models/Requestdb.php");

if (empty($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    exit();
}

$requests = getAllRequests(); // Fetch all previous requests
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

<?php if(isset($_SESSION['request_saved']) && $_SESSION['request_saved'] === true): ?>
<p class="success">✅ Request submitted successfully!</p>
<?php unset($_SESSION['request_saved']); endif; ?>

<h2>📋 Previous Requests</h2>
<table>
<tr>
<th>Doctor</th>
<th>Item</th>
<th>Quantity</th>
<th>Notes</th>
<th>Date</th>
<th>Status</th>
</tr>
<?php foreach($requests as $r): ?>
<tr>
<td><?php echo $r['doctor_name']; ?></td>

<td><?php echo $r['item']; ?></td>
<td><?php echo $r['quantity']; ?></td>
<td><?php echo $r['notes']; ?></td>
<td><?php echo $r['date']; ?></td>
<td><?php echo $r['status']; ?></td>
</tr>
<?php endforeach; ?>
</table>

<h2>➕ Submit New Request</h2>
<div class="form-container-wrapper">
<div class="form-container">
<form action="../Controllers/RequestAction.php" method="post">
<label for="doctor_name">Doctor Name</label>
<input type="text" name="doctor_name" value="<?php echo $_SESSION['doctor_name'] ?? '' ?>">
<span class="error"><?php echo $_SESSION['e1'] ?? '' ?></span>

<label for="item">Item Name</label>
<input type="text" name="item" value="<?php echo $_SESSION['item'] ?? '' ?>">
<span class="error"><?php echo $_SESSION['e2'] ?? '' ?></span>

<label for="quantity">Quantity</label>
<input type="number" name="quantity" value="<?php echo $_SESSION['quantity'] ?? '' ?>">
<span class="error"><?php echo $_SESSION['e3'] ?? '' ?></span>

<label for="notes">Additional Notes <span class="required">*</span></label>
<textarea name="notes"><?php echo $_SESSION['notes'] ?? '' ?></textarea>
<span class="error"><?php echo $_SESSION['e4'] ?? '' ?></span>

<button type="submit">Submit Request</button>
</form>
</div>
</div>

</div>
</body>
</html>
