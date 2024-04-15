<?php
session_start();  // Starting Session

$targetDirectory =  "uploads"; // Target directory
$targetFile = $targetDirectory.basename($_FILES["fileToUpload"]["name"]);

$uploadStatus = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile);

$fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));//convert ext to lower case 
$allowedTypes = "zip"; // File allowed types


if(isset($_POST['submitForm'])){
    if(file_exists($targetFile)) {
        $_SESSION['status']="Your file has already been uploaded.";
        header("Location: ../views/submitForm.php");
        }else{
            if($fileType != $allowedTypes){
                $_SESSION['status']="Please upload a .zip  file only.";
                header("Location: ../views/submitForm.php");
            }  else {
                 if($uploadStatus) {
                    $_SESSION['status']="Your file has been uploaded successfully.";
                    header("Location: ../views/dashboard.php");
                 } else{
                    $_SESSION['status']= "There was an error uploading your file.";
                    header("Location: ../views/submitForm.php");
                }
            }
    }
}else{
    $_SESSION['errorMessage']= "Tried to access upload page illegally.";
    header("Location: ../views/dashboard.php");
}

