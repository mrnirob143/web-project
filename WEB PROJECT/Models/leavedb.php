<?php
function getConnection() {
    $conn = new mysqli("localhost", "root", "", "testdb");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function saveLeaveRequest($doctor_name, $start_date, $end_date, $reason) {
    $conn = getConnection();
    $today = date('Y-m-d');
    $stmt = $conn->prepare("INSERT INTO leave_requests (doctor_name, start_date, end_date, reason, status, request_date) VALUES (?, ?, ?, ?, 'Pending', ?)");
    $stmt->bind_param("sssss", $doctor_name, $start_date, $end_date, $reason, $today);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function getAllLeaves() {
    $conn = getConnection();
    $sql = "SELECT * FROM leave_requests ORDER BY request_date DESC, id DESC";
    $result = $conn->query($sql);
    $leaves = [];
    while ($row = $result->fetch_assoc()) {
        $leaves[] = $row;
    }
    $conn->close();
    return $leaves;
}
?>
