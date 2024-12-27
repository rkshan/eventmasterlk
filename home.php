<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conference Registration</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f9fc; margin: 0; padding: 0;">
    <header style="background-color: #1D3557; padding: 10px 20px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
        <nav style="max-width: 1200px; margin: auto; display: flex; align-items: center; justify-content: space-between;">
            <div class="logo" style="color: #ffffff; font-size: 20px; font-weight: bold;">EventMaster.LK</div>
            <ul style="list-style: none; display: flex; gap: 20px; margin: 0; padding: 0;">
                
                <li><a href="home.php" style="color: #ffffff; text-decoration: none; font-size: 16px; font-weight: 500;">Register</a></li>
                
                <li><a href="contact.php" style="color: #ffffff; text-decoration: none; font-size: 16px; font-weight: 500;">Contact</a></li>
                <li><a href="admin_login.php" style="color: #ffffff; text-decoration: none; font-size: 16px; font-weight: 500;">Admin</a></li>
            </ul>
        </nav>
    </header>
    <main style="max-width: 1200px; margin: 20px auto; padding: 20px;">
        <section id="home" style="margin-bottom: 40px;">
            <div style="text-align: center;">
                <h1 style="color: #1D3557; font-size: 36px; margin-bottom: 20px;">Welcome to EventMaster.LK</h1>
                <p style="color: #1D3557; font-size: 18px;">Your one-stop solution for conference registration and management.</p>
            </div>
        </section>

        <section id="register" style="margin-bottom: 40px;">
            <div style="text-align: center;">
                <h2 style="color: #1D3557; font-size: 24px; margin-bottom: 20px;">Register for the Conference</h2>
                <form method="POST" action="save.php" style="display: flex; flex-direction: column; align-items: center; background: rgba(255, 255, 255, 0.3); border-radius: 15px; padding: 20px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <label for="name" style="margin-bottom: 8px; font-weight: bold; color: #1D3557; font-size: 14px;">Full Name:</label>
                    <input type="text" id="name" name="name" style="margin-bottom: 20px; padding: 12px; border: 1px solid #ccc; border-radius: 8px; background: #f7f9fc; color: #1D3557; font-size: 14px; outline: none; width: 100%; max-width: 400px;">

                    <label for="email" style="margin-bottom: 8px; font-weight: bold; color: #1D3557; font-size: 14px;">Email:</label>
                    <input type="email" id="email" name="email" style="margin-bottom: 20px; padding: 12px; border: 1px solid #ccc; border-radius: 8px; background: #f7f9fc; color: #1D3557; font-size: 14px; outline: none; width: 100%; max-width: 400px;">

                    <label for="password" style="margin-bottom: 8px; font-weight: bold; color: #1D3557; font-size: 14px;">Password:</label>
                    <input type="password" id="password" name="password" style="margin-bottom: 20px; padding: 12px; border: 1px solid #ccc; border-radius: 8px; background: #f7f9fc; color: #1D3557; font-size: 14px; outline: none; width: 100%; max-width: 400px;">

                    <label for="session" style="margin-bottom: 8px; font-weight: bold; color: #1D3557; font-size: 14px;">Select Session:</label>
                    <select id="session" name="session" style="margin-bottom: 20px; padding: 12px; border: 1px solid #ccc; border-radius: 8px; background: #f7f9fc; color: #1D3557; font-size: 14px; outline: none; width: 100%; max-width: 400px;">
                        <option value="opening_remarks">Sustainable Infrastructure and Mechanical Systems - 09:00 AM</option>
                        <option value="ai_healthcare">Renewable Energy Systems and Smart Grid Technologies - 10:00 AM</option>
                        <option value="future_technology">Keynote: Future of Technology - 11:30 AM</option>
                    </select>

                    <input type="submit" value="Register" style="padding: 12px; border: none; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; color: white; background: linear-gradient(90deg, #43C6AC, #191654); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.2s ease;">
                </form>
            </div>
        </section>

        <section id="contact" style="margin-bottom: 40px;">
            <div style="text-align: center;">
                <h2 style="color: #1D3557; font-size: 24px; margin-bottom: 20px;">Contact Us</h2>
                <p style="color: #1D3557; font-size: 18px;">For any inquiries, please contact us at <a href="mailto:info@eventmaster.lk" style="color: #1D3557; text-decoration: underline;">info@eventmaster.lk</a>.</p>
            </div>
        </section>
    </main>
    <footer style="background-color: #1D3557; color: white; text-align: center; padding: 15px 0;">
        <p style="margin: 0; font-size: 14px;">&copy; 2024 EventMaster. All rights reserved.</p>
    </footer>
</body>
</html>