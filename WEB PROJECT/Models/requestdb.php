<?php
// Models/Requestdb.php

function getDBConnection() {
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "testdb";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

// Save a new request
function saveRequest($doctor_name, $item, $quantity, $notes) {
    $conn = getDBConnection();

    // Sanitize input
    $doctor_name = mysqli_real_escape_string($conn, $doctor_name);
    $item        = mysqli_real_escape_string($conn, $item);
    $quantity    = mysqli_real_escape_string($conn, $quantity);
    $notes       = mysqli_real_escape_string($conn, $notes);
    $date        = date("Y-m-d"); // current date
    $status      = "Pending";     // default status

    $sql = "INSERT INTO requests (doctor_name, item, quantity, notes, date, status)
            VALUES ('$doctor_name', '$item', '$quantity', '$notes', '$date', '$status')";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        return true;
    } else {
        mysqli_close($conn);
        return false;
    }
}

// Fetch all requests, newest first
function getAllRequests() {
    $conn = getDBConnection();
    $sql  = "SELECT * FROM requests ORDER BY id DESC"; // newest first
    $result = mysqli_query($conn, $sql);

    $requests = [];
    if ($result) {
        while($row = mysqli_fetch_assoc($result)) {
            $requests[] = $row;
        }
    }
    mysqli_close($conn);
    return $requests;
}
?>
