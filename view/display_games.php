<?php
require_once('../controller/game.php');
require_once('../controller/game_controller.php');

$games = GameController::getAllGames();
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
    <title>Available Games to rate</title>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>

<body>
    <h1>Available games to rate</h1>
    <h1>Available Games</h1>
    <table>
        <tr>
            <th>Game ID</th>
            <th>Game Name</th>
        </tr>
        <?php foreach ($games as $game) : ?>
        <tr>
            <td><?php echo $game->getGameNo(); ?></td>
            <td><?php echo $game->getGameName(); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <h3><a href="../view/display_admin.php">Home</a></h3>
</body>
</html>