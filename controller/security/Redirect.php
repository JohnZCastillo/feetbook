<?php

// This file redirec users to their corresponding  role
namespace controller\security;

session_start();

use model\user\Role;

require_once 'autoload.php';

// check weather user is login if not redirect them to login page
if (isset($_SESSION['isLogin'])) {
    if (!$_SESSION['isLogin']) {
        header('Location: /market-system/login');
        die();
    }
} else {
    header('Location: /market-system/login');
    die();
}

if (isset($_SESSION['userRole'])) {

    switch ($_SESSION['userRole']) {

        case Role::$ADMIN:

            header('Location: /market-system/admin');

            die();

            break;

        case Role::$USER:

            header('Location: /market-system/user');

            die();

            break;
    }
}

// reach this line if user role is not define
http_response_code(401);
