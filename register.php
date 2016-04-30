<?php

require_once 'SMTemplate.php';
require_once 'database/Database.php';
require_once 'managers/user/User.php';
require_once 'managers/user/UserManager.php';

$template = new SMTemplate();

session_start();
if (isset($_SESSION['user'])) {
    header('Location: /blog/');
    die('Redirecting...');
}


$failed = false;
$failMessage = '';

if (!empty($_POST)) {
    if (empty($_POST['username'])) {
        $failed = true;
        $failMessage = 'Please enter a username!';
        goto render;
    }
    if (empty($_POST['email'])) {
        $failed = true;
        $failMessage = 'Please enter an email!';
        goto render;
    }
    if (empty($_POST['password'])) {
        $failed = true;
        $failMessage = 'Please enter a password!';
        goto render;
    }
    if (empty($_POST['passwordconfirm'])) {
        $failed = true;
        $failMessage = 'Please enter a password confirmation!';
        goto render;
    }
    if ($_POST['password'] !== $_POST['passwordconfirm']) {
        $failed = true;
        $failMessage = 'Your password doesn\'t match your confirmation!';
        goto render;
    }
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $failed = true;
        $failMessage = 'Invalid email address!';
        goto render;
    }
    $database = new Database();
    $userManager = new UserManager();
    if ($userManager->doesEmailExist($_POST['email'])) {
        $failed = true;
        $failMessage = 'That email is already in use!';
        goto render;
    }
    if ($userManager->doesUsernameExist($_POST['username'])) {
        $failed = true;
        $failMessage = 'That username is already in use!';
        goto render;
    }
    $user = $userManager->newUser($_POST['username'], $_POST['password'], $_POST['email']);
    $_SESSION['user'] = $user;
    header('Location: /');
    die('Redirecting...');
}
render:
$data = array(
    'failed' => $failed,
    'failMessage' => $failMessage,
    'username' => null,
    'email' => null,
    'user' => null
);
if (isset($_POST['username'])) {
    $data['username'] = $_POST['username'];
}
if (isset($_POST['email'])) {
    $data['email'] = $_POST['email'];
}
$template->render('register', $data);