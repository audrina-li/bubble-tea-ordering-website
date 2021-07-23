<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Styles/stylesheet.css"/>
    <title>Home</title>
</head>

<body>
	<div id="wrapper">
		<div id="banner">
			<img src="Images/banner.jpeg" width="575px" height="200px" />
		</div>

		<nav id="navigation">
			<ul id="nav">
				<li><a href="Home.php">Home</a></li>
				<li><a href="Menu.php">Menu</a></li>
				<li><a href="Stores.php">Stores</a></li>
				<li><a href="Join.php">Join</a></li>
				<li><a href="Account.php">Account</a></li>
			</ul>
		</nav>

		<div id="left">
			<img src="Images/BubbleTeas.jpeg" width="750px" height="350px"/>
		</div>

		<div id="right">
			<h3 style="text-align: center;"> BEST SELLERS </h3>

			<?php
			include 'config.php';

			$sql = "SELECT D_Name, Sum(Quantity) Sum FROM Orders GROUP BY D_Name ORDER BY Sum(Quantity) DESC LIMIT 5";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo " ★ " . $row["D_Name"] . "<br>" . " &nbsp&nbsp&nbsp Quantity Sold: " . $row["Sum"] . "<br>" . "<br>";
				}
			}
			?>
		</div>

		<footer>
			<p> © Bubble Tea Ordering Website </p>
		</footer>
</body>
</html>