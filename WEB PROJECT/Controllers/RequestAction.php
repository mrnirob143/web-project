<?php
session_start();
require("../Models/requestdb.php");

if (empty($_SESSION['isLoggedIn'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctor_name = trim(htmlspecialchars($_POST['doctor_name'] ?? ''));
    $item = trim(htmlspecialchars($_POST['item'] ?? ''));
    $quantity = trim($_POST['quantity'] ?? '');
    $notes = trim(htmlspecialchars($_POST['notes'] ?? ''));

    $_SESSION['doctor_name'] = $doctor_name;
    $_SESSION['item'] = $item;
    $_SESSION['quantity'] = $quantity;
    $_SESSION['notes'] = $notes;

    $_SESSION['e1'] = $_SESSION['e2'] = $_SESSION['e3'] = $_SESSION['e4'] = "";
    $isValid = true;

    // Validation
    if (empty($doctor_name) || strlen($doctor_name) < 2) {
        $_SESSION['e1'] = "Doctor name must be at least 2 characters";
        $isValid = false;
    }
    if (empty($item) || strlen($item) < 2) {
        $_SESSION['e2'] = "Item name must be at least 2 characters";
        $isValid = false;
    }
    if (empty($quantity) || !is_numeric($quantity) || intval($quantity) <= 0) {
        $_SESSION['e3'] = "Quantity must be a positive number";
        $isValid = false;
    }
    // Notes must be filled
    if (empty($notes)) {
        $_SESSION['e4'] = "Notes field is required";
        $isValid = false;
    } elseif (strlen($notes) > 500) {
        $_SESSION['e4'] = "Notes cannot exceed 500 characters";
        $isValid = false;
    }

    if ($isValid) {
        if (saveRequest($doctor_name, $item, $quantity, $notes)) {
            $_SESSION['request_saved'] = true;
            unset($_SESSION['doctor_name'], $_SESSION['item'], $_SESSION['quantity'], $_SESSION['notes']);
        }
    }

    header("Location: ../Views/request.php");
    exit();
}
?>
