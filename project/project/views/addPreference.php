<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/styles/preferance.css">
    <title>Preferences</title>
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
        <h1 class="mb-4">Add Preferences</h1>

        <form action="../includes/preferencehandler.inc.php" method="post" class="preferences-form" id="preferencesForm">
            <div class="checkbox-group">
                <h3>Select Interests:</h3>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="interests[]" value="Math">
                        Administration
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="interests[]" value="Science">
                        Scietfic Research
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="interests[]" value="History">
                        Teaching
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="interests[]" value="Art">
                        Sales
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="interests[]" value="Engineering">
                      Photography
                    </label>
                </div>
                <!-- Add more checkboxes for interests -->
            </div>

            <div class="checkbox-group">
                <h3>Select Skills:</h3>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="skills[]" value="Communication">
                        Communication
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="skills[]" value="Problem Solving">
                        Problem Solving
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="skills[]" value="Teamwork">
                        Negotiation
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="skills[]" value="Leadership">
                        Leadership
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="skills[]" value="Coding">
                        Coding
                    </label>
                </div>
                <!-- Add more checkboxes for skills -->
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">State Prefered Location To Attach:</label>
                <input type="text" class="form-control" id="location" name="location" placeholder="phase 2,Gaborone">
            </div>

            <!-- Add custom interests and skills -->
            <div class="add-custom mb-3">
                <h3>Add Custom Interests
                <input type="text" class="form-control" name="custom_interest" placeholder="Enter Custom Interest">
                <button type="button" id="addInterestBtn" class="btn btn-primary">Add Interest</button>
            </div>

            <div class="add-custom mb-3">
                <h3>Add Custom Skills:</h3>
                <input type="text" class="form-control" name="custom_skill" placeholder="Enter Custom Skill">
                <button type="button" id="addSkillBtn" class="btn btn-primary">Add Skill</button>
            </div>

            <button type="submit" name="submitPreferences" class="btn btn-success">Submit Preferences</button>
            <a href="../views/faculty.html" class="ms-3 btn btn-outline-primary">Select Faculty</a>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    // Function to add custom interests
    document.getElementById("addInterestBtn").addEventListener("click", function () {
        var input = document.querySelector('input[name="custom_interest"]');
        var customInterest = input.value.trim();
        if (customInterest !== "") {
            var checkboxGroup = document.querySelector(".checkbox-group");
            var newCheckbox = document.createElement("div");
            newCheckbox.innerHTML =
                '<div class="form-check">' +
                '<label class="form-check-label">' +
                '<input class="form-check-input" type="checkbox" name="interests[]" value="' + customInterest + '">' +
                customInterest +
                '</label>' +
                '</div>';
            checkboxGroup.appendChild(newCheckbox.firstChild);
            input.value = ""; // Clear the input field
        }
    });

    // Function to add custom skills
    document.getElementById("addSkillBtn").addEventListener("click", function () {
        var input = document.querySelector('input[name="custom_skill"]');
        var customSkill = input.value.trim();
        if (customSkill !== "") {
            var checkboxGroup = document.querySelectorAll(".checkbox-group")[1]; // Select second checkbox group for skills
            var newCheckbox = document.createElement("div");
            newCheckbox.innerHTML =
                '<div class="form-check">' +
                '<label class="form-check-label">' +
                '<input class="form-check-input" type="checkbox" name="skills[]" value="' + customSkill + '">' +
                customSkill +
                '</label>' +
                '</div>';
            checkboxGroup.appendChild(newCheckbox.firstChild);
            input.value = ""; // Clear the input field
        }
    });
</script>
</body>
</html>

