<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Threadless | Password Form</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        
        <!-- Favicon Icon Link -->
        <link rel="icon" type="image/x-icon" href="images/threadless_favicon.ico">
    </head>
    <body>
        <a href="home.php"><img src="images/threadless_black.png"></a>
        <h2>Can't remember your password ?</h2>
        <h3>Type in your E-Mail Address to have a password reset code sent to you!</h3>

        <form id="emailForm"
              action="checkEmail.php"
              method="POST">
            <table id="t01"
                   border="0">
                <tbody>
                    <tr>
                        <th>E-Mail Address : </th>
                        <td>
                            <input type="text" name="emailaddress" value="" />
                            <span id="emailaddressError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['emailaddress'])) {
                                    echo $errorMessage['emailaddress'];
                                }
                                ?>                                 
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>

               
                    <br>
                    <input type="submit" 
                           value="Send" />
                    <br>
                    <p><a href="login.php">Go back?</a></p>
               
                

        </form>
        <!-- Link used to refer to the email.js file 
             to execute error checks within the user input -->
        <script type="text/javascript" src="js/email.js"></script>
    </body>




</html>