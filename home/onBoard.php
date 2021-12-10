<?php
require_once('../config/userHeader.php');
?>

      <!-- Details Form -->
      <section class="details-form py-5 mx-auto bg-light">
        <div class="container w-75 p-5">
          <div class="container p-5 border border-dark bg-white">
            <div class="container text-center">
              <h1 class="display-4">Details Form</h1>
              <p class="p-3">Please enter your details here so we can get your information from the server.</p>
            </div>
            <form action="../validation/onBoardValidation.php" method="POST">
              <div class="form-group mb-4">
                <label for="name">IC No: </label>
                <input type="text" name="ic" class="form-control" placeholder="Your IC No.">
              </div>
              <div class="form-group mb-4">
                <label for="name">Nationality: </label>
                <input type="text" name="nationality" class="form-control" placeholder="Your nationality. Ex: MY">
              </div>
              <div class="form-group mb-4">
                <button class="btn btn-outline-secondary" type="submit" name="onboard_submit">Submit Data</button>
              </div>
            </form>
          </div>
        </div>
      </section>

<?php
require_once('../config/userHeader.php');
?>