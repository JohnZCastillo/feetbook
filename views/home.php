<?php

namespace views;

use db\UserDb;
use db\ServiceDb;
use db\TypeDb;
use Exception;
use views\components\Header;
use views\components\MainNav;
use views\components\TableLayout;

require 'autoload.php';

session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <?php Header::getHeader(); ?>

    <title>FeetBoook</title>
</head>



<body>
    <style>
        .content {
            padding: 20px;
        }
    </style>
    <div class="main-wrapper">
        <!-- Get Main navigation  -->
        <?php MainNav::nav(); ?>

        <section class="content">
            <h1>Feetbook</h1>
            <p>FeetBook 2022 This is the Feetbook website, where you can experience better and easier socializing. You can connect to your loved ones all over the world. </p>
        </section>

    </div>
</body>

</html>