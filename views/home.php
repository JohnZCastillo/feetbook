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
    <link rel="icon" type="image/x-icon" href="./favicon.ico">

    <?php Header::getHeader(); ?>

    <title>Market Sytem</title>
</head>



<body>
    <div class="main-wrapper">
        <!-- Get Main navigation  -->
        <?php MainNav::nav(); ?>

        <!-- Jobs -->
        <section class="jobs">

        </section>

    </div>
</body>

</html>