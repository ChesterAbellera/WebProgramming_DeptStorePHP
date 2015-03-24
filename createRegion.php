 <?php

require_once 'Region.php';
require_once 'Connection.php';
require_once 'RegionTableGateway.php';
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
$regionname = filter_input(INPUT_POST, 'regionname', FILTER_SANITIZE_STRING);
$regionalmanager = filter_input(INPUT_POST, 'regionalmanager', FILTER_SANITIZE_STRING);
$phonenumber = filter_input(INPUT_POST, 'phonenumber', FILTER_SANITIZE_STRING);
$email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
/* -------------------------------------------------------------------------- */




/* Empty error message array that prints out appropriate warnings 
  depending on the user's choice of action
  by using conditions such as "if" statements */
$errorMessage = array();
if ($regionname === FALSE || $regionname === '') {
    $errorMessage['regionname'] = '* Hey, you forgot to fill in the Region Name! Try it again!<br/>';
}

$errorMessage = array();
if ($regionalmanager === FALSE || $regionalmanager === '') {
    $errorMessage['regionalmanager'] = '* Hey, you forgot to fill in the Regional Manager! Try it again!<br/>';
}

$errorMessage = array();
if ($phonenumber === FALSE || $phonenumber === '') {
    $errorMessage['phonenumber'] = '* Hey, you forgot to fill in the Phone Number! Try it again!<br/>';
}

$errorMessage = array();
if ($email === FALSE || $email === '') {
    $errorMessage['email'] = '* Hey, you forgot to fill in the Email form! Try it again!<br/>';
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
    $gateway =  new RegionTableGateway($connection);
    $regionnumber = $gateway->insertRegion($regionname, $regionalmanager, $phonenumber, $email);
    
    
    /* If there are no errors that occur, the user will be redirected to the homepage */
    header("Location: dashboard.php");
    }
    else 
    {
    require 'createRegionForm.php';
    }