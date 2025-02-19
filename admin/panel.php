<?php
session_start();
include '../db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../signin.php");
    exit;
}

$errors = [];
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Add Category
    if (isset($_POST['add_category'])) {
        $cat_name = trim($_POST['cat_name'] ?? '');
        if (empty($cat_name)) {
            $errors[] = "Category name is required.";
        } else {
            $stmt = $pdo->prepare("INSERT INTO categories (name) VALUES (?)");
            if ($stmt->execute([$cat_name])) {
                $success .= "Category added successfully. ";
            } else {
                $errors[] = "Error adding category.";
            }
        }
    }

    // Add Product
    if (isset($_POST['add_product'])) {
        $prod_name = trim($_POST['prod_name'] ?? '');
        $prod_description = trim($_POST['prod_description'] ?? '');
        $prod_price = trim($_POST['prod_price'] ?? '');
        $prod_category = trim($_POST['prod_category'] ?? '');

        if (empty($prod_name)) {
            $errors[] = "Product name is required.";
        }
        if (empty($prod_price) || !is_numeric($prod_price)) {
            $errors[] = "A valid product price is required.";
        }
        if (empty($prod_category)) {
            $errors[] = "Product category is required.";
        }
        if (empty($errors)) {
            $stmt = $pdo->prepare("INSERT INTO products (name, description, price, category_id) VALUES (?, ?, ?, ?)");
            if ($stmt->execute([$prod_name, $prod_description, $prod_price, $prod_category])) {
                $success .= "Product added successfully. ";
            } else {
                $errors[] = "Error adding product.";
            }
        }
    }

    // Edit Category
    if (isset($_POST['edit_category'])) {
        $cat_id = intval($_POST['cat_id'] ?? 0);
        $new_name = trim($_POST['new_cat_name'] ?? '');
        if ($cat_id && !empty($new_name)) {
            $stmt = $pdo->prepare("UPDATE categories SET name = ? WHERE id = ?");
            if ($stmt->execute([$new_name, $cat_id])) {
                $success .= "Category updated successfully. ";
            } else {
                $errors[] = "Error updating category.";
            }
        } else {
            $errors[] = "Invalid category data for editing.";
        }
    }

    // Delete Category
    if (isset($_POST['delete_category'])) {
        $cat_id = intval($_POST['cat_id'] ?? 0);
        if ($cat_id) {
            $stmt = $pdo->prepare("DELETE FROM categories WHERE id = ?");
            if ($stmt->execute([$cat_id])) {
                $success .= "Category deleted successfully. ";
            } else {
                $errors[] = "Error deleting category.";
            }
        } else {
            $errors[] = "Invalid category ID.";
        }
    }

    // Edit Product
    if (isset($_POST['edit_product'])) {
        $prod_id = intval($_POST['prod_id'] ?? 0);
        $new_prod_name = trim($_POST['new_prod_name'] ?? '');
        $new_prod_description = trim($_POST['new_prod_description'] ?? '');
        $new_prod_price = trim($_POST['new_prod_price'] ?? '');
        $new_prod_category = trim($_POST['new_prod_category'] ?? '');
        if ($prod_id && !empty($new_prod_name) && !empty($new_prod_price) && is_numeric($new_prod_price) && !empty($new_prod_category)) {
            $stmt = $pdo->prepare("UPDATE products SET name = ?, description = ?, price = ?, category_id = ? WHERE id = ?");
            if ($stmt->execute([$new_prod_name, $new_prod_description, $new_prod_price, $new_prod_category, $prod_id])) {
                $success .= "Product updated successfully. ";
            } else {
                $errors[] = "Error updating product.";
            }
        } else {
            $errors[] = "Invalid product data for editing.";
        }
    }

    // Delete Product
    if (isset($_POST['delete_product'])) {
        $prod_id = intval($_POST['prod_id'] ?? 0);
        if ($prod_id) {
            $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
            if ($stmt->execute([$prod_id])) {
                $success .= "Product deleted successfully. ";
            } else {
                $errors[] = "Error deleting product.";
            }
        } else {
            $errors[] = "Invalid product ID.";
        }
    }
}

$stmt = $pdo->query("SELECT id, name FROM categories ORDER BY name");
$all_categories = $stmt->fetchAll();

$stmt = $pdo->query("SELECT p.id, p.name, p.description, p.price, c.name AS category_name, p.category_id FROM products p LEFT JOIN categories c ON p.category_id = c.id ORDER BY p.name");
$all_products = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="container">
    <div>
        <a href="../logout.php">Sign Out</a>
        <a href="../index.php">Homepage</a>
    </div>
    <h1>Admin Panel</h1>

    <?php if (!empty($errors)): ?>
        <div class="error">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <div class="success">
            <?= htmlspecialchars($success) ?>
        </div>
    <?php endif; ?>

    <h2>Add Category</h2>
    <form method="post" action="">
        <label>Category Name:
            <input type="text" name="cat_name" required>
        </label>
        <input type="submit" name="add_category" value="Add Category">
    </form>

    <h2>Add Product</h2>
    <form method="post" action="">
        <label>Product Name:
            <input type="text" name="prod_name" required>
        </label>
        <label>Description:
            <textarea name="prod_description" rows="4"></textarea>
        </label>
        <label>Price:
            <input type="number" step="0.01" name="prod_price" required>
        </label>
        <label>Category:
            <select name="prod_category" required>
                <option value="">Select Category</option>
                <?php foreach ($all_categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </label>
        <input type="submit" name="add_product" value="Add Product">
    </form>

    <h2>Categories</h2>
    <?php if (count($all_categories) > 0): ?>
        <ul>
            <?php foreach ($all_categories as $cat): ?>
                <li>
                    <form method="post" action="" style="display:inline;">
                        <input type="hidden" name="cat_id" value="<?= $cat['id'] ?>">
                        <input type="text" name="new_cat_name" value="<?= htmlspecialchars($cat['name']) ?>">
                        <input type="submit" name="edit_category" value="Edit">
                    </form>
                    <form method="post" action="" style="display:inline;">
                        <input type="hidden" name="cat_id" value="<?= $cat['id'] ?>">
                        <input type="submit" name="delete_category" value="Delete" onclick="return confirm('Are you sure?');">
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No categories found.</p>
    <?php endif; ?>

    <h2>Products</h2>
    <?php if (count($all_products) > 0): ?>
        <ul>
            <?php foreach ($all_products as $prod): ?>
                <li>
                    <form method="post" action="" style="display:inline;">
                        <input type="hidden" name="prod_id" value="<?= $prod['id'] ?>">
                        <input type="text" name="new_prod_name" value="<?= htmlspecialchars($prod['name']) ?>" required>
                        <input type="text" name="new_prod_description" value="<?= htmlspecialchars($prod['description']) ?>">
                        <input type="number" step="0.01" name="new_prod_price" value="<?= htmlspecialchars($prod['price']) ?>" required>
                        <select name="new_prod_category" required>
                            <?php foreach ($all_categories as $cat): ?>
                                <option value="<?= $cat['id'] ?>" <?= ($cat['id'] == $prod['category_id']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($cat['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <input type="submit" name="edit_product" value="Edit">
                    </form>
                    <form method="post" action="" style="display:inline;">
                        <input type="hidden" name="prod_id" value="<?= $prod['id'] ?>">
                        <input type="submit" name="delete_product" value="Delete" onclick="return confirm('Are you sure?');">
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No products found.</p>
    <?php endif; ?>
</div>
</body>
</html>
