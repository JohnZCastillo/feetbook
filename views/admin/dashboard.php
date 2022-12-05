<?php

namespace views\admin;

require_once 'autoload.php';

use db\TypeDb;
use db\UserDb;
use db\ServiceDb;
use model\user\Role;
use model\user\User;
use views\components\SideNav;
use views\components\TableLayout;
use views\components\ServiceProvider;

use function controller\type\addType;

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
    <title>Document</title>
</head>

<body>

    <div class="container">
        <!-- pull side nav -->
        <?php SideNav::getSideNav() ?>
        <div class="content">
            <?php

            $userCount = 0;
            $employeerCount = 0;
            $jobs = sizeof(ServiceDb::getServices());
            $category = sizeof(TypeDb::getTypes());

            foreach (UserDb::getAllUser() as $user) {

                if ($user->getRole() == Role::$USER) {
                    $userCount++;
                }

                if ($user->getRole() == Role::$EMPLOYEE) {
                    $employeerCount++;
                }
            }

            echo "<div class='box-wrapper'>";
            echo "<div class='box'>$userCount</div>";
            echo "<div class='box'>$employeerCount</div>";
            echo "<div class='box'>$jobs</div>";
            echo "<div class='box'>$category</div>";
            echo "</div>";

            ?>
        </div>
    </div>
</body>

</html>