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

$submittedUsername = '';

$failed = false;
$failMessage = '';

if (!empty($_POST)) {
    if (empty($_POST['username'])) {
        $failed = true;
        $failMessage = 'Please enter a username!';
        goto render;
    }
    if (empty($_POST['password'])) {
        $failed = true;
        $failMessage = 'Please enter a password!';
        goto render;
    }
    $database = new Database();
    $userManager = new UserManager();
    $query = 'SELECT * FROM `Users` WHERE username=:username;';
    try {
        $stmt = $database->prepare($query);
        $params = array(
            'username' => $_POST['username']
        );
        $res = $stmt->execute($params);
    } catch (PDOException $e) {
        $failed = true;
        $failMessage = 'Server error: Could not connect to database!';
        goto render;
    }
    $login = false;

    $row = $stmt->fetch();
    if ($row) {
        $passwordTest = hash('sha256', $_POST['password'] . $row['salt']);
        if ($passwordTest === $row['password']) {
            $login = true;
        }
    } else {
        $failed = true;
        $failMessage = 'Username doesn\'t exist!';
        goto render;
    }

    if ($login) {
        $_SESSION['user'] = new User($row['id'], $row['username'], $row['email']);
        header('Location: /');
        die('Redirecting...');
    } else {
        $failed = true;
        $failMessage = 'Incorrect password!';
        goto render;
    }

}

render:

$data = array(
    'username' => ($_SERVER['REQUEST_METHOD'] === 'POST') ? htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8') : null,
    'failed' => $failed,
    'failMessage' => $failMessage
);

$template->render('login', $data);