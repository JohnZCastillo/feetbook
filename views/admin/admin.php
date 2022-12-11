<?php

namespace views\admin;

require_once 'autoload.php';

use db\TypeDb;
use db\UserDb;
use Exception;
use db\ServiceDb;
use model\user\Role;
use model\user\User;
use views\components\TableLayout;
use views\components\ServiceProvider;

session_start();

if (!isset($_SESSION["isLogin"])) {
    $_SESSION["loginError"] = "You're not login!. Login First";
    header('Location: ./login');
    exit();
}

//redirect to login page if not login
if (!$_SESSION["isLogin"]) {
    header('Location: ./redirect');
    exit();
}

// redirect if not admin
if ($_SESSION['userRole'] != Role::$ADMIN) {
    header('Location: ./redirect');
}
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
            max-height: 800px;
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

        table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            border: solid 1px grey;
            /* box-shadow: 0 0 20px rgba(0, 0, 0, 0.15); */
        }

        table thead tr {
            background-color: var(--primary-color);
            color: var(--secondary-color);
            text-align: left;
        }

        .content,
        .content-container,
        table {
            width: 100%;
        }

        table th,
        table td {
            padding: 12px 15px;
        }

        .hide {
            display: none;
        }

        .contents {
            padding: 10px;
            width: 100%;
        }
    </style>

    <div class="container">

        <aside class="side_nav">
            <a href="./admin" class="nav__link">Users</a>
            <a href="./history" class="nav__link">Logs</a>
            <a href="./logout" class="nav__link">Logout</a>
        </aside>

        <div class="contents">
            <h2>Users</h2>
            <?php
            try {
                $header = ["Fullname", "Email", "Mobile", "Address", "Job", "Registered"];

                $users = array();
                foreach (UserDb::getAllUser() as $user) {

                    //only show users
                    if ($user->getRole() != Role::$USER) continue;

                    $data = array();

                    array_push($data,  $user->getFullname());
                    array_push($data,  $user->getEmail());
                    array_push($data,  $user->getMobile());
                    array_push($data,  $user->getAddress());
                    array_push($data,  $user->getJob());
                    array_push($data,  $user->getCreated());
                    array_push($users,  $data);
                }
                TableLayout::setLayout($header, $users, "history-table");
            } catch (Exception $th) {
                echo "No history";
            }

            ?>
        </div>
    </div>

    <script src="./resources/js/pagination.js"></script>
</body>

</html>