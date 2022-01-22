<?php 

    $oid =  $_POST['ORDER_ID'];
	$pid =  $_POST['PRODUCT_ID'];
	$quantity = $_POST['ORDER_QUANTITY'];
	$cid = $_POST['CLIENT_ID'];
	$date= $_POST['ORDER_DATE'];
	
	
	require_once('../db_config.php');

	$sql = "Insert into product_order VALUES(NULL,'$pid', '$quantity', '$cid','$date')";

	$conn = new mysqli($servername, $username, $password, $dbname);

	$result = $conn->query($sql);

	if (!$result)
	{
		echo "Error during insertion!<br>";
		echo mysqli_error($conn);
	}
	else
	{
		echo "Successfully added Order info. <br>";
	}

	$conn->close();

	echo "<a href='../client_home.php'>Back</a>"
	// php header("Location: ../index.php'"); 

?>