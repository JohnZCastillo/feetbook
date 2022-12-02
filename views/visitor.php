<?php

namespace views;

use model\user\Role;

require_once 'autoload.php';

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
if ($_SESSION['userRole'] !== Role::$VISITOR) {
    header('Location: ./redirect');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor</title>
</head>

<body>
    <h1>Pick Your Role</h1>
    <div>
        <h2 id="customer">I am Customer</h2>
        <h2 id="service">I a Service Provider</h2>
    </div>

    <script>
        const customer = document.querySelector('#customer');
        const service = document.querySelector('#service');

        customer.addEventListener('click', async () => {

            try {

                let result = await fetch("./update-role", {
                    method: "POST",
                    headers: {
                        'Content-Type': "application/json"
                    },
                    body: JSON.stringify({
                        role: "user",
                    })
                });

                const status = result.ok;
                result = await result.json();

                if (!status) throw new Error(result.message);

                console.log(result.message);

            } catch (error) {
                console.log(error.message);
            }
        });
    </script>
</body>

</html>