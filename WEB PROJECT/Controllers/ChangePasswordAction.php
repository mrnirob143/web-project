<?php
session_start();
require("../Models/changePassworddb.php"); // Include DB + function

if (empty($_SESSION['isLoggedIn'])) {
    header("Location: ../Views/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current = trim($_POST['current'] ?? '');
    $new     = trim($_POST['new'] ?? '');
    $confirm = trim($_POST['confirm'] ?? '');

    $_SESSION['e1'] = $_SESSION['e2'] = $_SESSION['e3'] = '';

    $isValid = true;

    // Current password validation
    if (empty($current)) {
        $_SESSION['e1'] = "Please enter current password";
        $isValid = false;
    }

    // New password validation
    if (empty($new)) {
        $_SESSION['e2'] = "Please enter new password";
        $isValid = false;
    } elseif (strlen($new) < 6) {
        $_SESSION['e2'] = "New password must be at least 6 characters";
        $isValid = false;
    } elseif (!preg_match('/[A-Z]/', $new)) {
        $_SESSION['e2'] = "New password must contain at least one uppercase letter";
        $isValid = false;
    } elseif (!preg_match('/[0-9]/', $new)) {
        $_SESSION['e2'] = "New password must contain at least one number";
        $isValid = false;
    }

    // Confirm password validation
    if (empty($confirm)) {
        $_SESSION['e3'] = "Please confirm new password";
        $isValid = false;
    } elseif ($new !== $confirm) {
        $_SESSION['e3'] = "Passwords do not match";
        $isValid = false;
    }

    // Change password if valid
    if ($isValid) {
        $result = changePassword($current, $new);
        if ($result === true) {
            $_SESSION['password_changed'] = true;
        } else {
            $_SESSION['e1'] = "Current password is incorrect or same as new password";
            unset($_SESSION['password_changed']);
        }
    } else {
        unset($_SESSION['password_changed']);
    }

    header("Location: ../Views/change.php");
    exit();
}
?>
