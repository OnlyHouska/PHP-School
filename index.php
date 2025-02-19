<?php
require 'db.php';

$stmt = $pdo->prepare("SELECT * FROM categories");
$stmt->execute();
$categories = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Catalogue</title>
    <link rel="stylesheet" href="hp.css">
</head>
<body>
<div>
    <?php
    session_start();
    if (isset($_SESSION['user_id'])) {
        echo '<button><a href="signout.php">Log out</a></button>';
    } else {
        echo '<button><a href="signin.php">Sign in</a></button>';
        echo '<button><a href="signup.php">Sign up</a></button>';
    }
    ?>
</div>
<h1>Catalogue</h1>
<h2>Categories</h2>
<ul class="category-list">
    <?php foreach ($categories as $cat): ?>
        <li>
            <a href="category.php?id=<?= $cat['id'] ?>">
                <?= htmlspecialchars($cat['name']) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
