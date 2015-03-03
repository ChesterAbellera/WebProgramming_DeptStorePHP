<?php
require_once 'Shop.php';
require_once 'Connection.php';
require_once 'ShopTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$sID = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new ShopTableGateway($connection);

$statement = $gateway->getShopByShopId($sID);
?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Threadless | View Shop</title>
        <script type="text/javascript" src="js/shop.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        
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
        <table id="t01">
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<th>Shop ID:</th>'
                    . '<td>' . $row['shopID'] . '</td>';
                    echo '</tr>';
                    
                    echo '<tr>';
                    echo '<th>Address:</th>'
                    . '<td>' . $row['address'] . '</td>';
                    echo '</tr>';
                    
                    echo '<tr>';
                    echo '<th>Shop Manager Name:</th>'
                    . '<td>' . $row['shopmanagername'] . '</td>';
                    echo '</tr>';
                    
                    echo '<tr>';
                    echo '<th>Phone Number:</th>'
                    . '<td>' . $row['phonenumber'] . '</td>';
                    echo '</tr>';
                    
                    echo '<tr>';
                    echo '<th>Date Opened:</th>'
                    . '<td>' . $row['dateopened'] . '</td>';
                    echo '</tr>';
                    
                    echo '<tr>';
                    echo '<th>URL Adress:</th>'
                    . '<td>' . $row['url'] . '</td>';
                    echo '</tr>';
     
                    echo '<tr>';
                    echo '<th>Region Number:</th>'
                    . '<td>' . $row['regionnumber'] . '</td>';
                    echo '</tr>';
                    //echo '<tr>';
                ?>
            </tbody>
        </table>
        <p>
            <a href="editShopForm.php?id=<?php echo $row['shopID']; ?>">
                Edit</a>
            <a class="deleteShop" href="deleteShop.php?id=<?php echo $row['shopID']; ?>">
                Delete</a>
        </p>
        <p><a href="home.php">Go back?</a></p>
    </body>




</html>