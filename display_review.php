<!--
Rodney Dugger Dr
Stephen Platts
Alexander Underwood
Date: 2/11/2024
App Name: Game Rating App

    This is the review file.This file requires the 
    controller/review_controller.php. This file uses a if statement to 
    update or delete data to or from all the games tables. A foreach array
    is added to access all data in all the games tables. CSS code is added
    the match the home page display.  
    
   -->
<?php
require_once('../controller/review.php');
require_once('../controller/review_controller.php');

$reviews = ReviewController::getAllReviews();

if (isset($_POST['update'])) {
    //update button pressed for a user
    if (isset($_POST['pNoUpd'])) {
        header('Location: ./add_update_review.php?pNo=' . $_POST['pNoUpd']);
    }
    unset($_POST['update']);
    unset($_POST['pNoUpd']);
}

if (isset($_POST['delete'])) {
    //delete button pressed for a user
    if (isset($_POST['pNoDel'])) {
        ReviewController::deleteReview($_POST['pNoDel']);
    }
    unset($_POST['delete']);
    unset($_POST['pNoDel']);
}


?>
<html>
<head>
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
    <h2><a href="./add_update_review.php">Add Review</a></h2>
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
            <?php foreach (ReviewController::getAllReviews() as $review) : ?>
            <tr>
                <td><?php echo $review->getEMail(); ?></td>
                <td><?php echo $review->getRating(); ?></td>
                <td><?php echo $review->getReview(); ?></td>
                <td><?php echo $review->getReviewPostDate(); ?></td>
                <td><form method="POST">
                    <input type="hidden" name="pNoUpd"
                        value="<?php echo $review->getReviewId(); ?>"/>
                    <input type="submit" value="Update" name="update" />
                </form></td>
                <td><form method="POST">
                    <input type="hidden" name="pNoDel"
                        value="<?php echo $review->getReviewId(); ?>"/>
                    <input type="submit" value="Delete" name="delete" />
                </form></td>
            </tr>
            <?php endforeach; ?>
    </table>
        <h3><a href="../view/display_admin.php">Home</a></h3>
</body>
</html>