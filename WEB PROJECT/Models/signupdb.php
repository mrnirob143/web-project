<?php
function registerUser($fullname, $email, $phone, $password) {
    $servername = "localhost";
    $username   = "root";      // MySQL username
    $dbpassword = "";          // MySQL password
    $dbname     = "testdb";    // database name

    // Create connection
    $conn = mysqli_connect($servername, $username, $dbpassword, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if email already exists
    $check = "SELECT id FROM registration WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {
        mysqli_close($conn);
        return false; // email already exists
    }

    // Insert new user with plain text password
    $sql = "INSERT INTO registration (fullname, email, phone, password) 
            VALUES ('$fullname', '$email', '$phone', '$password')";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        return true;
    } else {
        mysqli_close($conn);
        return false;
    }
}
