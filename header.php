<?php
   session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="This is an example of meta information. This will show up in search results.">
	<meta name=viewport content="width-devide-width, initial-scale=1">
	<title></title>
</head>
<body>
	<header>
		<nav>
			<a href="#">
				<img src = "img/logo.jpeg" alt="logo">
			</a>
			<ul>
				<li> <a href="index.php"> Login/Logout </a> </li>
				
				<li> <a href="https://www.drdo.gov.in/drdo/English/index.jsp?pg=homebody.jsp"> Home Page </a> </li>
				<li> <a href="#"> Contact Info </a> </li>
			</ul>	
			<div>
				<form action="includes/login.inc.php" method="post">
				<input type="text" name="mailuid" placeholder="Username/E-mail...">	
				<input type="password" name="pwd" placeholder="Password...">
				<button type="submit" name="login-submit">Login</button>	
				</form>
				<a href="signup.php">Signup</a>
				<form action="includes/logout.inc.php" method="post">
				<button type="submit" name="logout-submit">Logout</button>	
				</form>

			</div>




	</header>
</body>
</html>