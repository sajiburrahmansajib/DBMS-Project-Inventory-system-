<?php 
	
	
	$id = $_GET['id'];
	
	require_once('../db_config.php');

	$sql = "DELETE FROM product_info where PRODUCT_ID='$id'";

	$conn = new mysqli($servername, $username, $password, $dbname);

	$result = $conn->query($sql);

	if (!$result)
	{
		echo "Error during deletion!<br>";
		echo "<a href='../home.php'>Back</a>";
		echo mysqli_error($conn);
	}
	else
	{
		echo "Successfully deleted!<br>";
		header("Location: ../home.php"); 
	}

	$conn->close();

	
	

?>