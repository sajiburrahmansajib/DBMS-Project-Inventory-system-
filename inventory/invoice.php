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


			$query = " SELECT  i.INVOICE_ID ,p.PRODUCT_NAME,c.CLIENT_NAME,po.ORDER_QUANTITY,p.PRICE,(po.ORDER_QUANTITY*p.PRICE) AS Total_Price FROM product_info p JOIN product_order po ON (p.PRODUCT_ID=po.PRODUCT_ID) JOIN client c  ON (po.CLIENT_ID=c.CLIENT_ID) JOIN invoice i ON(c.CLIENT_ID=i.CLIENT_ID)";


			

			if ($result = $conn->query($query))
			
			?>
	
						
					<table class="ui inverted white table">
						<thead>
			<tr>

                <th>Serial</th>
                <th>Invoice Id</th>
				<th>Product Name</th>
				<th>Client Name</th>
				<th>Order Qunatity</th>
				<th>Price</th>
				<th>Total Price</th>
				<th>Print</th>
				
				
				
			</tr> 

		</thead>
		
		<tbody>
			<tr>
				<?php
			if ($result = $conn->query($query)) {
				$ser =1;
				while ($row = $result->fetch_assoc()){
					printf("<tr>");
					printf("<td>%d</td> <td>%d</td>  <td>%s</td> <td>%s</td> <td>%d</td> <td>%s</td> <td>%d</td> <td><a href='print.php?id=%s'>Print</a> </td>",$ser, $row["INVOICE_ID"], $row["PRODUCT_NAME"] ,$row["CLIENT_NAME"],$row["ORDER_QUANTITY"],$row["PRICE"],$row["Total_Price"],$row["INVOICE_ID"]);

					printf("</tr>");
					$ser++;
				}
			}

			?>
			</tr>
		</tbody>
	</table>
	<!--<button class="ui right floated green button " onclick="window.print()">Print this page</button> -->

	
<script src="js/jquery-3.4.1.min.js"></script>
  	<script src="js/semantic.min.js"></script>
</body>
</html>