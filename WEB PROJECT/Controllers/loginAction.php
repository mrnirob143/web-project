<?php
session_start();
require("../Models/loginmodel.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim(htmlspecialchars($_POST['email'] ?? ''));
    $password = trim(htmlspecialchars($_POST['password'] ?? ''));

    // Clear previous errors
    $_SESSION['e1'] = $_SESSION['e2'] = $_SESSION['loginError'] = "";
    $_SESSION['email'] = $email;

    $isValid = true;

    // Email validation
    if (empty($email)) {
        $_SESSION['e1'] = "Please enter your email";
        $isValid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['e1'] = "Invalid email format";
        $isValid = false;
    }

    // Password validation
    if (empty($password)) {
        $_SESSION['e2'] = "Please enter your password";
        $isValid = false;
    } elseif (strlen($password) < 6) {
        $_SESSION['e2'] = "Password must be at least 6 characters";
        $isValid = false;
    }

    if ($isValid) {
        $user = checkLogin($email, $password); // your DB login check function

        if ($user) {
            // Successful login
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['fullname'];

            // Set success color cookie (green) for 10 seconds
            setcookie('login_card_color', '#70ed60ff', time() + 10, "/");
            setcookie('login_card_color_time', time() + 10, time() + 10, "/");

            header("Location: ../Views/home.php"); // Dashboard page
            exit();
        } else {
            // Failed login
            $_SESSION['loginError'] = "Invalid email or password";

            // Set failure color cookie (red) for 10 seconds
            setcookie('login_card_color', '#ff6b6b', time() + 10, "/");
            setcookie('login_card_color_time', time() + 10, time() + 10, "/");

            header("Location: ../Views/login.php"); // Back to login page
            exit();
        }
    } else {
        // Validation failed, stay on login page
        header("Location: ../Views/login.php");
        exit();
    }
}
?>
