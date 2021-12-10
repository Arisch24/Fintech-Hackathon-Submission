<?php

if(isset($_POST['login_submit'])){
    //put the database
    require_once('../database/db.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    //if fields are empty
    if(empty($email) || empty($password)){
        header("Location: ../home/login.php?error=emptyFields");
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE email=?";
        $stmt = mysqli_stmt_init($conn);
        //if statement isn't prepared
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../home/login.php?error=sqlerror&email=".$email);
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                //verify user password
                $passwordCheck = password_verify($password, $row['password']);
                if($passwordCheck == false){
                    header("Location: ../home/login.php?error=wrongPassword&email=".$email);
                    exit();
                }else if($passwordCheck == true){
                    //assign session to user
                    session_start();
                    $_SESSION['id'] = $row['id'];
                    if($row['status'] == null){
                        //redirect user to index page
                        header("Location: ../home/index.php?login=success");
                        exit();
                    }else if($row['status'] == "admin"){
                        //redirect admin to dashboard page
                        header("Location: ../admin/dashboard.php?login=success");
                        exit();
                    }
                }else{
                    header("Location: ../home/login.php?error=passwordWeird&email".$email);
                    exit();
                }
            }
            else{
                header("Location: ../home/login.php?error=noUser");
                exit();
            }
        }

    }
}else{
    header("Location: ../home/login.php");
    exit();
}

?>