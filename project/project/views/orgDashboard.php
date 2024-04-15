<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Organization Dashboard</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="../src/styles/orgDashboard.css" />
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <?php
          if(isset($_SESSION['status'])){
              echo "<h2>".$_SESSION['status']."</h2>";
              unset($_SESSION['status']);
          }
        ?>
        <a class="navbar-brand" href="#">Organization Dashboard</a>
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
              <a class="nav-link" href="#">Students</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Preferences</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Messages</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Settings</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-md-6">
          <div class="card p-4">
            <h2 class="mb-4">Manage Students</h2>
            <!-- List of Students -->
            <ul class="list-group">
              <li class="list-group-item">Student Name 1</li>
              <li class="list-group-item">Student Name 2</li>
              <li class="list-group-item">Student Name 3</li>
              <!-- Add more students dynamically -->
            </ul>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card p-4">
            <h2 class="mb-4">Student Preferences</h2>
            <!-- Student Preferences -->
            <div class="form-group">
              <label for="skills">Preferred Skills</label>
              <input
                type="text"
                class="form-control"
                id="skills"
                placeholder="Enter skills..."
              />
            </div>
            <div class="form-group">
              <label for="interests">Interests</label>
              <input
                type="text"
                class="form-control"
                id="interests"
                placeholder="Enter interests..."
              />
            </div>
            <button name="submitPreferences" class="btn btn-primary">Save Preferences</button>
          </div>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-md-8">
          <div class="card p-4">
            <h2 class="mb-4">Messages</h2>
            <!-- Message List -->
            <ul class="list-group">
              <li class="list-group-item">Message 1</li>
              <li class="list-group-item">Message 2</li>
              <li class="list-group-item">Message 3</li>
              <!-- Add more messages dynamically -->
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card p-4">
            <h2 class="mb-4">Settings</h2>
            <!-- Settings Form -->
            <form>
              <div class="form-group">
                <label for="orgName">Organization Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="orgName"
                  placeholder="Enter organization name"
                />
              </div>
              <div class="form-group">
                <label for="orgEmail">Email Address</label>
                <input
                  type="email"
                  class="form-control"
                  id="orgEmail"
                  placeholder="Enter email"
                />
              </div>
              <div class="form-group">
                <label for="orgPassword">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="orgPassword"
                  placeholder="Enter password"
                />
              </div>
              <button type="submit" class="btn btn-primary">
                Update Settings
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
