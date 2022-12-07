<?php

use db\TypeDb;
use views\components\Header;
use views\components\MainNav;

require_once 'autoload.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Pull Header -->
    <?php Header::getHeader() ?>
    <title>find job</title>
</head>

<div class="main-wrapper">

    <!-- Pull Navigation -->
    <?php MainNav::nav() ?>

    <div class="inner-wrapper">

        <h1>Find the best freelance jobs</h1>

        <section class="container">
            <div class="container__filter">
                <p>Find freelance jobs</p>
                <form action="" class="filter_form">
                    <h2>Type of work</h2>
                    <?php
                    try {
                        foreach (TypeDb::getTypes() as $type) {
                            $id = $type->getId();
                            $title = $type->getTitle();
                            echo "<div class=\"form-group\">";
                            echo "<input type='checkbox'  name='$title' value='$id'>";
                            echo "<label>$title</label>";
                            echo "</div>";
                        }
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }


                    ?>
                </form>
            </div>
            <div class="container__content">
                <p>Explore Remote Jobs</p>
                <form action="" id="search-form">
                    <input type="text" class="search-field">
                </form>
            </div>
        </section>

    </div>
</div>


<body>

</body>

</html>