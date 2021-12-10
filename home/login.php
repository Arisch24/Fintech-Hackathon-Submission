<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Fintech | Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../styles/style.css">
  </head>

  <body class="bg-warning" style="height: 100vh;">
    <div class="container-fluid p-2"><button type="button" class="btn-close btn-close-dark float-end lead" aria-label="Close" id="close-btn"></button></div>
      <!-- Login Form -->
      <section class="register-form p-md-5 p-2">
          <div class="container p-md-5 p-2">
              <div class="container-fluid w-75 m-auto border border-dark rounded p-5 shadow bg-white">
                  <h1 class="display-5">Login to an existing account</h1>
                  <?php
                  //error messages
                  if(isset($_GET['error'])){
                    if($_GET['error'] == 'emptyFields'){
                      echo '<div class="alert alert-danger">Please fill in all fields.</div>';
                    }
                    else if($_GET['error'] == 'noUser'){
                      echo '<div class="alert alert-danger">There is no user registered with this email in our database.</div>';
                    }
                    else if($_GET['error'] == 'sqlerror'){
                      echo '<div class="alert alert-danger">There is something wrong with our server. Please try again later.</div>';
                    }
                    else if($_GET['error'] == 'wrongPassword'){
                      echo '<div class="alert alert-danger">Your password is incorrect. Please try again.</div>';
                    }
                    else if($_GET['error'] == 'passwordWeird'){
                      echo '<div class="alert alert-danger">The password we got is different from yours. Try again please.</div>';
                    }
                  }
                  ?>
                  Don't have an account? <a class="text-primary mb-4" href="../home/register.php">Sign Up</a>
                  <form class="mt-4" action="../validation/loginValidation.php" method="post" class="">
                      <div class="mb-4">
                          <label class="form-label" for="email">Email: </label>
                          <input class="form-control" type="email" name="email" placeholder="Your email" value="<?php
                          if(isset($_GET['email'])){
                            echo $_GET['email'];
                          }?>">
                    </div>
                      <div class="mb-4">
                          <label class="form-label" for="password">Password: </label>
                          <input class="form-control" type="password" name="password" placeholder="Your password">
                    </div>
                    <div class="input-group">
                        <button class="btn btn-outline-warning" type="submit" name="login_submit">Login</button>
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