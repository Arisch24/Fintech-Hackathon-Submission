<?php 
require_once('..\config\userHeader.php');
?>
  <!-- Introduction Section -->
  <section>
    <div class="container-fluid text-dark">
      <div class="row p-5">
        <div class="col-lg-4 p-1">
          <h1 class="text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
          <p class="text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore veniam voluptatum illum numquam iure aperiam corrupti odit rem nobis similique assumenda facilis itaque sed esse impedit, reprehenderit quasi minima. Incidunt?</p>
            <div class="m-auto"><button class="btn btn-outline-primary">Read More</button></div>
        </div>
        <div class="col-lg-8 p-4">
          <img src="../images/computer-future.jpg" alt="Computer Image" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </section>

  <!-- Sponsor's Section -->
  <section>
    <div class="container-fluid bg-light text-dark p-3">
      <div class="row justify-content-around align-items-center text-center">
        <div class="col-sm-6 col-md-4 col-lg-2">
          <i class="fab fa-amazon-pay fa-4x"></i>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
          <i class="fab fa-steam fa-4x"></i>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
          <i class="fab fa-aws fa-4x"></i>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
          <i class="fab fa-behance fa-4x"></i>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
          <i class="fab fa-dropbox fa-4x"></i>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
          <i class="fab fa-telegram fa-4x"></i>
        </div>
      </div>
    </div>
  </section>

  <!-- People's Responses Section -->
  <section class="text-dark" style="background-color: #f2c76e;">
    <div class="container-fluid p-lg-4">
      <h1 class="display-4 text-center pt-4">Others Opinions On Us</h1>
      <div class="row justify-content-center text-center p-5">
        <div class="col-lg-4 mb-5 mb-lg-0">
          <div class="card h-100" id="person-card">
            <img src="https://randomuser.me/api/portraits/women/15.jpg" alt="Pers" width="75%" class="img-fluid m-auto rounded-circle">
              <div class="card-body text-dark rounded" style="background-color:beige">
                <h5 class="lead">Samira</h5>
                <hr class="my-3">
                <blockquote>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste nobis voluptates similique nemo molestiae debitis magni rerum minima maiores consequuntur.
                </blockquote>
              </div>
          </div>
        </div>
        <div class="col-lg-4 mb-5 mb-lg-0">
          <div class="card h-100" id="person-card">
            <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Person 2" width="75%" class="img-fluid m-auto rounded-circle">
            <div class="card-body text-dark rounded" style="background-color:beige">
              <h5 class="lead">John</h5>
              <hr class="my-3">
              <blockquote>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus fuga, temporibus eos quidem quisquam eveniet aperiam exercitationem illo similique velit.
              </blockquote>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-5 mb-lg-0">
          <div class="card h-100" id="person-card">
            <img src="https://randomuser.me/api/portraits/men/5.jpg" alt="Person 3" width="75%" class="img-fluid m-auto rounded-circle">
            <div class="card-body text-dark rounded" style="background-color:beige">
              <h5 class="lead">Alex</h5>
              <hr class="my-3">
              <blockquote>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem libero minima nesciunt delectus suscipit rerum repellendus nemo veritatis adipisci autem!
              </blockquote>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Company Information Section -->
  <section class="bg-light justify-content-center p-5">
    <div class="container-fluid text-center p-3 p-md-5">
      <div class="container">
        <h1 class="display-4">What is included in Fintech?</h1>
        <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Id asperiores ex corporis unde similique totam eveniet beatae pariatur provident, dolore placeat consectetur facere recusandae neque! Ex minima doloremque nesciunt. Tempore.</p>
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="card p-3 my-5 mx-3 shadow-lg">
              <h1 class="card-title text-primary">2000+</h4>
              <h5 class="card-body">Employees</h5>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="card p-3 my-5 mx-3 shadow-lg">
              <h1 class="card-title text-primary">15</h4>
              <h5 class="card-body">Branches</h5>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="card p-3 my-5 mx-3 shadow-lg">
              <h1 class="card-title text-primary">40+</h4>
              <h5 class="card-body">Applications</h5>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="card p-3 my-5 mx-3 shadow-lg">
              <h1 class="card-title text-primary">10+</h4>
              <h5 class="card-body">Years of Experience</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php require('../config/userFooter.php');?>