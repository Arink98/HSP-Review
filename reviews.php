<?php

require 'AutoLoader.php';

$template = new SMTemplate();
session_start();

/** @var User|null $user */
$user = (empty($_SESSION['user'])) ? null : $_SESSION['user'];

$validator = new Validator();
$reviewManager = new ReviewManager();

$reviews = array();

if (isset($_GET['shopid'])) {
    /** @var Review $review */
    foreach ($reviewManager->getReviews() as $review) {
        if ($review->getShop()->getId() == intval($_GET['shopid'])) {
            array_push($reviews, $review);
        }
    }
    goto render;
}

if (isset($_GET['search'])) {
    /** @var Review $review */
    foreach ($reviewManager->getReviews() as $review) {
        if (strtolower($review->getCreator()->getUsername()) == strtolower($_GET['search'])) {
            array_push($reviews, $review);
        }
    }
    goto render;
}

$reviews = $reviewManager->getReviews();

render:
$data = array(
    'loggedIn' => isset($user),
    'error' => false,
    'errorMessage' => '',
    'success' => false,
    'successMessage' => '',
    'reviews' => $reviews,
    'searched' => isset($_GET['search']) || isset($_GET['shopid']),
    'search' => isset($_GET['search']) ? $_GET['search'] : ''
);

if (isset($user)) {
    $data['user'] = $user;
}
$data['username'] = (empty($_POST['username'])) ? null : $_POST['username'];

$template->render('reviews', $data);