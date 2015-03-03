<?php
require_once 'User.php';
require_once 'Connection.php';
require_once 'UserTableGateway.php';
/* "require_once" means that a stored piece of information 
will remain as an output by having to load it just once */

$connection = Connection::getInstance();

$gateway = new UserTableGateway($connection);

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
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING);
/*----------------------------------------------------------------------------*/

/* Empty error message array that prints out appropriate warnings 
   depending on the user's choice of action 
   by using conditions such as "if" statements */
$errorMessage = array();
if ($username === FALSE || $username === '') {
    $errorMessage['username'] = '* Oh no, You left this Username field empty!';
}
else {
    // Execute a query to see if username already exists in the database
    $statement = $gateway->getUserByUsername($username);
    
    // If the username is in the database then add an error message
    // to the errorMessage array
    if ($statement->rowCount() !== 0) {
        $errorMessage['username'] = 'Sorry, that username already exists!<br/>';
    }
}

if ($password === FALSE || $password === '') {
    $errorMessage['password'] = '* Oops, you left this Password field empty!<br/>';
}

if ($password2 === FALSE || $password2 === '') {
    $errorMessage['password2'] = '* Re-enter your password HERE!<br/>';
}
else if ($password !== $password2) {
    $errorMessage['password2'] = '* Pssst! Your passwords do not match at all. Give it another go!<br/>';
}
/*----------------------------------------------------------------------------*/

if (empty($errorMessage)) {
    $gateway->insertUser($username, $password);
    $_SESSION['username'] = $username;
    /* If there are no errors that occur, the user will be redirected to the homepage */
    header('Location: home.php');
}
else {
    require 'register.php';
}
/* If errors do occur, the user will NOT be permitted to continue
   to the homepage and will be redirected back to the register page again */