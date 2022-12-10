<?php


namespace views;

require_once 'autoload.php';

use views\components\Header;
use views\components\MainNav;

session_start();

// redirect to home if user is already login
if (isset($_SESSION['isLogin'])) {
    if ($_SESSION['isLogin'] == true) {
        header('Location: ./redirect');
        die();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php Header::getHeader() ?>


    <title>Login</title>
</head>

<body>

    <div class="main-wrapper">

        <?php MainNav::nav() ?>

        <div class="login-wrapper">

            <form action="" class="login__form" id="login-form">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="field" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="field" required>
                </div>
                <div>
                    <button type="submit" id="login-btn">Login</button>
                </div>
                <div>
                    <small id="login-error">
                        <?php
                        if (isset($_SESSION["loginError"])) {
                            echo $_SESSION["loginError"];
                            //clear error
                            unset($_SESSION["loginError"]);
                        }
                        ?>
                    </small>
                </div>
            </form>
        </div>

    </div>

    <script>
        const form = document.querySelector("#login-form");
        const username = document.querySelector('#username');
        const password = document.querySelector('#password');
        const errorDisplay = document.querySelector("#login-error");

        form.addEventListener('submit', async (event) => {

            // prevent from sending.
            event.preventDefault();

            try {

                let result = await fetch("./auth", {
                    method: "POST",
                    headers: {
                        'Content-Type': "application/json"
                    },
                    body: JSON.stringify({
                        email: username.value,
                        password: password.value
                    })
                });

                const isValid = result.ok;

                result = await result.json();

                //throw an error in receive status code is not 200
                if (!isValid) {
                    throw new Error(result.message);
                }

                //redirect user if login is successful
                window.location.replace("./redirect");

            } catch (error) {
                console.log(errorDisplay);
                errorDisplay.innerHTML = error.message;
                console.log(error.message);
            }
        })
    </script>
</body>

</html>
<?php
unset($_SESSION["loginError"]);
unset($_SESSION["registerSuccess"]);
