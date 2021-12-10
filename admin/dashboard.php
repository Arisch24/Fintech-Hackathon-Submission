<?php 
require_once('../config/adminHeader.php');
?>
        <!-- All main content goes here -->
        <div class="content" id="content">
            <button class="btn btn-outline-primary my-2" id="sidebarCollapse">Click
              </button>
            <div class="container-fluid">
                <h1 class="display-4">Dashboard</h1>
                <hr class="my-3">
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="bg-light rounded p-3 mb-3">
                            <h2 class="display-5 text-primary">
                                <?php
                                //get total number of users
                                $query = 'SELECT * FROM users';
                                $result = mysqli_query($conn, $query);
                                $num_of_users = mysqli_num_rows($result);
                                echo $num_of_users;
                                ?>
                            </h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="bg-light rounded p-3 mb-3">
                            <h2 class="display-5 text-danger"> 2.0M</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="bg-light rounded p-3 mb-3">
                            <h2 class="display-5 text-warning">300</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="bg-light rounded p-3 mb-3">
                            <h2 class="display-5 text-success">      
                                <?php
                                //get total number of feedbacks
                                $query = 'SELECT * FROM feedback';
                                $result = mysqli_query($conn, $query);
                                $num_of_feedbacks = mysqli_num_rows($result);
                                echo $num_of_feedbacks;
                                ?>
                                </h2>
                        </div>
                    </div>
                </div>
                <!-- Chart Jumbotrons -->
                <div class="row">
                    <div class="container">
                        <div class="jumbotron border border-dark rounded text-center p-3">
                            <div class="container">
                                <h1 class="display-3 text-muted">Most Viewed</h1>
                                <hr class="my-3">
                                <img src="../images/phone.jpg" alt="Phone photo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
require_once('../config/adminFooter.php');
mysqli_close($conn);
?>