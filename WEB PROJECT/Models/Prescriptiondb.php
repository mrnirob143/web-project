<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Save prescription
function savePrescription($patient, $medicine, $dosage, $notes){
    global $conn;
    $patient = mysqli_real_escape_string($conn, $patient);
    $medicine = mysqli_real_escape_string($conn, $medicine);
    $dosage = mysqli_real_escape_string($conn, $dosage);
    $notes = mysqli_real_escape_string($conn, $notes);

    $sql = "INSERT INTO prescriptions (patient, medicine, dosage, notes, date)
            VALUES ('$patient', '$medicine', '$dosage', '$notes', CURDATE())";

    return mysqli_query($conn, $sql);
}

// Get all prescriptions (newest first)
function getAllPrescriptions(){
    global $conn;
    $sql = "SELECT * FROM prescriptions ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    $prescriptions = [];
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $prescriptions[] = $row;
        }
    }
    return $prescriptions;
}
?>
