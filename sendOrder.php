<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: finish_order.php');
    exit;
}

$isRequired = "Toto je povinné pole!";

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$country = trim($_POST['country'] ?? '');
$city = trim($_POST['city'] ?? '');
$zip = trim($_POST['zip'] ?? '');
$street = trim($_POST['street'] ?? '');
$house_number = trim($_POST['house_number'] ?? '');

$errors = [];

if (empty($name)) {
    $errors[] = $isRequired;
}

if (empty($email)) {
    $errors[] = $isRequired;
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Neplatný formát e-mailu.';
}

$phonePattern = '/^\+(420|421)\s?[0-9]{3}\s?[0-9]{3}\s?[0-9]{3}$/';
if (empty($phone)) {
    $errors[] = $isRequired;
} elseif (!preg_match($phonePattern, $phone)) {
    $errors[] = 'Telefon musí být ve správném formátu (pro ČR nebo SR)';
}

if (empty($country)) {
    $errors[] = $isRequired;
}

if (empty($city)) {
    $errors[] = $isRequired;
}

$zipPattern = '/^\d{3}\s?\d{2}$/';
if (empty($zip)) {
    $errors[] = $isRequired;
} elseif (!preg_match($zipPattern, $zip)) {
    $errors[] = 'PSČ musí mít formát XXX XX';
}

if (empty($street)) {
    $errors[] = $isRequired;
}

if (empty($house_number)) {
    $errors[] = $isRequired;
}

if (!empty($errors)) {
    $_SESSION['form_errors'] = $errors;
    $_SESSION['form_data'] = $_POST;

    header('Location: finish_order.php');
    exit;
}
else var_dump($errors);

header("Location: clearBasket.php?code=1");
exit;

