<?php

class ShopTableGateway {

    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }




    // METHOD TO CONNECT TO DATABASE AND RETURN THE EXISTING SHOPS
    public function getShops($sortOrder, $filterName) {
        // execute a query to get all shops
      
        
        $sqlQuery ="SELECT s.*, r.regionname FROM shops s 
                    LEFT JOIN region r ON r.regionnumber = s.regionnumber " .
                    (($filterName == NULL) ? "" : "Where s.address LIKE :filterName") .
                    " ORDER BY " . $sortOrder;

       
        
        $statement = $this->connection->prepare($sqlQuery);
        if ($filterName != NULL)
        {
            $params = array("filterName" => "%" . $filterName . "%");
            $status = $statement->execute($params);
        }
        else
        {
            $status = $statement->execute();
        }
        
        if (!$status) {
            die("Could not retrieve shops");
        }
        
        return $statement;
    }




    // GETSHOPBYSHOPID METHOD
    public function getShopByShopId($sID) {
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM shops WHERE shopID = :shopID";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "shopID" => $sID
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve shop");
        }
        
        return $statement;
    }




    // INSERTSHOP METHOD
    public function insertShop($a, $sm, $p, $d, $u, $r) 
    {
        $sqlQuery = "INSERT INTO shops " .
                    "(address, shopmanagername, phonenumber, dateopened, url, regionnumber)" .
                    "VALUES (:address, :shopmanagername, :phonenumber, :dateopened, :url, :regionnumber)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
                        "address" => $a,
                        "shopmanagername" => $sm,
                        "phonenumber" => $p,
                        "dateopened" => $d,
                        "url" => $u,
                        "regionnumber" => $r
        );
        
        $status = $statement->execute($params);
        
        if (!$status)
        {
            die("Could not insert shop");
        }
        
        $id = $this->connection->lastInsertId();
        
        return $id;
    }




    // DELETE SHOP METHOD
    public function deleteShop($sID)
    {
        $sqlQuery = "DELETE FROM shops WHERE shopID = :shopID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "shopID" => $sID
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete shop");
        }

        return ($statement->rowCount() == 1);
    }




    // UPDATE SHOP METHOD 
    public function updateShop($sID, $a, $sm, $p, $u, $d, $r) {
        $sqlQuery =
                "UPDATE shops SET " .
                "address = :address, " .
                "shopmanagername = :shopmanagername, " .
                "phonenumber = :phonenumber, " .
                "url = :url, " .
                "dateopened = :dateopened, " .
                "regionnumber = :regionnumber " .
                "WHERE shopID = :shopID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "shopID" => $sID,
            "address" => $a,
            "shopmanagername" => $sm,
            "phonenumber" => $p,
            "url" => $u,
            "dateopened" => $d,
            "regionnumber" => $r
        );

        $status = $statement->execute($params);
        
        if(!$status)
        {
            die("Could not update shop");
        }

        return ($statement->rowCount() == 1);
    }
}