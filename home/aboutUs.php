<?php
require '../config/userHeader.php';
?>

      <!-- About Us Section -->
      <section class="about-us">
        <div class="">
          <div class="container text-center my-5">
            <h1 class="display-2">About Us</h1>
            <hr class="my-4 w-25 m-auto">
            <h1 class="">Join our family today</h1>
            <button class="btn btn-outline-light border border-dark my-4"><a class="text-dark" href="#">Join Now</a></button>
          </div>
          <div class="container-fluid p-5" style="background-color: antiquewhite;">
            <div class="row rounded m-5">
              <div class="col-lg-6 col-sm-12 px-5">
                <h1 style="color:rgb(219, 158, 79);">About Fintech</h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis quis necessitatibus architecto amet aliquam? Quia, facilis dicta cum, assumenda odit distinctio numquam debitis in vel eligendi quos ad dolores facere. Dolor, illo ea? Expedita voluptatum culpa, voluptates qui beatae accusamus eius atque eligendi laborum?</p>
              </div>
              <div class="col-lg-6 col-sm-12 px-5">
                <h1 style="color:rgb(219, 158, 79);">Our Mission</h1>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum cupiditate suscipit soluta eligendi praesentium nihil ducimus atque unde dicta ratione. Atque ipsa, excepturi suscipit nam ratione culpa laboriosam inventore est laborum adipisci officia vitae pariatur. Harum doloremque fugiat ea perferendis dolorem aliquam molestiae quibusdam beatae vero. Repellat a velit sapiente? Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Feedback Form -->
      <section class="feedback-form py-5 mx-auto bg-light">
        <div class="container w-75 p-5">
          <div class="container p-5 border border-dark bg-white">
            <div class="container text-center">
              <h1 class="display-4">Feedback Form</h1>
              <?php
              //error messages
              if(isset($_GET['error'])){
                if($_GET['error'] == 'emptyFields'){
                  echo '<div class="alert alert-danger">Please fill in all fields!</div>';
                }
                else if($_GET['error'] == 'invalidEmail'){
                  echo '<div class="alert alert-danger">The email you entered is invalid. Try again.</div>';
                }
                else if($_GET['error'] == 'sqlerror'){
                  echo '<div class="alert alert-danger">Sorry. There is something wrong with our server. Please try again later.</div>';
                }
              }
              //success message
              if(isset($_GET['feedback'])){
                if($_GET['feedback'] == 'success'){
                  echo '<div class="alert alert-success">Thank you. Your feedback is sent successfully.</div>';
                }
              }
              ?>
              <p class="p-3 text-warning"><i class="fa fa-info-circle" aria-hidden="true"></i> You can enter any feedback you have for our website or our services right here.</p>
            </div>
            <form action="../validation/feedbackValidation.php" method="POST">
              <div class="form-group mb-4">
                <label for="name">Name: </label>
                <input type="text" name="name" class="form-control" placeholder="Your name">
              </div>
              <div class="form-group mb-4">
                <label for="email">Email: </label>
                <input type="email" name="email" class="form-control" placeholder="Your email">
              </div>
              <div class="form-group mb-4">
                <label for="message">Message: </label>
                <textarea class="form-control" id="message" rows="3" name="message" placeholder="Enter a message less than 100 words will do..."></textarea>
              </div>
              <div class="form-group mb-4">
                <button class="btn btn-outline-secondary" type="submit" name="feedback_submit">Send Feedback</button>
              </div>
            </form>
          </div>
        </div>
      </section>

      <!-- FAQ Section -->
      <section class="faq-section p-5" style="background-color:burlywood">
        <div class="container">
          <div class="container">
            <div class="accordion accordion-flush m-4" id="questions">
              <h1 class="display-4 text-center text-white mb-5">Frequently Asked Questions</h1>
              <!-- Question 1 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-one" aria-expanded="false" aria-controls="collapseOne">
                    How are the pricing plans?
                  </button>
                </h2>
                <div id="question-one" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#questions">
                  <div class="accordion-body">
                    The pricing plans are in the pricing section in the above the page. After viewing the prices, you will realise they are reasonable for a normal user. We have one of the best pricing options available.
                  </div>
                </div>
              </div>
              <!-- Question 2 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-two" aria-expanded="false" aria-controls="collapseTwo">
                    Can I get a trial for the features before making the pro purchase?
                  </button>
                </h2>
                <div id="question-two" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#questions">
                  <div class="accordion-body">
                    Yes, you can get a free trial of up to one month before purchasing the pro plans. During the trial, you are allowed to use all of the features and if you are not satisfied with anything then you can cancel the pro plan before the end of your trial to cancel money deduction.
                  </div>
                </div>
              </div>
              <!-- Question 3 -->
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question-three" aria-expanded="false" aria-controls="collapseThree">
                    How can using this application change my life?
                  </button>
                </h2>
                <div id="question-three" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#questions">
                  <div class="accordion-body">
                    There are several reasons for using this application. Some of them are you will have a more relaxed lifestyle as our system is fast and up to date leading to lesser security issues and faster transactions for your purchase. We do not fail to satisfy our customers.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

<?php require '../config/userFooter.php';?>