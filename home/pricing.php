<?php 
require '../config/userHeader.php';
?>

<!-- Pricing section -->
<section class="bg-white p-5" id="pricing-section">
  <div class="wrap">
    <div class="container-fluid text-center">
      <div class="container mb-4">
        <h3 class="text-uppercase">Our plans</h3>
        <h1 class="display-4">Pricing Table</h1>
      </div>
      <div class="row justify-content-around">
        <div class="col-lg-3 col-md-4 col-sm-6 mt-5 mt-md-0">
          <div class="card h-100 w-100">
            <div class="card-head pt-4">
              <h1 class="display-4 text-danger"><i class="fas fa-piggy-bank"></i></h1>
              <h4 class="card-title">Basic</h4>
              <h1 class="text-uppercase font-weight-bold">Free</h1>
            </div>
            <div class="card-body p-2">
              <li>Limited features</li>
              <li>Limited features</li>
              <li>Limited features</li>
              <li>Limited features</li>
            </div>
            <div class="card-subtitle py-4"><button class="btn btn-outline-danger text-uppercase">Free</button></div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mt-5 mt-md-0">
          <div class="card shadow h-100 w-100">
            <div class="card-head pt-4">
              <h1 class="display-4 text-info"><i class="fas fa-atom"></i></h1>
              <h4 class="card-title">Pro</h4>
              <h1 class="font-weight-bold">&#36;49</h1>
            </div>
            <div class="card-body p-2">
              <li>Limited features</li>
              <li>Limited features</li>
              <li>Limited features</li>
              <li>Limited features</li>
            </div>
            <div class="card-subtitle py-4"><button class="btn btn-outline-info">Purchase</button></div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mt-5 mt-md-0">
          <div class="card h-100 w-100">
            <div class="card-head pt-4">
              <h1 class="display-4 text-primary"><i class="fab fa-ethereum"></i></h1>
              <h4 class="card-title">Enterprise</h4>
              <h1 class="font-weight-bold">&#36;100</h1>
            </div>
            <div class="card-body p-2">
              <li>Limited features</li>
              <li>Limited features</li>
              <li>Limited features</li>
              <li>Limited features</li>
            </div>
            <div class="card-subtitle py-4"><button class="btn btn-outline-primary">Purchase</button></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
                  
<?php require '../config/userFooter.php';?>