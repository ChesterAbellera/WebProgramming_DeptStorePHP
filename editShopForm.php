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




<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Threadless | Edit Shop</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript" src="js/shop.js"></script>
        
        <!-- Favicon Icon Link -->
        <link rel="icon" type="image/x-icon" href="images/threadless_favicon.ico">
    </head>
    <body>
        <a href="home.php"><img src="images/threadless_black.png"></a>
        <?php require 'toolbar.php' ?>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <h2>Edit Shop Form</h2>
        
        <form id="editShopForm" name="editShopForm" action="editShop.php" method="POST">
            <input type="hidden" name="editID" value="<?php echo $id; ?>" />
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
                                else echo $row['address']
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
                                else echo $row['shopmanagername']
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
                                else echo $row['phonenumber']
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
                                else echo $row['dateopened']
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
                                else echo $row['url']
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
                                else echo $row['regionnumber']
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
            <input type="submit" value="Save" name="updateShop" />
            <input type="button" value="Cancel" name="cancel" onclick="document.location.href = 'home.php'" />
            

        </form>
    </body>




</html>