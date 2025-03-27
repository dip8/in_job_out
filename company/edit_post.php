<?php
session_start();

// Check if company ID exists in session
if (empty($_SESSION['id_company'])) {
    header("Location: ../index.php"); // Added .php extension for clarity
    exit;
}

// Include database connection
require_once("../db.php");

// Check if form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Verify job post ID is provided and valid
        if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
            throw new Exception("Invalid job post ID");
        }

        // Prepare the update statement
        $stmt = $conn->prepare("UPDATE job_post 
            SET jobtitle = ?, 
                description = ?, 
                minimumsalary = ?, 
                maximumsalary = ?, 
                experience = ?, 
                qualification = ? 
            WHERE id_company = ? 
            AND id_jobpost = ?");

        if (!$stmt) {
            throw new Exception("Prepare failed: " . $conn->error);
        }

        // Get and sanitize input data
        $jobtitle = trim($_POST['jobtitle'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $minimumsalary = filter_var($_POST['minimumsalary'] ?? 0, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $maximumsalary = filter_var($_POST['maximumsalary'] ?? 0, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $experience = trim($_POST['experience'] ?? '');
        $qualification = trim($_POST['qualification'] ?? '');
        $company_id = (int)$_SESSION['id_company'];
        $job_id = (int)$_POST['id'];

        // Bind parameters
        $stmt->bind_param("ssssssii",
            $jobtitle,
            $description,
            $minimumsalary,
            $maximumsalary,
            $experience,
            $qualification,
            $company_id,
            $job_id
        );

        // Execute and handle result
        if ($stmt->execute()) {
            $_SESSION['jobUpdateSuccess'] = true;
            header("Location: my-job-post"); // Added .php extension
            exit;
        } else {
            throw new Exception("Update failed: " . $stmt->error);
        }

    } catch (Exception $e) {
        // Log error (in production, use proper logging instead of echo)
        echo "Error: " . $e->getMessage();
        // Optionally redirect with error message
        // $_SESSION['error'] = $e->getMessage();
        // header("Location: error.php");
        // exit;
    } finally {
        // Clean up
        if (isset($stmt)) {
            $stmt->close();
        }
        $conn->close();
    }
} else {
    // Redirect if not a POST request
    header("Location: create-job-post.php"); // Added .php extension
    exit;
}