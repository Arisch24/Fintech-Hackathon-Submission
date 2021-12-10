<?php

session_start();

if(isset($_POST['onboard_submit'])){
    //database connection
    require_once('../database/db.php');

    $id = $_SESSION['id'];
    $IC = $_POST['ic'];
    $nationality = $_POST['nationality'];

    //empty fields
    if(empty($OTP) || empty($IC) || empty($nationality)){
        header('Location: ../home/onBoard.php?error=emptyFields');
        exit();
    }
    //IC format wrong
    else if(!preg_match("/^[0-9]{12}$/", $IC)){
        header('Location: ../home/onBoard.php?error=invalidIC&nationality='.$nationality);
        exit();
    }
    //nationality format wrong
    else if(!preg_match("/^[a-zA-Z]{2}$/", $nationality)){
        header('Location: ../home/onBoard.php?error=invalidNationality&ic='.$IC);
        exit();
    }
    //prepare to insert into database
    else{
        $sql = "INSERT INTO onboard (id, IC, nationality) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header('Location: ../home/onBoard.php?error=sqlerror');
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "iss", $id, $IC, $nationality);
            mysqli_stmt_execute($stmt);
            header('Location: ../home/onBoard.php?onBoard=success?'.$id.$IC.$nationality);
            exit();
        }
    }

}else{
    header('Location: ../home/onBoard.php');
    exit();
}
?>