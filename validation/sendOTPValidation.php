<?php
session_start();
//if user click submit button
if(isset($_POST['otp_submit'])){
    $_SESSION['check'] = "inside";
    // check for valid OTP number
    $responseError = 'otp_submit is clicked';
    $userOTP = $_POST['otp'];
    if(empty($userOTP)){
        $error = 'Please fill in the OTP field';
        $_SESSION['check'] = "inside empty check";
    }
    else if($userOTP != $_SESSION['validOTP']){
        $error = 'Invalid OTP number. Try another number or click resend';
        $_SESSION['check'] = "inside user otp check";
    }
    else{
        header("Location: ../home/login.php");
    }
}else{
    $responseError = 'otp_submit is not clicked';
    $_SESSION['check'] = "outside";
}