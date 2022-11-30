<?php

namespace views;

use Exception;
use db\ProductDb;
use views\components\Header;
use views\components\MainNav;

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

<!-- Get Main navigation  -->
<?php MainNav::nav(); ?>


<body>

</body>

</html>