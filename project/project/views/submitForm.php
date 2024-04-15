<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../project/src/styles/submitForm.css">
    <title>Submission Form</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Menu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../views/dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.html">Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <?php
    if(isset($_SESSION['status'])){
        echo "<div class='alert alert-success'>".$_SESSION['status']."</div>";
        unset($_SESSION['status']);
    }
    ?>

    <div class="pref-card">
        <h1 class="mb-4">Submission Form</h1>

        <form action="../includes/submitFormhandler.inc.php" method="POST" enctype="multipart/form-data" class="submission-form" id="submissionForm">
            <div class="form-group">
                <label for="logBookFile">Upload zipped folder of your Log-Book and Report :</label>
                <input type="file" id="logBookFile" name="fileToUpload" accept=".zip" required class="form-control-file">
            </div>

            <div class="form-group">
                <label for="description">Brief Description:</label>
                <textarea id="description" name="description" required class="form-control" placeholder="The attached folder contains a log book which shows that this week I have completeed the following..."></textarea>
            </div>

            <div class="form-group">
                <input type="submit" name="submitForm" value="Submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
