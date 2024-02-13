<!--
Rodney Dugger Dr
Stephen Platts
Alexander Underwood
Date: 2/11/2024
App Name: Game Rating App

    This is the review database file. 
 
   -->
<?php
require_once('database.php');

//class for users table queries
class ReviewDB {
    //function to get a user by their e-mail address
    public static function getReviews() {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = 'SELECT * FROM reviews';

            //execute the query - returns false if
            //no such email found
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

     //function to get all reviews in a apecific game;
    //returns false if the database connection fails
    public static function getReviewsByReview($reviewId) {
        //get the DB connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM reviews
                    WHERE reviews.ReviewId = '$reviewId'";

            //execute the query
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    //function to get a specific review by their ReviewNo
    public static function getReview($reviewId) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "SELECT * FROM reviews
                    WHERE ReviewId = '$reviewId'";

            //execute the query
            $result = $dbConn->query($query);
            //return the associative array
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    //function to delete a review by their ReviewNo
    //returns True on success, False on failure or
    //database connection failure
    public static function deleteReview($reviewId) {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query = "DELETE FROM reviews
                    WHERE ReviewId = '$reviewId'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to add a review to the DB; returns
    //true on success, false on failure or DB connection
    //failure
    public static function addReview($eMail, $rating, $review,
        $reviewPostDate)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {

            //create the query string - ReviewNo is an
            //auto-increment field, so no need to
            //specify it
            $query =
            "INSERT INTO reviews (Email,
                Rating, Review, ReviewPostDate)
            VALUES ('$eMail', '$rating', '$review', '$reviewPostDate')";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    //function to update a reviewer's information; returns
    //true on success, false on failure or DB connection
    //failure
    public static function updateReview($pNo, $eMail,
        $rating, $review, $reviewPostDate)
    {
        //get the database connection
        $db = new Database();
        $dbConn = $db->getDbConn();

        if ($dbConn) {
            //create the query string
            $query =
            "UPDATE reviews SET
                EMail = '$eMail',
                Rating = '$rating',
                Review = '$review',
                ReviewPostDate = '$reviewPostDate'
            WHERE ReviewId = '$pNo'";

            //execute the query, returning status
            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }
    
}
