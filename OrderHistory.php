<?php
	session_start();
?>

<!DOCTYPE html>
	<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Styles/stylesheet.css"/>
    <title>Order History</title>
	</head>

	<body>
		<div id = "wrapper">
			<div id = "banner"> 
				<img src="Images/banner.jpeg" width="575px" height="200px"/>
			</div>

			<nav id = "navigation">
				<ul id = "nav">
					<li><a href="Home.php">Home</a></li>
					<li><a href="Menu.php">Menu</a></li>
					<li><a href="Stores.php">Stores</a></li>
					<li><a href="Join.php">Join</a></li>
					<li><a href="Account.php">Account</a></li>
				</ul>
			</nav>

			<div id = "left" style="text-align:center; width:1000px">	
                <h1> Order History </h1>
				
				<?php
					include 'config.php';

                    $phone = $_SESSION["phone"];

					$sql = "SELECT o.Order_ID, o.Date, o.D_Name, o.Quantity, Round(o.Quantity * d.Price, 2) AS Total FROM Orders o, Drink d WHERE o.D_Name = d.D_Name AND PhoneNumber = $phone ORDER BY o.Date";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						echo "<hr>";
						echo "<span style='display:inline-block; width: 180px; text-align:center'><b>" . "Order ID" . "</b></span>" . 
							"<span style='display:inline-block; width: 180px; text-align:center'><b>" . "Date" . "</b></span>" . 
							"<span style='display:inline-block; width: 265px; text-align:center'><b>" . "Item" . "</b></span>" . 
							"<span style='display:inline-block; width: 180px; text-align:center'><b>" . "Quantity" . "</b></span>" . 
							"<span style='display:inline-block; width: 180px; text-align:center'><b>" . "Total" . "</b></span>";
						echo "<hr>";
						while($row = $result->fetch_assoc()) { 
							echo "<span style='display:inline-block; width: 180px; text-align:center'>" . $row["Order_ID"] . "</span>" .
								"<span style='display:inline-block; width: 180px; text-align:center'>" . $row["Date"] . "</span>" . 
								"<span style='display:inline-block; width: 265px; text-align:center'>" . $row["D_Name"] . "</span>" . 
								"<span style='display:inline-block; width: 180px; text-align:center'>" . $row["Quantity"] . "</span>" . 
								"<span style='display:inline-block; width: 180px; text-align:center'>" . "$" . $row["Total"] . "</span>" . "<br>" . "<hr>";
						}
					} else {
						echo "<p style='color:red'>" . "No Result Found." . "</p>";
					}
					
					$conn->close();
                ?>
			</div>

			<footer>
				<p> © Bubble Tea Ordering Website </p>
			</footer>
	</body>
</html>