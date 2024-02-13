<?php
session_start();
require_once('controller/user.php');
require_once('controller/user_controller.php');
require_once('util/security.php');
//require_once('view/display.user.php');
//require_once('view/display.admin.php');

Security::checkHTTPS();

//set the message related to login//logout functionality
$login_msg = isset($_SESSION['logout_msg']) ?
    $_SESSION['logout_msg'] : '';

if (isset($_POST['email']) && isset($_POST['pw'])) {
    //login and password fields were set
    $user_level = UserController::validUser(
        $_POST['email'], $_POST['pw']);

   if ($user_level === '1') {
        $_SESSION['admin'] = true;
        $_SESSION['user'] = false;
        header("Location: view/display_admin.php");
   } else if ($user_level === '2') {
        $_SESSION['admin'] = false;
        $_SESSION['user'] = true;
        header("Location: view/update_password.php");
        exit();
    } else {
        $login_msg = 'Failed Authentication - try again.';
    }
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
    <title>Welcome To Online Game Rating App</title>
</head>

<body>
    <h1>Welcome To Online Game Rating App</h1>
    <h2>Login</h2>
    <form method='POST'>
        <h3>Login ID (e-mail): <input type="text"
            name="email"></h3>
        <h3>Password: <input type="password" name="pw"></h3>
        <input type="submit" value="Login" name="login">
    </form>
    <h2><?php echo $login_msg; ?></h2>
    <h2><a href="view/add_user.php">create new user</a></h2>
</body>
</html>