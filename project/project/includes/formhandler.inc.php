<?php
session_start();
    $useremail = $_POST["email"];
    $username = $_POST["username"];
    $firstname = $_POST["firstName"];
    $lastname = $_POST["LastName"];
    $dateOfBirth = $_POST["DOB"];
    $password = $_POST["password"];

    $host="sql8.freesqldatabase.com";
    $db_name ="sql8694178";
    $db_user ="sql8694178";
    $db_pass ="fy7xptEx3R";
    $port_number ="3306";

    $query = "INSERT INTO 'Student_acc_details` (FirstName, LastName, Email, Username, Password, DateOfBirth, CreatedAt)
                VALUES (?, ?, ?, ?, ?, ? NOW());";

    $conn = new mysqli($host,$db_user,$db_pass,$db_name, $port_number);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else  {
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssi",$firstname,$lastname,$useremail,$username,$password,$dateOfBirth);
        $stmt->execute();
        $_SESSION['status'] = "Registration successful!  Welcome , ". $username;
        header("Location: ../views/dashboard.php");
        $stmt->close();
        $conn->close();
    }
