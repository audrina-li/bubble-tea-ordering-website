<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Styles/stylesheet.css" />
    <title>Store</title>
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

        <div id = "left">
        
        <table class="table">
            <thead>
                <th style="background-color: whitesmoke"> <b>Store Locations</b></th>
                <th style="background-color: whitesmoke"><b>Phone Number</b></th> 
            </thead>
            
            <tbody>
                <?php
                include 'config.php';

                $query = "SELECT * FROM BubbleTeaShop ";
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($result)){
                ?>

                <tr>
                    <th style="width: 475px"><?php echo $row['Location']?></th>
                    <th style="width: 250px"><?php echo $row['PhoneNumber']?></th>

                </tr>

                <?php
                    }
                ?>
                
            </tbody>
        </table>
    </div>

    <span>
        <img src="Images/BubbleTeaStore.jpeg" width="300px" height="185px"/>
    </span>
    
    <footer>
        <p> © Bubble Tea Ordering Website </p>
    </footer>
</body>
</html>