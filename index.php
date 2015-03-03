<?php
require_once 'Shop.php';
require_once 'Connection.php';
require_once 'ShopTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

$connection = Connection::getInstance();
$gateway = new ShopTableGateway($connection);

$statement = $gateway->getShops();
?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome to Threadless</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        
        <!-- Favicon Icon Link -->
        <link rel="icon" type="image/x-icon" href="images/threadless_favicon.ico">
    </head>
    <body>
        <a href="home.php"><img src="images/threadless_black.png"></a>
        <h2>Welcome !</h2>
        <?php require 'toolbar.php' ?>
        <?php 
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table id="t01">
            <thead>
                <tr>
                    <th>Shop ID</th>
                    <th>Address</th>
                    <th>Shop Manager Name</th>
                    <th>Phone Number</th>
                    <th>Date Opened</th>
                    <th>URL</th>
                    <th>Region Number</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {

                    echo '<td>' . $row['shopID'] . '</td>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>' . $row['shopmanagername'] . '</td>';
                    echo '<td>' . $row['phonenumber'] . '</td>';
                    echo '<td>' . $row['dateopened'] . '</td>';
                    echo '<td>' . $row['url'] . '</td>';
                    echo '<td>' . $row['regionnumber'] . '</td>';
                    echo '</tr>';
                    
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
    </body>




</html>