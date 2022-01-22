<?php 
	
	
	$Name =  $_POST['PRODUCT_NAME'];
	$Id =  $_POST['PRODUCT_ID'];
	$Stock = $_POST['STOCK_QUANTITY'];
	$Avilable = $_POST['STOCK_STATUS'];
	$s_price= $_POST['PRICE'];
	$p_price = $_POST['PURCHASE_PRICE'];
		
	// echo $id;
	require_once('../db_config.php');

	$sql = "Update product_info SET PRODUCT_NAME='$Name', STOCK_QUANTITY='$Stock', STOCK_STATUS='$Avilable', PRICE ='$p_price',PURCHASE_PRICE='$s_price' WHERE PRODUCT_ID='$Id'";

	$conn = new mysqli($servername, $username, $password, $dbname);

	$result = $conn->query($sql);
	$conn->close();

	if (!$result)
	{
		echo "Error during update!<br>";
		echo mysqli_error($conn);
	}
	else
	{
		echo "Successfully updated contact info of $Name. <br>";
		header("Location: ../home.php"); 
	}

	


?>