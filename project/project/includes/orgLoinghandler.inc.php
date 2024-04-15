<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    include 'db_connection.php';
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM organisations WHERE  OrgName=?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if($data["Password"] == $password){
                $_SESSION['status'] = "Login successful!  Welcome back, ". $data['Username'];
                header("Location: ../views/orgDashboard.php");
                exit();
            } else {
                $_SESSION['status']= "Invalid Username or Password!";
                header("Location: ../views/orgLogin.php");
            }
        }
    }else {
    $_SESSION['status'] = "Invalid request";
    header("Location: ../index.html");
    exit();
}