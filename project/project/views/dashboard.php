<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../src/styles/dashboard.css" />
    
</head>
<body>
<div class="container text-center">
    <nav class="navbar navbar-expand-lg bg-primary rounded-bottom mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Menu</a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    if(isset($_SESSION['status'])){
        echo "<h2>".$_SESSION['status']."</h2>";
        unset($_SESSION['status']);
    }
    ?>

    <h1>Welcome to Your Dashboard</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <img src="../src/images/preferance.jpg" class="card-img-top" alt="Preferences">
                <div class="card-body">
                    <h5 class="card-title">Enter Preferences</h5>
                    <p class="card-text">Set your preferences for better experiences.</p>
                    <a href="../views/faculty.html" class="btn btn-primary">Enter</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <img src="../src/images/submit_img.webp" class="card-img-top" alt="Submit LogBook">
                <div class="card-body">
                    <h5 class="card-title">Submit LogBook</h5>
                    <p class="card-text">Submit your logbook entries here.</p>
                    <a href="../views/submitForm.php" class="btn btn-primary">Submit</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
