<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Styles/stylesheet.css"/>
    <title>Menu</title>
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

        <div id = "left">
        
        <table class="table">
            <thead>
                <th style="background-color: whitesmoke"> <b>Drink Name</b></th>
                <th style="background-color: whitesmoke"><b>Type</b></th>
                <th style="background-color: whitesmoke"><b>Price</b></th> 
            </thead>

            <tbody>
                <?php
                include 'config.php';

                $query = "SELECT D_Name,Type,Price FROM Drink WHERE Type = 'Fruit Tea Series'";
                $r = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($r)){
            ?>
                <tr>
                    <th style="width: 310px"><?php echo $row['D_Name']?></th>
                    <th style="width: 310px"><?php echo $row['Type']?></th>
                    <th style="width: 115px"><?php echo $row['Price']?></th>

                </tr>

            <?php
                }
            ?>
            </tbody>
        </table>

    </div>

    <div id = "right" style = "text-align:center">
            <div class="drink"><a href="Menu.php"><br><br>All Series<br></a></div>
            <div class="drink"><a href="MilkTea.php"><br>Milk Tea </a><br></div>
            <div class="drink"><a><br>→ Fruit Tea </a><br></div>
            <div class="drink"><a href="OriginalTasteTea.php"><br>Original Taste Tea <br></a></div>
            <div class="order_btn"><a href="Order.php"><br><br><button type="button"><b>Order Now !</b></button></a></div>
    </div>

    <footer>
        <p> © Bubble Tea Ordering Website </p>
    </footer>
</body>
</html>