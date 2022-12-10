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
    <link rel="stylesheet" href="./resources/css/admin.css">
</head>

<body>

</body>

</html>