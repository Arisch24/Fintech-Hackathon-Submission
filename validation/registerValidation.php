<?php 

if(isset($_POST['register_submit'])){
    //include the database
    require_once('../database/db.php');

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phoneNum = $_POST['phoneNum'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    //check empty fields
    if(empty($username) || empty($email) || empty($password) || empty($confirmPassword)){
        header("Location: ../home/register.php?error=emptyFields&username=".$username."&email=".$email);
        exit();
    }
    //invalid username
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../home/register.php?error=invalidUserName&email=".$email."&phoneNum=".$phoneNum);
        exit();
    }
    //invalid email
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../home/register.php?error=invalidEmail&username=".$username."&phoneNum=".$phoneNum);
        exit();
    }
    //invalid phone number
    else if(!preg_match_all("/^(601)[0-46-9]*[0-9]{7,8}$/", $phoneNum)){
        header("Location: ../home/register.php?error=invalidPhoneNum&username=".$username."&email=".$email);
        exit();
    }
    //invalid password
    else if(!preg_match("/^[a-zA-Z0-9]{8,}$/", $password)){
        header("Location: ../home/register.php?error=invalidPassword&username=".$username."&email=".$email."&phoneNum=".$phoneNum);
        exit();
    }
    //passwords do not match
    else if($password !== $confirmPassword){
        header("Location: /Hackathon/home/register.php?error=passwordNotMatch&username=".$username."&email=".$email."&phoneNum=".$phoneNum);
        exit();
    }
    //preparing the statements for duplicate email checking
    else{
        $sql = "SELECT email FROM users WHERE email=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../home/register.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            //check for same email
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0){
                header("Location: ../home/register.php?error=emailTaken&username=".$username."&phoneNum=".$phoneNum);
                exit();
            }
            //signup the user
            else{
                $sql = "INSERT INTO users (username, email, phone_number, password) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../home/register.php?error=sqlerror");
                    exit();
                }else{
                    //hash password
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $phoneNum, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../home/sendOTP.php?register=success&phoneNum=".$phoneNum);
                    exit();
                }
            }
        }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else{
    header("Location: ../home/register.php");
    exit();
}

?>