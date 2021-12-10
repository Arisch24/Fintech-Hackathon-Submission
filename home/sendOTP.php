<?php
session_start();
//define certifcate and random values
require_once('../API/certDetails.php');
$sequenceNo = rand(1000000000000000, 9999999999999999);

//check for register is success
if(isset($_GET['register']) && isset($_GET['phoneNum'])){
    //get phone number from register page
    $_SESSION['phoneNum'] = $phoneNum = $_GET['phoneNum'];
    $params = array(
        "sequenceNo"=>$sequenceNo,
        "FI"=>"004665",
        "sourceSystem"=>"HCK",
        "userID"=>$phoneNum,
        "nationality"=>"MY",
        "signedMessage"=>""
    );
    //signUpVerification URL
    $ch = curl_init();
    $endpoint = 'https://dev.finexusgroup.com:10501/fnxc/portal/ws/signUpVerification.action';
    $signUp_url = $endpoint . '?' . http_build_query($params);
    curl_setopt($ch, CURLOPT_URL, $signUp_url);
    $resp = curl_exec($ch);
    curl_close($ch);
    //output
    $decode = json_decode($resp, true);
    if($decode['responseCode'] != 000000){
        // get error
        $responseError = $decode['responseDescription'];
    }


    //send OTP here
    $params = array(
        "sequenceNo"=>$sequenceNo,
        "FI"=>"004665",
        "sourceSystem"=>"HCK",
        "userID"=>$phoneNum,
        "mobileNo"=>$phoneNum,
        "callFrom"=>"ONBOARD",
        "nationality"=>"MY",
        "signedMessage"=>""
    );
    //sendOTP url
    $ch = curl_init();
    $endpoint = 'https://dev.finexusgroup.com:10501/fnxc/portal/ws/sendOTP.action';
    $otp_url = $endpoint . '?' . http_build_query($params);
    curl_setopt($ch, CURLOPT_URL, $otp_url);
    $resp = curl_exec($ch);
    curl_close($ch);
    //get the response data
    $decode = json_decode($resp, true);
    if($decode['responseCode'] != 000000){
        // get error
        $responseError = $decode['responseDescription'];
    }
    else{
      $_SESSION['messageReferenceNo'] = $decode['messageReferenceNo'];
    }
}
else{
}


// if user click submit button => signUpVerificationConf

if(isset($_POST['otp_submit'])){
    // check for valid OTP number
    $userOTP = $_POST['otp'];
    $params = array(
      "sequenceNo"=>$sequenceNo,
      "FI"=>"004665",
      "sourceSystem"=>"HCK",
      "userID"=>$_SESSION['phoneNum'],
      "callFrom"=>"ONBOARD",
      "messageReferenceNo"=>$_SESSION['messageReferenceNo'],
      "OTP"=>$userOTP,
      "signedMessage"=>""
    );
    //curl url
    $ch = curl_init();
    $endpoint = 'https://dev.finexusgroup.com:10501/fnxc/portal/ws/signUpVerificationConf.action';
    $url = $endpoint . '?' . http_build_query($params);
    curl_setopt($ch, CURLOPT_URL, $url);
    $resp = curl_exec($ch);
    curl_close($ch);
    //output
    $decode = json_decode($resp, true);
    if($decode['responseCode'] != 000000){
        // get error
        $responseError = $decode['responseDescription'];
    }else if($decode['responseCode'] == 000000){
      unset($_SESSION['messageReferenceNo']);
      unset($_SESSION['phoneNum']);
      // assign registration reference to session
      $_SESSION['registrationRef'] = $decode['registrationRef'];
      header("Location: ../home/login.php");
    }
}else{
}


//if user click resend OTP
if(isset($_POST['resend_otp'])){
    // resend OTP to mobile number
    $params = array(
      "sequenceNo"=>$sequenceNo,
      "FI"=>"004665",
      "sourceSystem"=>"HCK",
      "userID"=>"498494",
      "mobileNo"=>$phoneNum,
      "callFrom"=>"ONBOARD",
      "messageReferenceNo"=>$_SESSION['messageReferenceNo'],
      "signedMessage"=>""
    );

    //curl url
    $ch = curl_init();
    $endpoint = 'https://dev.finexusgroup.com:10501/fnxc/portal/ws/resendOTP.action';
    $url = $endpoint . '?' . http_build_query($params);
    curl_setopt($ch, CURLOPT_URL, $url);
    $resp = curl_exec($ch);
    curl_close($ch);
    //output
    $decode = json_decode($resp, true);
    if($decode['responseCode'] != 000000){
        // get error
        $responseError = $decode['responseDescription'];
    }
}
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
<body class="bg-light">
    <!-- Header -->
    <header class="bg-primary py-2">
        <div class="d-flex flex-row text-light align-items-center">
        <div class="col-9 col-md-10">
            <h1 class="d-flex px-3 text-capitalize">Fintech</h1>
        </div>
        </div>
    </header>
    <!-- OTP Form -->
    <section class="otp-form py-5 mx-auto">
        <div class="container w-50 p-5">
          <div class="container p-5 border border-dark bg-white">
            <div class="container text-center">
              <h1 class="display-4">OTP Verification</h1>
              <p class="p-3">We've sent an OTP to your phone. Please enter it here.</p>
              <?php
              if(isset($error)){
                echo '<div class="alert alert-danger">'.$error.'</div>';
              }
              if(isset($otp_success)){
                echo '<div class="alert alert-success">'.$otp_success.'</div>';
              }
              if(isset($responseError)){
                echo '<div class="alert alert-success">'.$responseError.'</div>';
              }
              ?>
            </div>
            <!-- enter OTP number form -->
            <form action="../home/sendOTP.php" method="post">
              <div class="form-group mb-4">
                <label for="name">OTP</label>
                <input type="text" name="otp" class="form-control" placeholder="Your OTP code">
              </div>
              <div class="form-group mb-4">
                <button class="btn btn-primary" type="submit" name="otp_submit">Submit</button>
              </div>
            </form>
            <form action="../home/sendOTP.php" method="post">
            <!-- resend OTP -->
            <div class="form-group mb-4">
                <button class="btn btn-default border border-dark" type="submit" name="resend_otp">Resend OTP</button>
              </div>
              </form>
          </div>
        </div>
      </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/3f5fbd4339.js" crossorigin="anonymous"></script>
  </body>
</html>