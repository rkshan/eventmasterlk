<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conference Dashboard</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f9fc; margin: 0; padding: 0;">
    <header>
        <nav style="background-color: #1D3557; padding: 10px 20px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
            <div style="max-width: 1200px; margin: auto; display: flex; align-items: center; justify-content: space-between;">
                <div class="logo" style="color: #ffffff; font-size: 20px; font-weight: bold;">EventMaster.LK</div>
                <ul style="list-style: none; display: flex; gap: 20px; margin: 0; padding: 0; margin-left: auto;">
                    
                    <li><a href="home.php" style="color: #ffffff; text-decoration: none; font-size: 16px; font-weight: 500;">Register</a></li>
                  
                    <li><a href="contact.php" style="color: #ffffff; text-decoration: none; font-size: 16px; font-weight: 500;">Contact</a></li>
                    <li><a href="admin_login.php" style="color: #ffffff; text-decoration: none; font-size: 16px; font-weight: 500;">Admin</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main style="max-width: 1200px; margin: 20px auto; padding: 20px;">
        <section id="schedule">
            <h2 style="color: #1D3557; font-size: 24px; margin-bottom: 20px;">Conference Schedule</h2>
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 40px;">
                <thead>
                    <tr style="background-color: #1D3557; color: #ffffff;">
                        <th style="padding: 12px; border: 1px solid #ddd;">Time</th>
                        <th style="padding: 12px; border: 1px solid #ddd;">Track</th>
                        <th style="padding: 12px; border: 1px solid #ddd;">Session</th>
                        <th style="padding: 12px; border: 1px solid #ddd;">Location</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 12px; border: 1px solid #ddd;">09:00 AM</td>
                        <td style="padding: 12px; border: 1px solid #ddd;">Track 1</td>
                        <td style="padding: 12px; border: 1px solid #ddd;"> Sustainable Infrastructure and Mechanical Systems</td>
                        <td style="padding: 12px; border: 1px solid #ddd;">Auditorium 1</td>
                    </tr>
                    <tr>
                        <td style="padding: 12px; border: 1px solid #ddd;">10:00 AM</td>
                        <td style="padding: 12px; border: 1px solid #ddd;">Track 2</td>
                        <td style="padding: 12px; border: 1px solid #ddd;">Renewable Energy Systems and Smart Grid Technologies</td>
                        <td style="padding: 12px; border: 1px solid #ddd;">Room 203</td>
                    </tr>
                    <tr>
                        <td style="padding: 12px; border: 1px solid #ddd;">11:30 AM</td>
                        <td style="padding: 12px; border: 1px solid #ddd;">Track 3</td>
                        <td style="padding: 12px; border: 1px solid #ddd;"> Sustainable Materials and Green Manufacturing Processes</td>
                        <td style="padding: 12px; border: 1px solid #ddd;">Auditorium 1</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Session Registration Section -->
        <section id="session-registration">
            <h2 style="color: #1D3557; font-size: 24px; margin-bottom: 20px;">Session Registration</h2>
            <form id="sessionRegistrationForm" method="POST" action="register_session.php" style="display: flex; flex-direction: column; background: rgba(255, 255, 255, 0.3); border-radius: 15px; padding: 20px;">
                <label for="participant_name" style="margin-bottom: 8px; font-weight: bold; color: #1D3557; font-size: 14px;">Full Name:</label>
                <input type="text" id="participant_name" name="participant_name" 
                       style="margin-bottom: 20px; padding: 12px; border: 1px solid #ccc; border-radius: 8px; background: #f7f9fc; color: #1D3557; font-size: 14px; outline: none;">

                <label for="session" style="margin-bottom: 8px; font-weight: bold; color: #1D3557; font-size: 14px;">Select Session:</label>
                <select id="session" name="session" 
                        style="margin-bottom: 20px; padding: 12px; border: 1px solid #ccc; border-radius: 8px; background: #f7f9fc; color: #1D3557; font-size: 14px; outline: none;">
                    <option value="opening_remarks"> Sustainable Infrastructure and Mechanical Systems. - 09:00 AM</option>
                    <option value="ai_healthcare">Renewable Energy Systems and Smart Grid Technologies - 10:00 AM</option>
                    <option value="future_technology"> Sustainable Materials and Green Manufacturing Processes - 11:30 AM</option>
                </select>

                <input type="submit" value="Register" 
                       style="padding: 12px; border: none; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; color: white; background: linear-gradient(90deg, #43C6AC, #191654); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.2s ease;">
            </form>
        </section>

        <!-- In-Room Registration Section -->
        <section id="in-room-registration">
            <h2 style="color: #1D3557; font-size: 24px; margin-bottom: 20px;">In-Room Registration</h2>
            <div>
                <h3 style="color: #1D3557; font-size: 20px;">Scan QR Code to Mark Attendance</h3>
                <video id="qr-video" style="width: 100%; max-width: 400px;"></video>
                <button id="start-scan" style="padding: 12px; border: none; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; color: white; background: linear-gradient(90deg, #43C6AC, #191654); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.2s ease;">Start Scan</button>
            </div>
            <div>
                <h3 style="color: #1D3557; font-size: 20px;">Manual Registration</h3>
                <form method="POST" action="manual_register.php" style="display: flex; flex-direction: column; background: rgba(255, 255, 255, 0.3); border-radius: 15px; padding: 20px;">
                    <label for="participant_name_manual" style="margin-bottom: 8px; font-weight: bold; color: #1D3557; font-size: 14px;">Full Name:</label>
                    <input type="text" id="participant_name_manual" name="participant_name_manual" 
                           style="margin-bottom: 20px; padding: 12px; border: 1px solid #ccc; border-radius: 8px; background: #f7f9fc; color: #1D3557; font-size: 14px; outline: none;">

                    <label for="session_manual" style="margin-bottom: 8px; font-weight: bold; color: #1D3557; font-size: 14px;">Select Session:</label>
                    <select id="session_manual" name="session_manual" 
                            style="margin-bottom: 20px; padding: 12px; border: 1px solid #ccc; border-radius: 8px; background: #f7f9fc; color: #1D3557; font-size: 14px; outline: none;">
                        <option value="opening_remarks"> Sustainable Infrastructure and Mechanical Systems - 09:00 AM</option>
                        <option value="ai_healthcare">Renewable Energy Systems and Smart Grid Technologies - 10:00 AM</option>
                        <option value="future_technology"> Sustainable Materials and Green Manufacturing Processes - 11:30 AM</option>
                    </select>

                    <input type="submit" value="Register" 
                           style="padding: 12px; border: none; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; color: white; background: linear-gradient(90deg, #43C6AC, #191654); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.2s ease;">
                </form>
            </div>
        </section>

        <!-- Keynote Speakers Section -->
        <section id="keynote-speakers">
            <h2 style="color: #1D3557; font-size: 24px; margin-bottom: 20px;">Keynote Speakers</h2>
            <div class="speaker-card" style="background: #f7f9fc; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); margin-bottom: 20px;">
                <h3 style="color: #1D3557; font-size: 20px; margin-bottom: 10px;">Dr. Jane Smith</h3>
                <p style="color: #1D3557; font-size: 14px;"><strong>Topic:</strong> Sustainable Infrastructure and Mechanical Systems</p>
            </div>
            <div class="speaker-card" style="background: #f7f9fc; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); margin-bottom: 20px;">
                <h3 style="color: #1D3557; font-size: 20px; margin-bottom: 10px;">Dr. Joe Feller</h3>
                <p style="color: #1D3557; font-size: 14px;"><strong>Topic:</strong> Renewable Energy Systems and Smart Grid Technologies</p>
            </div>
            <div class="speaker-card" style="background: #f7f9fc; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); margin-bottom: 20px;">
                <h3 style="color: #1D3557; font-size: 20px; margin-bottom: 10px;">Dr. Jane Taylor</h3>
                <p style="color: #1D3557; font-size: 14px;"><strong>Topic:</strong> Sustainable Materials and Green Manufacturing Processes</p>
            </div>
            <!-- Add more speaker cards as needed -->
        </section>

        <!-- Download PDFs Section -->
        <section id="download-pdfs">
            <h2 style="color: #1D3557; font-size: 24px; margin-bottom: 20px;">Download PDFs</h2>
            <ul style="list-style: none; padding: 0;">
                <?php
                $dir = "uploads/";
                if (is_dir($dir)) {
                    if ($dh = opendir($dir)) {
                        while (($file = readdir($dh)) !== false) {
                            if ($file != "." && $file != "..") {
                                echo "<li><a href='$dir$file' target='_blank' style='color: #1D3557; text-decoration: none; font-size: 16px;'>$file</a></li>";
                            }
                        }
                        closedir($dh);
                    }
                }
                ?>
            </ul>
        </section>
    </main>
    <footer style="background-color: #1D3557; color: white; text-align: center; padding: 15px 0;">
        <p style="margin: 0; font-size: 14px;">&copy; 2024 EventMaster. All rights reserved.</p>
    </footer>

    <script>
        document.getElementById('sessionRegistrationForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting the traditional way

            const formData = new FormData(this);

            fetch('register_session.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                showMessageBox(data.message); // Display the response from the server in a message box
            })
            .catch(error => {
                console.error('Error:', error);
                showMessageBox('An error occurred while registering.');
            });
        });

        function showMessageBox(message) {
            const messageBox = document.createElement('div');
            messageBox.style.position = 'fixed';
            messageBox.style.top = '50%';
            messageBox.style.left = '50%';
            messageBox.style.transform = 'translate(-50%, -50%)';
            messageBox.style.padding = '20px';
            messageBox.style.backgroundColor = '#fff';
            messageBox.style.border = '1px solid #ccc';
            messageBox.style.borderRadius = '8px';
            messageBox.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.1)';
            messageBox.style.zIndex = '1000';
            messageBox.innerText = message;

            const closeButton = document.createElement('button');
            closeButton.innerText = 'Close';
            closeButton.style.marginTop = '10px';
            closeButton.style.padding = '10px';
            closeButton.style.border = 'none';
            closeButton.style.borderRadius = '4px';
            closeButton.style.backgroundColor = '#1D3557';
            closeButton.style.color = '#fff';
            closeButton.style.cursor = 'pointer';
            closeButton.addEventListener('click', () => {
                document.body.removeChild(messageBox);
            });

            messageBox.appendChild(closeButton);
            document.body.appendChild(messageBox);
        }
    </script>
</body>
</html>