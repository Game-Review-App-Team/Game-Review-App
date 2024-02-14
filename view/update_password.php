<!--
Rodney Dugger Dr
Stephen Platts
Alexander Underwood
Date: 2/11/2024
App Name: Game Rating App

    This is the update password file. 
 
   -->
<?php
//Alex Underwood
session_start();
require_once('../controller/user.php');

if (isset($_POST['email']) && isset($_POST['current_pw']) && isset($_POST['new_pw'])) {
    // Check if "No" button is clicked
    if(isset($_POST['no_button'])) {
        header("location: ../view/display_user.php");
        exit(); // Stop further execution
    }

    // Update password
    $email = $_POST['email'];
    $current_pw = $_POST['current_pw'];
    $new_pw = $_POST['new_pw'];

    $success = User::updatePassword($email, $current_pw, $new_pw);

    if ($success) {
        echo "Password updated successfully.";
        header("location: ../view/display_user.php");
        exit(); // Stop further execution
    } else {
        echo "Invalid email or password.";
    }
}
?>
<html>
<head>
    <title>Update Password</title>
</head>
<body>
    <h2>Would you like to update Your Password?</h2>
    <form method="POST">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email"><br><br>
        <label for="current_pw">Current Password:</label>
        <input type="password" id="current_pw" name="current_pw"><br><br>
        <label for="new_pw">New Password:</label>
        <input type="password" id="new_pw" name="new_pw"><br><br>
        <input type="submit" value="Update Password">
        <input type="submit" name="no_button" value="No"> <!-- No button to skip password update -->
    </form>
</body>
</html>
