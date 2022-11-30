<?php

use db\UserDb;

session_start();

require_once '../db/Database.php';
require_once '../db/UserDb.php';
require_once '../user/User.php';

//redirect to login page if isLogin is null
if (!isset($_SESSION["isLogin"])) {
    $_SESSION["loginError"] = "You're not login!. Login First";
    header('Location: ./login.php');
    exit();
}

//redirect to login page if not login
if ($_SESSION["isLogin"] == false) {
    header('Location: ./login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootsrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <!-- fontawesoome -->
    <script src="https://kit.fontawesome.com/f0632fdfe1.js" crossorigin="anonymous"></script>
    <title>Admin</title>

</head>

<body>

    <div class="mx-auto" style="max-width:1400px;">


        <!-- main navigation -->
        <div class="sticky-top bg-dark px-3">
            <nav class="navbar navbar-dark navbar-expand-lg">
                <a class="navbar-brand text-light" href="#">Shoepa</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">



                    <div class="navbar-nav justify-content-end">
                        <a class="nav-item nav-link text-light" href="./php/page/Products.php">Dashboard</a>
                        <a class="nav-item nav-link text-light" href="./php/page/AboutUs.php">Users</a>
                        <a class="nav-item nav-link text-light" href="./php/page/Ourteam.php">Inventory</a>
                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa-regular fa-user"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="right:0;">
                                <a class="dropdown-item" href="../security/Logout.php">logout</a>
                            </div>
                        </li>

                    </div>
                </div>
            </nav>
        </div>

        <div class="table-responsive-sm">

            <table class="table table-striped table-sm">
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>

                <?php
                try {

                    $users = UserDb::getAllUser();

                    $count = 0;

                    foreach ($users as $user) {
                        echo "<tr>";
                        echo '<td>', ++$count, '</td>';
                        echo '<td>', $user->getId(), '</td>';
                        echo '<td>', $user->getUsername(), '</td>';
                        echo '<td>', $user->getEmail(), '</td>';
                        echo "<td> <button class='btn btn-primary'>increase</button> <button class='btn btn-secondary'>decrease</button> </td>";
                        echo '</tr>';
                    }
                } catch (Exception $e) {
                    echo 'No User Available';
                }
                ?>
            </table>
        </div>


    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>