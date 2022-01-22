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


			$query = " SELECT * FROM client ";


			

			if ($result = $conn->query($query))
			
			?>
	
						
					<table class="ui inverted white table">
						<thead>
			<tr>
                <th>Client Name</th>
				<th>Client Id</th>
				<th>Phone Number</th>
				<th>Address</th>
				<th>E-Mail</th>
				
				
				
			</tr> 

		</thead>
		
		<tbody>
			<tr>
				<?php
			if ($result = $conn->query($query)) {
				
				while ($row = $result->fetch_assoc()){
					printf("<tr>");
					printf("<td>%s</td> <td>%d</td> <td>%s</td> <td>%s</td> <td>%s</td>", $row["CLIENT_NAME"], $row["CLIENT_ID"], $row["PHONE_NUMBAR"] ,$row["ADDRESS"],$row["EMAIL"]);

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