<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sestav si pizzu!</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="savePizza.php" method="post" id="pizza">
        <label class="category-label" for="zaklad">Základ</label>
        <section class="form-section" id="zaklad">
            <div>
                <input type="radio" name="zaklad" id="tomatovyZaklad" value="tomatovy">
                <label for="tomatovyZaklad">Tomatový</label>
            </div>

            <div>
                <input type="radio" name="zaklad" id="smetanovyZaklad" value="smetanovy">
                <label for="smetanovyZaklad">Smetanový</label>
            </div>
        </section>
        <label class="category-label" for="ingredience">Ingredience</label>
        <section class="form-section" id="ingredience">
            <div>
                <label for="ananas">Ananas</label>
                <input type="checkbox" name="ananas" id="ananas">
            </div>

            <div>
                <label for="balkanskySyr">Balkanský sýr</label>
                <input type="checkbox" name="balkanskySyr" id="balkanskySyr">
            </div>

            <div>
                <label for="beraniRohy">Beraní Rohy</label>
                <input type="checkbox" name="beraniRohy" id="beraniRohy">
            </div>

            <div>
                <label for="cesnek">Česnek</label>
                <input type="checkbox" name="cesnek" id="cesnek">
            </div>

            <div>
                <label for="hrasek">Hrášek</label>
                <input type="checkbox" name="hrasek" id="hrasek">
            </div>

            <div>
                <label for="kukurice">Kukuřice</label>
                <input type="checkbox" name="kukurice" id="kukurice">
            </div>

            <div>
                <label for="olivy">Olivy</label>
                <input type="checkbox" name="olivy" id="olivy">
            </div>

            <div>
                <label for="paprika">Paprika</label>
                <input type="checkbox" name="paprika" id="paprika">
            </div>

            <div>
                <label for="peproni">Peproni</label>
                <input type="checkbox" name="peproni" id="peproni">
            </div>

            <div>
                <label for="rajce">Rajče</label>
                <input type="checkbox" name="rajce" id="rajce">
            </div>
        </section>

        <input type="submit" value="Přidat do košíku">
    </form>
</body>
</html>
