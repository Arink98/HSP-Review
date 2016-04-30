<?php

require 'AutoLoader.php';

$template = new SMTemplate();
session_start();

/** @var User|null $user */
$user = (empty($_SESSION['user'])) ? null : $_SESSION['user'];

$validator = new Validator();
$shopManager = new ShopManager();

$shops = array();

if (isset($_GET['search'])) {
    if ($validator->isPostcode($_GET['search'])) {
        $shops = $shopManager->getShopsByPostcode(intval(preg_replace('/\s+/', '', $_GET['search'])));
        goto render;
    } else {
        $shops = $shopManager->getShopsByName($_GET['search']);
        goto render;
    }
}

$shops = $shopManager->getShops();

render:
$data = array(
    'loggedIn' => isset($user),
    'error' => false,
    'errorMessage' => '',
    'success' => false,
    'successMessage' => '',
    'shops' => $shops,
    'searched' => isset($_GET['search']),
    'search' => isset($_GET['search']) ? $_GET['search'] : ''
);

if (isset($user)) {
    $data['user'] = $user;
}
$data['username'] = (empty($_POST['username'])) ? null : $_POST['username'];

$template->render('shops', $data);