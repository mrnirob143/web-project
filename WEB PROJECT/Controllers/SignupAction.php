<?php
session_start();

// Reset old errors and form values
$_SESSION['e1'] = $_SESSION['e2'] = $_SESSION['e3'] = $_SESSION['e4'] = $_SESSION['e5'] = "";
$_SESSION['fullname'] = $_SESSION['email'] = $_SESSION['phone'] = "";

// If form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname   = trim($_POST['fullname'] ?? "");
    $email      = trim($_POST['email'] ?? "");
    $phone      = trim($_POST['phone'] ?? "");
    $password   = trim($_POST['password'] ?? "");
    $cpassword  = trim($_POST['confirm-password'] ?? "");

    $isValid = true;

    // Full name validation
    if ($fullname === "") {
        $_SESSION['e1'] = "Full name is required.";
        $isValid = false;
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $fullname)) {
        $_SESSION['e1'] = "Only letters and spaces allowed.";
        $isValid = false;
    } else {
        $_SESSION['fullname'] = $fullname;
    }

    // Email validation
    if ($email === "") {
        $_SESSION['e2'] = "Email is required.";
        $isValid = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['e2'] = "Invalid email format.";
        $isValid = false;
    } else {
        $_SESSION['email'] = $email;
    }

    // Phone validation
    if ($phone === "") {
        $_SESSION['e3'] = "Phone number is required.";
        $isValid = false;
    } elseif (!preg_match("/^[0-9]{10,15}$/", $phone)) {
        $_SESSION['e3'] = "Phone must be 10–15 digits.";
        $isValid = false;
    } else {
        $_SESSION['phone'] = $phone;
    }

    // Password validation
    if ($password === "") {
        $_SESSION['e4'] = "Password is required.";
        $isValid = false;
    } elseif (strlen($password) < 6) {
        $_SESSION['e4'] = "Password must be at least 6 characters.";
        $isValid = false;
    }

    // Confirm Password
    if ($cpassword === "") {
        $_SESSION['e5'] = "Please confirm your password.";
        $isValid = false;
    } elseif ($password !== $cpassword) {
        $_SESSION['e5'] = "Passwords do not match.";
        $isValid = false;
    }

    // If all fields are valid, proceed
    if ($isValid) {
        require("../Models/signupdb.php"); // Your existing DB registration function

        // DB connection (for phone check)
        $conn = mysqli_connect("localhost", "root", "", "testdb"); // adjust credentials
        if (!$conn) {
            $_SESSION['e3'] = "Database connection error.";
            header("Location: ../Views/signup.php");
            exit();
        }

        // Check if phone already exists
        $phone_safe = mysqli_real_escape_string($conn, $phone);
        $query = "SELECT id FROM registration WHERE phone='$phone_safe' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['e3'] = "Phone number already exists.";
            header("Location: ../Views/signup.php");
            exit();
        }

        // If phone is unique, register user
        if (registerUser($fullname, $email, $phone, $password)) {
            $_SESSION['signup_success'] = true;
            unset($_SESSION['fullname'], $_SESSION['email'], $_SESSION['phone']);
            header("Location: ../Views/login.php");
            exit();
        } else {
            $_SESSION['e2'] = "❌ Email already exists or DB error.";
            header("Location: ../Views/signup.php");
            exit();
        }
    }

    // Redirect back if validation fails
    header("Location: ../Views/signup.php");
    exit();
}
?>
