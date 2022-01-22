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


      $query = "SELECT * FROM product_order where  ORDER_ID='$id'";



           $result = $conn->query($query);
           $row = $result->fetch_assoc();



 ?>
        




<head>
  <meta charset="utf-8">
  <title>Invoice</title>
  <link rel="stylesheet" href="css/semantic.min.css">
</head>

<body>

<div style="background-color: #FE9A76; padding: 2%;">
	<h1>Auto Insert  Information for Invoice</h1>
	<h4>The Invoice  data will be inserted into the main database</h4>
</div>
<br>
	<div class="ui text container">
    	<form class="ui form" method="post" action="db/insert_invoice.php">

         
         <div class="field">
        <label>Order Id</label>
        <input type="text" name="ORDER_ID" value="<?php echo $row["ORDER_ID"] ?>" placeholder="Order Id">
      </div>

       <div class="field" >
        <label>Client Id</label>
        <input type="text" name="CLIENT_ID" value="<?php echo $row["CLIENT_ID"] ?>"placeholder="Client Id">
      </div>
      <div class="field"style="display: none;">
        <label>Invoice Id</label>
        <input type="text" name="INVOICE_ID" value="<?php echo $row["INVOICE_ID"] ?>"placeholder="Invoice Id">
      </div>
        

      <div style="padding: 5px">
        <button class="ui green button">Prepare</button>        
     </div>
    </form>
</div>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/semantic.min.js"></script>
</body>

</html