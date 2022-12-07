<?php

namespace views\admin;

require_once 'autoload.php';

use db\TypeDb;
use db\UserDb;
use Exception;
use db\ServiceDb;
use model\user\Role;
use model\user\User;
use views\components\SideNav;
use views\components\TableLayout;

use function controller\type\addType;
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
if ($_SESSION['userRole'] !== Role::$ADMIN) {
    header('Location: ./redirect');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./resources/css/style.css">
    <link rel="stylesheet" href="./resources/css/admin.css">
    <title>Serivce Provider</title>
</head>

<body>

    <div class="container">
        <!-- pull side nav -->
        <?php SideNav::getSideNav() ?>

        <div class="content">
            <h2>Service provider</h2>


            <?php
            try {
                $header = ["Id", "Name", "Email", "Birthday", "Status", "Action"];

                $users = array();

                foreach (UserDb::getAllUser() as $user) {

                    if ($user->getRole() !== Role::$USER) continue;

                    $data = array();

                    $action = "<button onclick=activate('" . $user->getId() . "')>active</button><button onclick=deleteUser('" . $user->getId() . "')>delete</button>";

                    array_push($data,  $user->getId());
                    array_push($data,  $user->getName());
                    array_push($data,  $user->getEmail());
                    array_push($data,  $user->getBirthday());

                    $status = $user->isValid()  ? "active" : "deactivated";

                    array_push($data,  $status);
                    array_push($data,  $action);

                    array_push($users,  $data);
                }

                TableLayout::setLayout($header, $users, 'provider-table');
            } catch (Exception $e) {
                echo "No services provider yet";
            }


            ?>
        </div>
    </div>
    <script src="./resources/js/pagination.js"></script>
    <script src="./resources/js/category.js"></script>

</body>

</html>