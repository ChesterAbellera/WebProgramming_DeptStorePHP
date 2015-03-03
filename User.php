<?php
/* Creating instances for the "User" object 
    and in this case, are given unique identities such as 
    "username", and "password" */ 
class User 
{
private $username;
private $password;
       
// Constructor that saves/stores the user input
public function __construct($u, $p) 
 {
    $this->username = $u;
    $this->password = $p;
 }

    /* Methods/Functions that are meant to retrieve and output
    the username and password */
        public function getUsername() 
        { 
            return $this->username; 
        }
        public function getPassword() 
        { 
            return $this->password;
        }
    
}