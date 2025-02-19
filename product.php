<?php
require 'db.php';

$product_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$stmt = $pdo->prepare("SELECT p.*, c.name as category_name FROM products p JOIN categories c ON p.category_id = c.id WHERE p.id = ?");
$stmt->execute([$product_id]);
$product = $stmt->fetch();

if (!$product) {
    die("Produkt nebyl nalezen.");
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($product['name']) ?></title>
    <link rel="stylesheet" href="product.css">
</head>
<body>
<div class="product-detail">
    <h2><?= htmlspecialchars($product['name']) ?></h2>
    <p><strong>Category:</strong> <?= htmlspecialchars($product['category_name']) ?></p>
    <p><strong>Description:</strong><br><?= nl2br(htmlspecialchars($product['description'])) ?></p>
    <p><strong>Price:</strong> <?= htmlspecialchars($product['price']) ?> CZK</p>
</div>
<p><a href="./index.php">Homepage</a></p>
</body>
</html>
