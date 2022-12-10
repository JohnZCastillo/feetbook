<?php
require_once 'autoload.php';

use db\TypeDb;
use db\UserDb;
use db\ServiceDb;
use model\user\Role;
use model\user\User;
use views\components\TableLayout;
use views\components\ServiceProvider;

session_start();

// if (!isset($_SESSION["isLogin"])) {
//     $_SESSION["loginError"] = "You're not login!. Login First";
//     header('Location: ./login');
//     exit();
// }

// //redirect to login page if not login
// if (!$_SESSION["isLogin"]) {
//     header('Location: ./redirect');
//     exit();
// }

// // redirect if not admin
// if ($_SESSION['userRole'] !== Role::$ADMIN) {
//     header('Location: ./redirect');
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./resources/css/style.css">
</head>

<body>

    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        a {
            text-decoration: none;
        }

        .container {
            display: flex;
            height: 100vh;
            max-height: 600px;
            padding: 0;
        }

        .side_nav {
            background-color: var(--primary-color);
            display: flex;
            flex-direction: column;
            color: black;
        }

        .nav__link {
            padding: 10px 20px;
        }

        .nav__link:hover {
            background-color: var(--secondary-color);
            color: var(--primary-color);
        }
    </style>

    <div class="container">

        <aside class="side_nav">
            <a href="" class="nav__link">Dashboard</a>
            <a href="" class="nav__link">Users</a>
            <a href="" class="nav__link">Logs</a>
            <a href="./logout" class="nav__link">Logout</a>
        </aside>

        <div class="content">

        </div>
    </div>

</body>

</html>