<?php

spl_autoload_register(function ($className) {
    require_once("$className.class.php");
});


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pizza</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="build_pizza.php" class="button">Sestav si pizzu!</a>
    <a href="basket.php" class="button">Zobrazit košík</a>
</body>
</html>
