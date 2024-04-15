<?php
session_start();
$host="sql8.freesqldatabase.com";
$db_name ="sql8694178";
$db_user ="sql8694178";
$db_pass ="fy7xptEx3R";
$port_number ="3306";

$username = $_POST["username"];
$password = $_POST["password"];


    $conn = new mysqli($host, $db_user, $db_pass, $db_name);
        // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $connnn->connect_error);
    } else  {
        $stmt = $conn->prepare("SELECT * FROM studentdb WHERE  Username=?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if($data["Password"] == $password){
                $_SESSION['username'] = $username;
                $_SESSION['status'] = "Login successful!  Welcome back, ". $data['Username'];
                header("Location: ../views/dashboard.php");
                exit();
            } else {
                $_SESSION['status']= "Invalid Username or Password!";
                header("Location: ../views/login.php");
            }
    } else {
            $_SESSION['status']= "Invalid Username or Password!";
            header("Location: ../views/login.php");
        }
    }
$conn -> close();
                
            