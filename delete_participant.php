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

// Handle deletion
$data = json_decode(file_get_contents("php://input"), true);
if (isset($data['id'])) {
    $id = $data['id'];

    // Delete participant from the database
    $sql = "DELETE FROM session_registrations WHERE id = ?";
    $stmt = $conn->prepare($sql);

    // Check if prepare() failed
    if ($stmt === false) {
        die(json_encode(["status" => "error", "message" => "Error preparing statement: " . $conn->error]));
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Participant deleted successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error deleting record: " . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request"]);
}

$conn->close();
?>