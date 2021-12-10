<?php
session_start();
require_once('../database/db.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin | Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../styles/admin.css">
  </head>

  <body>
    <!-- Navigation Bar -->
    <div class="wrapper">
        <div class="bg-dark text-light" id="sidebar">
            <ul class="sidebar-items">
                <li class="nav-item py-3 px-1">
                    <i class="fa fa-home mx-2 my-auto" aria-hidden="true"></i> <a class="nav-links" href="../admin/dashboard.php">Home</a>
                </li>
                <li class="nav-item py-3 px-1">
                    <i class="fa fa-address-book mx-2 my-auto" aria-hidden="true"></i> <a class="nav-links" href="../admin/accounts.php">Accounts</a>
                </li>
                <li class="nav-item py-3 px-1">
                <i class="fas fa-money-bill-wave mx-2 my-auto"></i><a class="nav-links" href="../admin/subscriptions.php">Subscriptions</a>
                </li>
                <li class="nav-item py-3 px-1">
                <i class="fas fa-comments mx-2 my-auto"></i> <a class="nav-links" href="../admin/feedbacks.php">Feedback</a>
                </li>
                <li class="nav-item py-3 px-1">
                    <?php
                    if(isset($_SESSION['id'])){
                        //logged in
                        echo '<i class="fa fa-arrow-circle-left mx-2 my-auto" aria-hidden="true"></i><a class="nav-links" href="../home/logout.php"> Logout</a>';
                    }else{
                        //logged out
                        header("Location: ../home/login.php");
                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>