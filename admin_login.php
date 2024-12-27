<!-- filepath: /C:/xampp/htdocs/conference_registration/frontend/admin_login.php -->
<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set session variables
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin_username'] = htmlspecialchars($_POST['username']);

    // Redirect to admin dashboard
    header("Location: admin_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - EventMaster.LK</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f9fc;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #1D3557;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        nav {
            max-width: 1200px;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .logo {
            color: #ffffff;
            font-size: 20px;
            font-weight: bold;
        }
        ul {
            list-style: none;
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
        }
        ul li a {
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
        }
        main {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        h2 {
            color: #1D3557;
            font-size: 24px;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 8px;
            font-weight: bold;
            color: #1D3557;
            font-size: 14px;
            text-align: left;
        }
        input {
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: #f7f9fc;
            color: #1D3557;
            font-size: 14px;
            outline: none;
            width: 100%;
        }
        input[type="submit"] {
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            color: white;
            background: linear-gradient(90deg, #43C6AC, #191654);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
        }
        input[type="submit"]:hover {
            transform: scale(1.05);
        }
        footer {
            background-color: #1D3557;
            color: white;
            text-align: center;
            padding: 15px 0;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">EventMaster.LK</div>
            <ul>
                
                <li><a href="home.php">Register</a></li>
                
                <li><a href="contact.php">Contact</a></li>
               
            </ul>
        </nav>
    </header>
    <main>
        <div class="login-container">
            <h2>Admin Login</h2>
            <form method="POST" action="">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <input type="submit" value="Login">
            </form>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 EventMaster. All rights reserved.</p>
    </footer>
</body>
</html>