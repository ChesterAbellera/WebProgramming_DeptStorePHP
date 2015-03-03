<?php
require_once 'Email.php';
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
$emailaddress = filter_input(INPUT_POST, 'emailaddress', FILTER_SANITIZE_STRING);
/*----------------------------------------------------------------------------*/

/* Empty error message array that prints out appropriate warnings 
   depending on the user's choice of action 
   by using conditions such as "if" statements */
$errorMessage = array();
if ($emailaddress === FALSE || $emailaddress === '') {
    $errorMessage['emailaddress'] = '* Hey! You forgot to type in your username!<br/>';
}
/*----------------------------------------------------------------------------*/

if (empty($errorMessage)) {
    if (!isset($_SESSION['emails'])) {
        $emails = array();
    }
    else {
        $emails = $_SESSION['emails'];
    }

    $email = new Email($emailaddress);

    $emails[] = $email;

    $_SESSION['emails'] = $emails;
    
    /* If there are no errors that occur, the user will be redirected to a different page */
    header('Location: renewPassword.php');
}
else {
    require 'forgotPassword.php';
}
/* If errors do occur, the user will NOT be permitted to continue 
   to the homepage and will be redirected back to the index page */