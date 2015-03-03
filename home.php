<?php
require_once 'Shop.php';
require_once 'Connection.php';
require_once 'ShopTableGateway.php';

/* "require_once" means that a stored piece of information 
will remain as an output by having to load it just once */

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new ShopTableGateway($connection);

$statement = $gateway->getShops();
?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Threadless | Home</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/shop.js"></script>
        
        <!-- Favicon Icon Link -->
        <link rel="icon" type="image/x-icon" href="images/threadless_favicon.ico">
    </head>
    <body>
        <a href="home.php"><img src="images/threadless_black.png"></a>
        <?php require 'toolbar.php' ?>
        
        <?php
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        
        <?php
        $username = $_SESSION ['username'];
        echo '<p class="greetings">Logged in as : ' .$username. '</p>';
        ?>
        
        <h2>Shop Details</h2>
        
        <table id="t01">
            <thead>
                <tr>
                    <th>Shop ID</th>
                    <th>Shop Address</th>
                    <th>Shop Manager Name</th>
                    <th>Phone Number</th>
                    <th>Date Opened</th>
                    <th>URL Address</th>
                    <th>Region Number</th>
                    <th>Option:</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) 
                {
                    echo '<td>' . $row['shopID'] . '</td>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>' . $row['shopmanagername'] . '</td>';
                    echo '<td>' . $row['phonenumber'] . '</td>';
                    echo '<td>' . $row['dateopened'] . '</td>';
                    echo '<td>' . $row['url'] . '</td>';
                    echo '<td>' . $row['regionnumber'] . '</td>';
                    echo '<td>'
                    . '<a href="viewShop.php?id='.$row['shopID'].'">View</a> '
                    . '<a href="editShopForm.php?id='.$row['shopID'].'">Edit</a> '
                    . '<a class="deleteShop" href="deleteShop.php?id='.$row['shopID'].'">Delete</a> '
                    .'</td>';
                    echo '</tr>';
                    
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <br>
        <p><a href="createShopForm.php">Create Shop</a></p>
    </body>




</html>