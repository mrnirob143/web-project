<?php
function changePassword($current_password, $new_password) {
    $servername = "localhost";
    $username   = "root";      // MySQL username
    $dbpassword = "";          // MySQL password
    $dbname     = "testdb";    // Database name

    // Create connection
    $conn = mysqli_connect($servername, $username, $dbpassword, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch current password from DB
    $sql = "SELECT id, password FROM registration LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        mysqli_close($conn);
        return false; // No admin account found
    }

    $row = mysqli_fetch_assoc($result);
    $db_password = $row['password'];
    $admin_id = $row['id'];

    // Verify current password
    if (!password_verify($current_password, $db_password)) {
        mysqli_close($conn);
        return false; // Current password incorrect
    }

    // Check new password is different
    if (password_verify($new_password, $db_password)) {
        mysqli_close($conn);
        return false; // New password same as current
    }

    // Hash new password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update password in DB
    $update = "UPDATE registration SET password='$hashed_password' WHERE id='$admin_id'";
    if (mysqli_query($conn, $update)) {
        mysqli_close($conn);
        return true; // Password changed successfully
    } else {
        mysqli_close($conn);
        return false; // Failed to update
    }
}
?>
