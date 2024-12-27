<?php
session_start();

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

// Initialize variables
$email = $password = "";
$errors = [];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Validation
    if (empty($email)) {
        $errors[] = "Email must not be empty.";
    }
    if (empty($password)) {
        $errors[] = "Password must not be empty.";
    }

    // If no errors, check credentials
    if (empty($errors)) {
        // Prepare SQL query to fetch user details
        $sqlFetchUser = "SELECT * FROM participants WHERE email = ?";
        $stmt = $conn->prepare($sqlFetchUser);

        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();

                // Set session and redirect to a dashboard page
                $_SESSION['user'] = $user['name'];
                header("Location: dashboard.php");
                exit();
            } else {
                $errors[] = "No account found with the provided email.";
            }
            $stmt->close();
        } else {
            $errors[] = "Error preparing statement: " . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f9fc; margin: 0; padding: 0;">
    <header>
        <nav style="background-color: #1D3557; padding: 10px 20px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
            <div style="max-width: 1200px; margin: auto; display: flex; align-items: center; justify-content: space-between;">
                <div class="logo" style="color: #ffffff; font-size: 20px; font-weight: bold;">EventMaster.LK</div>
                <ul style="list-style: none; display: flex; gap: 20px; margin: 0; padding: 0;">
                   
                    <li><a href="home.php" style="color: #ffffff; text-decoration: none; font-size: 16px; font-weight: 500;">Register</a></li>
                    
                    <li><a href="#contact.php" style="color: #ffffff; text-decoration: none; font-size: 16px; font-weight: 500;">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main style="max-width: 500px; margin: 70px auto; background-color: #ffffff; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); padding: 30px;">
        <section id="login">
            <h2 style="text-align: center; color: #1D3557; font-size: 24px; margin-bottom: 20px;">Login</h2>
            <!-- Display validation errors -->
            <?php if (!empty($errors)): ?>
                <ul style="color: red;">
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <!-- Login Form -->
            <form method="POST" action="login.php" style="display: flex; flex-direction: column; background: rgba(255, 255, 255, 0.3); border-radius: 15px; padding: 20px;">
                <label for="email" style="margin-bottom: 8px; font-weight: bold; color: #1D3557; font-size: 14px;">Email:</label>
                <input type="email" id="email" name="email" 
                       style="margin-bottom: 20px; padding: 12px; border: 1px solid #ccc; border-radius: 8px; background: #f7f9fc; color: #1D3557; font-size: 14px; outline: none;">

                <label for="password" style="margin-bottom: 8px; font-weight: bold; color: #1D3557; font-size: 14px;">Password:</label>
                <input type="password" id="password" name="password" 
                       style="margin-bottom: 20px; padding: 12px; border: 1px solid #ccc; border-radius: 8px; background: #f7f9fc; color: #1D3557; font-size: 14px; outline: none;">

                <input type="submit" value="Login" 
                       style="padding: 12px; border: none; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; color: white; background: linear-gradient(90deg, #43C6AC, #191654); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.2s ease;">
            </form>
        </section>
    </main>
    <footer style="background-color: #1D3557; color: white; text-align: center; padding: 15px 0; position: fixed; bottom: 0; width: 100%; box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);">
        <p style="margin: 0; font-size: 14px;">&copy; 2024 EventMaster. All rights reserved.</p>
    </footer>
</body>
</html>