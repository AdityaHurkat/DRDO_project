<?php
if (isset($_POST['insert-submit'])) 
{
	require 'dbh.inc.php';

	$name = $_POST['name'];
	$designation = $_POST['dsgn'];
	$group = $_POST['gp'];
	$groupcode = $_POST['gpcd'];
	$divisioncode = $_POST['divcd'];
	$privilage = $_POST['pr'];

	$sql = "INSERT INTO employes (nameEmp, designationEmp, gpEmp, gpcodeEmp, divcodeEmp, privEmp) VALUES (?, ?, ?, ?, ?, ?)";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) 
	{
	    header("Location: ../signup.php?error=sqlerror");
	    exit();
	}
	else
	{
		mysqli_stmt_bind_param($stmt, "ssssss", $name, $designation, $group, $groupcode, $divisioncode, $privilage);
		mysqli_stmt_execute($stmt);
		header("Location: ../signup.php?signup=success");
		exit();
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else
{
	header("Location: ../insert.php");
	exit();
}
?>