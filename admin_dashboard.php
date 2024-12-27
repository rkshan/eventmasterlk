<!-- filepath: /C:/xampp/htdocs/conference_registration/frontend/admin_dashboard.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f9fc;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1;
        }
        footer {
            background-color: #1D3557;
            color: white;
            text-align: center;
            padding: 15px 0;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #1D3557;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <header>
        <nav style="background-color: #1D3557; padding: 10px 20px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
            <div style="max-width: 1200px; margin: auto; display: flex; align-items: center; justify-content: space-between;">
                <div class="logo" style="color: #ffffff; font-size: 20px; font-weight: bold;">EventMaster.LK</div>
                <ul style="list-style: none; display: flex; gap: 20px; margin: 0; padding: 0;">
                    <li><a href="login.php" style="color: #ffffff; text-decoration: none; font-size: 16px; font-weight: 500;">Home</a></li>
                    <li><a href="contact.php" style="color: #ffffff; text-decoration: none; font-size: 16px; font-weight: 500;">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main style="max-width: 1200px; margin: 20px auto; padding: 20px;">
        <!-- Participant Management Section -->
        <section id="participant-management">
            <h2 style="color: #1D3557; font-size: 24px; margin-bottom: 20px;">Participant Management</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Session</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
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

                    // Fetch participants
                    $sql = "SELECT name, email, session FROM participants";
                    $result = $conn->query($sql);

                    if ($result === false) {
                        echo "Error: " . $conn->error;
                    } else {
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['session']) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3' style='text-align: center;'>No participants found</td></tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Session Management Section -->
        <section id="session-management">
            <h2 style="color: #1D3557; font-size: 24px; margin-bottom: 20px;">Session Management</h2>
            <table>
                <thead>
                    <tr>
                        <th>Participant Name</th>
                        <th>Session</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch session registrations
                    $sql = "SELECT participant_name, session FROM session_registrations";
                    $result = $conn->query($sql);

                    if ($result === false) {
                        echo "Error: " . $conn->error;
                    } else {
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['participant_name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['session']) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='2' style='text-align: center;'>No session registrations found</td></tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Track and Session Management Section -->
        <section id="track-session-management">
            <h2 style="color: #1D3557; font-size: 24px; margin-bottom: 20px;">Track and Session Management</h2>
            <table>
                <thead>
                    <tr>
                        <th>Track</th>
                        <th>Session</th>
                        <th>Speaker</th>
                        <th>Time</th>
                        <th>Venue</th>
                        <th>Capacity</th>
                        <th>Registered Participants</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch tracks and sessions
                    $sql = "SELECT tracks.name AS track_name, sessions.name AS session_name, sessions.speaker, sessions.time, sessions.venue, sessions.capacity, COUNT(session_registrations.id) AS registered_participants
                            FROM tracks
                            JOIN sessions ON tracks.id = sessions.track_id
                            LEFT JOIN session_registrations ON sessions.id = session_registrations.session_id
                            GROUP BY sessions.id";
                    $result = $conn->query($sql);

                    if ($result === false) {
                        echo "Error: " . $conn->error;
                    } else {
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['track_name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['session_name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['speaker']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['time']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['venue']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['capacity']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['registered_participants']) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7' style='text-align: center;'>No tracks or sessions found</td></tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Proceedings Sharing Section -->
        <section id="proceedings-sharing">
            <h2 style="color: #1D3557; font-size: 24px; margin-bottom: 20px;">Proceedings Sharing</h2>
            <form action="upload_proceedings.php" method="post" enctype="multipart/form-data">
                <label for="fileToUpload" style="color: #1D3557; font-size: 16px;">Select file to upload:</label>
                <input type="file" name="fileToUpload" id="fileToUpload" style="margin-bottom: 20px;">
                <input type="submit" value="Upload File" name="submit" style="padding: 12px; border: none; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; color: white; background: linear-gradient(90deg, #43C6AC, #191654); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.2s ease;">
            </form>
            <h3 style="color: #1D3557; font-size: 20px; margin-top: 20px;">Available Proceedings</h3>
            <ul>
                <?php
                $dir = "uploads/";
                if (is_dir($dir)){
                    if ($dh = opendir($dir)){
                        while (($file = readdir($dh)) !== false){
                            if ($file != "." && $file != "..") {
                                echo "<li><a href='$dir$file' target='_blank'>$file</a></li>";
                            }
                        }
                        closedir($dh);
                    }
                }
                ?>
            </ul>
        </section>
        <section id="update-session">
            <h2 style="color: #1D3557; font-size: 24px; margin-bottom: 20px;">Update Session</h2>
            <form method="POST" action="update_session.php" style="display: flex; flex-direction: column; background: rgba(255, 255, 255, 0.3); border-radius: 15px; padding: 20px;">
                <label for="session_id" style="margin-bottom: 8px; font-weight: bold; color: #1D3557; font-size: 14px;">Session ID:</label>
                <input type="text" id="session_id" name="session_id" style="margin-bottom: 20px; padding: 12px; border: 1px solid #ccc; border-radius: 8px; background: #f7f9fc; color: #1D3557; font-size: 14px; outline: none;">

                <label for="new_time" style="margin-bottom: 8px; font-weight: bold; color: #1D3557; font-size: 14px;">New Time:</label>
                <input type="text" id="new_time" name="new_time" style="margin-bottom: 20px; padding: 12px; border: 1px solid #ccc; border-radius: 8px; background: #f7f9fc; color: #1D3557; font-size: 14px; outline: none;">

                <label for="new_venue" style="margin-bottom: 8px; font-weight: bold; color: #1D3557; font-size: 14px;">New Venue:</label>
                <input type="text" id="new_venue" name="new_venue" style="margin-bottom: 20px; padding: 12px; border: 1px solid #ccc; border-radius: 8px; background: #f7f9fc; color: #1D3557; font-size: 14px; outline: none;">

                <input type="submit" value="Update Session" style="padding: 12px; border: none; border-radius: 8px; font-size: 16px; font-weight: bold; cursor: pointer; color: white; background: linear-gradient(90deg, #43C6AC, #191654); box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.2s ease;">
            </form>
        </section>
    </main>
    <footer>
        <p style="margin: 0; font-size: 14px;">&copy; 2024 EventMaster. All rights reserved.</p>
    </footer>
</body>
</html>