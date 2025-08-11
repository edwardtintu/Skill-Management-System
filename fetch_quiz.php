<?php
// Start session
session_start();

// Database connection (assuming db_connection.php is correct)
require 'db_connection.php';

// Get job role and skill from AJAX request
$job_role = $_GET['job_role'] ?? '';
$skill = $_GET['skill'] ?? '';

// Validate input
if (!$job_role || !$skill) {
    echo "Invalid job role or skill.";
    exit;
}

// Fetch quiz questions for the selected job role and skill
$query = "SELECT * FROM quiz_questions WHERE job_role = ? AND skill = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $job_role, $skill);
$stmt->execute();
$result = $stmt->get_result();

// Check if there are any questions
if ($result->num_rows > 0) {
    echo "<h2>Quiz for " . htmlspecialchars($job_role) . " - " . htmlspecialchars($skill) . "</h2>";
    echo "<form method='POST' action='quiz_page.php'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='question'>";
        echo "<p>" . htmlspecialchars($row['question']) . "</p>";
        echo "<label><input type='radio' name='question_" . $row['id'] . "' value='A'> " . htmlspecialchars($row['option_a']) . "</label><br>";
        echo "<label><input type='radio' name='question_" . $row['id'] . "' value='B'> " . htmlspecialchars($row['option_b']) . "</label><br>";
        echo "<label><input type='radio' name='question_" . $row['id'] . "' value='C'> " . htmlspecialchars($row['option_c']) . "</label><br>";
        echo "<label><input type='radio' name='question_" . $row['id'] . "' value='D'> " . htmlspecialchars($row['option_d']) . "</label><br>";
        echo "</div><hr>";
    }
    echo "<button type='submit'>Submit Quiz</button>";
    echo "</form>";
} else {
    echo "<p>No questions available for this quiz.</p>";
}
?>
