<?php 
session_start();

// Check if user is logged in
if (empty($_SESSION['isLoggedIn'])) {
    header("Location: ../Views/login.php");
    exit();
}

// Trim all input values
$doctor_name = isset($_POST['doctor-name']) ? trim(htmlspecialchars($_POST['doctor-name'])) : '';
$item = isset($_POST['item']) ? trim(htmlspecialchars($_POST['item'])) : '';
$quantity = isset($_POST['quantity']) ? trim(htmlspecialchars($_POST['quantity'])) : '';
$notes = isset($_POST['notes']) ? trim(htmlspecialchars($_POST['notes'])) : '';

$isValid = true;
$successURL = "Location: ../Views/request.php";
$errorURL = "Location: ../Views/request.php";

// Clear previous errors and set form values in session
$_SESSION['e1'] = "";
$_SESSION['e2'] = "";
$_SESSION['e3'] = "";
$_SESSION['e4'] = "";
$_SESSION['doctor_name'] = $doctor_name;
$_SESSION['item'] = $item;
$_SESSION['quantity'] = $quantity;
$_SESSION['notes'] = $notes;

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

// Item validation
if (empty($item)) {
    $_SESSION['e2'] = "Please fill up the item name properly";
    $isValid = false;
} elseif (strlen($item) < 2) {
    $_SESSION['e2'] = "Item name must be at least 2 characters";
    $isValid = false;
}

// Quantity validation
if (empty($quantity)) {
    $_SESSION['e3'] = "Please fill up the quantity properly";
    $isValid = false;
} elseif (!is_numeric($quantity) || $quantity <= 0) {
    $_SESSION['e3'] = "Quantity must be a positive number";
    $isValid = false;
} elseif ($quantity > 1000) {
    $_SESSION['e3'] = "Quantity cannot exceed 1000";
    $isValid = false;
}

// Notes validation (optional field)
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
    unset($_SESSION['doctor_name']);
    unset($_SESSION['item']);
    unset($_SESSION['quantity']);
    unset($_SESSION['notes']);
    
    // Set success indicator
    $_SESSION['request_saved'] = true;
    
    header($successURL);
    exit();
} else {
    // Remove success indicator if there are errors
    unset($_SESSION['request_saved']);
    header($errorURL);
    exit();
}
?>