<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Threadless.com</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        
        <!-- Favicon Icon Link -->
        <link rel="icon" type="image/x-icon" href="images/threadless_favicon.ico">
    </head>
    
    
    
    
    <body>
        <a href="home.php"><img src="images/threadless_black.png"></a>
        <h2>Welcome to Threadless!</h2>
        <?php
        if (!isset($username)) {
            $username = '';
        }
        ?>
        <form action="checkLogin.php" method="POST">
            <table id="t01"
                   border="0">
                <tbody>
                    <tr>
                        <th>Username : </th>
                        <td>
                            <input type="text"
                                   name="username"
                                   value="<?php echo $username; ?>" />
                            <span id="usernameError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['username'])) {
                                    echo $errorMessage['username'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Password : </th>
                        <td>
                            <input type="password" name="password" value="" />
                            <span id="passwordError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['password'])) {
                                    echo $errorMessage['password'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr></tbody>
            </table>
            
            
            
            
            <br>
            <input type="submit" value="Login" name="login" />
            <br>
            <br>
            <p><a href="register.php">Register</a></p>
            <p><a href="forgotPassword.php">Forgot your password?</a></p>
                     
                

        </form>
    </body>




</html>