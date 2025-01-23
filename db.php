<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Database connection
$servername = "localhost:3307"; // Replace with your server name
$username = "root";        // Replace with your database username
$password = "";            // Replace with your database password
$dbname = "job_portal"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}