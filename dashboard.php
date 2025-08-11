<?php
session_start(); // Ensure session is started

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Handle the logout process when 'logout' action is set in the URL
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session
    header("Location: login.php"); // Redirect to login page
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Skill Management System</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* General Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        header {
            position: relative;
            text-align: center;
            padding: 15px 20px;
            background-color: #007BFF;
            color: white;
            border-radius: 10px 10px 0 0;
        }

        header h1 {
            margin: 0;
            font-size: 28px;
        }

        /* Profile Button (Top Right Corner) */
        .profile-button {
            position: absolute;
            top: 15px;
            right: 20px;
        }

        .profile-button a {
            text-decoration: none;
        }

        .profile-button button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .profile-button button:hover {
            background-color: #45a049;
        }

        /* Logout Button (Bottom Right Corner) */
        .logout-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }

        .logout-button a {
            text-decoration: none;
        }

        .logout-button button {
            background-color: #f44336;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .logout-button button:hover {
            background-color: #d32f2f;
        }

        /* Dashboard Grid */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px; /* Increased gap between buttons */
            justify-content: center;
            padding: 20px 0;
        }

        .grid-item {
            text-align: center;
        }

        button.dashboard-btn {
            width: 100%;
            padding: 20px 25px; /* Bigger buttons */
            font-size: 18px; /* Larger font size */
            border: none;
            border-radius: 10px;
            cursor: pointer;
            background: linear-gradient(90deg, #007BFF, #0056b3);
            color: white;
            font-weight: bold;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s, background-color 0.3s ease;
        }

        button.dashboard-btn:hover {
            transform: translateY(-3px);
            background: linear-gradient(90deg, #0056b3, #003f82);
        }

        /* Quotes Section */
        .quote-container {
            margin-top: 30px;
            padding: 20px;
            background: #f7f7f7;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .quote {
            font-size: 18px;
            font-style: italic;
            color: #555;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Skill Management System</h1>
        <!-- Profile Button -->
        <div class="profile-button">
            <a href="profile.php">
                <button>View Profile</button>
            </a>
        </div>
    </header>

    <div class="dashboard-container">
        <!-- Welcome Message -->
        <div class="welcome-message">
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
            <p>Explore the options below to start your journey:</p>
        </div>

        <!-- Dashboard Grid -->
        <div class="dashboard-grid">
            <div class="grid-item">
                <a href="learning_resources.html">
                    <button class="dashboard-btn">Learning Resources</button>
                </a>
            </div>
            <div class="grid-item">
                <a href="progress_tracker.php">
                    <button class="dashboard-btn">Progress Tracker</button>
                </a>
            </div>
            <div class="grid-item">
                <a href="skill_dashboard.php">
                    <button class="dashboard-btn">Skill Assessment</button>
                </a>
            </div>
            <div class="grid-item">
                <a href="skill_requirement.html">
                    <button class="dashboard-btn">Skill Requirement</button>
                </a>
            </div>
            <div class="grid-item">
                <a href="feed_back.html">
                    <button class="dashboard-btn">Feedback</button>
                </a>
            </div>
            <div class="grid-item">
                <a href="lessons_learned.html">
                    <button class="dashboard-btn">Lessons Learned</button>
                </a>
            </div>
        </div>
            <div class="grid-item">
                <a href="notification.php">
                    <button class="dashboard-btn">Notifications</button>
                </a>
            </div>
        </div>

        <!-- Quotes Section -->
        <div class="quote-container">
            <div class="quote">"The only way to do great work is to love what you do." – Steve Jobs</div>
            <div class="quote">"Success is not final, failure is not fatal: It is the courage to continue that counts." – Winston Churchill</div>
        </div>
    </div>

    <!-- Logout Button -->
    <div class="logout-button">
        <a href="?action=logout">
            <button>Logout</button>
        </a>
    </div>
</body>
</html>
