<?php

if(isset($_POST['login-submit'])){

    require 'dbh.inc.php';
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE Username=? OR Email_id = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=sqlerror");
        exit();            
        }
        else{
            mysqli_stmt_bind_param($stmt,"ss",$mailuid, $mailuid );
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['Password']);
                if($pwdCheck == false){
                 header("Location: ../index.php?error=wrongpwd");
                 exit(); 
                }
                else if($pwdCheck==true){
                    session_start();
                    $_SESSION['userId']= $row['Login_id'];
                    $_SESSION['userUid']= $row['Username'];
                    header("Location: ../index.php?login=sucess");
                    exit();
                }
                else{
                 header("Location: ../index.php?error=unknownerror");
                 exit();                    
                }
            }
            else{
                 header("Location: ../index.php?error=nouser");
                 exit();  
            }
        }
    }
}
else{

    header("Location: ../index.php");
    exit();
}