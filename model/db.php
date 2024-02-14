<!--
Rodney Dugger Dr
Stephen Platts
Alexander Underwood
Date: 2/11/2024
App Name: Game Rating App

    This is the database connection file. 
 
   -->
<?php
// Establish the database connection.
$conn = MySQLi_connect(
   "localhost", // Server host name.
   "root", // Database username.
   "", // Database password.
   "game_app_v2" // Database name or any desired name.
);
// Check connection.
if (MySQLi_connect_errno()) {
   echo "Failed to connect to MySQL: " . MySQLi_connect_error();
}
?>