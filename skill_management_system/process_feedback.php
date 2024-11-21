<?php
session_start();

$host = 'localhost:3307';
$port = '3307';
$username = 'root'; // Replace with your MySQL username
$password = ''; // Replace with your MySQL password
$dbname = 'skill_management_system';

$conn = new mysqli($host, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_rating = $_POST['course_rating'];
    $content_rating = $_POST['content_rating'];
    $overall_rating = $_POST['overall_rating'];
    $feedback_comments = $conn->real_escape_string($_POST['feedback_comments']);

    $sql = "INSERT INTO feedback1 (course_rating, content_rating, overall_rating, feedback_comments) 
            VALUES ('$course_rating', '$content_rating', '$overall_rating', '$feedback_comments')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Feedback sent successfully!');
                window.location.href = 'dashboard.php';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
