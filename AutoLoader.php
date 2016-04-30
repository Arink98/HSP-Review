<?php

spl_autoload_register(function($className) {
    if (file_exists($className . '.php')) {
        require_once $className . '.php';
        return true;
    }
    if (file_exists('database/' . $className . '.php')) {
        require_once 'database/' . $className . '.php';
    }
    if (file_exists('managers/' . $className . '.php')) {
        require_once 'managers/' . $className . '.php';
    }
    if (file_exists('managers/reviews/' . $className . '.php')) {
        require_once 'managers/reviews/' . $className . '.php';
    }
    if (file_exists('managers/reviews/shop/' . $className . '.php')) {
        require_once 'managers/reviews/shop/' . $className . '.php';
    }
    if (file_exists('managers/user/' . $className . '.php')) {
        require_once 'managers/user/' . $className . '.php';
    }
    return false;
});