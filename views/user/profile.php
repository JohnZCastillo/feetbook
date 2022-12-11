<?php

namespace views\user;

use model\user\Role;

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
if ($_SESSION['userRole'] != Role::$USER) {
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
    <title>Profile</title>
</head>


<body>

    <style>
        li {
            list-style-type: none;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .nav {
            display: flex;
            padding: 20px;
            justify-content: flex-end;
            align-items: center;
            background-color: var(--primary-color);
        }

        #logo {
            margin-right: auto;
            color: white;
        }

        .icon {
            width: 30px;
            height: 30px;
        }

        .thumbnail {
            width: 200px;
            height: 200px;
        }

        .content {
            display: flex;
            gap: 10px;
            height: 100vh;
            max-height: 600px;

            flex-wrap: wrap;
        }

        .content__left {
            width: 30%;
            min-width: 300px;
            box-shadow: 3px 3px 6px -3px rgba(0, 0, 0, 0.7);
            padding-inline: 20px;
        }

        .content__right {
            width: 65%;
            min-width: 300px;

            padding-inline: 30px;
            padding-top: 50px;
        }

        .left__top {
            padding-block: 20px;
            border-bottom: 1px solid black;
            text-align: center;
        }

        .socials {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .links {
            padding-left: 30%;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .person {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .person__info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-label {
            width: 100px;
        }
    </style>

    <nav class="nav">
        <span class="nav__link" id="logo">FeetBook</span>
        <a href="./profile" class="nav__link">Profile</a>
        <a href="./logs" class="nav__link">Logs</a>
        <a href="./settings" class="nav__link">Settings</a>
        <a href="./logout" class="nav__link">Logout</a>
    </nav>


    <section class="content">
        <div class="content__left">
            <div class="left__top">
                <img src="./resources/images/user.png" class="thumbnail">
                <h2 class="name">
                    <?php
                    if (isset($_SESSION['fullname'])) {
                        echo $_SESSION['fullname'];
                    } else {
                        echo "John Smith";
                    }
                    ?>
                </h2>
                <p class="job">
                    <?php
                    if (isset($_SESSION['job'])) {
                        echo $_SESSION['job'];
                    } else {
                        echo "Full Stack Developer";
                    }
                    ?>
                </p>
                <p class="area">
                    <?php
                    if (isset($_SESSION['address'])) {
                        echo $_SESSION['address'];
                    } else {
                        echo "Bay Area, San Francisco, CA";
                    }
                    ?>
                </p>

            </div>
            <div class="socials">
                <a class="links" href="#">
                    <img src="./resources/images/facebook.png" class="icon">
                    <?php
                    if (isset($_SESSION['facebook'])) {
                        echo $_SESSION['facebook'];
                    } else {
                        echo "<span>smith.com</span>";
                    }
                    ?>
                </a>
                <div class="links">
                    <img src="./resources/images/ig.png" class="icon">

                    <?php
                    if (isset($_SESSION['instagram'])) {
                        echo $_SESSION['instagram'];
                    } else {
                        echo "<span>mr.smith</span>";
                    }
                    ?>
                </div>
                <div class="links">
                    <img src="./resources/images/website.png" class="icon">

                    <?php
                    if (isset($_SESSION['website'])) {
                        echo $_SESSION['website'];
                    } else {
                        echo "<span>smithbot.com</span>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="content__right">
            <ul class="person">
                <li class="person__info">
                    <span class="info-label">Fullname</span>
                    <?php
                    if (isset($_SESSION['fullname'])) {
                        echo $_SESSION['fullname'];
                    } else {
                        echo "Jonathan Smith";
                    }
                    ?>
                </li>
                <li class="person__info">
                    <span class="info-label">Email</span>
                    <?php
                    if (isset($_SESSION['email'])) {
                        echo $_SESSION['email'];
                    } else {
                        echo "<span>smith@gmail.com</span>";
                    }
                    ?>
                </li>
                <li class="person__info">
                    <span class="info-label">Phone</span>
                    <?php
                    if (isset($_SESSION['mobile'])) {
                        echo $_SESSION['mobile'];
                    } else {
                        echo "<span>09234651103</span>";
                    }
                    ?>
                </li>
                <li class="person__info">
                    <span class="info-label">Address</span>
                    <?php
                    if (isset($_SESSION['address'])) {
                        echo $_SESSION['address'];
                    } else {
                        echo "<span>Bay Area, San Francisco, CA</span>";
                    }
                    ?>
                </li>
            </ul>
        </div>
    </section>

</body>

</html>