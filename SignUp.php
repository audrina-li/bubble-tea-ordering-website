<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Styles/stylesheet.css" />
    <title>Sign Up</title>
</head>

<style>
    <?php include 'Styles/signup.css'; ?>
</style>

<body>
    <div class="login">
        <h1 class="text">Sign Up</h1>

        <form action="SignUp.php" method="post">
            Full Name: <input type="text" required="required" name="name">
            Phone: <input type="text" required="required" name="phone">
            Birth Date: <input type="date" required="required" name="birthdate">
            Address: <input type="text" required="required" name="address">
            Password: <input type="password" required="required" name="password"></input>  
            <input type="submit" class="btn" value="Sign Up">
		</form>

        <a href="index.php"><p>Already have an account? Login now!</p></a>

        <div class="message">
            <?php
                include 'config.php';

                $name = $_POST["name"];
                $phone = $_POST["phone"];
                $birthdate = $_POST["birthdate"];
                $address = $_POST["address"];
                $password = $_POST["password"];

                if (! (is_null($name) AND is_null($phone) AND is_null($birthdate) AND is_null($address) AND is_null($password))) {
                    $insert = "INSERT INTO Customer (Name, Birthdate, PhoneNumber, Address, Password) VALUES ('$name', '$birthdate', $phone, '$address', $password)";
                    $cid = "SELECT C_ID FROM Customer WHERE PhoneNumber = $phone";

                    if ($conn->query($insert) === TRUE) {
                        echo "<p style='color:green'>" . "Your account has been created." . "</p>";
                        header('refresh:1.5; Location:index.php');
                    } else if (($conn->query($cid)) != NULL) {
                        echo "<p style='color:red'>" . "This phone number is already in use." . "</p>";
                    } else {
                        echo "<p style='color:red'>" . "Please fill out the form carefully before submitting." . "</p>";
                    }

                    $conn->close();	
                }		
            ?>	
        </div>
    </div>
</body>
</html>