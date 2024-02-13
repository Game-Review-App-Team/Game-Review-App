<!--
Rodney Dugger Dr
Stephen Platts
Alexander Underwood
Date: 2/11/2024
App Name: Game Rating App

    This is the display_battle_royale file.This file requires the 
    controller/battle_royale_controller.php. This file uses a if statement to 
    update or delete data to or from the battle_royale table. A foreach array
    is added to access all data in the battle_royale table. CSS code is abbed
    the match the home page display.      
   -->
<?php
require_once('../controller/battle_royale.php');
require_once('../controller/battle_royale_controller.php');

$battle_royales = Battle_RoyaleController::getAllReviews();

if (isset($_POST['update'])) {
    //update button pressed for a user
    if (isset($_POST['pNoUpd'])) {
        header('Location: ./add_update_battle_royale.php?pNo=' . $_POST['pNoUpd']);
    }
    unset($_POST['update']);
    unset($_POST['pNoUpd']);
}

if (isset($_POST['delete'])) {
    //delete button pressed for a user
    if (isset($_POST['pNoDel'])) {
        Battle_RoyaleController::deleteReview($_POST['pNoDel']);
    }
    unset($_POST['delete']);
    unset($_POST['pNoDel']);
}

?>
<html>
<head>
    <!-- CSS code to match home page -->
<style>
            body {
    background-color: #333;
    color: #fff;
    border: 10px solid limegreen;
    font-family: "Comic Sans MS", "Comic Sans", cursive;
}

a, button {
    background-color: limegreen;
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    font-family: "Comic Sans MS", "Comic Sans", cursive;
}
a:hover, button:hover {
        border: 2px solid purple;
    }
        </style>
    <title>Welcome to our game reviews</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>

<body>
    <h1>Welcome to our game reviews</h1>
    <h1>All Review List</h1>
    <h2><a href="./add_update_battle_royale.php">Add Review for Battle Royale</a></h2>
    <table>
        <tr>
            <th>EMail</th>
            <th>Rating</th>
            <th>Review</th>
            <th>Review Post Date</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            </tr>
            <!-- Foreach array used to collect all data from fortnite table -->
            <?php foreach (Battle_RoyaleController::getAllReviews() as $battle_royale) : ?>
            <tr>
                <td><?php echo $battle_royale->getEMail(); ?></td>
                <td><?php echo $battle_royale->getRating(); ?></td>
                <td><?php echo $battle_royale->getReview(); ?></td>
                <td><?php echo $battle_royale->getReviewPostDate(); ?></td>
                <td><form method="POST">
                    <input type="hidden" name="pNoUpd"
                        value="<?php echo $battle_royale->getReviewId(); ?>"/>
                    <input type="submit" value="Update" name="update" />
                </form></td>
                <td><form method="POST">
                    <input type="hidden" name="pNoDel"
                        value="<?php echo $battle_royale->getReviewId(); ?>"/>
                    <input type="submit" value="Delete" name="delete" />
                </form></td>
            </tr>
            <?php endforeach; ?>
    </table>
        <h3><a href="../view/display_admin.php">Home</a></h3>
</body>
</html>