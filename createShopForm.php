<?php
$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';
?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Threadless | Create Shop</title>
        <!-- Link used to refer to the createShop.js file 
             to execute error checks within the user input -->
      
        <script type="text/javascript" src="js/shop.js"></script>  
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        
        <!-- Favicon Icon Link -->
        <link rel="icon" type="image/x-icon" href="images/threadless_favicon.ico">
    </head>
    
    
    
    
    <body>
        <a href="home.php"><img src="images/threadless_black.png"></a>
        <?php require 'toolbar.php' ?>
        <h2>Create Shop Form</h2>
        
        
        <!-- "form id="shopForm" is used to refer back to the form element 
              in the createShop.js file -->
        <form id="createShopForm"
              action="createShop.php" 
              method="POST"
              onsubmit="return validateCreateProgrammer(this);">
            <table id="t01"
                   border="0">
                <tbody>
                    <tr>
                        <th>Shop Address</th>
                        <td>
                            <input type="text" name="address" value="<?php 
                                if (isset($_POST) && isset($_POST['address'])){
                                echo $_POST['address'];
                                }
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
                            <input type="text" name="shopmanagername" value="<?php 
                                if (isset($_POST) && isset($_POST['shopmanagername'])){
                                echo $_POST['shopmanagername'];
                                }
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
                            <input type="text" name="phonenumber" value="<?php 
                                if (isset($_POST) && isset($_POST['phonenumber'])){
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
                        <th>Date Opened</th>
                        <td>
                            <input type="text" name="dateopened" value="<?php 
                                if (isset($_POST) && isset($_POST['dateopened'])){
                                echo $_POST['dateopened'];
                                }
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
                            <input type="text" name="url" value="<?php 
                                if (isset($_POST) && isset($_POST['url'])){
                                echo $_POST['url'];
                                }
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
                            <input type="text" name="regionnumber" value="<?php 
                                if (isset($_POST) && isset($_POST['regionnumber'])){
                                echo $_POST['regionnumber'];
                                }
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
            
            
            
            
            <br>
            <input type="submit" value="Save" name="createShop" />
            <input type="button" value="Cancel" name="cancel" onclick="document.location.href = 'home.php'" />
        
        
        
        
        </form>
    </body>




</html>