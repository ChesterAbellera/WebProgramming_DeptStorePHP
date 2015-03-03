<?php
/* Creating instances for the "Shop" object 
    and in this case, are given unique identities such as 
    "address", "shopmanager" and so forth */
    class Shop {
    private $shopID;
    private $address;
    private $shopmanagername;
    private $phonenumber;
    private $dateopened;
    private $url;
    private $regionnumber;
    
    // Constructor that saves/stores the user input
    public function __construct($sID, $a, $sm, $p, $d, $u, $r) {
        $this->shopID = $sID;
        $this->address = $a;
        $this->shopmanagernumber = $sm;
        $this->phonenumber = $m;
        $this->dateopened = $d;
        $this->url = $u;
        $this->regionnumber = $r;
    }
    
    /* Methods/Functions that are meant to retrieve and output
       whatever were entered in the above parameters. */
    public function getShopId() {return $this->shopID; }
    public function getAddress() { return $this->address; }
    public function getShopmanagername() { return $this->shopmanagername; }
    public function getPhonenumber() { return $this->phonenumber; }
    public function getDateopened() { return $this->dateopened; }
    public function getUrl() { return $this->url; }
    public function getRegionnumber() {return $this->regionnumber; }     
 }