<?php
function checkLogin($email, $password) {
    $conn = mysqli_connect("localhost", "root", "", "testdb");
    if (!$conn) {
        return false;
    }
   
    $sql = "SELECT * FROM registration WHERE email='$email' AND password='$password' LIMIT 1";
    $result = mysqli_query($conn, $sql);
 
    $row = mysqli_fetch_assoc($result);
 
    mysqli_close($conn);
 
    return $row ? true : false;
}
?>