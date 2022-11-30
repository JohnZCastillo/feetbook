<?php

namespace view;

use views\components\Footer;
use views\components\MainNav;

require_once 'autoload.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Bootsrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;800&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,500&display=swap" rel="stylesheet" />
  <!-- custom css -->
  <link rel="stylesheet" href="./resources/css/custom.css" />
  <title>Our Team</title>
</head>

<body>
  <div class="mx-auto" style="max-width: 1400px">

    <!-- pull navigation -->
    <?php MainNav::nav() ?>
    <!-- Hero -->
    <div class="container-fluid vh-100" style="
          background-image: url('./resources/images/members/bg/hero.jpg');
          background-repeat: no-repeat;
          background-size: cover;
          background-position: center;
          max-height: 800px;
        ">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col text-light">
          <h1>Meet Our Team</h1>
          <p style="max-width: 60ch">
            Shoepa was founded in July 2022. It is a local shoe company, that established by the young developers. Behind of building this brand is, they seek to offer the best footwear for every individual so that their feet are protected, healthy and at the same time enjoy having an affordable fashionable design shoe.
          </p>
        </div>
        <div class="col"></div>
      </div>
    </div>

    <section class="container-fluid py-5">
      <p class="lead text-center mx-auto d-block" style="max-width:75ch;">Shoepa is lovingly built and maintained by these fine folks. Below you’ll find out each of the team and some details of what they do here:
        We’re 6 teammates strong in 1 office. All working together to make you feel better.
        We’re six members of the team, grinding for our dreams.
        Working all together to make you feel better.
      </p>
    </section>
    <!-- wrapper 1 -->
    <div class="container-fluid mx-auto bg-dark text-light">
      <div class="container-fluid w-75 py-md-5 py-3">
        <div class="row justify-content-center align-items-center">
          <div class="col-sm col-md-5">
            <img src="./resources/images/members/john.png" class="img-fluid mx-auto d-block p-2 rounded-circle bg-success scale-hover scale-shadow" style="max-width: 200px" />
          </div>
          <div class="col my-3 my-sm-0 text-center text-sm-start" style="max-width: 60ch">
            <h3>ADMINISTRATIVE SUPPORT</h3>
            <p>
              John is our Administrative Support, he knows location of everything, how things work, and where you can find them. Organize and effectively manage it. In his quality time, he spends this in coding, building website, helping household shore, saving memes in internet, reading manga and manhwa.
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- wrapper 2 -->
    <div class="container-fluid mx-auto bg-white text-dark">
      <div class="container-fluid w-75 py-md-5 py-3">
        <div class="row justify-content-center align-items-center">
          <div class="col-sm order-sm-2 col-md-5">
            <img src="./resources/images/members/jadeth.jpg" class="img-fluid mx-auto d-block p-2 rounded-circle bg-success scale-hover scale-shadow" style="max-width: 200px" />
          </div>
          <div class="col my-3 my-sm-0 text-center text-sm-end" style="max-width: 60ch">
            <h3>CUSTOMER SERVICE</h3>
            <p>
              Jadeth is a really good helping hand to the customer, she offers support to the customer both before-after they buy or use the product. She consistently meeting customer expectation. Even though her hair is short, she is patiently assisting the customer demands. She loves to spend her free time watching anime, kdrama and reading manhwa.
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- wrapper 3 -->
    <div class="container-fluid mx-auto bg-dark text-light">
      <div class="container-fluid w-75 py-md-5 py-3">
        <div class="row justify-content-center align-items-center">
          <div class="col-sm col-md-5">
            <img src="./resources/images/members/jen.jpg" class="img-fluid mx-auto d-block p-2 rounded-circle bg-success scale-hover scale-shadow" style="max-width: 200px" />
          </div>
          <div class="col my-3 my-sm-0 text-center text-sm-start" style="max-width: 60ch">
            <h3>DATA & ANALYTICS</h3>
            <p>
              Jen is too quickly learning and passionate that her boundless patience is perfect for working on endless data product development cycle. She’s into getting as many breakthrough insights as possible, data visualization, and data warehouses. In her spare time, playing COD, watching k-drama and covering songs. She adores cats.
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- wrapper 4 -->
    <div class="container-fluid mx-auto bg-light text-dark">
      <div class="container-fluid w-75 py-md-5 py-3">
        <div class="row justify-content-center align-items-center">
          <div class="col-sm order-sm-2 col-md-5">
            <img src="./resources/images/members/mark.jpg" class="img-fluid mx-auto d-block p-2 rounded-circle bg-success scale-hover scale-shadow" style="max-width: 200px" />
          </div>
          <div class="col my-3 my-sm-0 text-center text-sm-end" style="max-width: 60ch">
            <h3>FINANCE & ACCOUNTING</h3>
            <p>
              John manage the finance and the accounting, on a daily basis, settles accounts, takes care of tons of important documents, approves payments and assigns the heap of invoices to collective payments! Quite challenging, right? He so tall in person, and he does online earning websites in his spare time.
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- wrapper 5 -->
    <div class="container-fluid mx-auto bg-dark text-light">
      <div class="container-fluid w-75 py-md-5 py-3">
        <div class="row justify-content-center align-items-center">
          <div class="col-sm col-md-5">
            <img src="./resources/images/members/ico.png" class="img-fluid mx-auto d-block p-2 rounded-circle bg-success scale-hover scale-shadow" style="max-width: 200px" />
          </div>
          <div class="col my-3 my-sm-0 text-center text-sm-start" style="max-width: 60ch">
            <h3>DESIGN</h3>
            <p>
              Ivan is an enthusiastic person; he is our front-end designer; he is focused in designing details and the technical aspects of front-end development. In his free time, he plays mobile games and date his longtime girlfriend.
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- wrapper 6 -->
    <div class="container-fluid mx-auto bg-light text-dark">
      <div class="container-fluid w-75 py-md-5 py-3">
        <div class="row justify-content-center align-items-center">
          <div class="col-sm order-sm-2 col-md-5">
            <img src="./resources/images/members/asil.jpg" class="img-fluid mx-auto d-block p-2 rounded-circle bg-success scale-hover scale-shadow" style="max-width: 200px" />
          </div>
          <div class="col my-3 my-sm-0 text-center text-sm-end" style="max-width: 60ch">
            <h3>DIGITAL</h3>
            <p>
              Christian is passionate graphic artist; He build the logo of the company and also our product/photo editor. He is kind of good at dancing, Christian does play mobile games and basketball in his spare time or designing basketball varsity.
            </p>
          </div>
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