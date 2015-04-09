<?php
require_once 'Shop.php';
require_once 'Connection.php';
require_once 'ShopTableGateway.php';

/* "require_once" means that a stored piece of information 
  will remain as an output by having to load it just once */

require 'ensureUserLoggedIn.php';

if (isset($_GET) && isset($_GET['sortOrder'])) {
    $sortOrder = $_GET['sortOrder'];
    $columnNames = array("shopid", "address", "shopmanagername", "phonenumber", "dateopened", "url", "regionnumber");
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
        <title>Dashboard</title>
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
                                    <li><a>Compose <span class="glyphicon glyphicon-pencil"></span></a></li>
                                    <li class="divider"></li>
                                    <li><a>Inbox <span class="glyphicon glyphicon-inbox"></span> <span class="badge">3</span></a></li>
                                    <li><a>Sent <span class="glyphicon glyphicon-send"></span></a></li>
                                    <li><a>Folders <span class="glyphicon glyphicon-folder-open"></span></a></li>
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
                            <li>
                                <form class="navbar-form" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
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
                                        <img src="images/icons/svg/userround.svg" class="tableiconsize">
                                        <h2 class="scribble">Employees</h2>
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
                    
                    
                    
                    
                    <!-- Enquiries, Orders and Calendar -->
                    <div class="row placeholders">
                        <div class="container-fluid">
                            <div class="container-fluid">
                                <h4 class="boldtext">Dashboard</h4>
                            </div>

                            <!-- Enquiries Table -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="thumbnail background-grey">
                                    <div class="table table-responsive">
                                        <table class="table">
                                            <thead>
                                            <h4 class="polaroid-grid-3 text-center boldtext">Enquiries  &nbsp; <span class="glyphicon glyphicon-envelope"></span></h4>
                                            <th>Subject</th>
                                            <th>Date Received</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a>Reprint Request for Firefly Men's Tee <span class="badge badge-paid">New</span></a></td>
                                                    <td>Today at 7:21am</td>
                                                </tr>
                                                <tr>
                                                    <td><a>Messenger Bag Order Cancellation <span class="badge badge-paid">New</span></a></td>
                                                    <td>Today at 11:03am</td>
                                                </tr>
                                                <tr>
                                                    <td><a>Floral Pastel Scarf in Stock ? <span class="badge badge-paid">New</span></a></td>
                                                    <td>Today at 12:46am</td>
                                                </tr>
                                                <tr>
                                                    <td><a>Free Shipping to Vancouver ? <span class="badge badge-paid">New</span></a></td>
                                                    <td>Yesterday at 8:34pm</td>
                                                </tr>
                                                <tr>
                                                    <td><a>Reprint Request for Serenity Women's Hoodie</a></td>
                                                    <td>20th March 2015</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a class="btn btn-latestorders">View all enquiries</a>
                                </div>
                            </div>

                            <!-- Latest Orders Table -->
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="thumbnail background-grey">
                                    <div class="table table-responsive">
                                        <table class="table">
                                            <thead>
                                            <h4 class="polaroid-grid-3 text-center boldtext">Latest Orders  &nbsp; <span class="glyphicon glyphicon-shopping-cart"></span></h4>
                                            <th>Order ID</th>
                                            <th>Status</th>
                                            <th>Amount</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a>#73 - Barbara Dunkelman</a></td>
                                                    <td><span class="badge badge-paid">Paid</span></td>
                                                    <td>$118.00</td>
                                                </tr>
                                                <tr>
                                                    <td><a>#74 - Geoff Ramsey</a></td>
                                                    <td><span class="badge badge-dispatched">Dispatched</span></td>
                                                    <td>$261.00</td>
                                                </tr>
                                                <tr>
                                                    <td><a>#75 - Meg Turner</a></td>
                                                    <td><span class="badge badge-refunded">Refunded</span></td>
                                                    <td>$149.00</td>
                                                </tr>
                                                <tr>
                                                    <td><a>#77 - Gavin Free</a></td>
                                                    <td><span class="badge badge-failed">Failed</span></td>
                                                    <td>$22.00</td>
                                                </tr>
                                                <tr>
                                                    <td><a>#78 - Arryn Zech</a></td>
                                                    <td><span class="badge badge-cancelled">Cancelled</span></td>
                                                    <td>$46.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a class="btn btn-latestorders">View all orders</a>
                                </div>
                            </div>

                            <!-- Calendar -->
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="thumbnail background-grey">
                                    <div class="table table-responsive">
                                        <table class="table">
                                            <thead>
                                            <h4 class="polaroid-grid-3 text-center boldtext">March  &nbsp; <span class="glyphicon glyphicon-calendar"></span></h4>
                                            <th class="text-center">Mo</th>
                                            <th class="text-center">Tu</th>
                                            <th class="text-center">We</th>
                                            <th class="text-center">Th</th>
                                            <th class="text-center">Fr</th>
                                            <th class="text-center">Sa</th>
                                            <th class="text-center">Su</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">2</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">5</td>
                                                    <td class="text-center">6</td>
                                                    <td class="text-center">7</td>
                                                    <td class="text-center">8</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">9</td>
                                                    <td class="text-center">10</td>
                                                    <td class="text-center">11</td>
                                                    <td class="text-center">12</td>
                                                    <td class="text-center">13</td>
                                                    <td class="text-center">14</td>
                                                    <td class="text-center">15</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">16</td>
                                                    <td class="text-center">17</td>
                                                    <td class="text-center">18</td>
                                                    <td class="text-center">19</td>
                                                    <td class="text-center">20</td>
                                                    <td class="text-center">21</td>
                                                    <td class="text-center">22</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">23</td>
                                                    <td class="text-center">24</td>
                                                    <td class="text-center"><span class="badge badge-paid">25</span></td>
                                                    <td class="text-center">26</td>
                                                    <td class="text-center">27</td>
                                                    <td class="text-center">28</td>
                                                    <td class="text-center">29</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a class="btn btn-latestorders">Create Event / Set Reminder</a>
                                </div>
                            </div>
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




<!-- SPECIAL CODE ??? WHAT ?!
 echo '<pre>';
        print_r($_POST);
        print_r($params);
        print_r($sqlQuery);
        echo '</pre>';
-->






<!-- PROGRESS BAR CODES

<li>
    <div class="progress">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="90" 
             aria-valuemin="0" aria-valuemax="90" style="width: 90%">
            <span class="sr-only">90% Complete</span>
        </div>
    </div>
</li>

<li>
    <div class="progress">
        <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="75" 
             aria-valuemin="0" aria-valuemax="100" style="width: 75%">
            <span class="sr-only">75% Complete</span>
        </div>
    </div>
</li>

<li>
    <div class="progress">
        <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="50" 
             aria-valuemin="0" aria-valuemax="100" style="width: 50%">
            <span class="sr-only">50% Complete</span>
        </div>
    </div>
</li>



<li>
    <div class="progress">
        <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="25" 
             aria-valuemin="0" aria-valuemax="100" style="width: 25%">
            <span class="sr-only">25% Complete</span>
        </div>
    </div>
</li> -->