<?php 

    
	$iId =  $_POST['INVOICE_ID'];
	$oId =  $_POST['ORDER_ID'];
	$cId =  $_POST['CLIENT_ID'];
	
	
	require_once('../db_config.php');

	$sql = "Insert into invoice VALUES('$iId', '$oId', '$cId')";

	$conn = new mysqli($servername, $username, $password, $dbname);

	$result = $conn->query($sql);

	if (!$result)
	{
		echo "Error during insertion!<br>";
		echo mysqli_error($conn);
	}
	else
	{
		echo "Successfully added Invoice. <br>";
	}

	$conn->close();

	echo "<a href='../home.php'>Back</a>"
	// php header("Location: ../index.php'"); 

?>