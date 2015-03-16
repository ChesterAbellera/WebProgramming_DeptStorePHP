<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Local Colour | Register</title>
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

                            <li><a href="login.php">Login <span class="glyphicon glyphicon-user"></span></a></li>
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




        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 registerbackground text-center">
            <h1 class="loginheaderscribble">Join the Local Colour Family</h1>
            <form class="form"
                  id="registerForm" 
                  action="checkRegister.php" 
                  method="POST"
                  onsubmit="return validateRegistration(this);">


                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail3">Email address</label>                                                     
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4">
                            <input class="form-control"
                                   type="text" 
                                   name="username"
                                   id="exampleInputEmail3"
                                   placeholder="Enter Email"
                                   value="<?php
                                   if (isset($_POST) && isset($_POST['username'])) {
                                       echo $_POST['username'];
                                   }
                                   ?>" />
                            <span id="usernameError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['username'])) {
                                    echo $errorMessage['username'];
                                }
                                ?>
                            </span>







                            <input class="form-control"
                                   type="password" 
                                   name="password" 
                                   id="exampleInputEmail3" 
                                   placeholder="Enter Password"
                                   value="" />
                            <span id="passwordError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['password'])) {
                                    echo $errorMessage['password'];
                                }
                                ?>
                            </span>

                            <input class="form-control"
                                   type="password" 
                                   name="password2" 
                                   id="exampleInputEmail3" 
                                   placeholder="Confirm Password"
                                   value="" />
                            <span id="passwordError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['password2'])) {
                                    echo $errorMessage['password2'];
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                </div>

                
            

            <div class="registerandforgottenpassword">
                <input class="btn btn-login" type="submit" value="Register" name="register" />
                <a href="login.php">Cancel</a>
            </div>
        </form>
        </div>




        <!-- Link used to refer back to the register.js file 
             to execute error checks within the user input. -->
        <script type="text/javascript" src="js/register.js"></script>
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>