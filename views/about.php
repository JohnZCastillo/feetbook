<?php



namespace views;

use views\components\Footer;
use views\components\MainNav;

require_once 'autoload.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;800&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,500&display=swap" rel="stylesheet" />
  <!-- Bootsrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
  <!-- custom css -->
  <link rel="stylesheet" href="./resources/css/custom.css" />
  <title>About Us</title>
</head>

<body>


  <!-- pull navigation -->
  <?php MainNav::nav() ?>


  <!-- main container -->
  <div class="mx-auto" style="max-width: 1400px">

    <!-- hero -->
    <div class="container-fluid vh-100" style="max-height:800px; background-image:url('./resources/images/aboutus/hero.jpg'); background-repeat: no-repeat; background-size:cover; background-position:center">
      <div class="row justify-content-center align-items-center h-100">
        <div class="row text-light justify-content-center align-items-center">
          <div class="col col-10 col-sm-6 order-sm-2">
            <img src="./resources/images/logo/logo_light.png" class="img-fluid">
          </div>
          <div class="col text-center mt-3 text-sm-end col-sm-5">
            <h1 class="hero-text" style="color:#F9F871;">About Us</h1>
            <p class="lead">a journey of a thousand miles begins with a fabulous pair of shoes</p>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid py-5">
      <h2 class="text-center page-title">ORGANIZATIONAL CHART</h2>
      <div class="row">
        <!-- 1 -->
        <div class="col col-12 my-2">
          <div style="width:200px; height:250px" class="text-center mx-auto p-2 shadow rounded">
            <img src="./resources/images/members/john.png" class="w-100 h-75">
            <small class="d-block lead">John</small>
            <small>President</small>
          </div>
        </div>
        <!-- 2 -->
        <div class="col my-2">
          <div style="width:200px; height:250px" class="text-center mx-auto p-2 shadow rounded">
            <img src="./resources/images/members/mark.jpg" class="w-100 h-75">
            <small class="d-block lead">John Mark</small>
            <small>Vice President</small>
          </div>
        </div>
        <!-- 3 -->
        <div class="col my-2">
          <div style="width:200px; height:250px" class="text-center mx-auto p-2 shadow rounded">
            <img src="./resources/images/members/jadeth.jpg" class="w-100 h-75">
            <small class="d-block lead">Jadeth</small>
            <small>Vice President</small>
          </div>
        </div>
        <!-- 4 -->
        <div class="col my-2">
          <div style="width:200px; height:250px" class="text-center mx-auto p-2 shadow rounded">
            <img src="./resources/images/members/jen.jpg" class="w-100 h-75">
            <small class="d-block lead">Jennieca</small>
            <small>Vice President</small>
          </div>
        </div>
        <!-- 5 -->
        <div class="col my-2">
          <div style="width:200px; height:250px" class="text-center mx-auto p-2 shadow rounded">
            <img src="./resources/images/members/ico.png" class="w-100 h-75">
            <small class="d-block lead">Ivan</small>
            <small>Vice President</small>
          </div>
        </div>
        <!-- 6 -->
        <div class="col my-2">
          <div style="width:200px; height:250px" class="text-center mx-auto p-2 shadow rounded">
            <img src="./resources/images/members/asil.jpg" class="w-100 h-75">
            <small class="d-block lead">Christian</small>
            <small>Vice President</small>
          </div>
        </div>


      </div>
    </div>

    <!-- data -->
    <div class="container-fluid bg-light py-5 font-family-poppins ">
      <div class="row text-center justify-content-center align-items-center justify-content-lg-evenly align-items-lg-start text-lg-start ">
        <div class="col m-4 col-10 col-lg-3 p-3 shadow rounded bg-white">
          <h2 class="text-center page-title">MISSION</h2>
          <p class="text-justify">
            Our misson are to go beyond customer satisfaction by providing High
            quality products and services, while still being able to conduct our
            business in a manner that is environmentally sustainable. We will
            pursue processes that are designed to maximize efficient, minimize
            waste of materials and conserve reasources, in order to provide our
            custors and stakeholders with products that are long lasting by
            providing an excellent performance.
          </p>
        </div>
        <div class="col m-4 col-10 col-lg-3 p-3 shadow rounded bg-white">
          <h2 class="text-center page-title">VISION</h2>
          <p class="text-justify">
            Our vision is to establish a local shoes factory to be one of the
            best national manufactures. Moveover to maintain continuous
            development in the fsctory. While maintaining high quality of
            products and services in environmentally responsible practices.
          </p>
        </div>
        <div class="col m-4 col-10 col-lg-3  p-3 shadow rounded bg-white">
          <h2 class="text-center page-title">Core Values</h2>
          <p class="text-justify">
            Live for Dream, Integrity and Commitment, We Culture, Achieving
            Excellence,Consumer Oriented,Breakthrough.
          </p>
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
  <script>
    // if user is not login this trigger an error
    // because const sureLogout is trying to find an element
    // with an id of 'surelogout' but it is render only if user
    // is login.
    try {
      // show pop message when user click logout button
      const asker = document.getElementById('confirm');
      asker.addEventListener('click', function(event) {
        event.preventDefault();
        $('#confirmation').modal('show');
      });

      const sureLogout = document.getElementById('sureLogout');
      sureLogout.addEventListener('click', () => {
        $('#confirmation').modal('hide');
        window.location.replace("./php/security/Logout.php");
      });
    } catch (error) {
      console.log('cannot find element with an id of sureLogout');
    }

    // change nav background on scroll
    const navbar = document.querySelector('.nav-wrapper');
    window.onscroll = () => {
      if (window.scrollY > 30) {
        navbar.classList.add('bg-dark');
      } else {
        navbar.classList.remove('bg-dark');
      }
    };
  </script>
</body>

</html>