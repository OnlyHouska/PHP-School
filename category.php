<?php
require 'db.php';

$category_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$sortOptions = ['name', 'price'];
$sort = $_GET['sort'] ?? 'name';

if (!in_array($sort, $sortOptions)) {
    $sort = 'name';
}

$stmt = $pdo->prepare("SELECT * FROM products WHERE category_id = ? ORDER BY $sort");
$stmt->execute([$category_id]);
$products = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Category</title>
    <link rel="stylesheet" href="product.css">
</head>
<body>
<h2>Category</h2>
<p>Sort by
    <a href="?id=<?= $category_id ?>&sort=name">Name</a>
    <a href="?id=<?= $category_id ?>&sort=price">Price</a>
</p>
<?php foreach ($products as $product): ?>
    <div class="product">
        <h3><?= htmlspecialchars($product['name']) ?></h3>
        <p><?= nl2br(htmlspecialchars($product['description'])) ?></p>
        <p>Cena: <?= htmlspecialchars($product['price']) ?> CZK</p>
        <a href="product.php?id=<?= $product['id'] ?>">Product detail</a>
    </div>
<?php endforeach; ?>
</body>
</html>
