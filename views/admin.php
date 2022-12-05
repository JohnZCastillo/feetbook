<?php

require_once 'autoload.php';

use db\TypeDb;
use db\UserDb;
use db\ServiceDb;
use model\user\Role;
use model\user\User;
use views\components\TableLayout;
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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Document</title>
    <link rel="stylesheet" href="./resources/css/style.css">
    <link rel="stylesheet" href="./resources/css/admin.css">
</head>

<body>
    <section class="container">
        <div>
            <nav class="admin_nav">
                <span class="mb-2 nav__brand">Web-Based Service <br> Market-System</span>
                <a class="nav__link  btn-1">Dashboard</a>
                <a class="nav__link  btn-2">Customers</a>
                <a class="nav__link  btn-3">Service Provider</a>
                <a class="nav__link  btn-4">Services Category</a>
                <a class="nav__link  btn-5">Services</a>
                <a href="./logout" class="nav__link">Logout</a>
            </nav>
        </div>

        <div class="content">

            <section class="content-container content-1 hide">

            </section>

            <!-- Customers -->
            <section class="content-container content-2 hide">
                <h2>Customers</h2>
                <?php
                $header = ["Id", "Name", "Email", "Birthday", "Status", "Action"];

                $users = array();

                foreach (UserDb::getAllUser() as $user) {

                    if ($user->getRole() !== Role::$EMPLOYEE) continue;

                    $data = array();

                    $action = "<button>active</button><button>delete</button>";

                    array_push($data,  $user->getId());
                    array_push($data,  $user->getName());
                    array_push($data,  $user->getEmail());
                    array_push($data,  $user->getBirthday());

                    $status = $user->isValid()  ? "active" : "deactivated";

                    array_push($data,  $status);
                    array_push($data,  $action);

                    array_push($users,  $data);
                }

                TableLayout::setLayout($header, $users, "customers-table");

                ?>
            </section>

            <!-- Service Providers -->
            <section class="content-container content-3">
                <h2>Service provider</h2>
                <?php

                $header = ["Id", "Name", "Email", "Birthday", "Status", "Action"];

                $users = array();

                foreach (UserDb::getAllUser() as $user) {

                    if ($user->getRole() !== Role::$USER) continue;

                    $data = array();

                    $action = "<button onclick=activate('" . $user->getId() . "')>active</button><button onclick=deleteUser('" . $user->getId() . "')>delete</button>";

                    array_push($data,  $user->getId());
                    array_push($data,  $user->getName());
                    array_push($data,  $user->getEmail());
                    array_push($data,  $user->getBirthday());

                    $status = $user->isValid()  ? "active" : "deactivated";

                    array_push($data,  $status);
                    array_push($data,  $action);

                    array_push($users,  $data);
                }

                TableLayout::setLayout($header, $users, 'provider-table');

                ?>
            </section>

            <!--  Services Category -->
            <section class="content-container content-4 hide">

                <h2>Services Category</h2>

                <div class="buttons">
                    <button class="btn" id="btn-category">New Category</button>
                </div>

                <?php
                $header = ["Id", "Title", "Description", "Created", "Status", "Action"];

                $services = array();

                foreach (TypeDb::getTypes() as $type) {

                    $data = array();

                    $id = $type->getId();

                    $action = "<button onclick=\"editService($id)\">edit</button><button>delete</button>";

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

                ?>

            </section>

            <!-- Services -->
            <section class="content-container content-5 hide">
                <?php

                echo "<h2>Services</h2>";

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

                ?>
            </section>

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
    </section>

    <script>
        const newCategory = document.querySelector('#new-category');
        const btnAddCategory = document.querySelector("#btn-category");

        const btn1 = document.querySelector('.btn-1');
        const btn2 = document.querySelector('.btn-2');
        const btn3 = document.querySelector('.btn-3');
        const btn4 = document.querySelector('.btn-4');
        const btn5 = document.querySelector('.btn-5');

        const content1 = document.querySelector('.content-1');
        const content2 = document.querySelector('.content-2');
        const content3 = document.querySelector('.content-3');
        const content4 = document.querySelector('.content-4');
        const content5 = document.querySelector('.content-5');

        const contents = [content1, content2, content3, content4, content5];
        const buttons = [btn1, btn2, btn3, btn4, btn5];

        // buttons click event
        buttons.forEach((button, index) => {
            button.addEventListener('click', () => {
                hidePages();
                contents[index].classList.remove('hide');
            })
        });

        // hide pages
        const hidePages = () => {
            contents.forEach(content => {
                if (!content.classList.contains('hide')) {
                    content.classList.add('hide');
                }
            });
        }

        btnAddCategory.addEventListener('click', () => {
            newCategory.classList.remove('hide');
        })

        //hide element base on id
        const hideElement = (id) => {
            document.querySelector('#' + id).classList.add('hide');
        }

        newCategory.addEventListener('submit', async (event) => {

            event.preventDefault();

            const title = document.querySelector("#category-title");
            const description = document.querySelector("#category-description");

            try {
                let result = await fetch("./add-type", {
                    method: "POST",
                    headers: {
                        'Content-Type': "application/json"
                    },
                    body: JSON.stringify({
                        title: title.value,
                        description: description.value,
                    })
                });

                const status = result.ok;
                result = await result.json();

                if (!status) throw new Error(result.message);

                alert("Added");

                newCategory.classList.add('hide');

            } catch (error) {
                alert(error.message);
            }

        })

        //delete user
        const deleteUser = (id) => {
            console.log(id);
        }

        const search = (name) => {
            console.log(name);
        }

        const showPagination = (id, page) => {

            const table = document.querySelector('#' + id);

            console.log(id + '-page-' + page);

            let index = 0;

            for (let row of table.rows) {

                //escape header
                if (index++ == 0) continue;

                if (row.classList.contains(id + '-page-' + page)) {
                    row.classList.remove('hide');
                } else {
                    row.classList.add('hide');
                }
            }

        }

        const editService = (id) => {
            console.log(id);
        }
    </script>
</body>

</html>