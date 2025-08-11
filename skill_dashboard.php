<?php
session_start();

// Ensure user is logged in by checking session
$user_id = $_SESSION['user_id'] ?? null;
if (!$user_id) {
    echo "You must be logged in to take the quiz.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .job-role-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            justify-items: center;
            align-items: center;
        }

        .job-role-button {
            background-color: #4CAF50;
            color: white;
            font-size: 18px;
            padding: 20px 40px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            text-align: center;
            width: 100%;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-sizing: border-box;
        }

        .job-role-button:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        .job-role-button:active {
            background-color: #388e3c;
        }

        .job-role-button a {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<header>
    <h1>Welcome to Your Skill Dashboard</h1>
</header>

<div class="dashboard-container">
<a href="dashboard.php" style="position: absolute; top: 20px; left: 20px; padding: 10px 20px; background-color: #f44336; color: white; border-radius: 5px; text-decoration: none; font-size: 16px;">Back</a>

    <h2>Select a Job Role to Start the Quiz</h2>
    <div class="job-role-buttons">
        <!-- Only job roles with quizzes -->
        <a href="quiz_page.php?job_role=Backend%20Developer&skill=PHP">
            <button class="job-role-button">Backend Developer - PHP</button>
        </a>
        <a href="quiz_page.php?job_role=Backend%20Developer&skill=NodeJS">
            <button class="job-role-button">Backend Developer - NodeJS</button>
        </a>
        <a href="quiz_page.php?job_role=Frontend%20Developer&skill=HTML">
            <button class="job-role-button">Frontend Developer - HTML</button>
        </a>
        <a href="quiz_page.php?job_role=Frontend%20Developer&skill=CSS">
            <button class="job-role-button">Frontend Developer - CSS</button>
        </a>
        <a href="quiz_page.php?job_role=Frontend%20Developer&skill=JavaScript">
            <button class="job-role-button">Frontend Developer - JavaScript</button>
        </a>
        <a href="quiz_page.php?job_role=Full%20Stack%20Developer&skill=React">
            <button class="job-role-button">Full Stack Developer - React</button>
        </a>
        <a href="quiz_page.php?job_role=Full%20Stack%20Developer&skill=Angular">
            <button class="job-role-button">Full Stack Developer - Angular</button>
        </a>
        <a href="quiz_page.php?job_role=Data%20Scientist&skill=Python">
            <button class="job-role-button">Data Scientist - Python</button>
        </a>
        <a href="quiz_page.php?job_role=Data%20Scientist&skill=R">
            <button class="job-role-button">Data Scientist - R</button>
        </a>
        <a href="quiz_page.php?job_role=DevOps%20Engineer&skill=Docker">
            <button class="job-role-button">DevOps Engineer - Docker</button>
        </a>
        <a href="quiz_page.php?job_role=DevOps%20Engineer&skill=Kubernetes">
            <button class="job-role-button">DevOps Engineer - Kubernetes</button>
        </a>
    </div>
</div>

<footer>
    <p>&copy; 2024 Skill Management System</p>
</footer>

</body>
</html>
