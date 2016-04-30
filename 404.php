<?php

require 'AutoLoader.php';

$template = new SMTemplate();
session_start();

/** @var User|null $user */
$user = (empty($_SESSION['user'])) ? null : $_SESSION['user'];

render:
$data = array(
    'loggedIn' => isset($user),
    'error' => false,
    'errorMessage' => '',
    'success' => false,
    'successMessage' => ''
);

if (isset($user)) {
    $data['user'] = $user;
}
$data['username'] = (empty($_POST['username'])) ? null : $_POST['username'];

$template->render('404', $data);