<!--
Rodney Dugger Dr
Stephen Platts
Alexander Underwood
Date: 2/11/2024
App Name: Game Rating App

    This is the game database file. 
 
   -->
<?php
require_once('database.php');

//class for doing roles table requires; only gets all
//existing roles for now
class GameDB {
    //Get all roles in the DB; returns false if the 
    //database connection fails
    public static function geGames() {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = 'SELECT * FROM games';
            
            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }
}