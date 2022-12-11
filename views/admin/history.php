<?php

namespace views\admin;

require_once 'autoload.php';

use db\TypeDb;
use db\UserDb;
use Exception;
use db\HistoryDb;
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
    <title>Logs</title>
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

        .title {
            margin-top: 20px;
        }
    </style>

    <div class="container">

        <aside class="side_nav">
            <a href="./admin" class="nav__link">Users</a>
            <a href="./history" class="nav__link">Logs</a>
            <a href="./logout" class="nav__link">Logout</a>
        </aside>

        <div class="content">
            <h2 class="title">Logs</h2>
            <?php
            try {
                $header = ["Id", "Email", "Session id", "Login", "Logout"];

                $histories = array();
                foreach (HistoryDb::getHistories() as $history) {

                    $data = array();

                    array_push($data,  $history->getId());
                    array_push($data,  $history->getEmail());
                    array_push($data,  $history->getSessionId());
                    array_push($data,  $history->getLogin());
                    array_push($data,  $history->getLogout());

                    array_push($histories,  $data);
                }
                TableLayout::setLayout($header, $histories, "history-table");
            } catch (Exception $th) {
                echo "No history";
            }

            ?>

        </div>
    </div>
    <script src="./resources/js/pagination.js"></script>
</body>

</html>