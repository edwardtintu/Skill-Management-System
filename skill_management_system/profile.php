<?php
// Start the session
session_start();

// Database connection details
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "skill_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Get the logged-in user's username from session
$username = $_SESSION['username'];

// Fetch user details from the database based on the username
$sql = "SELECT username, education_level, email, age, desired_job_role FROM users1 WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username); // Bind the username
$stmt->execute();
$result = $stmt->get_result();

// Check if user data exists
if ($result->num_rows > 0) {
    // Fetch user data
    $row = $result->fetch_assoc();
    $name = $row['username'];
    $academic_details = $row['education_level'];
    $email = $row['email'];
    $age = $row['age'];
    $desired_jobs = $row['desired_job_role'];
} else {
    // Redirect to login if no data found
    header("Location: login.php");
    exit();
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }

        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .back-button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #45a049;
        }

        h1 {
            color: #333;
        }

        .profile-info {
            margin-top: 20px;
            font-size: 18px;
            color: #555;
        }

        .profile-info div {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <!-- Back Button -->
    <a href="dashboard.php" class="back-btn">
        <button class="back-button">Back</button>
    </a>

    <div class="container">
        <h1>User Profile</h1>
        <div class="profile-info">
            <div><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></div>
            <div><strong>Academic Details:</strong> <?php echo htmlspecialchars($academic_details); ?></div>
            <div><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></div>
            <div><strong>Age:</strong> <?php echo htmlspecialchars($age); ?></div>
            <div><strong>Desired Jobs:</strong> <?php echo htmlspecialchars($desired_jobs); ?></div>
        </div>
    </div>
</body>
</html>
