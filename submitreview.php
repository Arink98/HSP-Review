<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'AutoLoader.php';

$template = new SMTemplate();
session_start();

/** @var User|null $user */
$user = (empty($_SESSION['user'])) ? null : $_SESSION['user'];

if ($user == null) {
    header('Location: /reviews');
}

$validator = new Validator();
$textManager = new TextManager();
$shopManager = new ShopManager();
$reviewManager = new ReviewManager();

$success = false;
$successMessage = '';

$error = false;
$errorMessage = '';

if (isset($_POST['shop'])) {
    $shop = $shopManager->getShopByExactName($_POST['shop']);
    if ($shop == null) {
        $error = true;
        $errorMessage = 'Invalid shop!';
        goto render;
    }
    $_POST['shopid'] = $shop->getId();
}

if (isset($_POST['shopid'])) {

    if ($user == null) {
        $error = true;
        $errorMessage = 'You must be logged in to post a review!';
        goto render;
    }

    if (!isset($_POST['price'])) {
        $error = true;
        $errorMessage = 'Please specify a price!';
        goto render;
    }

    if (!isset($_POST['overallrating'])) {
        $error = true;
        $errorMessage = 'Please specify an overall rating!';
        goto render;
    }

    if (!isset($_POST['overalltext'])) {
        $error = true;
        $errorMessage = 'Please specify your overall thoughts!';
        goto render;
    }

    $shop = $shopManager->getShopById($_POST['shopid']);

    if ($shop == null) {
        $error = true;
        $errorMessage = 'Invalid shop!';
        goto render;
    }

    $timestamp = date('Y-m-d G:i:s');

    $review = new Review($user, $timestamp, $shop, $_POST['price'], $_POST['overallrating'], $textManager->newText($_POST['overalltext']));

    if (isset($_POST['greetingrating'])) {
        $review->setGreetingRating($_POST['greetingrating']);
        if (isset($_POST['greetingtext'])) {
            $review->setGreetingText($textManager->newText($_POST['greetingtext']));
        }
    }

    if (isset($_POST['signagerating'])) {
        $review->setSignageRating($_POST['signagerating']);
        if (isset($_POST['signagetext'])) {
            $review->setSignageText($textManager->newText($_POST['signagetext']));
        }
    }

    if (isset($_POST['meat'])) {
        $_POST['meattype'] = MeatType::getByName($_POST['meat']);
    }

    if (isset($_POST['meattype'])) {
        $review->setMeatType($_POST['meattype']);
        if (isset($_POST['meatrating'])) {
            $review->setMeatRating($_POST['meatrating']);
            if (isset($_POST['meattext'])) {
                $review->setMeatText($textManager->newText($_POST['meattext']));
            }
        }
    }

    if (isset($_POST['chiprating'])) {
        $review->setChipRating($_POST['chiprating']);
        if (isset($_POST['chiptext'])) {
            $review->setChipText($textManager->newText($_POST['chiptext']));
        }
    }

    if (isset($_POST['saucy'])) {
        $saucy = $_POST['saucy'] == 'on' ? true : false;
        $review->setSaucy($saucy);
        if ($review->isSaucy() && isset($_POST['saucerating'])) {
            $review->setSauceRating($_POST['saucerating']);
            if (isset($_POST['saucetext'])) {
                $review->setSauceText($textManager->newText($_POST['saucetext']));
            }
        }
    }

    if (isset($_POST['cheese'])) {
        $cheesy = $_POST['cheesy'] == 'on' ? true : false;
        $review->setCheesy($cheesy);
        if ($review->isCheesy() && isset($_POST['cheeserating'])) {
            $review->setCheeseRating($_POST['cheeserating']);
            if (isset($_POST['cheesetext'])) {
                $review->setCheeseText($textManager->newText($_POST['cheesetext']));
            }
        }
    }

    if (isset($_POST['box'])) {
        $_POST['boxtype'] = BoxType::getByName($_POST['box']);
    }

    if (isset($_POST['boxtype'])) {
        $review->setBoxType($_POST['boxtype']);
    }

    $reviewManager->newReview($review);
    $success = true;
    $successMessage = 'Successfully submitted new review!';
    goto render;
}

render:
$data = array(
    'loggedIn' => isset($user),
    'error' => $error,
    'errorMessage' => $errorMessage,
    'success' => $success,
    'successMessage' => $successMessage,
    'shops' => $shopManager->getShops()
);

if (isset($user)) {
    $data['user'] = $user;
}
$data['username'] = (empty($_POST['username'])) ? null : $_POST['username'];

$template->render('submitreview', $data);