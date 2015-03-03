<?php
/* Creating instances for the "Email" object 
    and in this case, are given unique identities such "email" */
    class Email {
    private $emailaddress;
       
    // Constructor that saves/stores the user input
    public function __construct($e) {
        $this->emailaddress = $e;
    }
    
    /* Methods/Functions that are meant to retrieve and output
    the username and password */
    public function getEmailaddress() { return $this->emailaddress; }  
    }