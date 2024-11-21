<?php
session_start();
require 'db_connection.php';

// Ensure user is logged in by checking session
$user_id = $_SESSION['user_id'] ?? null;
if (!$user_id) {
    echo "You must be logged in to take the quiz.";
    exit;
}

// Get job role and skill from URL parameters
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz for <?php echo htmlspecialchars($skill); ?> - <?php echo htmlspecialchars($job_role); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .quiz-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .question {
            margin-bottom: 20px;
        }

        .option {
            margin-bottom: 10px;
        }

        label {
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        button:active {
            background-color: #388e3c;
        }

        .back-button {
            background-color: #007bff;
            margin-top: 20px;
        }

        .back-button:hover {
            background-color: #0056b3;
        }

        .score-container {
            text-align: center;
            padding: 30px;
            background-color: #f0f8ff;
            border-radius: 8px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<header>
    <h1>Quiz for <?php echo htmlspecialchars($skill); ?> - <?php echo htmlspecialchars($job_role); ?></h1>
</header>

<div class="quiz-container">
    <form method="POST" action="submit_quiz.php?job_role=<?php echo urlencode($job_role); ?>&skill=<?php echo urlencode($skill); ?>">
        <?php while ($row = $result->fetch_assoc()) : ?>
            <div class="question">
                <p><?php echo htmlspecialchars($row['question']); ?></p>
                <div class="option">
                    <input type="radio" name="question_<?php echo $row['id']; ?>" value="A" id="A_<?php echo $row['id']; ?>" required>
                    <label for="A_<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['option_a']); ?></label>
                </div>
                <div class="option">
                    <input type="radio" name="question_<?php echo $row['id']; ?>" value="B" id="B_<?php echo $row['id']; ?>" required>
                    <label for="B_<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['option_b']); ?></label>
                </div>
                <div class="option">
                    <input type="radio" name="question_<?php echo $row['id']; ?>" value="C" id="C_<?php echo $row['id']; ?>" required>
                    <label for="C_<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['option_c']); ?></label>
                </div>
                <div class="option">
                    <input type="radio" name="question_<?php echo $row['id']; ?>" value="D" id="D_<?php echo $row['id']; ?>" required>
                    <label for="D_<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['option_d']); ?></label>
                </div>
            </div>
            <hr>
        <?php endwhile; ?>

        <button type="submit">Submit Quiz</button>
    </form>

    <!-- Back Button to skill_dashboard.php -->
    <a href="skill_dashboard.php">
        <button class="back-button">Back to Dashboard</button>
    </a>

</div>

<footer>
    <p>&copy; 2024 Skill Management System</p>
</footer>

</body>
</html>
