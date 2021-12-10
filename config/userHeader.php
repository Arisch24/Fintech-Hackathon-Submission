<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Fintech | Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../styles/style.css">
  </head>

  <body>
    <!-- Header -->
      <header class="bg-primary py-2">
          <div class="d-flex flex-row text-light align-items-center">
            <div class="col-9 col-md-10">
              <h1 class="d-flex px-3 text-capitalize">Fintech</h1>
            </div>
            <div class="col-3 col-md-2">
              <?php
              if(isset($_SESSION['id'])){
                //logged in
                echo '<a href="../home/logout.php" class="d-flex justify-content-center text-light w-75" id="logout-btn">Log Out</a>';
              }else{
                //logged out
                echo '<a href="../home/login.php" class="d-flex justify-content-center text-light w-75" id="login-btn">Login</a>';
              }
              ?>
              </div>
          </div>
      </header>
      <!-- Navigation Bar -->
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand mx-3" href="#"><img src="../images/fintech.png" alt="Fintech Logo" style="height:40px;"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
          <div class="navbar-nav lead">
            <?php
            if(isset($_SESSION['id'])){
              echo '<a class="nav-link px-2" href="../home/index.php">Home</a>
              <a class="nav-link px-2" href="../home/analytics.php">Analytics</a>
              <a class="nav-link px-2" href="../home/pricing.php">Pricing</a>
              <a class="nav-link px-2" href="../home/aboutUs.php">About Us</a>
              <a class="nav-link px-2" href="../home/onBoard.php">Onboard</a>';
            }else{
              echo '<a class="nav-link px-2" href="../home/index.php">Home</a>
              <a class="nav-link px-2" href="../home/pricing.php">Pricing</a>
              <a class="nav-link px-2" href="../home/aboutUs.php">About Us</a>';
            }
            ?>
          </div>
        </div>
      </nav>