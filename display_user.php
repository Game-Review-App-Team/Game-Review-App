<!--
Rodney Dugger Dr
Stephen Platts
Alexander Underwood
Date: 2/11/2024
App Name: Game Rating App

    This is the user file.  
   -->
<?php
session_start();
require_once('../util/security.php');

//confirm user is authorized for the page
Security::checkAuthority('user');

//user clicked the logout button
if (isset($_POST['logout'])) {
    Security::logout();
}
?>
<html>
<head>
    <title>Welcome To Online Gaming Rating App</title>
</head>

<body>
    <h1>Welcome To Online Gaming Rating App</h1>
    
    <h2>Please select a game you would like to rate!</h2>

    <h1>Game Selections:</h1>
    <ul>
    <li><h2><a href="display_battle_royale.php">
        Battle Royale</a></h2></li><?php echo "A multi player game with several gaming options to a last man standing weapons fight to tge end!"?> 
        <li><h2><a href="display_fortnite.php">
        Fortnite</a></h2></li><?php echo "A multi player game with great visuals and fan fair to a last man standing weapons fight to tge end!"?>
    <li><h2><a href="display_halo.php">
        Halo</a></h2></li><?php echo "A multi player game fight to a last man standing!"?>
    </ul>

    <!--
        <h3><a href="../index.php">Home</a></h3>
    -->
 
    <form method='POST'>
        <input type="submit" value="Logout" name="logout">
    </form>

</body>
</html>