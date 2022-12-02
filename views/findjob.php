<?php

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
                    <div class="form-group">
                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                        <label for="vehicle1"> ANY TYPE OF WORK</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="vehicle1" name="vehicle2" value="Bike">
                        <label for="vehicle1"> DEVELOPMENT & IT</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="vehicle1" name="vehicle3" value="Bike">
                        <label for="vehicle1"> DESIGN & CREATIVE</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="vehicle1" name="vehicle4" value="Bike">
                        <label for="vehicle1"> FINANCE & ACCOUNTING</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="vehicle1" name="vehicle5" value="Bike">
                        <label for="vehicle1"> ADMIN & CUSTOMER SUPPORT</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="vehicle1" name="vehicle6" value="Bike">
                        <label for="vehicle1"> ENGINEERING & ARCHITECTURE</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="vehicle1" name="vehicle7" value="Bike">
                        <label for="vehicle1"> SALES & MARKETING</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="vehicle1" name="vehicle8" value="Bike">
                        <label for="vehicle1"> WRITING & TRANSLATIONS</label>
                    </div>
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