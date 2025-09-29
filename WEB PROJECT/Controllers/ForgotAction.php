<?php
session_start();
require("../Models/forgetdb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Which step user is on?
    if (isset($_POST['email'])) {
        // Step 1: Email → Send OTP
        $email = trim($_POST['email']);
        $_SESSION['forgot_email'] = $email;
        $_SESSION['e1'] = "";

        if (empty($email)) {
            $_SESSION['e1'] = "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['e1'] = "Invalid email format";
        } else {
            $user = findUserByEmail($email);
            if ($user) {
                $otp = rand(1000, 9999);
                $_SESSION['otp'] = $otp;
                $_SESSION['otp_sent'] = true;
                $_SESSION['forgot_success'] = "OTP sent (demo: $otp)"; 
                // TODO: send email here
            } else {
                $_SESSION['e1'] = "No account found with that email";
            }
        }
    } elseif (isset($_POST['otp1'])) {
        // Step 2: Verify OTP
        $enteredOTP = ($_POST['otp1'] ?? '') . ($_POST['otp2'] ?? '') . ($_POST['otp3'] ?? '') . ($_POST['otp4'] ?? '');
        $_SESSION['e2'] = "";

        if ($enteredOTP == $_SESSION['otp']) {
            $_SESSION['otp_verified'] = true;
        } else {
            $_SESSION['e2'] = "Invalid OTP";
        }
    } elseif (isset($_POST['newPassword'])) {
        // Step 3: Reset Password
        $newPassword = trim($_POST['newPassword']);
        $confirmPassword = trim($_POST['confirmPassword']);
        $_SESSION['e3'] = $_SESSION['e4'] = "";

        if (empty($newPassword)) {
            $_SESSION['e3'] = "New password is required";
        } elseif (strlen($newPassword) < 6) {
            $_SESSION['e3'] = "Password must be at least 6 characters";
        }

        if (empty($confirmPassword)) {
            $_SESSION['e4'] = "Confirm your password";
        } elseif ($newPassword !== $confirmPassword) {
            $_SESSION['e4'] = "Passwords do not match";
        }

        if ($_SESSION['e3'] === "" && $_SESSION['e4'] === "") {
            $email = $_SESSION['forgot_email'];
            if (updatePassword($email, $newPassword)) {
                unset($_SESSION['otp'], $_SESSION['otp_sent'], $_SESSION['otp_verified']);
                $_SESSION['forgot_success'] = "✅ Password reset successfully. Please login.";
                header("Location: ../Views/login.php");
                exit();
            } else {
                $_SESSION['e3'] = "Error updating password.";
            }
        }
    }

    header("Location: ../Views/forgot.php");
    exit();
}
