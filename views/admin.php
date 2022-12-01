<?php

require_once './autoload.php';

use db\ServiceDb;
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
                <a class="nav__link  btn-1">Dashboard</a>
                <a class="nav__link  btn-2">Customers</a>
                <a class="nav__link  btn-3">Service Provider</a>
                <a class="nav__link  btn-4">Services Category</a>
                <a class="nav__link  btn-5">Services</a>
                <a href="./logout" class="nav__link">Logout</a>
            </nav>
        </div>

        <div class="content">

            <section class="content-container content-1 hide">
            </section>


            <!-- Customers -->
            <section class="content-container content-2 hide">
                <h2>Customers</h2>
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
                    if ($user->getRole() !== Role::$EMPLOYEE) continue;
                    ServiceProvider::showDetails($user, '');
                }
                echo "</table>";

                ?>
            </section>

            <!-- Service Providers -->
            <section class="content-container content-3">
                <h2>Service provider</h2>
                <form action="">
                    <div class="form-group">
                        <label for="search">Search Name</label>
                        <input type="text" name="search" id="search">
                    </div>
                </form>
                <?php
                echo "<table class='user-table'>";
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

                $count = 0;

                foreach (UserDb::getAllUser() as $user) {

                    if ($user->getRole() !== Role::$USER) continue;
                    ServiceProvider::showDetails($user, '');
                    $count++;
                }

                echo "</table>";

                ?>
                <div>
                    <span id="page"></span>
                    <span id="prev">prev</span>
                    <span id="next">next</span>
                </div>
            </section>


            <!-- Services -->
            <section class="content-container content-4 hide">
                <?php

                foreach (ServiceDb::getServices() as $service) {
                    echo $service->getTitle();
                } ?>


            </section>

            <section class="content-container content-5 hide">

            </section>
        </div>
    </section>

    <script>
        const btn1 = document.querySelector('.btn-1');
        const btn2 = document.querySelector('.btn-2');
        const btn3 = document.querySelector('.btn-3');
        const btn4 = document.querySelector('.btn-4');
        const btn5 = document.querySelector('.btn-5');

        const content1 = document.querySelector('.content-1');
        const content2 = document.querySelector('.content-2');
        const content3 = document.querySelector('.content-3');
        const content4 = document.querySelector('.content-4');
        const content5 = document.querySelector('.content-5');

        const contents = [content1, content2, content3, content4, content5];
        const buttons = [btn1, btn2, btn3, btn4, btn5];

        // buttons click event
        buttons.forEach((button, index) => {
            button.addEventListener('click', () => {
                hidePages();
                contents[index].classList.remove('hide');
            })
        });

        // hide pages
        const hidePages = () => {
            contents.forEach(content => {
                if (!content.classList.contains('hide')) {
                    content.classList.add('hide');
                    console.log('hiding!');
                }
            });
        }
    </script>
    <script>
        const pagination = (table) => {

            const page = [];
            const target = document.querySelector('.' + table);
            const rows = target.rows.length;

            for (let index = 1; index <= rows / 10; index++) {
                page.push(index);
            }


        }

        pagination('user-table');
    </script>
</body>

</html>