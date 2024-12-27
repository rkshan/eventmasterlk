<?php
$data = json_decode(file_get_contents('php://input'), true);
$session = $data['session'];

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "con_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mark attendance
$sql = "INSERT INTO attendance (session, participant_name) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $session, $participant_name);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}

$stmt->close();
$conn->close();
?>