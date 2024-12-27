<!-- filepath: /C:/xampp/htdocs/conference_registration/frontend/contact.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - EventMaster.LK</title>
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
        h2 {
            color: #1D3557;
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }
        .contact-info {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }
        .contact-info p {
            color: #1D3557;
            font-size: 16px;
            margin: 10px 0;
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
        <section id="contact">
            <h2>Contact Us</h2>
            <div class="contact-info">
                <p><strong>Phone:</strong> +94 123 456 789</p>
                <p><strong>Email:</strong> <a href="mailto:info@eventmaster.lk" style="color: #1D3557; text-decoration: none;">info@eventmaster.lk</a></p>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 EventMaster. All rights reserved.</p>
    </footer>
</body>
</html>