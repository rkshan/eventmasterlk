<!-- filepath: /C:/xampp/htdocs/conference_registration/frontend/update_session.php -->
<?php
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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $session_id = $_POST['session_id'];
    $new_time = $_POST['new_time'];
    $new_venue = $_POST['new_venue'];

    // Update session information in the database
    $sql = "UPDATE sessions SET time = ?, venue = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $new_time, $new_venue, $session_id);

    if ($stmt->execute()) {
        // Display success message and redirect to admin dashboard
        echo "<script>
                alert('Session updated successfully.');
                window.location.href = 'admin_dashboard.php';
              </script>";
        exit();
    } else {
        echo "Error updating session: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>