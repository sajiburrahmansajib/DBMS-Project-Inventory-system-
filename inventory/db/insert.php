<?php 

    $Name =  $_POST['PRODUCT_NAME'];
	$Id =  $_POST['PRODUCT_ID'];
	$Stock = $_POST['STOCK_QUANTITY'];
	$Avilable = $_POST['STOCK_STATUS'];
	$s_price= $_POST['PRICE'];
	$p_price = $_POST['PURCHASE_PRICE'];
	
	require_once('../db_config.php');

	$sql = "Insert into product_info VALUES('$Name',NULL, '$Stock', '$Avilable','$s_price','$p_price')";

	$conn = new mysqli($servername, $username, $password, $dbname);

	$result = $conn->query($sql);

	if (!$result)
	{
		echo "Error during insertion!<br>";
		echo mysqli_error($conn);
	}
	else
	{
		echo "Successfully added Product info. <br>";
	}

	$conn->close();

	echo "<a href='../home.php'>Back</a>"
	// php header("Location: ../index.php'"); 

?>