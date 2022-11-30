<?php

namespace views;

session_start();


require_once 'autoload.php';

use Exception;
use db\ProductDb;
use model\product\Category;
use views\components\Footer;
use views\components\MainNav;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoepa | Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./resources/css/custom.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,500&display=swap" rel="stylesheet" />

    <!-- fontawesoome -->
    <script src="https://kit.fontawesome.com/f0632fdfe1.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./resources/css/custom.css">
</head>

<body>

    <div class=" mx-auto" style="max-width: 1400px;">

        <!-- Modal -->
        <div class="modal" tabindex="-1" role="dialog" id="buy-modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h4>Thank you for your patronage!</h4>
                        <i class="fa-solid fa-check fa-2x" style="color:#5cb85c"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- pull navigation -->
        <?php MainNav::nav(); ?>

        <div class="container-fluid">

            <!-- Men -->
            <div class="py-4">
                <h3 class="page-title text-center" id='men'>MEN'S SHOES</h3>

                <!-- men products -->
                <div class="row mx-0 justify-content-center justify-content-md-start">

                    <?php
                    try {

                        foreach (ProductDb::getAllProducts() as $product) {
                            // exclude not mens category
                            if ($product->getCategory() !== Category::$MEN) continue;

                            // exclude low stock 
                            if ($product->getStock() <= 0) continue;


                            echo "<div class='col col-12 col-sm-5 col-md-4 col-lg-3 my-4 my-sm-2 px-0'>";
                            echo "<div class='card mx-3'>";
                            echo "<a class=' text-decoration-none text-dark'href='../fetch/ProductDetails.php?id=", $product->getId(), "'>";
                            echo "<img class='card-img-top' src='./resources/images/upload/", $product->getImagePath(), "'>";
                            echo "<div class='card-body px-2 ;'>";
                            echo "<small class='card-text text-secondary'> MEN </small>";
                            echo "<h4 class='card-title mb-3'>", $product->getName(), "</h4>";
                            echo "<p class='card-text'>";
                            echo substr($product->getDescription(), 0, 80);
                            echo " <span class='text-primary'> see more...</span>";
                            echo "</p>";
                            echo "</a>";
                            echo "<p class='card-text text-success lead'>₱", $product->getPrice(), "</p>";
                            echo "<a class='btn btn-primary d-block' onclick='showModal()'>Buy Now</a>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                    } catch (Exception $e) {
                        echo "<p class='text-center text-danger'>", $e->getMessage(), "</p>";
                    } ?>

                </div>

            </div>

            <!-- women -->
            <div class="py-4">
                <h3 class="page-title text-center" id='women'>WOMEN'S SHOES</h3>

                <!-- men products -->
                <div class="row mx-0 justify-content-center justify-content-md-start">

                    <?php
                    try {

                        foreach (ProductDb::getAllProducts() as $product) {
                            // exclude not mens category
                            if ($product->getCategory() !== Category::$WOMEN) continue;

                            // exclude low stock 
                            if ($product->getStock() <= 0) continue;


                            echo "<div class='col col-12 col-sm-5 col-md-4 col-lg-3 my-4 my-sm-2 px-0'>";
                            echo "<div class='card mx-3'>";
                            echo "<a class=' text-decoration-none text-dark'href='../fetch/ProductDetails.php?id=", $product->getId(), "'>";
                            echo "<img class='card-img-top' src='./resources/images/upload/", $product->getImagePath(), "'>";
                            echo "<div class='card-body px-2;'>";
                            echo "<small class='card-text text-secondary'> WOMEN </small>";
                            echo "<h4 class='card-title mb-3'>", $product->getName(), "</h4>";
                            echo "<p class='card-text'>";
                            echo substr($product->getDescription(), 0, 80);
                            echo " <span class='text-primary'> see more...</span>";
                            echo "</p>";
                            echo "</a>";
                            echo "<p class='card-text text-success lead'>₱", $product->getPrice(), "</p>";
                            echo "<a class='btn btn-primary d-block' onclick='showModal()'>Buy Now</a>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                    } catch (Exception $e) {
                        echo "<p class='text-center text-danger'>", $e->getMessage(), "</p>";
                    } ?>

                </div>

            </div>

            <!-- Kids -->
            <div class="py-4">
                <h3 class="page-title text-center" id='kid'>KID'S SHOES</h3>

                <!-- men products -->
                <div class="row mx-0 justify-content-center justify-content-md-start">

                    <?php
                    try {

                        foreach (ProductDb::getAllProducts() as $product) {
                            // exclude not mens category
                            if ($product->getCategory() !== Category::$KIDS) continue;

                            // exclude low stock 
                            if ($product->getStock() <= 0) continue;

                            echo "<div class='col col-12 col-sm-5 col-md-4 col-lg-3 my-4 my-sm-2 px-0'>";
                            echo "<div class='card mx-3'>";
                            echo "<a class=' text-decoration-none text-dark'href='../fetch/ProductDetails.php?id=", $product->getId(), "'>";
                            echo "<img class='card-img-top' src='./resources/images/upload/", $product->getImagePath(), "'>";
                            echo "<div class='card-body px-2;'>";
                            echo "<small class='card-text text-secondary'> KIDS </small>";
                            echo "<h4 class='card-title mb-3'>", $product->getName(), "</h4>";
                            echo "<p class='card-text'>";
                            echo substr($product->getDescription(), 0, 80);
                            echo " <span class='text-primary'> see more...</span>";
                            echo "</p>";
                            echo "</a>";
                            echo "<p class='card-text text-success lead'>₱", $product->getPrice(), "</p>";
                            echo "<a class='btn btn-primary d-block' onclick='showModal()'>Buy Now</a>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                    } catch (Exception $e) {
                        echo "<p class='text-center text-danger'>", $e->getMessage(), "</p>";
                    } ?>

                </div>

            </div>

        </div>

        <!-- pull footer -->
        <?php Footer::getFooter(); ?>


    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <!-- get js that changes navgiation background -->
    <script src="./resources/js/mainNav.js"></script>

    <script>
        //make the navigation bg to not change when user scroll
        setChange(false);
        // set the navigation bg to black
        setBlackBg();
        // make navbar sticky insted of fix-top
        setNavSticky();

        // Lunch modal on click
        function showModal() {

            $('#buy-modal').modal('show')

            // close modal after some time
            setTimeout(closeModal, 3000);

        }

        // close modal
        function closeModal() {
            $('#buy-modal').modal('hide')
        }
    </script>
</body>

</html>