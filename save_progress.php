<?php
session_start(); // Start session for user identification
require 'db_connection.php'; // Include database connection

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id']; // Replace with your session user_id
    $jobRole = $_POST['job_role'];
    $skills = $_POST['skills']; // Array of skills

    // Loop through skills and store progress
    foreach ($skills as $skill => $isCompleted) {
        $query = "INSERT INTO user_progress (user_id, job_role, skill_name, is_completed)
                  VALUES (?, ?, ?, ?)
                  ON DUPLICATE KEY UPDATE is_completed = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("issii", $userId, $jobRole, $skill, $isCompleted, $isCompleted);
        $stmt->execute();
    }

    // Redirect or display a success message
    header("Location: save_progress.php?status=success");
    exit;
}
?>
