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
  <h1>Insert  information to order Product  </h1>
  <h4>The product order  data will be inserted into the main database</h4>
</div>
<br>
  <div class="ui text container">
     <form class="ui form" method="post" action="db/insert_order.php">

         
         <div class="field">
        

       <div class="field">
        <label>PRODUCT ID</label>
        <input type="text" name="PRODUCT_ID" value="<?php echo $row["PRODUCT_ID"] ?>"placeholder="Product Id">
      </div>

      <div class="field">
        <label>Order Id</label>
        <input type="text" name="ORDER_ID" value="XXXXX" placeholder="Order Id">
      </div>

   
        
        
      <div class="field">
        <label>Order quantity</label>
        <input type="text" name="ORDER_QUANTITY" placeholder="Order quantity">
      </div>
        <div class="field">
        <label>Client Id</label>
        <input type="text" name="CLIENT_ID" placeholder="Client Id">
      </div>
      <div class="field">
        <label>ORDER DATE</label>
        <input type="text" name="ORDER_DATE" placeholder="Date">
      </div>

      <div style="padding: 5px">
        <button class="ui green button">Order</button>        
     </div>
    </form>
</div>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/semantic.min.js"></script>
</body>

</html