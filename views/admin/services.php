<?php

namespace views\admin;

require_once 'autoload.php';

use db\TypeDb;
use db\UserDb;
use db\ServiceDb;
use model\user\Role;
use model\user\User;
use views\components\SideNav;
use views\components\TableLayout;
use views\components\ServiceProvider;

use function controller\type\addType;

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
if ($_SESSION['userRole'] !== Role::$ADMIN) {
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
    <link rel="stylesheet" href="./resources/css/admin.css">
    <title>Services</title>
</head>

<body>

    <div class="container">
        <!-- pull side nav -->
        <?php SideNav::getSideNav() ?>
        <div class="content">
            <h2>Services</h2>
            <?php

            try {
                $header = ["Id", "Title", "Description", "Price", "Date Created", "Category", "Poster", "Action"];

                $services = array();

                foreach (ServiceDb::getServices() as $service) {

                    $data = array();

                    $action = "<button>delete</button>";

                    array_push($data,  $service->getId());
                    array_push($data,  $service->getTitle());
                    array_push($data,  $service->getDescription());
                    array_push($data,  $service->getPrice());
                    array_push($data,  $service->getDateCreated());
                    array_push($data, TypeDb::getTypeById($service->getType())->getTitle());
                    array_push($data, UserDb::getUserById($service->getPosterId())->getName());

                    array_push($data,  $action);

                    array_push($services,  $data);
                }

                TableLayout::setLayout($header, $services, 'services-table');
            } catch (\Throwable $th) {
                echo "No services yet";
            }


            ?>
        </div>
    </div>
    <script src="./resources/js/pagination.js"></script>

</body>

</html>