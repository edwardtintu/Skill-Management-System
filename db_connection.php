<?php
// Database credentials
$host = "localhost:3307";       // Hostname (usually localhost)
$username = "root";        // Your MySQL username
$password = "";            // Your MySQL password (leave blank if using XAMPP default)
$database = "skill_management_system"; // Your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Connection successful
?>
