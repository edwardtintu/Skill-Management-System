<?php
session_start(); // Start the session to use session variables

// Database connection
$host = "localhost:3307"; // Your server name
$db_user = "root"; // Your database username
$db_password = ""; // Your database password
$db_name = "skill_management_system"; // Your database name

$conn = new mysqli($host, $db_user, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$error = ""; // Initialize error message

// Handle login logic
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Prepared statement to check username
    $query = "SELECT * FROM users1 WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username); // Bind the parameter
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username']; // Set session variable for username
            $_SESSION['user_id'] = $user['id']; // Set session variable for user_id
            header("Location: dashboard.php"); // Redirect to dashboard
            exit;
        } else {
            $error = "Invalid credentials. Please try again.";
        }
    } else {
        $error = "Invalid credentials. Please try again.";
    }
}

$conn->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Management System - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff; /* Light blue background */
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }

        .login-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            width: 400px;
            padding: 30px;
            margin: 100px auto;
            text-align: center;
        }

        h1 {
            font-family: 'Roboto', sans-serif;
            font-size: 28px;
            font-weight: bold;
            color: #003366; /* Dark blue */
            margin-bottom: 20px;
        }

        .input-container {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-container label {
            font-size: 14px;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        .input-container input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .input-container input:focus {
            border-color: #007acc; /* Highlight border on focus */
        }

        .btn-login {
            background-color: #007acc; /* Blue theme */
            color: white;
            font-size: 16px;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-login:hover {
            background-color: #005f99; /* Darker blue on hover */
        }

        .create-account {
            margin-top: 20px;
            font-size: 14px;
        }

        .create-account a {
            color: #007acc;
            text-decoration: none;
        }

        .create-account a:hover {
            text-decoration: underline;
        }

        .error {
            color: #d9534f; /* Red for error messages */
            font-size: 14px;
            margin-top: 10px;
        }

        @media (max-width: 600px) {
            .login-container {
                width: 90%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h1>SKILL MANAGEMENT SYSTEM </h1>
        <form method="POST" action="login.php">
            <div class="input-container">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter your username" required>
            </div>

            <div class="input-container">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>
            </div>

            <?php if (!empty($error)) { echo "<p class='error'>$error</p>"; } ?>

            <button type="submit" class="btn-login">Login</button>
        </form>

        <div class="create-account">
            <p>Don't have an account? <a href="register.php">Create one here</a></p>
        </div>
    </div>

</body>
</html>
