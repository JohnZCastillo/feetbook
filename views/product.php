<?php

use Exception;
use db\ProductDb;
use views\components\Footer;

$root = '';
$dir = '';

require_once $root . $dir . 'php/db/ProductDb.php';
require_once $root . $dir . 'php/product/Product.php';
require_once $root . $dir . 'php/product/Category.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Shoepa | Product Details </title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,500&display=swap" rel="stylesheet" />
    <!-- Bootsrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <!-- custom css -->
    <link rel="stylesheet" href="./resources/css/custom.css" />
    <!-- fontawesoome -->
    <script src="https://kit.fontawesome.com/f0632fdfe1.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="mx-auto" style="max-width:1400px">


        <div class="continer-fluid">
            <!-- main navigation -->
            <div class="container-fluid bg-dark sticky-top nav-wrapper mx-auto" style="max-width:1400px">
                <nav class="navbar navbar-dark navbar-expand-lg">
                    <a class="navbar-brand text-light" href="#">
                        <img src="../../images/logo/logo_light.png" width="80px" height="80px">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                        <div class="navbar-nav justify-content-end">
                            <a class="nav-item nav-link active text-light" href="../../index.php">Home</a>
                            <a class="nav-item nav-link text-light" href="../page/Products.php">Products</a>
                            <a class="nav-item nav-link text-light" href="../page/AboutUs.php">About Us</a>
                            <a class="nav-item nav-link text-light" href="../page/OurTeam.php">Our Team</a>
                            <?php
                            try {
                                if (!isset($_SESSION['isLogin']))
                                    throw new Exception("not login");
                                if (isset($_SESSION['isLogin']) !== true)
                                    throw new Exception("not login");
                                echo "<a class='nav-item nav-link text-light' id='confirm' href='../security/Logout.php'>logout</a>";
                            } catch (Exception $ex) {
                                echo "<a class='nav-item nav-link text-light' href='../page/Login.php'>login</a>";
                            }
                            ?>
                        </div>
                    </div>
                </nav>
            </div>

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

            <div class="container-fluid my-5">
                <div class="row p-sm-4">




                    <?php


                    try {

                        // Initialize URL to the variable
                        $productId = $_REQUEST['id'];

                        $product = ProductDb::getProductById($productId);

                        $imagePath = "../../images/upload/" . $product->getImagePath();


                        echo "<div class='col col-12 col-md-6'>";
                        echo "<div class='row h-100 w-100 p-0 justify-content-center align-items-center mx-auto'>";
                        echo "<img class='image-fluid w-100'";
                        echo "src='$imagePath'";
                        echo "style='max-height:500px; max-width:400px'>";
                        echo "</div>";
                        echo "</div>";


                        echo "<div class='col px-4 py-sm-3'>";

                        echo "<div>";
                        echo "<i class='fa-solid fa-star text-warning'></i>";
                        echo "<i class='fa-solid fa-star text-warning'></i>";
                        echo "<i class='fa-solid fa-star text-warning'></i>";
                        echo "<i class='fa-solid fa-star-half text-warning'></i>";
                        echo "<small class='text-secondary text-bold'>4.5</small>";
                        echo "</div>";

                        echo "<div>";

                        //name
                        echo "<h1 class='page-title mb-0'>";
                        echo $product->getName();
                        echo "</h1>";

                        //Category
                        echo "<small class='card-text text-secondary mb-2'>";
                        echo $product->getCategory();
                        echo "</small>";

                        //price
                        echo "<h3 class='text-success lead'>";
                        echo "₱", $product->getPrice();
                        echo "</h3>";

                        //description
                        echo "<p class='text-secondary'>";
                        echo $product->getDescription();
                        echo "</p>";

                        //size 
                        echo "<div class='my-3 d-flex flex-wrap align-items-center' style='gap:10px'>";
                        echo "<small class='text-secondart'>Size</small>";
                        echo "<span class='btn bg-secondary text-light'>21</span>";
                        echo "<span class='btn bg-secondary text-light'>22</span>";
                        echo "<span class='btn bg-secondary text-light'>23</span>";
                        echo "<span class='btn bg-secondary text-light'>24</span>";
                        echo "</div>";

                        // buy button
                        echo "<div class='btn btn-primary' onclick='showModal()'>";
                        echo "Buy Now";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    } catch (Exception $e) {
                        echo "<p class='text-danger'>Product Not Available</p>";
                    }
                    ?>
                </div>
            </div>

            <!-- pull footer -->
            <?php Footer::getFooter(); ?>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script>
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