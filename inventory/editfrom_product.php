<!doctype html>

<html lang="en">

<?php

     require_once('db_config.php');
     $id = $_GET['id'];
     $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_errno) {
            printf("Connect failed: %s\n", $conn->connect_error);
          exit();
      }


      $query = "SELECT * FROM product_info where  PRODUCT_ID='$id'";



           $result = $conn->query($query);
           $row = $result->fetch_assoc();



 ?>
        




<head>
  <meta charset="utf-8">
  <title>Edit Product Information</title>
  <link rel="stylesheet" href="css/semantic.min.css">
</head>

<body>

<div style="background-color: #FE9A76; padding: 2%;">
	<h1>Insert Updating Product  Information</h1>
	<h4>The Updating  data will be inserted into the main database</h4>
</div>
<br>
	<div class="ui text container">
    	<form class="ui form" method="post" action="db/update.php">

         
         <div class="field">
        <label>Name</label>
        <input type="text" name="PRODUCT_NAME" value="<?php echo $row["PRODUCT_NAME"] ?>" placeholder="Product Name">
      </div>

       <div class="field" style="display: none;">
        <label>Id</label>
        <input type="text" name="PRODUCT_ID" value="<?php echo $row["PRODUCT_ID"] ?>"placeholder="Product Id">
      </div>
      <div class="field">
        <label>Stock Qunatity</label>
        <input type="text" name="STOCK_QUANTITY" value="<?php echo $row["STOCK_QUANTITY"] ?>" placeholder="Stock quantity">
      </div>
      <div class="field">
        <label>Avilable</label>
        <input type="text" name="STOCK_STATUS"value="<?php echo $row["STOCK_STATUS"] ?>" placeholder="Stock status">
      </div>
      <div class="field">
        <label>Purchase Price</label>
        <input type="text" name="PURCHASE_PRICE" value="<?php echo $row["PURCHASE_PRICE"] ?>"placeholder="Purchase Price">
      </div>
      <div class="field">
        <label>Selling Price</label>
        <input type="text" name="PRICE" value="<?php echo $row["PRICE"] ?>"placeholder="Selling Price">
      </div>
        

      <div style="padding: 5px">
        <button class="ui green button">Save</button>        
     </div>
    </form>
</div>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/semantic.min.js"></script>
</body>

</html