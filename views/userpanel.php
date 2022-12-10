<?php

use model\user\Role;

session_start();

// // redirect user if not login
// if (!isset($_SESSION["isLogin"])) {
//     $_SESSION["loginError"] = "You're not login!. Login First";
//     header('Location: ./login');
//     exit();
// }

// //redirect to login page if not login
// if (!$_SESSION["isLogin"]) {
//     header('Location: ./login');
//     exit();
// }

// if ($_SESSION['userRole'] !== Role::$USER) {
//     header('Location: ./redirect');
// }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/resources/css/style.css" />
    <link rel="stylesheet" href="/resources/css/userpanel.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title>Document</title>
  </head>
  <style>
    .fa-user {
      font-size: 15rem;
      color: var(--primary-color);
    }
  </style>
  <body>
    <div class="container">
      <div class="profile">
        <div class="main text-center">
          <div class="user">
            <i class="fa fa-user" aria-hidden="true"></i>
            <p>JOHN SMITH</p>
          </div>
          <p class="user">
            Fullstack Developer <br />
            Bay Area, San Franciso, CA
          </p>
        </div>
        <div class="main">
          <ul>
            <li>
              <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"> </i><span> smith.com</span></a>
            </li>
            <li>
              <a href="#"><i class="fa fa-instagram" aria-hidden="true"> </i><span> mr.smith</span></a>
            </li>
            <li>
              <a href="#"><i class="fa fa-globe" aria-hidden="true"> </i><span> smithbot.com</span></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="profile">
        <div class="profile-details">
          <p class="log-out">Logout</p>
          <div>
            <table style="width: 100%">
              <tr>
                <td>Fullname</td>
                <td style="width: 80%">Jonathan Smith</td>
              </tr>
              <tr>
                <td>Email</td>
                <td>smith@gmail.com</td>
              </tr>
              <tr>
                <td>Phone</td>
                <td>09234651103</td>
              </tr>
              <tr>
                <td>Mobile</td>
                <td>+63955602570</td>
              </tr>
              <tr>
                <td>Address</td>
                <td>Bay Area, San Francisco, CA</td>
              </tr>
            </table>
          </div>
        </div>
        <div>
          <p class="project">Projects</p>
          <div style="padding: 2em; line-height: 2em">
            <p>Web Design</p>
            <p>Web Markup</p>
            <p>One Piece</p>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
