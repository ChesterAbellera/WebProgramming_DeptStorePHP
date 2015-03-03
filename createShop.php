 <?php

require_once 'Shop.php';
require_once 'Connection.php';
require_once 'ShopTableGateway.php';
/* "require_once" means that a stored piece of information 
  will remain as an output by having to load it just once */


$id = session_id();
if ($id == "") {
    session_start();
}


/* ------------------------------------------
   FILTER_SANITIZE_ is used to filter out any 
   input characters that are not strings 
   -------------------------------------------------------
   The filter_input is commonly used for security purposes 
   to prevent hackers/attackers from attempting to access or crash the system
   -------------------------------------------------------------------------- */
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$shopmanagername = filter_input(INPUT_POST, 'shopmanagername', FILTER_SANITIZE_STRING);
$phonenumber = filter_input(INPUT_POST, 'phonenumber', FILTER_SANITIZE_STRING);
$dateopened = filter_input(INPUT_POST, 'dateopened', FILTER_SANITIZE_STRING);
$url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_STRING);
$regionnumber = filter_input(INPUT_POST, 'regionnumber', FILTER_SANITIZE_STRING);
/* -------------------------------------------------------------------------- */




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
/* ---------------------------------------------------------------------------- */
/*if (!isset($_SESSION['shops'])) {
    die("Illegal Request");
} else {
    $shops = $_SESSION['shops'];
}
/* ---------------------------------------------------------------------------- */

if (empty($errorMessage)) 
    {
    $connection = Connection::getInstance();
    $gateway =  new ShopTableGateway($connection);
    $shopID = $gateway->insertShop($address, $shopmanagername, $phonenumber, $dateopened, $url, $regionnumber);
    
    
    /* If there are no errors that occur, the user will be redirected to the homepage */
    header("Location: home.php");
    }
    else 
    {
    require 'createShopForm.php';
    }
/* If errors do occur, the user will NOT be permitted to continue 
   to the homepage and will be redirected back to the createShopForm page */