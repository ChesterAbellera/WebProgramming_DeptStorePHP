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
        <title>Shiny!</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Reenie+Beanie' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=La+Belle+Aurore' rel='stylesheet' type='text/css'>
        <!-- Favicon Icon Link -->
        <link rel="icon" type="image/x-icon" href="images/threadless_favicon.ico">

        <script src="js/respond.js"></script>
        <script type="text/javascript" src="js/shop.js"></script>
    </head>
    <body>
        <!-- Menu -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Dropdown Menu for Mobile Devices -->
            <div class="">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">Local Colour</a>
                </div>

                <div class="collapse navbar-collapse" id="collapse">
                    <div class="">
                        <ul class="nav navbar-nav pull-right">
                            <li><a>Dashboard <span class="glyphicon glyphicon-stats"></span></a></a></li>
                            <li class="dropdown"><a href="#" data-toggle="dropdown">Tasks <span class="glyphicon glyphicon-tasks"></span> <span class="badge">5</span><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a>Task 1</a></li>
                                    <li><a>Task 2</a></li>
                                    <li><a>Task 3</a></li>
                                    <li><a>Task 4</a></li>
                                    <li><a>Task 5</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#" data-toggle="dropdown">Messages <span class="glyphicon glyphicon-comment"></span> <span class="badge">3</span> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a>Inbox <span class="glyphicon glyphicon-inbox"></span> <span class="badge">3</span></a></a></li>
                                    <li><a>Sent <span class="glyphicon glyphicon-send"></span></a></li>
                                    <li><a>Trash <span class="glyphicon glyphicon-trash"></span></a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#" data-toggle="dropdown">Settings <span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a>General <span class="glyphicon glyphicon-wrench"></span></a></li>
                                    <li><a>Privacy & Security <span class="glyphicon glyphicon-ban-circle"></span></a></li>
                                    <li class="divider"></li>
                                    <li><a>Help <span class="glyphicon glyphicon-info-sign"></span></a></a></li>
                                </ul>
                            </li>
                            <li>
                                <form class="navbar-form" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="q">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li><a>Activity Log <span class="glyphicon glyphicon-folder-open"></span></a></a></li>
                            <li><a href="">Logout <span class="glyphicon glyphicon-off"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        
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
        
        
        
        
        <script type="text/javascript" src="js/email.js"></script>
        <!-- Javascript -->
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>