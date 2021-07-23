<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="Styles/stylesheet.css"/>
	<title>Join</title>
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
			<h1> Franchise Application </h1> 
			
			<form action="Join.php" method="post">
				Name: <input type="text" required="required" name="name" style="margin-left: 113px; width: 185px;">
				<br>
				<br>
				Phone: <input type="text" required="required" name="phone" style="margin-left: 110px; width: 185px;">
				<br>
				<br>
				Personal Statement: <input type="text" required="required" name="personal_statement" style="width: 185px;">
				<br>
				<input type="submit" value="Submit" class = "apply_btn">
			</form>


			<?php
				include 'config.php';

				$a_name = $_POST["name"];
				$a_phone = $_POST["phone"];
				$a_personal_statement = $_POST["personal_statement"];

				if (! (is_null($a_name) AND is_null($a_phone) AND is_null($a_personal_statement))) {
					$sql = "INSERT INTO ApplicantForFranchising (Name, Phone, PersonalStatement) VALUES ('$a_name', $a_phone, '$a_personal_statement')";
				
					if ($conn->query($sql) === TRUE) {
						echo "<p style='color:green'>" . "Your application has been submitted." . "</p>";
					} else {
						echo "<p style='color:red'>" . "Please fill out the form carefully before submitting." . "</p>";
					}
		
					$conn->close();	
				}				
			?>	
		</div>

		<span>
			<img src="Images/Join.jpeg" width="500px"/>
		</span>

		<footer>
			<p> © Bubble Tea Ordering Website </p>
		</footer>
</body>
</html>