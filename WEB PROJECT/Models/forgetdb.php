<?php
function getConnection() {
    $conn = new mysqli("localhost", "root", "", "testdb"); // change db if needed
    if ($conn->connect_error) {
        die("❌ Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Find user by email
function findUserByEmail($email) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM registration WHERE email = ?"); // ✅ FIXED
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $user;
}

// Update password
function updatePassword($email, $newPassword) {
    $conn = getConnection();
    $hashed = password_hash($newPassword, PASSWORD_BCRYPT);
    $stmt = $conn->prepare("UPDATE users SET password=? WHERE email=?");
    $stmt->bind_param("ss", $hashed, $email);
    $success = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $success;
}
