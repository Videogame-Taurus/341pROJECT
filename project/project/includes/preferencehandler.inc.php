<?php
session_start();

$host = "sql8.freesqldatabase.com";
$db_name = "sql8694178";
$db_user = "sql8694178";
$db_pass = "fy7xptEx3R";
$port_number = "3306";

if (!isset($_SESSION['username'])) {
    // Redirect to login page if user is not logged in
    header("Location: ../views/login.php");
    exit();
}

$username = $_SESSION['username'];

// Connection to the database
$conn = new mysqli($host, $db_user, $db_pass, $db_name, $port_number);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
} else {
    if (isset($_POST['submitPreferences'])) {
        // Get the interests and skills from the form
        $interests = isset($_POST["interests"]) ? (array)$_POST["interests"] : array();
        $skills = isset($_POST["skills"]) ? (array)$_POST["skills"] : array();

        // Check if there are custom interests or skills added
        if (isset($_POST["custom_interest"])) {
            $customInterest = trim($_POST["custom_interest"]);
            if (!empty($customInterest)) {
                $interests[] = $customInterest; // Add custom interest to the interests array
            }
        }

        if (isset($_POST["custom_skill"])) {
            $customSkill = trim($_POST["custom_skill"]);
            if (!empty($customSkill)) {
                $skills[] = $customSkill; // Add custom skill to the skills array
            }
        }

        // Convert arrays to comma-separated strings
        $interests1 = implode(",", $interests);
        $skills1 = implode(",", $skills);

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO student_pref (Username, Interest, Skill) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $interests1, $skills1);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $_SESSION['status'] = "Preferences updated successfully!";
            header("Location: ../views/addPreference.php");
            exit();
        } else {
            $_SESSION['status'] = "Error updating preferences.";
            header("Location: ../views/addPreference.php");
            exit();
        }

        $stmt->close();
    }
}
$conn->close();
?>
