<?php

class RegionTableGateway {

    private $connection;
    
    public function __construct($c) {
        $this->connection = $c;
    }




    // METHOD TO CONNECT TO DATABASE AND RETURN THE EXISTING REGIONS
    public function getRegions() {
        // execute a query to get all shops
        $sqlQuery = "SELECT * FROM region";
        
        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve regions");
        }
        
        return $statement;
    }




    // GETREGIONBYREGIONUMBER METHOD
    public function getRegionByRegionNumber($r) {
        // execute a query to get the user with the specified region number
        $sqlQuery = "SELECT * FROM region WHERE regionnumber = :regionnumber";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "regionnumber" => $r
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve region");
        }
        
        return $statement;
    }




    // INSERTREGION METHOD
    public function insertRegion($rn, $rm, $p, $e) 
    {
        $sqlQuery = "INSERT INTO region " .
                    "(regionname, regionalmanager, phonenumber, email)" .
                    "VALUES (:regionname, :regionalmanager, :phonenumber, :email)";
        
        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
                        "regionname" => $rn,
                        "regionalmanager" => $rm,
                        "phonenumber" => $p,
                        "email" => $e,
        );
        
        $status = $statement->execute($params);
        
        if (!$status)
        {
            die("Could not insert region");
        }
        
        $id = $this->connection->lastInsertId();
        
        return $id;
    }




    // DELETE REGION METHOD
    public function deleteRegion($r)
    {
        $sqlQuery = "DELETE FROM region WHERE regionnumber = :regionnumber";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "regionnumber" => $r
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete region");
        }

        return ($statement->rowCount() == 1);
    }




    // UPDATE REGION METHOD 
    public function updateRegion($r, $rn, $rm, $p, $e)  {
        $sqlQuery =
                "UPDATE region SET " .
                "regionname = :regionname, " .
                "regionalmanager = :regionalmanager, " .
                "phonenumber = :phonenumber, " .
                "email = :email, " .
                "WHERE regionnumber = :regionnumber";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "regionnumber" => $r,
            "regionname" => $rn,
            "regionalmanager" => $rm,
            "phonenumber" => $p,
            "email" => $e,
        );

        $status = $statement->execute($params);
        
        if(!$status)
        {
            die("Could not update region");
        }

        return ($statement->rowCount() == 1);
    }
}