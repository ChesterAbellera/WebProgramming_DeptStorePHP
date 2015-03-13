<?php
/* Creating instances for the "Region" object 
    and in this case, are given unique identities such as 
    "regionnumber", "regionname" and so forth */
    class Region {
    private $regionnumber;
    private $regionname;
    private $regionalmanager;
    private $phonenumber;
    private $email;
    
    // Constructor that saves/stores the user input
    public function __construct($r, $rn, $rm, $p, $e) {
        $this->regionnumber = $r;
        $this->regionname = $rn;
        $this->regionalmanager = $rm;
        $this->phonenumber = $p;
        $this->email = $e;
    }
    
    /* Methods/Functions that are meant to retrieve and output
       whatever were entered in the above parameters. */
    public function getRegionnumber() {return $this->regionnumber; }
    public function getRegionname() {return $this->regionname; }
    public function getRegionalmanager() {return $this->regionalmanager; }
    public function getPhonenumber() {return $this->phonenumber; }
    public function getEmail() {return $this->email; }
 }