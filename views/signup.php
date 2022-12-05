<?php

use views\components\Header;
use views\components\MainNav;

session_start();
require_once 'autoload.php';

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Pull Header -->
  <?php Header::getHeader() ?>

  <title>Shoepa | Signup</title>
</head>

<body>



  <div class="main-wrapper">

    <!-- Pull Navigation -->
    <?php MainNav::nav() ?>

    <div class="singup-wrapper">
      <h1>Create New Account</h1>
      <p>Already registered? <a href="./login">Login here</a></p>
      <form class="singup-form" id="signup-form">
        <div class="form-block">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" required>
        </div>
        <div class="form-block">
          <label for="name">Email</label>
          <input type="email" name="name" id="email" required>
        </div>
        <div class="form-block">
          <label for="name">Password</label>
          <input type="password" name="name" id="password" required>
        </div>
        <div class="form-block">
          <label for="name">Date of Birth</label>
          <input type="date" name="date" id="birthday">
        </div>
        <div class="form-block">
          <button type="submit" class="btn btn-primary" id="singup">Signup</button>
        </div>
        <div class="error">
          <small class="error-display">
            <?php
            if (isset($_SESSION["signupError"])) {
              echo $_SESSION["signupError"];
              //clear error
              unset($_SESSION["singupError"]);
            }
            ?>
          </small>
        </div>
      </form>
    </div>
  </div>

  <?php unset($_SESSION['singupError']) ?>
  <script>
    const name = document.querySelector("#name");
    const email = document.querySelector("#email");
    const password = document.querySelector("#password");
    const birthday = document.querySelector("#birthday");

    const errorDisplay = document.querySelector('.error-display');

    const form = document.querySelector("#signup-form");

    form.addEventListener('submit', async (event) => {

      // prevent from sending.
      event.preventDefault();

      try {

        let result = await fetch("./register", {
          method: "POST",
          headers: {
            'Content-Type': "application/json"
          },
          body: JSON.stringify({
            name: name.value,
            email: email.value,
            password: password.value,
            birthday: birthday.value
          })
        });


        const isValid = result.ok;

        result = await result.json();

        //throw an error in receive status code is not 200
        if (!isValid) {
          throw new Error(result.message);
        }

        // clear input if signup success
        name.value = "";
        email.value = "";
        password.value = "";
        birthday.value = "";

        alert("Registration Success!");

      } catch (error) {
        errorDisplay.innerHTML = error.message;
        console.log(error.message);
      }
    });
  </script>
</body>

</html>