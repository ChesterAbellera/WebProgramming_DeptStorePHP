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
/*----------------------------------------------------------------------------*/

/* Empty error message array that prints out appropriate warnings 
   depending on the user's choice of action 
   by using conditions such as "if" statements */
$errorMessage = array();
if ($username === FALSE || $username === '') {
    $errorMessage['username'] = '* Hey! You forgot to type in your username!<br/>';
}

if ($password === FALSE || $password === '') {
    $errorMessage['password'] = '* Pssst! You did not enter your password!<br/>';
}
/*----------------------------------------------------------------------------*/

if (empty($errorMessage)) {
    $statement = $gateway->getUserByUsername($username);
    if ($statement->rowCount() != 1) {
        $errorMessage['username'] = 'Username not registered<br/>';
    }
    else if ($statement->rowCount() == 1) {
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if ($password !== $row['password']) {
            $errorMessage['password'] = 'Invalid password<br/>';
        }
    }
}

if (empty($errorMessage)) {
    $_SESSION['username'] = $username;
    header('Location: home.php');
}
else {
    require 'login.php';
}