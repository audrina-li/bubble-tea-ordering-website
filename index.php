<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Styles/stylesheet.css" />
    <title>Login</title>
</head>

<style>
    <?php include 'Styles/login.css'; ?>
</style>

<body>
    <div class="login">
        <h1 class="text">Login</h1>

        <form action="index.php" method="post">  
            <input type="text" required="required" placeholder="Phone Number" name="phone"></input>  
            <input type="password" required="required" placeholder="Password" name="password"></input>  
            <button class="btn" type="submit">Login</button>  
        </form>  

        <a href="SignUp.php"><p>Don't have an account yet? Sign up now!</p></a>
    
        <div class="message">
            <?php
                session_start();
                include 'config.php';

                $phone = $_POST["phone"];
                $password = $_POST["password"];

                if (! (is_null($phone) AND is_null($password))) {
                    $sql = "SELECT * FROM Customer WHERE PhoneNumber = $phone AND Password = $password";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $_SESSION["phone"] = $phone;
                        header("Location: Home.php");
                    } else {
                        echo "<p style='color:red'>" . "Login failed." . "</p>";
                    }
                }	
                
                $conn->close();	
            ?>	
        </div>
    </div>
</body>
</html>