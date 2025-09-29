<?php 
session_start();

// Check if user is logged in
if (empty($_SESSION['isLoggedIn'])) {
    header("Location: ../Views/login.php");
    exit();
}

// Trim all input values
$doctor_name = isset($_POST['doctor-name']) ? trim(htmlspecialchars($_POST['doctor-name'])) : '';
$start_date = isset($_POST['start-date']) ? trim(htmlspecialchars($_POST['start-date'])) : '';
$end_date = isset($_POST['end-date']) ? trim(htmlspecialchars($_POST['end-date'])) : '';
$reason = isset($_POST['reason']) ? trim(htmlspecialchars($_POST['reason'])) : '';

$isValid = true;
$successURL = "Location: ../Views/leave.php";
$errorURL = "Location: ../Views/leave.php";

// Clear previous errors and set form values in session
$_SESSION['e1'] = "";
$_SESSION['e2'] = "";
$_SESSION['e3'] = "";
$_SESSION['e4'] = "";
$_SESSION['doctor_name'] = $doctor_name;
$_SESSION['start_date'] = $start_date;
$_SESSION['end_date'] = $end_date;
$_SESSION['reason'] = $reason;

// Doctor name validation - Only letters allowed
if (empty($doctor_name)) {
    $_SESSION['e1'] = "Please fill up the doctor name properly";
    $isValid = false;
} elseif (strlen($doctor_name) < 2) {
    $_SESSION['e1'] = "Doctor name must be at least 2 characters";
    $isValid = false;
} elseif (!preg_match('/^[a-zA-Z\s\.]+$/', $doctor_name)) {
    $_SESSION['e1'] = "Doctor name can only contain letters, spaces, and dots";
    $isValid = false;
}

// Start date validation
if (empty($start_date)) {
    $_SESSION['e2'] = "Please select a start date";
    $isValid = false;
} else {
    // Check if start date is not in the past
    $today = date('Y-m-d');
    if ($start_date < $today) {
        $_SESSION['e2'] = "Start date cannot be in the past";
        $isValid = false;
    }
}

// End date validation
if (empty($end_date)) {
    $_SESSION['e3'] = "Please select an end date";
    $isValid = false;
} elseif (!empty($start_date) && $end_date < $start_date) {
    $_SESSION['e3'] = "End date cannot be before start date";
    $isValid = false;
}

// Reason validation
if (empty($reason)) {
    $_SESSION['e4'] = "Please fill up the reason properly";
    $isValid = false;
} elseif (strlen($reason) < 10) {
    $_SESSION['e4'] = "Reason must be at least 10 characters";
    $isValid = false;
} elseif (strlen($reason) > 500) {
    $_SESSION['e4'] = "Reason cannot exceed 500 characters";
    $isValid = false;
}

if ($isValid) {
    // In a real application, you would save to database here
    
    // Clear form values from session
    unset($_SESSION['doctor_name']);
    unset($_SESSION['start_date']);
    unset($_SESSION['end_date']);
    unset($_SESSION['reason']);
    
    // Set success indicator
    $_SESSION['leave_saved'] = true;
    
    header($successURL);
    exit();
} else {
    // Remove success indicator if there are errors
    unset($_SESSION['leave_saved']);
    header($errorURL);
    exit();
}
?>