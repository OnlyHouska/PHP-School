<?php
require 'db.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';

    if (empty($username)) {
        $errors[] = "Username is required";
    }

    if (empty($password)) {
        $errors[] = "Password is required";
    }

    if (!empty($password) && strlen($password) < 6) {
        $errors[] = "Password is too short (minimum is 6 characters)";
    }

    if ($password !== $password_confirm) {
        $errors[] = "Password are not the same";
    }

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, 'user')");
        if ($stmt->execute([$username, $hashed_password])) {
            header("Location: signin.php?registered=1");
            exit;
        } else {
            $errors[] = "Error when signing up";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
<?php if (!empty($errors)): ?>
    <div class="error">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<div class="form-container">
    <h2>Sign up</h2>
    <form method="post" action="">
        <label>Username
            <input type="text" name="username"  value="<?= htmlspecialchars($username ?? '') ?>">
        </label>
        <label>Password
            <input type="password" name="password" >
        </label>
        <label>Repeat password
            <input type="password" name="password_confirm" >
        </label>
        <input type="submit" value="Sign up">
    </form>
</div>
</body>
</html>
