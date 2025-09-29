<?php
session_start();
require("../Models/leavedb.php");

if (empty($_SESSION['isLoggedIn'])) {
    header("Location: ../Views/login.php");
    exit();
}

// Get input
$doctor_name = trim($_POST['doctor-name'] ?? '');
$start_date = trim($_POST['start-date'] ?? '');
$end_date = trim($_POST['end-date'] ?? '');
$reason = trim($_POST['reason'] ?? '');

// Session clear
$_SESSION['e1'] = $_SESSION['e2'] = $_SESSION['e3'] = $_SESSION['e4'] = "";
$_SESSION['doctor_name'] = $doctor_name;
$_SESSION['start_date'] = $start_date;
$_SESSION['end_date'] = $end_date;
$_SESSION['reason'] = $reason;

$isValid = true;

// Validation
if (empty($doctor_name) || strlen($doctor_name) < 2 || !preg_match('/^[a-zA-Z\s\.]+$/', $doctor_name)) {
    $_SESSION['e1'] = "Doctor name must be valid and at least 2 characters";
    $isValid = false;
}
if (empty($start_date)) {
    $_SESSION['e2'] = "Start date required";
    $isValid = false;
} elseif ($start_date < date('Y-m-d')) {
    $_SESSION['e2'] = "Start date cannot be in the past";
    $isValid = false;
}
if (empty($end_date)) {
    $_SESSION['e3'] = "End date required";
    $isValid = false;
} elseif ($end_date < $start_date) {
    $_SESSION['e3'] = "End date cannot be before start date";
    $isValid = false;
}
if (empty($reason) || strlen($reason) < 10 || strlen($reason) > 500) {
    $_SESSION['e4'] = "Reason must be 10-500 characters";
    $isValid = false;
}

// Save or redirect
if ($isValid) {
    saveLeaveRequest($doctor_name, $start_date, $end_date, $reason);
    unset($_SESSION['doctor_name'], $_SESSION['start_date'], $_SESSION['end_date'], $_SESSION['reason']);
    $_SESSION['leave_saved'] = true;
}
header("Location: ../Views/leave.php");
exit();
?>
