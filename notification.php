<?php
// Database configuration
$host = 'localhost:3307'; // Your database host
$user = 'root';           // Your database username
$password = '';           // Your database password
$database = 'skill_management_system'; // Your database name

// Create a connection to the database
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch notifications from the database
$sql = "SELECT * FROM notifications ORDER BY created_at DESC";
$result = $conn->query($sql);

// Fetch all notifications into an array
$notifications = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $notifications[] = $row;
    }
}

// Close the connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Notifications</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f7f8fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
        }

        .notification-container {
            width: 80%;
            max-width: 900px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .notification-card {
            background-color: #ffffff;
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            border-left: 5px solid;
        }

        .notification-card.quiz {
            border-left-color: #4caf50;
        }

        .notification-card.resource {
            border-left-color: #2196f3;
        }

        .back-button {
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 20px;
        }

        .back-button:hover {
            background-color: #45a049;
        }

        time {
            display: block;
            margin-top: 10px;
            font-size: 0.9em;
            color: #999;
        }
    </style>
</head>
<body>

    <!-- Back Button -->
    <a href="dashboard.php" class="back-button">Back to Dashboard</a>

    <div class="notification-container">
        <h2>Your Notifications</h2>

        <!-- Dynamic Notifications -->
        <?php
        if (!empty($notifications)) {
            foreach ($notifications as $notification) {
                // Add type-based styling
                $typeClass = $notification['type'] === 'quiz' ? 'quiz' : 'resource'; 
                echo '<div class="notification-card ' . $typeClass . '">';
                echo '<h4>' . htmlspecialchars($notification['title']) . '</h4>';
                echo '<p>' . htmlspecialchars($notification['message']) . '</p>';
                echo '<time>' . date('F j, Y, g:i A', strtotime($notification['created_at'])) . '</time>';
                echo '</div>';
            }
        } else {
            echo '<p>No notifications to display.</p>';
        }
        ?>
    </div>

</body>
</html>
