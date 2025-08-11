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

// Get feedback data
$feedback = $_POST['feedback'];
$rating = $_POST['rating'];
$student_id = 1; // Example student ID

// Insert feedback into the database
$sql = "INSERT INTO feedback (student_id, feedback, rating) VALUES ('$student_id', '$feedback', '$rating')";
if ($conn->query($sql) === TRUE) {
    echo "Feedback submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
