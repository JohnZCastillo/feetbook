<?php

namespace views\user;

use db\HistoryDb;
use model\user\Role;
use views\components\TableLayout;

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

if (isset($_SESSION['profileError'])) {
    echo    $_SESSION['profileError'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./resources/css/style.css">
    <title>My logs</title>
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

        #history-table {
            width: 100%;
            margin: auto;
        }

        .hide {
            display: none;
        }

        .btn {
            padding: 10px 20px;
            cursor: pointer;
            background-color: var(--cta-color);
            color: white;
            border-radius: 10px;
        }

        .btn:hover {
            background-color: var(--primary-color);
        }

        .forms {
            display: flex;
            flex-direction: column;
            gap: 20px;
            padding-inline: 20px;
        }

        .forms>form {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .title {
            margin-top: 20px;
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
        <div class="forms">
            <h2 class="title">Settings</h2>

            <form id="address-form" method="POST" action="./update-profile" enctype="multipart/form-data">
                <label>Profile</label>
                <input type="file" name="image" id="image">
                <button type="submit" class="btn">Change</button>
            </form>

            <form id="mobile-form" method="POST" action="./update-details">
                <label>Fullname</label>
                <input type="text" name="fullname" id="fullname">
                <button type="submit" class="btn">Change</button>
            </form>

            <form id="mobile-form" method="POST" action="./update-details">
                <label>Mobile</label>
                <input type="number" name="mobile" id="mobile">
                <button type="submit" class="btn">Change</button>
            </form>

            <form id="address-form" method="POST" action="./update-details">
                <label>Address</label>
                <input type="text" name="address" id="address">
                <button type="submit" class="btn">Change</button>
            </form>

            <form id="job-form" method="POST" action="./update-details">
                <label>Job</label>
                <input type="text" name="job" id="job">
                <button type="submit" class="btn">Change</button>
            </form>

            <form method="POST" action="./update-link" id="fb-form">
                <label>facebook</label>
                <input type="text" name="facebook" id="fb">
                <button type="submit" class="btn">Change</button>
            </form>

            <form method="POST" action="./update-link" id="ig-form">
                <label>Instagram</label>
                <input type="text" name="instagram" id="ig">
                <button type="submit" class="btn">Change</button>
            </form>

            <form method="POST" action="./update-link" id="website-form">
                <label>Website</label>
                <input type="text" name="website" id="website">
                <button type="submit" class="btn">Change</button>
            </form>

        </div>
    </section>
</body>

</html>