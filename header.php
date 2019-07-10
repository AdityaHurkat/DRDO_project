<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="This is an example of a meta description. This will often show up in search results.">
	<title></title>
</head>
<body>
	<header>
		<div>
			<?php
			if (isset($_SESSION['userId'])) 
	        {
		        echo ' <form action="includes/logout.inc.php" method="post">
				
			<button type="submit" name="logout-submit">Logout</button>
			</form>
			</br>

			<form action="search.php" method="post">
			<a href="search.php">Search Existing Employe</a>
			</form>
			</br>
			<form action="insert.php" method="post">
			<a href="insert.php">Add New Employe</a>
			</form>
			';
	        }
	        else
	        {
		        echo '<form action="includes/login.inc.php" method="post">
			<input type="text" name="mailuid" placeholder="Username/E-mail"></br>
			<input type="password" name="pwd" placeholder="Password">	</br>
			<button type="submit" name="login-submit">Login</button>
			</form>
			<a href="signup.php">Signup</a>';
	        }
			?>
			
			
		</div>
		
	</header>

</body>
</html>