<?php
require_once 'Shop.php';
require_once 'Connection.php';
require_once 'ShopTableGateway.php';

/* "require_once" means that a stored piece of information 
  will remain as an output by having to load it just once */

require 'ensureUserLoggedIn.php';

if (isset($_GET) && isset($_GET['sortOrder'])) {
    $sortOrder = $_GET['sortOrder'];
    $columnNames = array("shopid", "address", "shopmanagername", "phonenumber", "dateopened", "url", "regionalmanager");
    if (!in_array($sortOrder, $columnNames)) {
        $sortOrder = 'shopid';
    }
} else {
    $sortOrder = 'shopid';
}

if (isset($_GET) && isset($_GET['filterName'])){
    $filterName = filter_input(INPUT_GET, 'filterName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}
else
{
    $filterName = NULL;
}

$connection = Connection::getInstance();
$gateway = new ShopTableGateway($connection);

$statement = $gateway->getShops($sortOrder, $filterName);
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
        <script src="js/shop.js"></script>
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
                            <li><a href="dashboard.php">Dashboard <span class="glyphicon glyphicon-stats"></span></a></a></li>
                            <li class="dropdown"><a href="#" data-toggle="dropdown">Tasks <span class="glyphicon glyphicon-tasks"></span> <span class="badge">5</span><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a><b>1</b> - Inventory</a></li>
                                    <li><a><b>2</b> - Re-Stock</a></li>
                                    <li><a><b>3</b> - Review Orders</a></li>
                                    <li><a><b>4</b> - Reprint Requests</a></li>
                                    <li><a><b>5</b> - Invoices</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#" data-toggle="dropdown">Messages <span class="glyphicon glyphicon-comment"></span> <span class="badge">3</span> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a>Inbox <span class="glyphicon glyphicon-inbox"></span> <span class="badge">3</span></a></a></li>
                                    <li><a>Sent <span class="glyphicon glyphicon-send"></span></a></li>
                                    <li class="divider"></li>
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
                            <!-- Filter Box --> 
                            <li>
                                <form class="navbar-form" role="form" action="viewShops.php?sortOrder=<?php echo $sortOrder; ?>" method="GET">
                                    <div class="input-group">
                                        <input class="form-control" 
                                               type="text" 
                                               name="filterName"
                                               id="filterName"
                                               placeholder="Search"
                                               value="<?php echo $filterName; ?>" />
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" type="submit" name="filterBtn" id="filterBtn"><i class="glyphicon glyphicon-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li><a>Activity Log <span class="glyphicon glyphicon-folder-open"></span></a></a></li>
                            <li><?php require 'toolbar.php' ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Menu Ends Here -->




        <?php
        if (isset($message)) {
            echo '<p>' . $message . '</p>';
        }
        ?>









        <!-- Dashboard Container -->
        <div class="container-fluid dashboard">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-2 col-md-2 sidebar visible-lg">
                    <ul class="nav nav-sidebar">
                        <li>
                            <div class="btn-group">
                                <img src="images/user1.jpg" class="img img-circle usericon img-responsive dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href=""><span class="glyphicon glyphicon-camera"></span> &nbsp; Change Profile Picture</a></li>
                                    <li><a href=""><span class="glyphicon glyphicon-trash"></span> &nbsp; Delete Current Picture</a></li>
                                    <li class="divider"></li>
                                    <li><a href=""><span class="glyphicon glyphicon-ban-circle"></span> &nbsp; Disable Profile Picture</a></li>
                                </ul>
                            </div>
                        </li>
                        <?php
                        $username = $_SESSION ['username'];
                        echo '<p class="greetings">Logged in as : ' . $username . '</p>';
                        ?>
                        <li><h2 class="scribble">Quicktips :</h2></li>
                        <li><a><img src="images/icons/svg/create.svg" class="adminoptionicons"> Create</a></li>
                        <li><a><img src="images/icons/svg/view.svg" class="adminoptionicons"> View</a></li>
                        <li><a><img src="images/icons/svg/edit.svg" class="adminoptionicons"> Edit</a></li>
                        <li><a><img src="images/icons/svg/delete.svg" class="adminoptionicons"> Delete</a></li>
                        <li><a><img src="images/icons/svg/storagecloud.svg" class="adminoptionicons"> Storage</a></li>
                        <li><a><img src="images/icons/svg/lockedcloud.svg" class="adminoptionicons"> File Recovery</a></li>
                        <li><a><img src="images/icons/svg/widgets.svg" class="adminoptionicons"> Customizing Widgets</a></li>
                    </ul>
                </div>




                <!-- Main Dashboard Elements -->
                <div class="col-lg-10 col-md-12">
                    <!-- Image Row -->
                    <h4 class="polaroid-grid-4 boldtext">Tables</h4>

                    <div class="row placeholders text-center">
                        <div class="container-fluid">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <a href="viewShops.php" class="tablebutton">
                                    <div class="thumbnail background-grey">
                                        <img src="images/icons/svg/building.svg" class="tableiconsize">
                                        <h2 class="scribble">Shops</h2>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <a class="tablebutton">
                                    <div class="thumbnail background-grey">
                                        <img src="images/icons/svg/userround.svg" class="tableiconsize">
                                        <h2 class="scribble">Employees</h2>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <a href="viewRegions.php" class="tablebutton">
                                    <div class="thumbnail background-grey">
                                        <img src="images/icons/svg/map.svg" class="tableiconsize">
                                        <h2 class="scribble">Regions</h2>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <a class="tablebutton">
                                    <div class="thumbnail background-grey">
                                        <img src="images/icons/svg/box.svg" class="tableiconsize">
                                        <h2 class="scribble">Products</h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>


                    <!-- Shops Table -->
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h4 class="boldtext">Shops</h4>
                        <div class="thumbnail background-grey">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><a href="viewShops.php?sortOrder=shopid">Shop ID</a></th>
                                            <th><a href="viewShops.php?sortOrder=address">Shop Address</a></th>
                                            <th><a href="viewShops.php?sortOrder=shopmanagername">Shop Manager Name</a></th>
                                            <th><a href="viewShops.php?sortOrder=phonenumber">Phone Number</a></th>
                                            <th><a href="viewShops.php?sortOrder=dateopened">Date Opened</a></th>
                                            <th><a href="viewShops.php?sortOrder=url">URL Address</a></th>
                                            <th><a href="viewShops.php?sortOrder=regionalmanager">Region Manager</a></th>
                                            <th>Options</th>
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
                                            echo '<td>' . $row['regionalmanager'] . '</td>';
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
                            </div>
                            <a href="createShopForm.php" class="btn btn-latestorders">Create Shop</a>
                            <input class="btn btn-login" type="button" value="Go Back" name="cancel" onclick="document.location.href = 'dashboard.php'" />
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- Footer -->
        <footer class="col-lg-12 col-md-12 col-sm-12 col-xs-12 navbar-fixed-bottom">
            <div class="row">
                <div class="container">
                    <div class="col-lg-2 col-md-2 col-sm-2 footercontent">
                        <a><p>Dashboard Workspace</p></a>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-2 footercontent">
                        <a><p>Order Tracking</p></a>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-2 footercontent">
                        <a><p>Privacy Policy</p></a>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-2 footercontent">
                        <a><p>FAQs</p></a>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-2 footercontent">
                        <p class="small">&copy 2015 Local Colour Retailers</p>
                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-2 footercontent">
                        <h1>Local Colour</h1>
                    </div>
                </div>
            </div>
        </footer>




        <!-- Javascript -->
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>