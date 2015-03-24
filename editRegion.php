 <?php
require_once 'Region.php';
require_once 'Connection.php';
require_once 'RegionTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new RegionTableGateway($connection);

$regionnumber = $_POST['editRegionnumber'];
$regionname = $_POST['regionname'];
$regionalmanager = $_POST['regionalmanager'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];


/* Empty error message array that prints out appropriate warnings 
  depending on the user's choice of action
  by using conditions such as "if" statements */
$errorMessage = array();
if ($regionname === FALSE || $regionname === '') {
    $errorMessage['regionname'] = '* Hey, you forgot to fill in the Region Name! Try it again!<br/>';
}

if ($regionalmanager === FALSE || $regionalmanager === '') {
    $errorMessage['regionalmanager'] = '* Hey, you forgot to fill in the name of your Regional Manager Name! Try it again!<br/>';
}

if ($phonenumber === FALSE || $phonenumber === '') {
    $errorMessage['phonenumber'] = '* Hey, you forgot to fill in your Region Phone Number! Try it again!<br/>';
}

if ($email === FALSE || $email === '') {
    $errorMessage['email'] = '* Hey, you forgot to fill in the Region Email Address! Try it again!<br/>';
}




if (empty($errorMessage)) 
{
    $gateway->updateRegion($regionnumber, $regionname, $regionalmanager, $phonenumber, $email);
    header('Location: viewRegions.php');
}
else 
{
    require 'createRegionForm.php';
}