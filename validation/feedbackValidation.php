<?php

if(isset($_POST['feedback_submit'])){
    //database connection
    require_once('../database/db.php');

    $name = $_POST['name'];
    $emailTo = $_POST['email'];
    $message = $_POST['message'];

    if(empty($name) || empty($emailTo) || empty($message)){
        header("Location: ../home/aboutUs.php?error=emptyFields");
        exit();
    }else if(!filter_var($emailTo, FILTER_VALIDATE_EMAIL)){
        header("Location: ../home/aboutUs.php?error=invalidEmail");
        exit();
    }else{
        $sql = "INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../home/aboutUs.php?error=sqlerror");
        }else{
            mysqli_stmt_bind_param($stmt, "sss", $name, $emailTo, $message);
            mysqli_stmt_execute($stmt);
            header("Location: ../home/aboutUs.php?feedback=success");
            exit();
            /*sending confirmation email to user
            $emailFrom = "Put your email here";
            $subject = "Feedback Form Received";
            $headers = "From: " . $emailFrom;
            $text = "Your feedback on our website has been received. We will review your feedback and get back to you shortly. Thank you.";
            mail($emailTo, $subject, $text, $headers);
            Uncomment this to use on a real server or domain*/
        }
    }
}else{
    header("Location: ../home/aboutUs.php");
}
?>