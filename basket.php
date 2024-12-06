<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Košík</title>
</head>
<body>
    <h1>Košík</h1>
    <ul>
        <?php
        foreach ($_COOKIE as $cookieName => $cookieValue) {
            if (str_starts_with($cookieName, "pizza")) {
                $pizzas[$cookieName] = $cookieValue;
            }
        }
        if (!isset($pizzas)) {
            echo "<p>Prázdný košík</p>";
        }
        else {
            foreach ($pizzas as $cookieName => $cookieValue) {
                $pizza = json_decode($cookieValue);
                echo "<li>";
                echo "<h3>Pizza</h3>";
                echo "<ul>";
                echo "<li>Základ: $pizza->zaklad</li>";
                echo "<li>Ingredience: ";
                $ingredients = [];
                foreach ($pizza as $ingredient => $value) {
                    if ($value === "on") {
                        $ingredients[] = $ingredient;
                    }
                }
                echo implode(", ", $ingredients);
                echo "</li>";
                echo "</ul>";
                echo "</li>";
            }
        }
        ?>
    </ul>
    <a href="index.php">Zpět na menu</a>
    <?php if (isset($pizzas) && count($pizzas) > 0): ?>
    <a href="finish_order.php">Dokončit objednávku</a>
    <a href="clearBasket.php">Zrušit objednávku</a>
    <?php endif; ?>
</body>
</html>
