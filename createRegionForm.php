<?php
$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';
?>




<!doctype html>
<html lang="en">
    <head>
        <title>Dashboard | Create Region Form</title>
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
        <script type="text/javascript" src="js/region.js"></script>
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
                                        <input type="text" class="form-control" placeholder="Search" name="q">
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
        <!-- Menu ends here -->




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





                <!-- Image Row -->
                <div class="col-lg-10 col-md-12">
                    <h4 class="boldtext polaroid-grid-4">Tables</h4>
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
                                    <div class="thumbnail background-grey activedashtable">
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

                    <div class="col-lg-6">
                        <h4 class="boldtext">Create Region Form</h4>
                        <div class="thumbnail background-grey">

                            <form id="createRegionForm"
                                  action="createRegion.php" 
                                  method="POST">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>Region Name</th>
                                                <td>
                                                    <input class="form-control" type="text" name="regionname" value="<?php
                                                    if (isset($_POST) && isset($_POST['regionname'])) {
                                                        echo $_POST['regionname'];
                                                    }
                                                    ?>" />
                                                    <span id="regionnameError" class="error">
                                                        <?php
                                                        if (isset($errorMessage) && isset($errorMessage['regionname'])) {
                                                            echo $errorMessage['regionname'];
                                                        }
                                                        ?>                                
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Regional Manager Name</th>
                                                <td>
                                                    <input class="form-control" type="text" name="regionalmanager" value="<?php
                                                    if (isset($_POST) && isset($_POST['regionalmanager'])) {
                                                        echo $_POST['regionalmanager'];
                                                    }
                                                    ?>" />
                                                    <span id="regionalmanagerError" class="error">
                                                        <?php
                                                        if (isset($errorMessage) && isset($errorMessage['regionalmanager'])) {
                                                            echo $errorMessage['regionalmanager'];
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
                                                    }
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
                                                <th>Email</th>
                                                <td>
                                                    <input class="form-control" type="text" name="email" value="<?php
                                                    if (isset($_POST) && isset($_POST['email'])) {
                                                        echo $_POST['email'];
                                                    }
                                                    ?>" />
                                                    <span id="emailError" class="error">
                                                        <?php
                                                        if (isset($errorMessage) && isset($errorMessage['email'])) {
                                                            echo $errorMessage['email'];
                                                        }
                                                        ?> 
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <input class="btn btn-login" type="submit" value="Save" name="createRegion" />
                                    <input class="btn btn-login" type="button" value="Cancel" name="cancel" onclick="document.location.href = 'viewRegions.php'" />
                                </div>
                            </form>
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