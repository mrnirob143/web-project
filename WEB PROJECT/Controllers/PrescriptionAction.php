<?php
session_start();
require("../Models/Prescriptiondb.php");

if (empty($_SESSION['isLoggedIn'])) {
    header("Location: ../Views/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient = trim($_POST['patient'] ?? '');
    $medicine = trim($_POST['medicine'] ?? '');
    $dosage = trim($_POST['dosage'] ?? '');
    $notes = trim($_POST['notes'] ?? '');

    $_SESSION['e1'] = $_SESSION['e2'] = $_SESSION['e3'] = $_SESSION['e4'] = "";
    $_SESSION['patient'] = $patient;
    $_SESSION['medicine'] = $medicine;
    $_SESSION['dosage'] = $dosage;
    $_SESSION['notes'] = $notes;

    $isValid = true;

    // Validation
    if (empty($patient) || strlen($patient)<2 || !preg_match('/^[a-zA-Z\s]+$/', $patient)) {
        $_SESSION['e1'] = "Patient name must be at least 2 letters (letters only)";
        $isValid = false;
    }
    if (empty($medicine) || strlen($medicine)<2) {
        $_SESSION['e2'] = "Medicine name must be at least 2 characters";
        $isValid = false;
    }
    if (empty($dosage) || strlen($dosage)<3) {
        $_SESSION['e3'] = "Dosage must be at least 3 characters";
        $isValid = false;
    }
    if (empty($notes) || strlen($notes)>500) {
        $_SESSION['e4'] = "Notes are required and max 500 chars";
        $isValid = false;
    }

    if ($isValid) {
        if(savePrescription($patient, $medicine, $dosage, $notes)){
            $_SESSION['prescription_saved'] = true;
            unset($_SESSION['patient'], $_SESSION['medicine'], $_SESSION['dosage'], $_SESSION['notes']);
        } else {
            $_SESSION['prescription_saved'] = false;
            $_SESSION['e4'] = "Failed to save prescription to database";
        }
    } else {
        unset($_SESSION['prescription_saved']);
    }

    header("Location: ../Views/prescription.php");
    exit();
}
?>
