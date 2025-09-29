<?php
session_start();
require("../Models/leavedb.php");

if (empty($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    exit();
}

$leaves = getAllLeaves();
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

<?php if(isset($_SESSION['leave_saved'])): ?>
<p class="success">✅ Leave request submitted successfully!</p>
<?php unset($_SESSION['leave_saved']); endif; ?>

<h2>➕ Submit Leave Request</h2>
<div class="form-container-wrapper">
    <div class="form-container">
        <form action="../Controllers/LeaveAction.php" method="post">
            <label>Doctor Name</label>
            <input type="text" name="doctor-name" value="<?php echo $_SESSION['doctor_name'] ?? '' ?>">
            <span class="error"><?php echo $_SESSION['e1'] ?? '' ?></span>

            <label>Start Date</label>
            <input type="date" name="start-date" value="<?php echo $_SESSION['start_date'] ?? '' ?>">
            <span class="error"><?php echo $_SESSION['e2'] ?? '' ?></span>

            <label>End Date</label>
            <input type="date" name="end-date" value="<?php echo $_SESSION['end_date'] ?? '' ?>">
            <span class="error"><?php echo $_SESSION['e3'] ?? '' ?></span>

            <label>Reason</label>
            <textarea name="reason"><?php echo $_SESSION['reason'] ?? '' ?></textarea>
            <span class="error"><?php echo $_SESSION['e4'] ?? '' ?></span>

            <button type="submit">Submit Leave Request</button>
        </form>
    </div>
</div>

<h2>📝 Previous Leave Requests</h2>
<table>
<tr>
<th>Doctor Name</th>
<th>Start Date</th>
<th>End Date</th>
<th>Reason</th>
<th>Status</th>
<th>Request Date</th>
</tr>
<?php foreach($leaves as $l): ?>
<tr>
<td><?php echo $l['doctor_name']; ?></td>
<td><?php echo $l['start_date']; ?></td>
<td><?php echo $l['end_date']; ?></td>
<td><?php echo $l['reason']; ?></td>
<td><?php echo $l['status']; ?></td>
<td><?php echo $l['request_date']; ?></td>
</tr>
<?php endforeach; ?>
</table>

</div>
</body>
</html>
