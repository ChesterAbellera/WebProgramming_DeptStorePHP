<!DOCTYPE html>
<html>
    <head>
        <title>Local Colour | Login</title>
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
        <?php
        if (!isset($username)) {
            $username = '';
        }
        ?>




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

                            <li><a href="register.php">Register <span class="glyphicon glyphicon-pencil"></span></a></li>
                            <li><a href="">0 Items <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
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





        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 loginbackground text-center">
            <h1 class="loginheaderscribble">Welcome Back</h1>

            <form class="form" action="checkLogin.php" method="POST">
                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail3">Email address</label>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4">
                            <input class="form-control loginregister-form" 
                                   type="text" 
                                   name="username" 
                                   id="exampleInputEmail3" 
                                   placeholder="Email"
                                   value="<?php echo $username; ?>" />
                            <span id="usernameError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['username'])) {
                                    echo $errorMessage['username'];
                                }
                                ?>
                            </span>

                            <input class="form-control loginregister-form"
                                   type="password"
                                   name="password"
                                   id="exampleInputEmail3"
                                   placeholder="Password"
                                   value="" />
                            <span id="passwordError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['password'])) {
                                    echo $errorMessage['password'];
                                }
                                ?>
                            </span>
                        </div>
                    </div>

                    <!-- <label class="checkbox">
                        <input type="checkbox" value="remember-me">
                        Keep me signed in
                    </label> -->



                    <div class="registerandforgottenpassword">
                        <input type="submit" value="Login" name="login" class="btn btn-login"/>
                        <a href="register.php">Register</a>
                    </div>
                </div>
            </form>
            <div class="registerandforgottenpassword">
                <a href="forgotPassword.php">Forgot your Password?</a>
            </div>
        </div>




        <!-- Javascript -->
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>