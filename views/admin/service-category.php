<?php

namespace views\admin;

require_once 'autoload.php';

use db\TypeDb;
use db\UserDb;
use Exception;
use db\ServiceDb;
use model\user\Role;
use model\user\User;
use views\components\SideNav;
use views\components\TableLayout;

use function controller\type\addType;
use views\components\ServiceProvider;

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
    <title>Serivces Category</title>
</head>

<body>

    <div class="container">
        <!-- pull side nav -->
        <?php SideNav::getSideNav() ?>

        <div class="content">
            <h2></h2>

            <div class="buttons">
                <button class="btn" id="btn-category">New Category</button>
            </div>

            <?php

            try {
                $header = ["Id", "Title", "Description", "Created", "Status", "Action"];

                $services = array();

                foreach (TypeDb::getTypes() as $type) {

                    $data = array();

                    $id = $type->getId();

                    $action = "<button onclick=\"editService($id)\">edit</button>";

                    array_push($data,  $type->getId());
                    array_push($data,  $type->getTitle());
                    array_push($data,  $type->getDescription());
                    array_push($data,  $type->getDateCreated());
                    $status = $type->getActive()  ? "active" : "deactivated";

                    array_push($data,  $status);
                    array_push($data,  $action);

                    array_push($services,  $data);
                }

                TableLayout::setLayout($header, $services, "category-table");
            } catch (Exception $e) {
                echo "No Service Category Yet";
                // echo $e->getMessage();
            }


            ?>
            <!-- form for services -->
            <form class="hide popup" id="new-category">
                <h2>New Service</h2>
                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" id="category-title">
                </div>
                <div class="form-group">
                    <label for="name">Description</label>
                    <input type="text" id="category-description">
                </div>
                <div class="mt-2">
                    <button class="btn" type="submit">Add</button>
                    <span class="btn" onclick="hideElement('new-category')">Cancel</span>
                </div>
            </form>
        </div>
    </div>
    <script src="./resources/js/pagination.js"></script>
</body>

</html>