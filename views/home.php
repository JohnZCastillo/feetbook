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
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, nemo iure consectetur quasi est exercitationem qui id voluptates, adipisci magni eaque quibusdam eius nulla labore cupiditate harum aut deserunt neque. Illo assumenda sapiente perspiciatis officiis omnis suscipit cumque ea? Sapiente molestias modi animi voluptates deserunt architecto omnis error recusandae ut ipsa veritatis laboriosam, aut, officia sed est autem, minima ipsum veniam labore reiciendis! Deserunt dolores ad obcaecati iure possimus magnam ipsa explicabo suscipit quas, repellat fugiat error. Ipsa rerum nam cupiditate dicta maiores, quam nisi, corrupti ea sed nostrum minus. Recusandae nemo reprehenderit veniam non facere minus saepe accusantium aliquam?
        </section>

    </div>
</body>

</html>