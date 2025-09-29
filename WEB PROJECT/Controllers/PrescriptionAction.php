<?php 
session_start();

// Check if user is logged in
if (empty($_SESSION['isLoggedIn'])) {
    header("Location: ../Views/login.php");
    exit();
}

// Trim all input values
$patient = isset($_POST['patient']) ? trim(htmlspecialchars($_POST['patient'])) : '';
$medicine = isset($_POST['medicine']) ? trim(htmlspecialchars($_POST['medicine'])) : '';
$dosage = isset($_POST['dosage']) ? trim(htmlspecialchars($_POST['dosage'])) : '';
$notes = isset($_POST['notes']) ? trim(htmlspecialchars($_POST['notes'])) : '';

$isValid = true;
$successURL = "Location: ../Views/prescription.php";
$errorURL = "Location: ../Views/prescription.php";

// Clear previous errors and set form values in session
$_SESSION['e1'] = "";
$_SESSION['e2'] = "";
$_SESSION['e3'] = "";
$_SESSION['e4'] = "";
$_SESSION['patient'] = $patient;
$_SESSION['medicine'] = $medicine;
$_SESSION['dosage'] = $dosage;
$_SESSION['notes'] = $notes;

// Patient validation - Only letters allowed
if (empty($patient)) {
    $_SESSION['e1'] = "Please fill up the patient name properly";
    $isValid = false;
} elseif (strlen($patient) < 2) {
    $_SESSION['e1'] = "Patient name must be at least 2 characters";
    $isValid = false;
} elseif (!preg_match('/^[a-zA-Z\s]+$/', $patient)) {
    $_SESSION['e1'] = "Patient name can only contain letters and spaces";
    $isValid = false;
}

// Medicine validation
if (empty($medicine)) {
    $_SESSION['e2'] = "Please fill up the medicine name properly";
    $isValid = false;
} elseif (strlen($medicine) < 2) {
    $_SESSION['e2'] = "Medicine name must be at least 2 characters";
    $isValid = false;
}

// Dosage validation
if (empty($dosage)) {
    $_SESSION['e3'] = "Please fill up the dosage properly";
    $isValid = false;
} elseif (strlen($dosage) < 3) {
    $_SESSION['e3'] = "Dosage must be at least 3 characters";
    $isValid = false;
}

// Notes validation (now required field)
if (empty($notes)) {
    $_SESSION['e4'] = "Please fill up the notes properly";
    $isValid = false;
} elseif (strlen($notes) > 500) {
    $_SESSION['e4'] = "Notes cannot exceed 500 characters";
    $isValid = false;
}

if ($isValid) {
    // In a real application, you would save to database here
    
    // Clear form values from session
    unset($_SESSION['patient']);
    unset($_SESSION['medicine']);
    unset($_SESSION['dosage']);
    unset($_SESSION['notes']);
    
    // Set success indicator
    $_SESSION['prescription_saved'] = true;
    
    header($successURL);
    exit();
} else {
    // Remove success indicator if there are errors
    unset($_SESSION['prescription_saved']);
    header($errorURL);
    exit();
}
?>