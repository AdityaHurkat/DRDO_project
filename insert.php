<?php
require "header.php";
?>
<main>
	<h1>Signup</h1>
	<form action="includes/insert.inc.php" method="post">
	<input type="text" name="name" placeholder="Name">
	<input type="text" name="dsgn" placeholder="Designation">
	<input type="text" name="gp" placeholder="Group">
	<input type="text" name="gpcd" placeholder="Group Code">
	<input type="text" name="divcd" placeholder="Division Code">
	<input type="text" name="pr" placeholder="Privilage">
	<button type="submit" name="insert-submit">Add New Employe</button>
	</form>
</main>
<?php
require "footer.php"; 
?>