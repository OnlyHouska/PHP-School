<?php
$code = isset($_GET['code']) ? (int)$_GET['code'] : null;

$message = "";

switch ($code) {
    case 0:
        $message = "Objednávka zrušena!";
        break;
    case 1:
        $message = "Objednávka odeslána!";
        break;
    case 2:
        $message = "Pizza přidána do košíku";
        break;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $message?>></title>
</head>
<body>
    <h1><?= $message?></h1>
    <a href="index.php">Zpět na menu</a>
</body>
</html>
