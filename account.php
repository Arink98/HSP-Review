<?php

require_once 'SMTemplate.php';
require_once 'database/Database.php';
require_once 'managers/user/User.php';
require_once 'managers/user/UserManager.php';
require_once 'managers/Validator.php';

$template = new SMTemplate();
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /blog/');
    die('Redirecting...');
}
/** @var User $user */
$user = $_SESSION['user'];

$error = false;
$errorMessage = '';

$success = false;
$successMessage = '';

if (isset($_POST['username']) || isset($_POST['email']) || isset($_POST['password'])) {
    $database = new Database();
    $userManager = new UserManager();
    $validator = new Validator();
    if (isset($_POST['username'])) {
        if (!$validator->usernameValid($_POST['username'])) {
            $error = true;
            $errorMessage = 'Invalid username: Must be alphanumeric + underscores';
            goto render;
        }
        if ($user->getUsername() === $_POST['username']) {
            $error = true;
            $errorMessage = 'You can\'t set your name to the same you already have!';
            goto render;
        }
        if (strtolower($user->getUsername()) === strtolower($_POST['username'])) {
            goto all_g;
        }
        if ($userManager->doesUsernameExist($_POST['username'])) {
            $error = true;
            $errorMessage = 'A user with name ' . $_POST['username'] . ' already exists!';
            goto render;
        }
        all_g:
        $query = 'UPDATE `Users` SET username=:new WHERE username=:old;';
        try {
            $stmt = $database->prepare($query);
            $stmt->execute(array(
                'new' => $_POST['username'],
                'old' => $user->getUsername()
            ));
        } catch (PDOException $e) {
            $error = true;
            $errorMessage = 'There was an error connecting to the database!';
            goto render;
        }
        $success = true;
        $successMessage = 'Successfully changed name from ' . $user->getUsername() . ' to ' . $_POST['username'] . '!';
        $user->setUsername($_POST['username']);
        goto render;
    }

    if (isset($_POST['email'])) {
        if (!$validator->emailValid($_POST['email'])) {
            $error = true;
            $errorMessage = 'Invalid email address!';
            goto render;
        }
        if ($user->getEmail() === $_POST['email']) {
            $error = true;
            $errorMessage = 'You can\'t set your email to the same you already have!';
            goto render;
        }
        if ($userManager->doesEmailExist($_POST['email'])) {
            $error = true;
            $errorMessage = 'A user with email ' . $_POST['email'] . ' already exists!';
            goto render;
        }
        $query = 'UPDATE `Users` SET email=:new WHERE email=:old;';
        try {
            $stmt = $database->prepare($query);
            $stmt->execute(array(
                'new' => $_POST['email'],
                'old' => $user->getEmail()
            ));
        } catch (PDOException $e) {
            $error = true;
            $errorMessage = 'There was an error connecting to the database!';
            goto render;
        }
        $success = true;
        $successMessage = 'Successfully changed email from ' . $user->getEmail() . ' to ' . $_POST['email'] . '!';
        $user->setEmail($_POST['email']);
        goto render;
    }
    if (isset($_POST['password'])) {
        if (!isset($_POST['oldpassword'])) {
            $error = true;
            $errorMessage = 'Type in your old password!';
            goto render;
        }
        if (!isset($_POST['confirmpassword'])) {
            $error = true;
            $errorMessage = 'Confirm your new password!';
            goto render;
        }
        $query = 'SELECT * FROM Users WHERE id=:id;';
        try {
            $stmt = $database->prepare($query);
            $row = $stmt->execute(array(
                ':id' => $user->getId()
            ));
        } catch (PDOException $e) {
            $error = true;
            $errorMessage = 'There was an error connecting to the database!';
            goto render;
        }
        if (!$row) {
            $error = true;
            $errorMessage = 'Internal error!';
            goto render;
        }
        $passwordTest = hash('sha256', $_POST['password'] . $row['salt']);
        if ($passwordTest === $row['password']) {
            $login = true;
        }
        if ($password !== $row['password']) {
            $error = true;
            $errorMessage = 'Incorrect password!';
            goto render;
        }
        if ($_POST['password'] !== $_POST['confirmpassword']) {
            $error = true;
            $errorMessage = 'Your confirmation doesn\'t match your password!';
            goto render;
        }
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
        $password = hash('sha256', $_POST['password'] . $salt);
        for ($i = 0; $i < 65536; $i++) {
            $password = hash('sha256', $_POST['password'] . $salt);
        }
        $query = 'UPDATE `Users` SET password=:password, salt=:salt WHERE id=:id;';
        try {
            $stmt = $database->prepare($query);
            $stmt->execute(array(
                ':id' => $user->getId(),
                ':password' => $password,
                ':salt' => $salt
            ));
        } catch (PDOException $e) {
            $error = true;
            $errorMessage = 'There was an error connecting to the database!';
            goto render;
        }
        $success = true;
        $successMessage = 'Successfully changed password!';
        goto render;
    }
}


render:
$data = array(
    'user' => $user,
    'error' => $error,
    'errorMessage' => $errorMessage,
    'success' => $success,
    'successMessage' => $successMessage,
    'name' => htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'),
    'email' => htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8')
);

$template->render('account', $data);