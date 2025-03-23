<?php
require 'vendor/autoload.php';

use Dotenv\Dotenv;

// Load .env file securely
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Retrieve credentials from environment variables
$servername = $_ENV['DB_HOST'];
$username = $_ENV['DB_USER']; // Limited-privilege user
$password = $_ENV['DB_PASS']; // Strong, unique password
$dbname = $_ENV['DB_NAME'];

// Create new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection securely
if ($conn->connect_error) {
    error_log("Connection Failed: " . $conn->connect_error); // Log error securely
    die("Database connection failed. Please try again later."); // Generic user message
}
?>