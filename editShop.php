 <?php
require_once 'Shop.php';
require_once 'Connection.php';
require_once 'ShopTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new ShopTableGateway($connection);

$shopID = $_POST['editID'];
$address = $_POST['address'];
$shopmanagername = $_POST['shopmanagername'];
$phonenumber = $_POST['phonenumber'];
$url = $_POST['url'];
$dateopened = $_POST['dateopened'];
$regionnumber = $_POST['regionnumber'];


/* Empty error message array that prints out appropriate warnings 
  depending on the user's choice of action
  by using conditions such as "if" statements */
$errorMessage = array();
if ($address === FALSE || $address === '') {
    $errorMessage['address'] = '* Hey, you forgot to fill in the Shop Address! Try it again!<br/>';
}

if ($shopmanagername === FALSE || $shopmanagername === '') {
    $errorMessage['shopmanagername'] = '* Hey, you forgot to fill in the name of your Shop Manager! Try it again!<br/>';
}

if ($phonenumber === FALSE || $phonenumber === '') {
    $errorMessage['phonenumber'] = '* Hey, you forgot to fill in your Shop Phone Number! Try it again!<br/>';
}

if ($dateopened === FALSE || $dateopened === '') {
    $errorMessage['dateopened'] = '* Hey, you forgot to fill in when the Shop was opened! Try it again!<br/>';
}

if ($url === FALSE || $url === '') {
    $errorMessage['url'] = '* Hey, you forgot to fill in the Url Address of your shop! Try it again!<br/>';
}
if ($regionnumber === FALSE || $regionnumber === '') {
    $errorMessage['regionnumber'] = '* Hey, you forgot to fill in the Region Number of your shop! Try it again!<br/>';
}




if (empty($errorMessage)) 
{
    $gateway->updateShop($shopID, $address, $shopmanagername, $phonenumber, $url, $dateopened, $regionnumber);
    header('Location: dashboard.php');
}
else 
{
    require 'createShopForm.php';
}