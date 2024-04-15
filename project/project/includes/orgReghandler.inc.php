<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    include 'db_connection.php';

    // Get and sanitize form inputs
    $orgName = $_POST['orgName'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Note: Password should be securely hashed in a real application

    // Validate inputs (you can add more validation as needed)
    if (empty($orgName) || empty($email) || empty($password)) {
        $_SESSION['status'] = "Please fill out all fields";
        header("Location: ../views/orgRegistration.php");
        exit();
    }

    // Check if organization with the same email already exists
    $checkQuery = "SELECT * FROM organisations WHERE Email = '$email'";
    $checkResult = mysqli_query($conn, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['status'] = "Organization with this email already exists.Please Login";
        header("Location: ../views/orgLogin.php");
        exit();
    }

    // Insert organization into database
    $insertQuery = "INSERT INTO organisations (OrgName, Email, Password) VALUES ('$orgName', '$email', '$password')";
    if (mysqli_query($conn, $insertQuery)) {
        $_SESSION['status'] = "Organization registered successfully";
        header("Location: ../views/orgDashboard.php"); // Redirect to dashboard or another page
        exit();
    } else {
        $_SESSION['status'] = "Error registering organization";
        header("Location: ../views/orgRegistration.php");
        exit();
    }
} else {
    $_SESSION['status'] = "Invalid request";
    header("Location: ../views/orgRegistration.php");
    exit();
}
?>
