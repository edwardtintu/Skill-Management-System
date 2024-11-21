<?php
require 'db_connection.php';
session_start();

// Define job roles and their respective skills
$jobRoles = [
    'Web Developer' => ['HTML', 'CSS', 'JavaScript', 'React', 'Node.js', 'PHP', 'SQL', 'Git'],
    'Data Analyst' => ['Python', 'R', 'SQL', 'Excel', 'Tableau', 'Power BI', 'Statistics', 'Data Visualization'],
    'Mobile Developer' => ['Java', 'Kotlin', 'Swift', 'Flutter', 'React Native', 'Firebase', 'iOS Development', 'Android Development'],
    'Front-End Developer' => ['HTML', 'CSS', 'JavaScript', 'Bootstrap', 'Tailwind CSS', 'Angular', 'React', 'Vue.js'],
    'Cybersecurity Developer' => ['Network Security', 'Ethical Hacking', 'Cryptography', 'Firewalls', 'Penetration Testing', 'Forensics', 'SIEM Tools', 'Risk Assessment'],
    'Machine Learning Developer' => ['Python', 'TensorFlow', 'PyTorch', 'Scikit-learn', 'NLP', 'Computer Vision', 'Data Preprocessing', 'Model Deployment']
];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['job_role'])) {
    // Get the username from session
    $username = $_SESSION['username'] ?? null;

    if (!$username) {
        echo "Error: User not logged in.";
        exit;
    }

    // Fetch user_id based on the username
    $stmt = $conn->prepare("SELECT id FROM users1 WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "Error: User not found.";
        exit;
    }

    $row = $result->fetch_assoc();
    $user_id = $row['id'];

    // Process job role and completed skills
    $jobRole = $_POST['job_role'];
    $completedSkills = $_POST['skills'] ?? [];

    foreach ($completedSkills as $skill) {
        $stmt = $conn->prepare("
            INSERT INTO user_progress (user_id, job_role, skill, completed) 
            VALUES (?, ?, ?, 1) 
            ON DUPLICATE KEY UPDATE completed = 1
        ");
        $stmt->bind_param('iss', $user_id, $jobRole, $skill);
        $stmt->execute();
    }

    echo "<p>Progress saved for $jobRole!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        .job-role-section {
            margin-bottom: 30px;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .job-role-section h3 {
            margin-bottom: 15px;
        }

        .skills-list {
            list-style: none;
            padding: 0;
        }

        .skills-list li {
            margin: 5px 0;
        }

        button {
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<div style="margin-top: 20px;">
    <button onclick="dashboard.php" style="
        padding: 10px 20px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    ">
        Back
    </button>
</div>

<body>
    <h1>Progress Tracker</h1>

    <form method="POST">
        <?php foreach ($jobRoles as $jobRole => $skills): ?>
            <div class="job-role-section">
                <h3><?php echo $jobRole; ?></h3>
                <ul class="skills-list">
                    <?php foreach ($skills as $skill): ?>
                        <li>
                            <input type="checkbox" name="skills[]" value="<?php echo $skill; ?>" id="<?php echo $skill; ?>">
                            <label for="<?php echo $skill; ?>"><?php echo $skill; ?></label>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <button type="submit" name="job_role" value="<?php echo $jobRole; ?>">Save Progress for <?php echo $jobRole; ?></button>
            </div>
        <?php endforeach; ?>
    </form>
</body>
</html>
