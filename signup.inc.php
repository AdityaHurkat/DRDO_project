<?php
if (isset($_POST['signup-submit'])) {
	
	require'dbh.inc.php';

	$loginId = $_POST['lid'];
	$username = $_POST['uid'];
	$email = $_POST['mail'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];
    $groupname = $_POST['gname'];
	$groupId = $_POST['gid'];

  if (empty($loginId) || empty($username) || empty($email) ||empty($password) ||empty($passwordRepeat) || empty($groupname) ||  empty($groupId) ) {
	header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
	exit();
  }
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
  	header("Location:../signup.php?error=invalidmail&uid=");
	exit();
  }
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  	header("Location: ../signup.php?error=invalidmail&uid=".$username);
	exit();
  }
  else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
  	header("Location: ../signup.php?error=invaliduid&mail=".$email);
	exit();
  }
  else if($password !== $passwordRepeat){
  	header("Location: ../signup.php?error=passwordcheckuid=".$username."&mail".$email);
	exit();
  }
  else{

  	$sql = "SELECT Username FROM users WHERE Username=?";
  	$stmt = mysqli_stmt_init($conn);
  	if (!mysqli_stmt_prepare($stmt, $sql)) {
  		header("Location: ../signup.php?error=sqlerror");
	exit();
  	}
  	else{
  		mysqli_stmt_bind_param($stmt, "s", $username);
  		mysqli_stmt_execute($stmt);
  		mysqli_stmt_store_result($stmt);
  		$resultCheck = mysqli_stmt_num_rows($stmt);
  		if ($resultCheck>0) {
  			header("Location: ../signup.php?error=usertaken&mail=".$email);
	exit();
  		}
  	else{
  		$sql =" INSERT INTO users (Login_id, Username, Email_id, Password, Group_name, Group_id) VALUES (?,?,?,?,?,?)";
  		$stmt = mysqli_stmt_init($conn);
  	    if (!mysqli_stmt_prepare($stmt, $sql)) {
  		header("Location: ../signup.php?error=sqlerror");
	    exit();
  	    }
  	    else{
        $hashedPw = password_hash($password,PASSWORD_DEFAULT );

  	    mysqli_stmt_bind_param($stmt, "issssi", $loginId,$username, $email, $hashedPw,  $groupname, $groupId);
  		mysqli_stmt_execute($stmt);
  		mysqli_stmt_store_result($stmt);
  		header("Location: ../signup.php?signup=sucess");
	    exit();
  	    }

  	}
  }     


}

mysqli_stmt_close($stmt);
mysqli_close($conn);

}
else{
       header("Location: ../signup.php?signup=sucess");
	    exit();

}
