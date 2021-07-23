<?php
	session_start();
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Styles/stylesheet.css"/>
    <title>Account</title>
</head>

<style>
    <?php include 'Styles/stylesheet.css'; ?>
</style>

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

		<div id = "left" style="text-align:center; width:515px">
			<?php
				include 'config.php';
				
				$phone = $_SESSION["phone"];
				$sql = "SELECT Name FROM Customer WHERE PhoneNumber = $phone";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						echo '<h1>' . 'Welcome, ' . $row['Name'] . "!" . "</h1>";
					}
				}
			?>
			<div class="logout"><a href="LogOut.php">Log out</a></div>

			<div class="account_btn"><a href="Order.php"><br><br><button type="button"><b>Place Order</b></button></a></div>
			<div class="account_btn"><a href="OrderHistory.php"><br><br><button type="button"><b>Order History</b></button></a></div>
		</div>

		<span>
			<img src="Images/SignUp.jpeg" style="margin-top:45px" width="500px"/>
		</span>

		<footer>
			<p> © Bubble Tea Ordering Website </p>
		</footer>
</body>
</html>