<?php
// Database connection
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

if (isset($_POST['submit'])) {
    // Collect form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password for security
    $full_name = $_POST['full_name'];
    $age = $_POST['age'];
    $education_level = $_POST['education_level'];
    $desired_job_role = $_POST['desired_job_role'];
    $interests = $_POST['interests'];
    $current_skills = $_POST['current_skills'];

    // Insert data into the user1 table
    $sql = "INSERT INTO users1 (username, email, password, full_name, age, education_level, desired_job_role, interests, current_skills) 
            VALUES ('$username', '$email', '$password', '$full_name', '$age', '$education_level', '$desired_job_role', '$interests', '$current_skills')";

    if ($conn->query($sql) === TRUE) {
        // Registration successful, redirect to login.php
        echo "<script>
                alert('Registration successful! Please login.');
                window.location.href = 'login.php';
              </script>";
    } else {
        // Error occurred
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
