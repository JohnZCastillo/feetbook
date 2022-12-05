<?php

namespace views;

use db\UserDb;
use db\ServiceDb;
use db\TypeDb;
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

            <?php

            foreach (ServiceDb::getServices() as $service) {

                echo "<div class='posted-job'>";

                $type = TypeDb::getTypeById($service->getType())->getTitle();
                $title = $service->getTitle();
                $description = $service->getDescription();
                $date = $service->getDateCreated();
                $posterName = UserDb::getUserById($service->getPosterId())->getName();

                echo "<span class='job-type'>$type</span>";
                echo "<span class='job-title'>$title</span>";
                echo "<span class='job-description'>$description</span>";
                echo "<span class='job-poster'>$posterName</span>";
                echo "<span class='job-date'>$date</span>";

                echo "</div>";
            }

            ?>
        </section>

    </div>
</body>

</html>