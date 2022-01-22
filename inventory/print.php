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


     # $query = "SELECT * FROM product_info where  PRODUCT_ID='$id'";
      $query = " SELECT  i.INVOICE_ID ,p.PRODUCT_NAME,c.CLIENT_NAME,po.ORDER_QUANTITY,p.PRICE,(po.ORDER_QUANTITY*p.PRICE) AS Total_Price FROM product_info p JOIN product_order po ON (p.PRODUCT_ID=po.PRODUCT_ID) JOIN client c  ON (po.CLIENT_ID=c.CLIENT_ID) JOIN invoice i ON(c.CLIENT_ID=i.CLIENT_ID) where INVOICE_ID='$id'";



           $result = $conn->query($query);
           $row = $result->fetch_assoc();



 ?>
        




<head>
  <meta charset="utf-8">
  <title>Print invoice</title>
  <link rel="stylesheet" href="css/semantic.min.css">
</head>

<body>

<div style="background-color: #FE9A76; padding: 2%;">
	<h1>Inventory Management System</h1>
	<h4>Thanks for Purchasing Product In Our System</h4>
</div>
<br>
	<div class="ui text container">
    	<form class="ui form" >

         
         <div class="field">
        <label>Invoice Id</label>
        <input type="text" value="<?php echo $row["INVOICE_ID"] ?>" >
      </div>

       <div class="field" >
        <label>Product Name</label>
        <input type="text"  value="<?php echo $row["PRODUCT_NAME"] ?>">
      </div>
      <div class="field">
        <label>Client Name</label>
        <input type="text" value="<?php echo $row["CLIENT_NAME"] ?>" >
      </div>
      <div class="field">
        <label>Order Qunatity</label>
        <input type="text" value="<?php echo $row["ORDER_QUANTITY"] ?>">
      </div>
      <div class="field">
        <label> Price</label>
        <input type="text"  value="<?php echo $row["PRICE"] ?>">
      </div>
      <div class="field">
        <label>Total Price</label>
        <input type="text"  value="<?php echo $row["Total_Price"] ?>">
      </div>
      <div class="field">
        <label>Payment</label>
        <input type="text"  placeholder="Yes/No">
      </div>
        

      <div style="padding: 5px">
        
        <button class="ui right floated green button " onclick="window.print()">Print</button>  
     </div>
    </form>
</div>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/semantic.min.js"></script>
</body>

</html