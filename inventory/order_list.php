<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/w3.css">
        <title>Inventory Management System </title>
    </head>
    <style> 
        .bgimg_au {
    background-image:url('./image/paper.jpg');
    background-size: 100% 1000px;
    background-repeat: no-repeat;
}

     </style>
    <body class="bgimg_au w3-display-top" >
        <ul class="w3-navbar w3-aqua">
            <li><a href="home.php">Home</a></li>
      
      
    </ul>

  <link rel="stylesheet" href="css/semantic.min.css">

  <?php 
       require_once('db_config.php');
   ?>
</head>
<body>
  
    
  
  <?php
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_errno) {
            printf("Connect failed: %s\n", $conn->connect_error);
          exit();
      }


      $query = " SELECT  po.ORDER_ID ,p.PRODUCT_NAME,c.CLIENT_NAME,c.CLIENT_ID,p.PRICE,po.ORDER_DATE FROM product_info p JOIN product_order po ON (p.PRODUCT_ID=po.PRODUCT_ID) JOIN client c  ON (po.CLIENT_ID=c.CLIENT_ID) ";


      

      if ($result = $conn->query($query))
      
      ?>
  
            
          <table class="ui inverted white table">
            <thead>
      <tr>
        <th>Order Id</th>
        <th>prooduct Name</th>
        <th>Client Name</th>
        <th>Client Id</th>
        
        <th>Order Date</th>
        <th>Option</th>
        
        
        
      </tr> 

    </thead>
    
    <tbody>
      <tr>
        <?php
      if ($result = $conn->query($query)) {
        
        while ($row = $result->fetch_assoc()){
          printf("<tr>");
          printf("<td>%d</td> <td>%s</td> <td>%s</td>  <td>%d</td> <td>%s</td> <td><a href='invoice_in.php?id=%s'>Invoice</a> </td>", $row["ORDER_ID"], $row["PRODUCT_NAME"], $row["CLIENT_NAME"] ,$row["CLIENT_ID"],$row["ORDER_DATE"],$row["ORDER_ID"]);

          printf("</tr>");
          
        }
      }

      ?>
      </tr>
    </tbody>
  </table>

<script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/semantic.min.js"></script>
</body>
</html>