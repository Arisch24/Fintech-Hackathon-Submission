<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Fintech | Register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../styles/style.css">
  </head>

  <body class="bg-primary" style="height: 100vh;">
    <div class="container-fluid p-2"><button type="button" class="btn-close btn-close-dark float-end lead" aria-label="Close" id="close-btn"></button></div>
      <!-- Register Form -->
      <section class="register-form p-2 bg-primary">
          <div class="container p-md-5 p-2">
              <div class="container-fluid w-75 m-auto border border-dark rounded p-5 shadow bg-white">
                  <h1 class="display-5">Sign Up Now</h1>
                  <?php
                  //error messages
                    if(isset($_GET['error'])){
                      if($_GET['error'] == 'emptyFields'){
                        echo '<div class="alert alert-danger">Please fill in all fields.</div>';
                      }
                      else if($_GET['error'] == 'invalidUserName'){
                        echo '<div class="alert alert-danger">Username can only contain letter and numbers.</div>';
                      }
                      else if($_GET['error'] == 'invalidPhoneNum'){
                        echo '<div class="alert alert-danger">Phone number format is 601XXXXXXXX without dash</div>';
                      }
                      else if($_GET['error'] == 'invalidEmail'){
                        echo '<div class="alert alert-danger">Your email address is invalid.</div>';
                      }
                      else if($_GET['error'] == 'invalidPassword'){
                        echo '<div class="alert alert-danger">Password can only contain letters, numbers and is 8 characters long.</div>';
                      }
                      else if($_GET['error'] == 'passwordNotMatch'){
                        echo '<div class="alert alert-danger">The passwords do not match.</div>';
                      }
                      else if($_GET['error'] == 'sqlerror'){
                        echo '<div class="alert alert-danger">Sorry! There is something wrong with the server. Try again later.</div>';
                      }
                      else if($_GET['error'] == 'emailTaken'){
                        echo '<div class="alert alert-danger">This email address is registered already!</div>';
                      }
                    }
                  ?>
                  Already have an account? <a class="text-primary mb-4" href="../home/login.php">Log In.</a>
                  <form class="mt-4" action="../validation/registerValidation.php" method="post" class="">
                      <div class="mb-3">
                          <label class="form-label" for="username">Username: </label>
                          <input class="form-control" type="text" name="username" placeholder="Your username" value="<?php 
                          if(isset($_GET['username'])){
                            echo $_GET['username'];
                            }?>">
                    </div>
                      <div class="mb-3">
                          <label class="form-label" for="email">Email: </label>
                          <input class="form-control" type="email" name="email" placeholder="Your email address" value="<?php
                          if(isset($_GET['email'])){
                            echo $_GET['email'];
                          }?>">
                    </div>
                    <div class="mb-3">
                          <label class="form-label" for="phoneNum">Phone Number: </label>
                          <input class="form-control" type="text" name="phoneNum" placeholder="Your phone number" value="<?php
                          if(isset($_GET['phoneNum'])){
                            echo $_GET['phoneNum'];
                          }?>">
                    </div>
                      <div class="mb-3">
                          <label class="form-label" for="password">Password: </label>
                          <input class="form-control" type="password" name="password" placeholder="A default password">
                    </div>
                    <div class="mb-3">
                          <label class="form-label" for="confirmPassword">Confirm Password: </label>
                          <input class="form-control" type="password" name="confirmPassword" placeholder="Re-enter your pasword">
                    </div>
                    <div class="input-group mt-5">
                        <button class="btn btn-primary" type="submit" name="register_submit">Create an account</button>
                    </div>
                  </form>
              </div>
          </div>
      </section>
    <!-- Optional JavaScript -->
    <script src="user.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/3f5fbd4339.js" crossorigin="anonymous"></script>
  </body>
</html>