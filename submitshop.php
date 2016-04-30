<?php

require 'AutoLoader.php';

$template = new SMTemplate();
session_start();

/** @var User|null $user */
$user = (empty($_SESSION['user'])) ? null : $_SESSION['user'];

$validator = new Validator();
$shopManager = new ShopManager();

$success = false;
$successMessage = '';

$error = false;
$errorMessage = '';

if (isset($_POST['name']) && isset($_POST['postcode'])) {
    if (!$validator->shopNameValid($_POST['name'])) {
        $error = true;
        $errorMessage = 'Shop names may only contain Alphanumeric characters, underscores, hyphens, commas and whitespace';
        goto render;
    }
    if (!$validator->isPostcode($_POST['postcode'])) {
        $error = true;
        $errorMessage = 'Invalid post code!';
        goto render;
    }
    $shopManager->newShop(new KebabShop($_POST['name'], intval($_POST['postcode'])));
    $success = true;
    $successMessage = 'Successfully submitted new shop!';
    goto render;
}

render:
$data = array(
    'loggedIn' => isset($user),
    'error' => $error,
    'errorMessage' => $errorMessage,
    'success' => $success,
    'successMessage' => $successMessage
);

if (isset($user)) {
    $data['user'] = $user;
}
$data['username'] = (empty($_POST['username'])) ? null : $_POST['username'];

$template->render('submitshop', $data);