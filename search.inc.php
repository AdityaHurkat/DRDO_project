<?php
if (isset($_POST['search-submit'])) 
{
	require 'dbh.inc.php';

	$name = $_POST['name'];
	$designation = $_POST['dsgn'];
    $group = $_POST['gp'];
	$groupcode = $_POST['gpcd'];
	$divisioncode = $_POST['divcd'];

	$sql = "SELECT * FROM employes WHERE ('nameEmp' LIKE '%".$name."%') OR ('designationEmp' LIKE '%".$designation."%') OR ('gpEmp' LIKE '%".$group."%') OR ('gpcodeEmp' LIKE '%".$groupcode."%') OR ('divcodeEmp' LIKE '%".$divisioncode."%')";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) 
	{
	    header("Location: ../signup.php?error=sqlerror");
	    exit();
	}
	else
	{
		mysqli_stmt_bind_param($stmt, "sssss", $name, $designation, $group, $groupcode, $divisioncode);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$resultCheck = mysqli_stmt_num_rows($stmt);
		if ($resultCheck > 0) 
		{
			header("Location: ../signup.php?error=stepsuccess");

			while ($results = mysqli_fetch($stmt)) 
			{
				echo'<p>".$results['nameEmp']."-".$results['designationEmp']."-".$results['gpEmp']."-".$results['gpcodeEmp']."-".$results['divcodeEmp']."-".$results['privEmp']."</p>';
			}
		}
		else
		{
			echo "No results";
		}

	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else
{
	header("Location: ../search.php");
	exit();
}
?>