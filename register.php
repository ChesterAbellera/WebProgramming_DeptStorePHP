<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Threadless | Register</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        
        <!-- Favicon Icon Link -->
        <link rel="icon" type="image/x-icon" href="images/threadless_favicon.ico">
    </head>
    
    
    
    
    <body>
        <a href="home.php"><img src="images/threadless_black.png"></a>
        <h2>Sign Up</h2>

        <!-- "form id="registerForm" is used to refer back to the form element 
              in the register.js file -->
        <form id="registerForm" 
              action="checkRegister.php" 
              method="POST"
              onsubmit="return validateRegistration(this);">
            <table id="t01"
                   border="0">
                <tbody>
                    <tr>
                        <th>Username :</th>
                        <td>
                            <input type="text" name="username" value="<?php
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
                        </td>
                    </tr>
                    <tr>
                        <th>Password :</th>
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
                    <tr>
                        <th>Confirm Password :</th>
                        <td>
                            <input type="password" name="password2" value="" />
                            <span id="password2Error" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['password2'])) {
                                    echo $errorMessage['password2'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    </tbody>
            </table>
            
            
            
            
            <br>
                <input type="submit" value="Register" name="register" />
                <input type="button" value="Cancel" name="cancel" onclick="document.location.href = 'login.php'" />
        
        
        
        
        </form>
        <!-- Link used to refer back to the register.js file 
             to execute error checks within the user input. -->
        <script type="text/javascript" src="js/register.js"></script>
    </body>




</html>