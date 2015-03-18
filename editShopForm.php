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
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new ShopTableGateway($connection);

$statement = $gateway->getShopByShopId($id);
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}
$row = $statement->fetch(PDO::FETCH_ASSOC);
?>




<!doctype html>
<html lang="en">
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
                            <li><a href="dashboard.php">Dashboard <span class="glyphicon glyphicon-stats"></span></a></a></li>
                            <li class="dropdown"><a href="#" data-toggle="dropdown">Tasks <span class="glyphicon glyphicon-tasks"></span> <span class="badge">5</span><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a>Task 1</a></li>
                                    <li>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="90" 
                                                 aria-valuemin="0" aria-valuemax="90" style="width: 90%">
                                                <span class="sr-only">90% Complete</span>
                                            </div>
                                        </div>
                                    </li>
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
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>





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
                        <li><a href="#create" data-toggle="modal"><img src="images/icons/svg/create.svg" class="adminoptionicons"> Create</a></li>
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
                    <h2 class="scribble">Tables :</h2>
                    <div class="row placeholders text-center">
                        <div class="container-fluid">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="thumbnail noborder">
                                    <a><img src="images/icons/svg/stats.svg" class="tableiconsize"></a>
                                    <a><h2 class="scribble">Stats</h2></a>
                                </div>
                            </div>
                            
                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <div class="thumbnail noborder">
                                    <a><img src="images/icons/svg/building.svg" class="tableiconsize"></a>
                                    <a><h2 class="scribble">Shops</h2></a>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <div class="thumbnail noborder">
                                    <a><img src="images/icons/svg/employee.svg" class="tableiconsize"></a>
                                    <a><h2 class="scribble">Employees</h2></a>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <div class="thumbnail noborder">
                                    <a><img src="images/icons/svg/map.svg" class="tableiconsize"></a>
                                    <a><h2 class="scribble">Regions</h2></a>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-2">
                                <div class="thumbnail noborder">
                                    <a><img src="images/icons/svg/box.svg" class="tableiconsize"></a>
                                    <a><h2 class="scribble">Products</h2></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="scribble">Edit Shop Form</h2>
                    <form id="editShopForm" name="editShopForm" action="editShop.php" method="POST">
                        <input type="hidden" name="editID" value="<?php echo $id; ?>" />
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Shop Address</th>
                                        <td>
                                            <input class="form-control" type="text" name="address" value="<?php
                                            if (isset($_POST) && isset($_POST['address'])) {
                                                echo $_POST['address'];
                                            } else
                                                echo $row['address']
                                                ?>" />
                                            <span id="addressError" class="error">
                                                <?php
                                                if (isset($errorMessage) && isset($errorMessage['address'])) {
                                                    echo $errorMessage['address'];
                                                }
                                                ?>                                
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Shop Manager Name</th>
                                        <td>
                                            <input class="form-control" type="text" name="shopmanagername" value="<?php
                                            if (isset($_POST) && isset($_POST['shopmanagername'])) {
                                                echo $_POST['shopmanagername'];
                                            } else
                                                echo $row['shopmanagername']
                                                ?>" />
                                            <span id="shopmanagernameError" class="error">
                                                <?php
                                                if (isset($errorMessage) && isset($errorMessage['shopmanagername'])) {
                                                    echo $errorMessage['shopmanagername'];
                                                }
                                                ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number</th>
                                        <td>
                                            <input class="form-control" type="text" name="phonenumber" value="<?php
                                            if (isset($_POST) && isset($_POST['phonenumber'])) {
                                                echo $_POST['phonenumber'];
                                            } else
                                                echo $row['phonenumber']
                                                ?>" />
                                            <span id="phonenumberError" class="error">
                                                <?php
                                                if (isset($errorMessage) && isset($errorMessage['phonenumber'])) {
                                                    echo $errorMessage['phonenumber'];
                                                }
                                                ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Date Opened</th>
                                        <td>
                                            <input class="form-control" type="text" name="dateopened" value="<?php
                                            if (isset($_POST) && isset($_POST['dateopened'])) {
                                                echo $_POST['dateopened'];
                                            } else
                                                echo $row['dateopened']
                                                ?>" />
                                            <span id="dateopenedError" class="error">
                                                <?php
                                                if (isset($errorMessage) && isset($errorMessage['dateopened'])) {
                                                    echo $errorMessage['dateopened'];
                                                }
                                                ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>URL Address</th> 
                                        <td>
                                            <input class="form-control" type="text" name="url" value="<?php
                                            if (isset($_POST) && isset($_POST['url'])) {
                                                echo $_POST['url'];
                                            } else
                                                echo $row['url']
                                                ?>" />
                                            <span id="urlError" class="error">
                                                <?php
                                                if (isset($errorMessage) && isset($errorMessage['url'])) {
                                                    echo $errorMessage['url'];
                                                }
                                                ?> 
                                            </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Region Number</th>
                                        <td>
                                            <input class="form-control" type="text" name="regionnumber" value="<?php
                                            if (isset($_POST) && isset($_POST['regionnumber'])) {
                                                echo $_POST['regionnumber'];
                                            } else
                                                echo $row['regionnumber']
                                                ?>" />
                                            <span id="regionnumberError" class="error">
                                                <?php
                                                if (isset($errorMessage) && isset($errorMessage['regionnumber'])) {
                                                    echo $errorMessage['regionnumber'];
                                                }
                                                ?> 
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <input class="btn btn-login" type="submit" value="Save" name="updateShop"/>
                        <input class="btn btn-login" type="button" value="Cancel" name="cancel" onclick="document.location.href = 'dashboard.php'" />


                    </form>
                </div>
            </div>
        </div>




        <!-- Javascript -->
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>