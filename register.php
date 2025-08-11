<?php
// Start session
session_start();

// Database connection settings
$servername = "localhost:3307";
$username = "root";
$password = ""; // Your MySQL password
$database = "skill_management_system"; // Ensure this matches the database name in phpMyAdmin
$port = 3307; // Specify the MySQL port

// Create a connection to the MySQL database using the custom port
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// CSRF Token Generation - Ensuring it's set at the start of the session
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // CSRF Token Check
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Invalid CSRF token!");
    }

    // Get and sanitize form data
    $username = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $full_name = htmlspecialchars(trim($_POST['full_name']));
    $age = (int)$_POST['age'];
    $education_level = htmlspecialchars(trim($_POST['education_level']));
    $desired_job_role = htmlspecialchars(trim($_POST['desired_job_role']));
    $interests = htmlspecialchars(trim($_POST['interests']));
    $current_skills = htmlspecialchars(trim($_POST['current_skills']));

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL query to insert data into the users table
    $sql = "INSERT INTO users1 (username, email, password, full_name, age, education_level, desired_job_role, interests, current_skills) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssissss", $username, $email, $hashed_password, $full_name, $age, $education_level, $desired_job_role, $interests, $current_skills);

    // Execute the query
    if ($stmt->execute()) {
        // Store the desired job role in the session
        $_SESSION['desired_job_role'] = $desired_job_role;

        // Successfully registered, redirect to login page
        echo "<script>
                alert('Registration Successful!');
                window.location.href = 'login.php'; // Redirect to login page
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #4a90e2, #50a3a2);
        }

        .registration-container {
            width: 90%;
            max-width: 450px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }

        .registration-container h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            color: #555;
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            background-color: #50a3a2;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: #4a90e2;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .footer-text {
            text-align: center;
            margin-top: 20px;
        }

        .footer-text a {
            color: #4a90e2;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <h2>Student Registration Form</h2>
        <form action="" method="post">
            <!-- CSRF Token Field -->
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" placeholder="Enter your full name" required>
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" placeholder="Enter your age" required>
            </div>

            <div class="form-group">
                <label for="education_level">Education Level</label>
                <select id="education_level" name="education_level" required>
                    <option value="10th">10th</option>
                    <option value="12th">12th</option>
                    <option value="Graduate">Graduate</option>
                    <option value="Postgraduate">Postgraduate</option>
                </select>
            </div>

            <div class="form-group">
                <label for="desired_job_role">Desired Job Role</label>
                <select id="desired_job_role" name="desired_job_role" required>
                    <option value="Software Engineer">Software Engineer</option>
                    <option value="Front End Developer">Web Developer</option>
                    <option value="Backend Developer">Backend Developer</option>
                    <option value="Full Stack Developer">Full Stack Developer</option>
                    <option value="Data Analyst">Data Analyst</option>
                    <option value="Data Scientist">Data Scientist</option>
                    <option value="DevOps Engineer">DevOps Engineer</option>
                    <option value="Mobile App Developer">Mobile App Developer</option>
                    <option value="Machine Learning Engineer">Machine Learning Engineer</option>
                    <option value="Cybersecurity Analyst">Cybersecurity Analyst</option>
                </select>
            </div>

            <div class="form-group">
                <label for="interests">Interests (Comma separated skills)</label>
                <input type="text" id="interests" name="interests" placeholder="e.g., Java, Python, Web Development">
            </div>

            <div class="form-group">
                <label for="current_skills">Current Skills</label>
                <textarea id="current_skills" name="current_skills" rows="4" placeholder="Describe your current skills" required></textarea>
            </div>

            <button type="submit">Register</button>
        </form>

        <div class="footer-text">
            Already have an account? <a href="login.php">Login here</a>
        </div>
    </div>
</body>
</html>
