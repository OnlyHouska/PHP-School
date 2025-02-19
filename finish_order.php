<?php


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dokončit objednávku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Dokončit objednávku</h1>
    <form action="sendOrder.php" method="post">
        <div>
            <label for="name">Jméno</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="phone">Telefon</label>
            <input type="text" name="phone" id="phone">
        </div>
        <div class="form-address">
            <div>
                <label for="country">Stát</label>
                <input type="text" name="country" id="country">
            </div>
            <div>
                <label for="city">Město</label>
                <input type="text" name="city" id="city">
            </div>
            <div>
                <label for="zip">PSČ</label>
                <input type="text" name="zip" id="zip">
            </div>
            <div>
                <label for="street">Ulice</label>
                <input type="text" name="street" id="street">
            </div>
            <div>
                <label for="house_number">Číslo popisné</label>
                <input type="text" name="house_number" id="house_number">
            </div>
        </div>
        <button type="submit">Odeslat objednávku</button>
    </form>

    <a href="basket.php">Zpět do košíku</a>
    <a href="index.php">Zpět na menu</a>
</body>
</html>
