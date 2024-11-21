<?php
session_start();
require 'db_connection.php';

// Ensure user is logged in
$user_id = $_SESSION['user_id'] ?? null;
if (!$user_id) {
    echo "You must be logged in to view your score.";
    exit;
}

// Get job role and skill from URL parameters
$job_role = $_GET['job_role'] ?? '';
$skill = $_GET['skill'] ?? '';

// Fetch questions and calculate score
$score = 0;
$total_questions = 0;

$query = "SELECT * FROM quiz_questions WHERE job_role = ? AND skill = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $job_role, $skill);
$stmt->execute();
$result = $stmt->get_result();

// Loop through questions to check the answers
while ($row = $result->fetch_assoc()) {
    $question_id = $row['id'];
    $correct_option = $row['correct_option'];
    $user_answer = $_POST['question_' . $question_id] ?? '';

    if ($user_answer === $correct_option) {
        $score++;
    }
    $total_questions++;
}

// Insert results into database (optional)
$insert_query = "INSERT INTO user_quiz_results (user_id, job_role, skill, score, total_questions) VALUES (?, ?, ?, ?, ?)";
$insert_stmt = $conn->prepare($insert_query);
$insert_stmt->bind_param("issii", $user_id, $job_role, $skill, $score, $total_questions);
$insert_stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Quiz Results</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .result-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .result-container h2 {
            font-size: 24px;
            color: #333;
        }

        .score {
            font-size: 48px;
            color: #4CAF50;
            font-weight: bold;
            margin-top: 20px;
        }

        .back-button {
            background-color: #007bff;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 30px;
            display: inline-block;
        }

        .back-button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>

<div class="result-container">
    <h2>Your Quiz Results</h2>
    <p>Job Role: <?php echo htmlspecialchars($job_role); ?></p>
    <p>Skill: <?php echo htmlspecialchars($skill); ?></p>
    <div class="score"><?php echo $score . ' / ' . $total_questions; ?></div>
    <p>Your Score!</p>
    <a href="skill_dashboard.php" class="back-button">Back to Dashboard</a>
</div>

</body>
</html>
