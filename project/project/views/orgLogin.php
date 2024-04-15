<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../src/styles/orgLogin.css">
</head>
<body>
<div class="container">
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
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a
                            class="nav-link active"
                            aria-current="page"
                            href="../index.html"
                        >Home</a
                        >
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../views/registerSelect.html"
                        >Register</a
                        >
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    if(isset($_SESSION['status'])){
        echo "<h4>".$_SESSION['status']."</h4>";
        unset($_SESSION['status']);
    }
    ?>
    <h1>Welcome Back</h1>
    <section>
        <form id="loginForm" action="../includes/orgLoinghandler.inc.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Organisation Name:</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    class="form-control"
                    placeholder="Enter username"
                    required
                />
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control"
                    placeholder="Enter password"
                    required
                />
            </div>

            <button type="submit" name="save" class="btn btn-warning">Login</button>
            <a href="../views/orgRegistration.php" class="register-link">Don't have an account? Register</a>
        </form>
    </section>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>