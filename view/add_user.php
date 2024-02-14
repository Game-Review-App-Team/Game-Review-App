<!--
Rodney Dugger Dr
Stephen Platts
Alexander Underwood
Date: 2/11/2024
App Name: Game Rating App

    This is the add user file. This file uses a password validation function.
    A database connection is added to validate data and to connect to the 
    users table. SCC style formate data is added with a title, header and form 
    to display a web page for adding user data.
-->    
<?php
//Alex Underwood

    $host = 'localhost';
    $dbname = 'game_app_v2';
    $username = 'root';
    $password = '';

    function validatePassword($password){
        return preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $password) && preg_match('/[0-9]/', $password);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conn = new mysqli($host, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
//establishes connection to the table for adding
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $registration_date = date("Y-m-d H:i:s");
        $user_level = 2;
//details for the account but forces the account to be a user account so they can't be an admin
        if (!validatePassword($password)) {
            $error_message2= "Password must contain at least one special character and one number.";
        } else {
            $error_message2= null;
        }
//password complexity
        $sql = "INSERT INTO users (FirstName, LastName, EMail, Password, RegistrationDate, UserLevel)
            VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $first_name, $last_name, $email, $password, $registration_date, $user_level);

        if (validatePassword($password) && $stmt->execute()) {
            header("Location: ../index.php");
            exit();
        }
//validates the passowrd and completes the input of a new account
        $stmt->close();
        $conn->close();
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
    <title>Add User</title>
</head>
<body>
    <h2>Add User</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        First Name: <input type="text" name="first_name"><br>
        Last Name: <input type="text" name="last_name"><br>
        Email: <input type="text" name="email"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Submit">
        <a href="../index.php"><button type="button">Cancel</button></a>
    </form>
    <?php if (isset($error_message2)) {?>
        <div style="color: red;"><?php echo $error_message2; ?></div>
    <?php } ?>
</body>
</html>