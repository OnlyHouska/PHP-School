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
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="phone">Telefon</label>
            <input type="text" name="phone" id="phone" required pattern="^\+(420|421)\s?[0-9]{3}\s?[0-9]{3}\s?[0-9]{3}$" title="Zadejte telefon ve správném formátu (CZ nebo SK)">
        </div>
        <div class="form-address">
            <div>
                <label for="country">Stát</label>
                <input type="text" name="country" id="country" required>
            </div>
            <div>
                <label for="city">Město</label>
                <input type="text" name="city" id="city" required>
            </div>
            <div>
                <label for="zip">PSČ</label>
                <input type="text" name="zip" id="zip" required pattern="^\d{3}\s?\d{2}$" title="Špatný formát PSČ">
            </div>
            <div>
                <label for="street">Ulice</label>
                <input type="text" name="street" id="street" required>
            </div>
            <div>
                <label for="house_number">Číslo popisné</label>
                <input type="text" name="house_number" id="house_number" required>
            </div>
        </div>
        <button type="submit">Odeslat objednávku</button>
    </form>
    <a href="basket.php">Zpět do košíku</a>
    <a href="index.php">Zpět na menu</a>
</body>
</html>
