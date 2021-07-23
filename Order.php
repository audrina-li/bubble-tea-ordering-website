<?php
	session_start();
?>

<!DOCTYPE html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="Styles/stylesheet.css"/>
		<title>Shop</title>
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
				<h1> Shop </h1> 
				
				<form action="Order.php" method="post">
					Select Drink: 
                    <select name="drink" style="margin-left: 15px; width: 193px; height:35px">
                        <option> </option>
                        <option value="Ceylon Milk Tea">Ceylon Milk Tea</option>
                        <option value="Earl Grey Tea">Earl Grey Tea</option>
                        <option value="Jasmine Green Tea">Jasmine Green Tea</option>
                        <option value="Lemon Black Tea">Lemon Black Tea</option>
						<option value="Lemon Yakult Tea">Lemon Yakult Tea</option>
                        <option value="Milk Tea">Milk Tea</option>
                        <option value="Old Fashioned Black Tea">Old Fashioned Black Tea</option>
						<option value="Oolong Tea">Oolong Tea</option>
                        <option value="Orange Jasmine Green Tea	">Orange Jasmine Green Tea</option>
                        <option value="Ovaltine Milk Tea">Ovaltine Milk Tea</option>
						<option value="Passion Fruit Green Tea">Passion Fruit Green Tea</option>
                        <option value="Plum Lemon Tea">Plum Lemon Tea</option>
                        <option value="Rose Milk Tea">Rose Milk Tea</option>
						<option value="Tie Kuan Yin Milk Tea">Tie Kuan Yin Milk Tea</option>
                        <option value="White Tea">White Tea</option>
                    </select>
					<br>
					<br>
					Quantity: 
					<input type="number" required="required" name="quantity" style="margin-left: 43px; width: 185px;">
					<input type="submit" value="Check Out" class="shop_btn">
				</form>

				<?php
					include 'config.php';

					$phone = $_SESSION["phone"];
					$drink = $_POST["drink"];
					$quantity = $_POST["quantity"];
                    $date = date("Y-m-d");

					if (! (is_null($drink) AND is_null($quantity))) {
						$sql = "INSERT INTO Orders (PhoneNumber, D_Name, Quantity, Date) VALUES ($phone, '$drink', $quantity, '$date')";
                        
                        if ($conn->query($sql) === TRUE) {
							echo "<p style='color:green'>" . "Thank you for your purchase! Your order will be delivered shortly." . "</p>";
						} else {
							echo "<p style='color:red'>" . "Your order didn't complete. Please retry." . "</p>";
						}
			
						$conn->close();	
					}				
				?>	
			</div>

			<span>
				<img src="Images/CheckOut.jpeg" style="margin-top:35px" width="500px" height="250px"/>
			</span>

			<footer>
				<p> © Bubble Tea Ordering Website </p>
			</footer>
	</body>
</html>