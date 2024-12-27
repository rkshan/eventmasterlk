<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "con_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $participant_name = $_POST['participant_name'];
    $session = $_POST['session'];

    // Insert data into the database
    $sql = "INSERT INTO session_registrations (participant_name, session) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if prepare() failed
    if ($stmt === false) {
        die(json_encode(["status" => "error", "message" => "Error preparing statement: " . $conn->error]));
    }

    $stmt->bind_param("ss", $participant_name, $session);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Registration successful!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error inserting record: " . $stmt->error]);
    }

    $stmt->close();
}

$conn->close();
?>