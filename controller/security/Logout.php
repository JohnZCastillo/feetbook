<?php


namespace controller\security;

session_start();

if (isset($_SESSION['isLogin'])) {

    if ($_SESSION['isLogin'] === true) {

        session_destroy();

        header('Location: /market-system/login');

        die();
    }
}

$_SESSION['loginError'] = "You're not login!";

header('Location: /market-system/login');

die();
