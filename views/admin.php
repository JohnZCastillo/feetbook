<?php

require_once './autoload.php';

use db\UserDb;
use model\user\Role;
use model\user\User;
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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Document</title>
    <link rel="stylesheet" href="./resources/css/style.css">
    <link rel="stylesheet" href="./resources/css/admin.css">
</head>

<body>
    <section class="container">
        <div>
            <nav class="admin_nav">
                <span class="mb-2 nav__brand">Web-Based Service <br> Market-System</span>
                <a href="" class="nav__link">Dashboard</a>
                <a href="" class="nav__link">Customers</a>
                <a href="" class="nav__link">Service Provider</a>
                <a href="" class="nav__link">Services Category</a>
                <a href="" class="nav__link">Services</a>
                <a href="./logout" class="nav__link">Logout</a>
            </nav>
        </div>

        <div class="content">


            <!-- Service Providers -->
            <section class="content-container">
                <h2>Service provider</h2>
                <form action="">
                    <div class="form-group">
                        <label for="search">Search Name</label>
                        <input type="text" name="search" id="search">
                    </div>
                </form>
                <?php
                echo "<table>";
                echo "
                <thead>
                <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Birthday</th>
                          <th>status</th>
                          <th>action</th>
                    </tr>
                </thead>";

                foreach (UserDb::getAllUser() as $user) {
                    if ($user->getRole() !== Role::$USER) continue;
                    ServiceProvider::showDetails($user);
                }
                echo "</table>";

                ?>
            </section>
        </div>
    </section>

</body>

</html>