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
        <title>Local Colour | Homepage</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Reenie+Beanie' rel='stylesheet' type='text/css'>
        <!-- Favicon Icon Link -->
        <link rel="icon" type="image/x-icon" href="images/threadless_favicon.ico">

        <script src="js/respond.js"></script>
    </head>
    <body>




        <!-- Menu -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Dropdown Menu for Mobile Devices -->
            <div class="container-fluid">
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
                    <div class="container-fluid">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="store.php">Store</a></li>
                            <li><a>About</a></li>
                            <li><a>Jobs</a></li>
                            <li><a>Contact</a></li>
                            <li class="hidden-xs">
                                <form class="navbar-form" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="q">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li class="dropdown"><a href="#" data-toggle="dropdown">Account <span class="glyphicon glyphicon-bookmark"></span><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><?php require 'toolbar2.php' ?></li>
                                </ul>
                            </li>
                            <li class="visible-xs">
                                <form class="navbar-form" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="q">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Menu ends here -->

	
	
	
	
        <!-- Primary Jumbotron -->
        <div class="jumbotron">
            <div class="container">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <h1>What are you rocking next this coming Spring?</h1>
                    <a class="a.btn btn-info btn-lg">Shop Now</a>
                </div>

            </div>
        </div>




	<!-- The term "babytron" was first coined when local nuisance Joshua Hales
		 was asked to name a smaller, full-width div that lies beneath a jumbotron...
		 The name stuck. -->
        <div class="babytron text-center">
            <h2 class="scribble">Spring Season Sale <small>Up to 15% reductions off Selected items</small></u></h2>
        </div>
        
        
        
        
        <!-- Popular Apparel Section -->
        <div class="container popular">
            <h1>What's Popular</h1>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                    <div class="thumbnail noborder">
                        <a href="#pop1" data-toggle="modal"><img src="images/popular/pop1.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#pop1" data-toggle="modal"><p class="caption">Floral Summer Dress <strong>$16.99</strong></p></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                    <div class="thumbnail noborder">
                        <a href="#pop2" data-toggle="modal"><img src="images/popular/pop2.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#pop2" data-toggle="modal"><p class="caption">Baseball Passion Long Sleeve <strong>$15.99</strong></p></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                    <div class="thumbnail noborder">
                        <a href="#pop3" data-toggle="modal"><img src="images/popular/pop3.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#pop3" data-toggle="modal"><p class="caption">Round/Gold/Vintage Shades <strong>$9.99</strong></p></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                    <div class="thumbnail noborder">
                        <a href="#pop4" data-toggle="modal"><img src="images/popular/pop4.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#pop4" data-toggle="modal"><p class="caption">Grey/Black Striped Cardigan <strong>$24.99</strong></p></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                    <div class="thumbnail noborder">
                        <a href="#pop5" data-toggle="modal"><img src="images/popular/pop5.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#pop5" data-toggle="modal"><p class="caption">Grey Peep Toe Slingbacks <strong>$31.99</strong></p></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                    <div class="thumbnail noborder">
                        <a href="#pop6" data-toggle="modal"><img src="images/popular/pop6.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#pop6" data-toggle="modal"><p class="caption">Black Beach Low-Cuts <strong>$26.99</strong></p></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
	
	
	
	
        <!-- New Apparel Section -->
        <div class="container new">
            <h1>What's New</h1>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                    <div class="thumbnail noborder">
                        <a href="#new1" data-toggle="modal"><img src="images/new/new1.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#new1" data-toggle="modal"><p class="caption">Light Sunset Overshirt <strong>$8.99</strong></p></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                    <div class="thumbnail noborder">
                        <a href="#new2" data-toggle="modal"><img src="images/new/new2.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#new2" data-toggle="modal"><p class="caption">Leather Army Zip Jacket <strong>$41.99</strong></p></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                    <div class="thumbnail noborder">
                        <a href="#new3" data-toggle="modal"><img src="images/new/new3.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#new3" data-toggle="modal"><p class="caption">Cream Navy Wintercoat <strong>$34.99</strong></p></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                    <div class="thumbnail noborder">
                        <a href="#new4" data-toggle="modal"><img src="images/new/new4.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#new4" data-toggle="modal"><p class="caption">Burgundy Pattern Sweater <strong>$17.99</strong></p></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                    <div class="thumbnail noborder">
                        <a href="#new5" data-toggle="modal"><img src="images/new/new5.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#new5" data-toggle="modal"><p class="caption">Dye-Cast Low-Cuts <strong>$26.99</strong></p></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                    <div class="thumbnail noborder">
                        <a href="#new6" data-toggle="modal"><img src="images/new/new6.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#new6" data-toggle="modal"><p class="caption">Brown Messenger Bag <strong>$29.99</strong></p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	
	
	
	
        <!--  Photography Jumbotron -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 photography text-center">
            <h1>Get Picturesque</h1>
            <a class="a.btn btn-info btn-lg">Shop Camera Gear</a>
        </div>

        <!-- Photography Items Section -->
        <div class="container popular">
            <h1>What's Popular</h1>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <div class="thumbnail noborder">
                        <a href="#photography1" data-toggle="modal"><img src="images/photography/photography1.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#photography1" data-toggle="modal"><p class="caption">Instant Mini 8 Camera <strong>$95.00</strong></p></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <div class="thumbnail noborder">
                        <a href="#photography2" data-toggle="modal"><img src="images/photography/photography2.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#photography2" data-toggle="modal"><p class="caption">Instant Photo Lab <strong>$199.99</strong></p></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <div class="thumbnail noborder">
                        <a href="#photography3" data-toggle="modal"><img src="images/photography/photography3.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#photography3" data-toggle="modal"><p class="caption">Instant Film (20 Pack) <strong>$23.50</strong></p></a>
                        </div>
                    </div>
                </div>
				
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <div class="thumbnail noborder">
                        <a href="#photography4" data-toggle="modal"><img src="images/photography/photography4.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#photography4" data-toggle="modal"><p class="caption">Instant Camera iPhone Decal <strong>$3.00</strong></p></a>
                        </div>
                    </div>
                </div>
            </div>
            <h1>What's New</h1>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="thumbnail noborder">
                        <a href="#photography5" data-toggle="modal"><img src="images/photography/photography5.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#photography5" data-toggle="modal"><p class="caption">Charging Cable Keychain <strong>$25.99</strong></p></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="thumbnail noborder">
                        <a href="#photography6" data-toggle="modal"><img src="images/photography/photography6.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#photography6" data-toggle="modal"><p class="caption">Gee-Whiz Phone Projector <strong>$28.00</strong></p></a>
                        </div>
                    </div>
                </div>
				
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="thumbnail noborder">
                        <a href="#photography7" data-toggle="modal"><img src="images/photography/photography7.gif" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#photography7" data-toggle="modal"><p class="caption">Cable Caddy <strong>$14.00</strong></p></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="thumbnail noborder">
                        <a href="#photography8" data-toggle="modal"><img src="images/photography/photography8.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#photography8" data-toggle="modal"><p class="caption">Plaid Camera Satchel <strong>$45.00</strong></p></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>




        <!--  Travel Jumbotron -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 travelbackground text-center">
            <h1>Escaping somewhere?</h1>
            <a class="a.btn btn-info btn-lg">Shop Travel Gear</a>
        </div>

        <!-- Travel Items Section -->
        <div class="container popular">
            <h1>What's New</h1>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                    <div class="thumbnail noborder">
                        <a href="#travel1" data-toggle="modal"><img src="images/travel/travel1.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#travel1" data-toggle="modal"><p class="caption">PENNY Floral Nickel Skateboard <strong>$139.99</strong></p></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                    <div class="thumbnail noborder">
                        <a href="#travel2" data-toggle="modal"><img src="images/travel/travel2.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#travel2" data-toggle="modal"><p class="caption">ARBOR Bamboo Sketch Skateboard <strong>$129.99</strong></p></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                    <div class="thumbnail noborder">
                        <a href="#travel3" data-toggle="modal"><img src="images/travel/travel3.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#travel3" data-toggle="modal"><p class="caption">ELEMENT Desert Oasis Skateboard <strong>$119.99</strong></p></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                    <div class="thumbnail noborder">
                        <a href="#travel4" data-toggle="modal"><img src="images/travel/travel4.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#travel4" data-toggle="modal"><p class="caption">ELEMENT Spaced Out Skateboard <strong>$98.99</strong></p></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                    <div class="thumbnail noborder">
                        <a href="#travel5" data-toggle="modal"><img src="images/travel/travel5.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#travel5" data-toggle="modal"><p class="caption">REAL Retro Bit Skateboard <strong>$109.99</strong></p></a>
                        </div>
                    </div>
                </div>
				
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                    <div class="thumbnail noborder">
                        <a href="#travel6" data-toggle="modal"><img src="images/travel/travel6.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#travel6" data-toggle="modal"><p class="caption">GLOBE Banshee Skateboard <strong>$116.99</strong></p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                    <div class="thumbnail noborder">
                        <a href="#travel7" data-toggle="modal"><img src="images/travel/travel7.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#travel7" data-toggle="modal"><p class="caption">Leader KAGERO 2015 <strong>$849.99</strong></p></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                    <div class="thumbnail noborder">
                        <a href="#travel8" data-toggle="modal"><img src="images/travel/travel8.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#travel8" data-toggle="modal"><p class="caption">Leader RENOVATIO <strong>$849.99</strong></p></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                    <div class="thumbnail noborder">
                        <a href="#travel9" data-toggle="modal"><img src="images/travel/travel9.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#travel9" data-toggle="modal"><p class="caption">FSA Carbon Pro Track Crankset <strong>$300.00</strong></p></a>
                        </div>
                    </div>
                </div>
				
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                    <div class="thumbnail noborder">
                        <a href="#travel10" data-toggle="modal"><img src="images/travel/travel10.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#travel10" data-toggle="modal"><p class="caption">Full Windsor Nutter Multi-Tool <strong>$39.99</strong></p></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                    <div class="thumbnail noborder">
                        <a href="#travel11" data-toggle="modal"><img src="images/travel/travel11.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#travel11" data-toggle="modal"><p class="caption">Restrap Loader Messenger Bag (24L) <strong>$46.00</strong></p></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                    <div class="thumbnail noborder">
                        <a href="#travel12" data-toggle="modal"><img src="images/travel/travel12.jpg" class="img-responsive"></a>
                        <div class="polaroid-grid-3">
                            <a href="#travel12" data-toggle="modal"><p class="caption">Restrap Loader Messenger Bag (30L) <strong>$54.50</strong></p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	
	
	
	
        <!-- Community Section -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 community text-center">
                <!-- <img src="img/split1.jpg" class="img-responsive"> -->
            <h1 class="bigscribble">We're more than just a store</h1>
            <h2 class="scribble">We are an ever-growing <u>commmunity</u> of crafters, designers and daydreamers</h2>
            <center>
                <a class="a.btn btn-info btn-lg">Read more</a>
            </center>
            <!-- Jobs and Community -->
            <div class="col-lg-6 col-md-6 col-sm-6 hidden-xs jobsandcommunity">
                <h1 class="bigscribble">Jobs</h1>
                <p class="caption">Full-time / Part-time / Internships</p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 hidden-xs jobsandcommunity">
                <h1 class="bigscribble">Community</h1>
                <p class="caption">Meet & Greets / Collaborations / Events</p>
            </div>
        </div>




        <!-- Crew Section -->
        <div class="container">
            <div class="row">
                <div class="container crew">
                    <h1>The Crew</h1>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                    <div class="thumbnail noborder">
                        <a href="#courtney" data-toggle="modal"><img src="images/crew/courtney1.jpg" class="img img-circle img-responsive polaroid-grid-4 crewicon"></a>
                        <a href="#courtney" data-toggle="modal"><h2 class="scribble text-center crewname">Courtney Andrews</h2></a>
                        <div class="polaroid-grid-3">
                            <p class="caption">
                                Have a chance to catch one of our <b>Meet & Greets</b> recently?
                                <b>Courtney</b> organises our monthly meetups! When she isn't preoccupied with that,
                                she's an avid traveller, photographer and a natural-born crafter.
                            </p>
                        </div>
                    </div>
                </div>
			
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                    <div class="thumbnail noborder">
                        <a href="#brea" data-toggle="modal"><img src="images/crew/brea1.jpg" class="img img-circle img-responsive polaroid-grid-4 
					crewicon"></a>
                        <a href="#brea" data-toggle="modal"><h2 class="scribble text-center crewname">Brea Grant</h2></a>
                        <div class="polaroid-grid-3">
                            <p class="caption">
                                Got a <b>Local Colour</b> Design or Print that you hold close to your heart? 
                                Chances are that <b>Brea</b> drew up the sketches and markups for them! 
                                She's our resident brainstormer, daydreamer, and scribbler/doodler.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                    <div class="thumbnail noborder">
                        <a href="#zac" data-toggle="modal"><img src="images/crew/zac1.jpg" class="img img-circle img-responsive polaroid-grid-4 
					crewicon"></a>
                        <a href="#zac" data-toggle="modal"><h2 class="scribble text-center crewname">Zac Farro</h2></a>
                        <div class="polaroid-grid-3">
                            <p class="caption">
                                <b>Zac</b>'s persnickety approach keeps the <b>Local Colour</b> 
                                orders organized and the space super tidy. 
                                When he’s not wrapped up in scheduling delivery orders, 
                                he is always willing to lend a hand with the reprint requests.
                            </p>
                        </div>
                    </div>
                </div>
			
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-6">
                    <div class="thumbnail noborder">
                        <div class="polaroid-grid-3">
                            <h1 class="caption meetthecrewheading">Local Colour</h1>
                            <p class="caption">
                                is made up of more than just <b>Courtney</b>'s captive eye for detail, 
                                <b>Brea</b>'s spontaneous doodles and sketches and <b>Zac</b>'s OCD when it comes to delivery orders and schedules,
                                it is also made up of an amazing family / crew / community of designers, crafters, photographers, bloggers and more!
                            </p>
                            <p class="caption">Head over to the <b>About</b> page and meet the rest of the <b>Local Colour</b> Crew!</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
	
	
	
	
	
	<!-- Sketches Collage -->
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sketches">
	</div>
	
	
	
	
        <!-- Footer -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row newsletter">
                <div class="container">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 newslettercontent">
                        <h1>Want to get in touch?</h1>
                        <p>Join our Mailing List to stay up to date with our community of designers, retailers and more!</p>

                        <form class="form-inline">
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail3">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Enter your email">
                            </div>
                            <button type="submit" class="btn btn-newsletter">Sign me up</button>
                        </form>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 newslettercontent">
                        <h1>Go Social!</h1>
                        <p>Receive updates without us bombarding your email weekly!</p>
                        <a><i class="fa fa-facebook fa-2x"></i></a>
                        <a><i class="fa fa-twitter fa-2x"></i></a>
                        <a><i class="fa fa-youtube fa-2x"></i></a>
                        <a><i class="fa fa-tumblr fa-2x"></i></a>
                        <a><i class="fa fa-pinterest-p fa-2x"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <footer class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="container">
                    <div class="col-lg-2 col-md-2 col-sm-2 footercontent">
                        <center>
                            <img src="images/visa.png" class="img-responsive">
                        </center>
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









        <!-- Item Modal Window Pop Ups -->

        <!-- Popular Item 1 Modal Pop-Up -->
        <div id="pop1" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h1>Floral Summer Dress</h1>
                </div>
                <div class="modal-body">
                    <img src="images/popular/pop1.jpg" class="img-responsive pull-left">
                    <small>"Floral Summer Dress" Designed by <b>Ellie Bartowski</b></small>
                    <hr>

                    <ul>
                        <li class="inline"><button class="btn btn-size">XS</button></li>
                        <li class="inline"><button class="btn btn-size">S</button></li>
                        <li class="inline"><button class="btn btn-size">M</button></li>
                        <li class="inline"><button class="btn btn-size">L</button></li>
                        <li class="inline"><button class="btn btn-size">XL</button></li>
                    </ul>

                    <p class="inline cutprice">$21.99</p> <p><strong>$16.99</strong></p>
                    <a class="a.btn btn-addtocart btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> <small>Add to Cart</small></a>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
        <!-- Popular Item 2 Modal Pop-Up -->
        <div id="pop2" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h1>Baseball Passion Long Sleeve</h1>
                </div>
                <div class="modal-body">
                    <img src="images/popular/pop2.jpg" class="img-responsive pull-left">
                    <small>"Baseball Passion Long Sleeve" Designed by <b>Brea Grant</b></small>
                    <hr>

                    <ul>
                        <li class="inline"><button class="btn btn-size">XS</button></li>
                        <li class="inline"><button class="btn btn-size">S</button></li>
                        <li class="inline"><button class="btn btn-size">M</button></li>
                        <li class="inline"><button class="btn btn-size">L</button></li>
                        <li class="inline"><button class="btn btn-size">XL</button></li>
                    </ul>

                    <p class="inline cutprice">$16.99</p> <p><strong>$12.99</strong></p>
                    <a class="a.btn btn-addtocart btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> <small>Add to Cart</small></a>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
        <!-- Popular Item 3 Modal Pop-Up -->
        <div id="pop3" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h1>Round/Gold/Vintage Shades</h1>
                </div>
                <div class="modal-body">
                    <img src="images/popular/pop3.jpg" class="img-responsive pull-left">
                    <small>"Round/Gold/Vintage Shades" Designed by <b>Valerie Baker</b></small>
                    <hr>

                    <p>One Size fit</p>

                    <p class="inline cutprice">$11.99</p> <p><strong>$9.99</strong></p>
                    <a class="a.btn btn-addtocart btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> <small>Add to Cart</small></a>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
        <!-- Popular Item 4 Modal Pop-Up -->
        <div id="pop4" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h1>Grey/Black Striped Cardigan</h1>
                </div>
                <div class="modal-body">
                    <img src="images/popular/pop4.jpg" class="img-responsive pull-left">
                    <small>"Grey/Black Striped Cardigan" Designed by <b>Zac Farro</b></small>
                    <hr>

                    <ul>
                        <li class="inline"><button class="btn btn-size">XS</button></li>
                        <li class="inline"><button class="btn btn-size">S</button></li>
                        <li class="inline"><button class="btn btn-size">M</button></li>
                        <li class="inline"><button class="btn btn-size">L</button></li>
                        <li class="inline"><button class="btn btn-size">XL</button></li>
                    </ul>

                    <p class="inline cutprice">$18.99</p> <p><strong>$15.99</strong></p>
                    <a class="a.btn btn-addtocart btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> <small>Add to Cart</small></a>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
        <!-- Popular Item 5 Modal Pop-Up -->
        <div id="pop5" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h1>Grey Peep Toe Slingbacks</h1>
                </div>
                <div class="modal-body">
                    <img src="images/popular/pop5.jpg" class="img-responsive pull-left">
                    <small>"Grey Peep Toe Slingbacks" Designed by <b>Eleanor Douglas</b></small>
                    <hr>

                    <div class="col-lg-7 sizeandtype">
                        <label class="inline"><small>Size: </small><label>
                                <select class="selectpicker form-control input-sm">
                                    <optgroup label="Women's Sizes">
                                        <option>Women's 7</option>
                                        <option>Women's 8</option>
                                        <option>Women's 9</option>
                                        <option>Women's 10</option>
                                        <option>Women's 11</option>
                                    </optgroup>
                                </select>
                                </div>

                                <p class="inline cutprice">$45.99</p> <p><strong>$31.99</strong></p>
                                <a class="a.btn btn-addtocart btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> <small>Add to Cart</small></a>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" data-dismiss="modal">Back</button>
                                </div>
                                </div>
                                </div>
        <!-- Popular Item 6 Modal Pop-Up -->
        <div id="pop6" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h1>Black Beach Low-Cuts</h1>
                </div>
                <div class="modal-body">
                    <img src="images/popular/pop6.jpg" class="img-responsive pull-left">
                    <small>"Black Beach Low-Cuts" Designed by <b>Park Sheridan</b></small>
                    <hr>

                    <div class="col-lg-7 sizeandtype">
                        <label class="inline"><small>Size: </small><label>
                                <select class="selectpicker form-control input-sm">
                                    <optgroup label="Men's Sizes">
                                        <option>Men's 9</option>
                                        <option>Men's 10</option>
                                        <option>Men's 11</option>
                                        <option>Men's 12</option>
                                        <option>Men's 13</option>
                                    </optgroup>
                                    <optgroup label="Women's Sizes">
                                        <option>Women's 7</option>
                                        <option>Women's 8</option>
                                        <option>Women's 9</option>
                                        <option>Women's 10</option>
                                        <option>Women's 11</option>
                                    </optgroup>
                                </select>
                                </div>

                                <p class="cutprice">$29.99</p> <p><strong>$26.99</strong></p>
                                <a class="a.btn btn-addtocart btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> <small>Add to Cart</small></a>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" data-dismiss="modal">Back</button>
                                </div>
                                </div>
                                </div>
	
	
	
	
        <!-- New Item 1 Modal Pop-Up -->
        <div id="new1" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h1>Light Sunset Overshirt</h1>
                </div>
                <div class="modal-body">
                    <img src="images/new/new1.jpg" class="img-responsive pull-left">
                    <small>"Light Sunset Overshirt" Designed by <b>Courtney Andrews</b></small>
                    <hr>

                    <ul>
                        <li class="inline"><button class="btn btn-size">XS</button></li>
                        <li class="inline"><button class="btn btn-size">S</button></li>
                        <li class="inline"><button class="btn btn-size">M</button></li>
                        <li class="inline"><button class="btn btn-size">L</button></li>
                        <li class="inline"><button class="btn btn-size">XL</button></li>
                    </ul>

                    <p><strong>$8.99</strong></p>
                    <a class="a.btn btn-addtocart btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> <small>Add to Cart</small></a>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
        <!-- New Item 2 Modal Pop-Up -->
        <div id="new2" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h1>Leather Army Zip Jacket</h1>
                </div>
                <div class="modal-body">
                    <img src="images/new/new2.jpg" class="img-responsive pull-left">
                    <small>"Leather Army Zip Jacket" Designed by <b>Park Sheridan</b></small>
                    <hr>

                    <ul>
                        <li class="inline"><button class="btn btn-size">XS</button></li>
                        <li class="inline"><button class="btn btn-size">S</button></li>
                        <li class="inline"><button class="btn btn-size">M</button></li>
                        <li class="inline"><button class="btn btn-size">L</button></li>
                        <li class="inline"><button class="btn btn-size">XL</button></li>
                    </ul>

                    <p><strong>$41.99</strong></p>
                    <a class="a.btn btn-addtocart btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> <small>Add to Cart</small></a>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
        <!-- New Item 3 Modal Pop-Up -->
        <div id="new3" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h1>Cream Navy Wintercoat</h1>
                </div>
                <div class="modal-body">
                    <img src="images/new/new3.jpg" class="img-responsive pull-left">
                    <small>"Cream Navy Wintercoat" Designed by <b>Hallie James</b></small>
                    <hr>

                    <ul>
                        <li class="inline"><button class="btn btn-size">XS</button></li>
                        <li class="inline"><button class="btn btn-size">S</button></li>
                        <li class="inline"><button class="btn btn-size">M</button></li>
                        <li class="inline"><button class="btn btn-size">L</button></li>
                        <li class="inline"><button class="btn btn-size">XL</button></li>
                    </ul>

                    <p><strong>$34.99</strong></p>
                    <a class="a.btn btn-addtocart btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> <small>Add to Cart</small></a>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
        <!-- New Item 4 Modal Pop-Up -->
        <div id="new4" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h1>Burgundy Pattern Sweater</h1>
                </div>
                <div class="modal-body">
                    <img src="images/new/new4.jpg" class="img-responsive pull-left">
                    <small>"Burgundy Pattern Sweater" Designed by <b>Simon Tam</b></small>
                    <hr>

                    <ul>
                        <li class="inline"><button class="btn btn-size">XS</button></li>
                        <li class="inline"><button class="btn btn-size">S</button></li>
                        <li class="inline"><button class="btn btn-size">M</button></li>
                        <li class="inline"><button class="btn btn-size">L</button></li>
                        <li class="inline"><button class="btn btn-size">XL</button></li>
                    </ul>

                    <p><strong>$17.99</strong></p>
                    <a class="a.btn btn-addtocart btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> <small>Add to Cart</small></a>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
        <!-- New Item 5 Modal Pop-Up -->
        <div id="new5" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h1>Dye-Cast Low-Cuts</h1>
                </div>
                <div class="modal-body">
                    <img src="images/new/new5.jpg" class="img-responsive pull-left">
                    <small>"Dye-Cast Low-Cuts" Designed by <b>Brea Grant</b></small>
                    <hr>

                    <div class="col-lg-7 sizeandtype">
                        <label class="inline"><small>Size: </small><label>
                                <select class="selectpicker form-control input-sm">
                                    <optgroup label="Women's Sizes">
                                        <option>Women's 7</option>
                                        <option>Women's 8</option>
                                        <option>Women's 9</option>
                                        <option>Women's 10</option>
                                        <option>Women's 11</option>
                                    </optgroup>
                                </select>
                                </div>

                                <p><strong>$26.99</strong></p>
                                <a class="a.btn btn-addtocart btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> <small>Add to Cart</small></a>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" data-dismiss="modal">Back</button>
                                </div>
                                </div>
                                </div>
        <!-- New Item 6 Modal Pop-Up -->
        <div id="new6" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h1>Brown Messenger Bag</h1>
                </div>
                <div class="modal-body">
                    <img src="images/new/new6.jpg" class="img-responsive pull-left">
                    <small>"Brown Messenger Bag" Designed by <b>Zoe Washbourne</b></small>
                    <hr>

                    <p>One Size fit</p>

                    <p><strong>$29.99</strong></p>
                    <a class="a.btn btn-addtocart btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> <small>Add to Cart</small></a>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>




        <!-- Photography Item 1 Modal Pop-Up -->
        <div id="photography1" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h1>Instant Mini 8 Camera</h1>
                </div>
                <div class="modal-body">
                    <img src="images/photography/photography1.jpg" class="img-responsive pull-left photographyitemviewsize">
                    <p>Make sharp, saturated, credit card-sized photos that develop instantly!</p>
                    <hr>

                    <div class="col-lg-5 sizeandtype">
                        <label class="inline"><small>Colour: </small><label>
                                <select class="selectpicker form-control input-sm">
                                    <optgroup label="Pick a colour!">
                                        <option>White</option>
                                        <option>Black</option>
                                        <option>Sky Blue</option>
                                        <option>Avocado</option>
                                        <option>Vintage Pink</option>
                                        <option>Sunset Yellow</option>
                                    </optgroup>
                                </select>
                                </div>
                                <p class="cutprice">$129.99</p> <p><strong>$95.00</strong></p>
                                <a class="a.btn btn-addtocart btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> <small>Add to Cart</small></a>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" data-dismiss="modal">Back</button>
                                </div>
                                </div>
                                </div>
        <!-- Photography Item 2 Modal Pop-Up -->
        <div id="photography2" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h1>Instant Photo Lab</h1>
                </div>
                <div class="modal-body">
                    <img src="images/photography/photography2.jpg" class="img-responsive pull-left photographyitemviewsize">
                    <p>Make Polaroid-like prints from photos you've taken on your phone or tablet, instantly!</p>
                    <hr>

                    <p class="cutprice">$239.99</p> <p><strong>$199.99</strong></p>
                    <a class="a.btn btn-addtocart btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> <small>Add to Cart</small></a>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
        <!-- Photography Item 3 Modal Pop-Up -->
        <div id="photography3" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h1>Instant Film (20 Pack)</h1>
                </div>
                <div class="modal-body">
                    <img src="images/photography/photography3.jpg" class="img-responsive pull-left photographyitemviewsize">
                    <p>Film for Polaroid 600 and SX70 cameras</p>
                    <hr>

                    <div class="col-lg-5 sizeandtype">
                        <label class="inline"><small>Film Type: </small><label>
                                <select class="selectpicker form-control input-sm">
                                    <optgroup label="Pick a colour!">
                                        <option>White Border</option>
                                        <option>Black Border</option>
                                        <option>Blue Border</option>
                                        <option>Red Border</option>
                                        <option>Green Border</option>
                                        <option>Pink Border</option>
                                        <option>Yellow Border</option>
                                        <option>No Border</option>
                                    </optgroup>
                                </select>
                                </div>
                                <p><strong>$23.50</strong></p>
                                <a class="a.btn btn-addtocart btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> <small>Add to Cart</small></a>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" data-dismiss="modal">Back</button>
                                </div>
                                </div>
                                </div>
        <!-- Photography Item 4 Modal Pop-Up -->
        <div id="photography4" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h1>Instant Camera iPhone Decal</h1>
                </div>
                <div class="modal-body">
                    <img src="images/photography/photography4.jpg" class="img-responsive pull-left photographyitemviewsize">
                    <p>An easy to apply decal that turns your iPhone into analog awesome!</p>
                    <hr>

                    <div class="col-lg-5 sizeandtype">
                        <label class="inline"><small>Sticker Size: </small><label>
                                <select class="selectpicker form-control input-sm">
                                    <optgroup label="iPhone Sticker Sizes">
                                        <option>iPhone 3</option>
                                        <option>iPhone 4</option>
                                        <option>iPhone 5</option>
                                        <option>iPhone 6</option>
                                    </optgroup>
                                </select>
                                </div>
                                <p class="cutprice">$6.00</p> <p><strong>$3.00</strong></p>
                                <a class="a.btn btn-addtocart btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> <small>Add to Cart</small></a>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" data-dismiss="modal">Back</button>
                                </div>
                                </div>
                                </div>
        <!-- Photography Item 5 Modal Pop-Up -->
        <div id="photography5" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h1>Charging Cable Keychain</h1>
                </div>
                <div class="modal-body">
                    <img src="images/photography/photography5.jpg" class="img-responsive pull-left photographyitemviewsize">
                    <p>A cute fashion statement with a hidden charging cable inside!</p>
                    <hr>

                    <div class="col-lg-5 sizeandtype">
                        <label class="inline"><small>Colour: </small><label>
                                <select class="selectpicker form-control input-sm">
                                    <optgroup label="Pick a Colour!">
                                        <option>Orange</option>
                                        <option>Avocado</option>
                                        <option>Sky Blue</option>
                                        <option>Vintage Pink</option>
                                    </optgroup>
                                </select>
                                </div>
                                <p class="cutprice">$65.00</p> <p><strong>$59.99</strong></p>
                                <a class="a.btn btn-addtocart btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> <small>Add to Cart</small></a>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" data-dismiss="modal">Back</button>
                                </div>
                                </div>
                                </div>
        <!-- Photography Item 6 Modal Pop-Up -->
        <div id="photography6" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h1>Gee-Whiz Phone Projector</h1>
                </div>
                <div class="modal-body">
                    <img src="images/photography/photography6.jpg" class="img-responsive pull-left photographyitemviewsize">
                    <p>Assemble this vintage inpsired cardboard projector for instant drive-in-style movies straight from your phone!</p>
                    <hr>

                    <p class="cutprice">$34.00</p> <p><strong>$28.99</strong></p>
                    <a class="a.btn btn-addtocart btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> <small>Add to Cart</small></a>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
        <!-- Photography Item 7 Modal Pop-Up -->
        <div id="photography7" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h1>Cable Caddy</h1>
                </div>
                <div class="modal-body">
                    <img src="images/photography/photography7.gif" class="img-responsive pull-left photographyitemviewsize">
                    <p>Keep all of your cords and phone accessories bundled up safely in one, fancy rolled up package!</p>
                    <hr>

                    <p><strong>$20.00</strong></p>
                    <a class="a.btn btn-addtocart btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> <small>Add to Cart</small></a>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
        <!-- Photography Item 8 Modal Pop-Up -->
        <div id="photography8" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h1>Plaid Camera Satchel</h1>
                </div>
                <div class="modal-body">
                    <img src="images/photography/photography8.jpg" class="img-responsive pull-left photographyitemviewsize">
                    <p>A perky plaid camera bag, perfect for day tripping!</p>
                    <hr>

                    <p><strong>$45.00</strong></p>
                    <a class="a.btn btn-addtocart btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> <small>Add to Cart</small></a>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>





        <!-- Crew Modal Window Pop-Ups -->
        
        <!-- Courtney's Modal Pop-Up -->
        <div id="courtney" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h1>Courtney Andrews</h1>
                </div>
                <div class="modal-body">
                    <p><img src="images/crew/courtney2.jpg" class="img-responsive crewicon pull-left">
                        Have a chance to catch one of our <b>Meet & Greets</b> recently?
                        <b>Courtney</b> organises our monthly meetups! When she isn't preoccupied with that,
                        she's an avid traveller, photographer and a natural-born crafter.</p>

                    <hr>
                    <p><b>Fun fact:</b></p>
                    <p>In her spare time, <b>Courtney</b> livens up the office space by singing oldies and goldies. 
                        Some may say that she's "the quiet one" but when she picks up <b>Zac</b>'s guitar and starts strummin' and hummin' away,
                        you're the one lost for words. (She likes to play Otis Redding's "Sittin' at the Dock of the Bay" quite often.)</p>

                    <hr>
                    <p class="loves"><b>Courtney Loves:</b></h3> <p><i>"Vanilla Hot Chocolate, Star Wars marathons, 
                            reading and Friday Night Jam Sessions."</i></p>
                    <p class="hates"><b>Courtney Hates:</b></h3> <p><i>"Horror movies, Two and a Half Men and books with bad endings."</i></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
        <!-- Brea's Modal Pop-Up -->
        <div id="brea" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h1>Brea Grant</h1>
                </div>
                <div class="modal-body">
                    <p><img src="images/crew/brea2.jpg" class="img-responsive crewicon pull-left">
                        Got a <b>Local Colour</b> Design or Print that you hold close to your heart? 
                        Chances are that <b>Brea</b> drew up the sketches and markups for them! 
                        She's our resident brainstormer, daydreamer, and scribbler/doodler.</p>

                    <hr>
                    <p><b>Fun fact:</b></p>
                    <p>No matter what time of the day it may be, <b>Brea</b>'s always off somewhere with her sketchpad 
                        and her thrusty arsenal of markers either sketching or making caricatures of the crew.
                        (She drew a caricature of <b>Zac</b> once. He...didn't like it.)</p>

                    <hr>
                    <p class="loves"><b>Brea Loves:</b></h3> <p><i>"Comic Books, Sharpies, Copic Markers, Firefly 
                            and eating breakfast food for dinner."</i></p>
                    <p class="hates"><b>Brea Hates:</b></h3> <p><i>"Artist's block, techno 
                            and when markers run dry halfway through a sketch."</i></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
        <!-- Zac's Modal Pop-Up -->
        <div id="zac" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h1>Zac Farro</h1>
                </div>
                <div class="modal-body">
                    <p><img src="images/crew/zac2.jpg" class="img-responsive crewicon pull-left">
                        <b>Zac</b>'s persnickety approach keeps the <b>Local Colour</b> 
                        orders organized and the space super tidy. 
                        When he’s not wrapped up in scheduling delivery orders, 
                        he is always willing to lend a hand with the reprint requests.</p>

                    <hr>
                    <p><b>Fun fact:</b></p>
                    <p>Though <b>Zac</b> is known as the "neat and organized one", he tends to be the "clumsy one"
                        when he goes out to get something to eat. (On one occassion, <b>Zac</b> has managed to spill coffee, soup
                        and pasta all over his clothes within the span of 5 hours in one day! Ever since the coffee, soup
                        and pasta incident, he resorted to bringing spare clothes to work...just in case.)</p>

                    <hr>
                    <p class="loves"><b>Zac Loves:</b></h3> <p><i>"Star Trek, Comic-Con, Minecraft, roadtrips 
                            and getting Chipotle burritos for lunch."</i></p>
                    <p class="hates"><b>Zac Hates:</b></h3> <p><i>"The Big Bang Theory, coffee stains, public restrooms 
                            and when <b>Courtney</b> steals the guitar."</i></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
        
        
        
        
        <!-- Javascript -->
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>