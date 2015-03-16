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
                    <a class="navbar-brand" href="index.php">Local Colour</a>
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
            echo '<p>' . $message . '</p>';
        }
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
                while ($row) {
                    echo '<td>' . $row['shopID'] . '</td>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>' . $row['shopmanagername'] . '</td>';
                    echo '<td>' . $row['phonenumber'] . '</td>';
                    echo '<td>' . $row['dateopened'] . '</td>';
                    echo '<td>' . $row['url'] . '</td>';
                    echo '<td>' . $row['regionnumber'] . '</td>';
                    echo '<td>'
                    . '<a href="viewShop.php?id=' . $row['shopID'] . '"><button span class = "glyphicon glyphicon-search btn btn-view"></span></button></a> '
                    . '<a href="editShopForm.php?id=' . $row['shopID'] . '"><button span class = "glyphicon glyphicon-cog btn btn-edit"></span></button></a> '
                    . '<a class="deleteShop" href="deleteShop.php?id=' . $row['shopID'] . '"><button span class = "glyphicon glyphicon-remove btn btn-delete"></span></button></a> '
                    . '</td>';
                    echo '</tr>';

                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <br>
        <p><a href="createShopForm.php">Create Shop</a></p>




        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-2 sidebar visible-lg">
                    <ul class="nav nav-sidebar">
                        <li><img src="images/user1.jpg" class="img img-circle usericon img-responsive"></li>
                        <?php
                        $username = $_SESSION ['username'];
                        echo '<p class="greetings">Logged in as : ' . $username . '</p>';
                        ?>
                        <li><h2 class="scribble">Quicktips :</h2></li>
                        <li><a><img src="images/icons/svg/create.svg" class="adminoptionicons"> Create</a></li>
                        <li><a><img src="images/icons/svg/view.svg" class="adminoptionicons"> View</a></li>
                        <li><a><img src="images/icons/svg/edit.svg" class="adminoptionicons"> Edit</a></li>
                        <li><a><img src="images/icons/svg/delete.svg" class="adminoptionicons"> Delete</a></li>
                    </ul>

                    <!-- <div class="thumbnail">
                            <p>Content</p>
                            <div class="progress">
                                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="90" 
                                     aria-valuemin="0" aria-valuemax="90" style="width: 90%">
                                            <span class="sr-only">90% Complete</span>
                                    </div>
                            </div>
                            <p>Content</p>
                            <div class="progress">
                                    <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="75" 
                                    aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                            <span class="sr-only">75% Complete</span>
                                    </div>
                            </div>
                            <p>Content</p>
                            <div class="progress">
                                    <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="50" 
                                    aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                        <span class="sr-only">50% Complete</span>
                                    </div>
                            </div>
                            <p>Content</p>
                            <div class="progress">
                                    <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="25" 
                                    aria-valuemin="0" aria-valuemax="100" style="width: 25%">
                                            <span class="sr-only">25% Complete</span>
                                    </div>
                            </div>
                    </div> -->
                </div>





                <div class="col-lg-10 col-md-12">
                    <h2 class="scribble page-header">Dashboard :</h2>
                    <div class="row placeholders text-center">
                        <!-- <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                <a href=""><h4>Shops</h4></a>
                                <a href=""><h4>Employees</h4></a>
                                <a href=""><h4>Regions</h4></a>
                                <a href=""><h4>Products</h4></a>
                                <a href=""><h4>Products in Shop</h4></a>
                        </div> -->
                        <div class="container-fluid">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="thumbnail">
                                    <a><img src="images/icons/svg/building.svg" class="tableiconsize"></a>
                                    <a><h2 class="scribble">Shops</h2></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="thumbnail">
                                    <a><img src="images/icons/svg/employee.svg" class="tableiconsize"></a>
                                    <a><h2 class="scribble">Employees</h2></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="thumbnail">
                                    <a><img src="images/icons/svg/map.svg" class="tableiconsize"></a>
                                    <a><h2 class="scribble">Regions</h2></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="thumbnail">
                                    <a><img src="images/icons/svg/box.svg" class="tableiconsize"></a>
                                    <a><h2 class="scribble">Products</h2></a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <h2 class="scribble page-header">Section 2</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Heading 1</th>
                                    <th>Heading 2</th>
                                    <th>Heading 3</th>
                                    <th>Heading 4</th>
                                    <th>Heading 5</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>
                                        <a><button span class = "glyphicon glyphicon-search btn btn-view"></span></button></a>
                                        <a><button span class = "glyphicon glyphicon-cog btn btn-edit"></span></button></a>
                                        <a><button span class = "glyphicon glyphicon-remove btn btn-delete"></span></button></a>
                                    </td>
                                </tr>								
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>





        <!-- Javascript -->
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>