<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skill_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$skills = $_POST['skills'];
$job_type = $_POST['job_type'];

// Handle file upload
$profile_picture = "";
if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
    $profile_picture = "uploads/" . basename($_FILES['profile_picture']['name']);
    move_uploaded_file($_FILES['profile_picture']['tmp_name'], $profile_picture);
}

// Insert data into database
$sql = "INSERT INTO students (name, email, skills, job_type, profile_picture) 
        VALUES ('$name', '$email', '$skills', '$job_type', '$profile_picture')";

if ($conn->query($sql) === TRUE) {
    echo "Profile saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
