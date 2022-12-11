<?php

namespace controller\security;

require_once 'autoload.php';

use db\History;
use db\UserDb;
use Exception;
use model\user\Role;
use db\HistoryDb;


session_start();

// Note! This File expext a json format{email: '',password: ''}
// Takes raw data from the request

$json = file_get_contents('php://input');

// Converts it into a PHP object

$data = json_decode($json, true);


//validate value 
//retrieve user info baso on $email and then
//compare login input value and the retrieved user if they are same

function validate($email, $password)

{

    try {

        $user = UserDb::getUserByEmail($email);

        if ($user->getPassword() ===  $password && $user->getEmail() === $email) {

            $_SESSION['userRole'] = $user->getRole();

            $_SESSION['userEmail'] = $email;

            $_SESSION['email'] = $email;
            $_SESSION['fullname'] = $user->getFullname();
            $_SESSION['job'] = $user->getJob();
            $_SESSION['address'] = $user->getAddress();
            $_SESSION['mobile'] = $user->getMobile();

            $_SESSION['facebook'] = $user->getFacebook();
            $_SESSION['instagram'] = $user->getYoutube();
            $_SESSION['website'] = $user->getWebsite();

            $sessionId = session_id();
            $timestamp = date('Y-m-d H:i:s', time());

            //save login history
            $_SESSION['historyId'] = HistoryDb::login($sessionId, $email, $timestamp);

            return true;
        }

        return false;
    } catch (Exception $ex) {

        throw $ex;
    }
}


//validate user on login if they are present in database

function login($email, $password)
{

    try {

        if (validate($email, $password)) {



            $_SESSION['isLogin'] = true;
            $_SESSION['userEmail'] = $email;

            echo json_encode(['message' => 'ok']);

            die();
        }

        throw new Exception('Incorrect email or Password');
    } catch (Exception $ex) {

        $_SESSION['isLogin'] = false;

        $_SESSION['loginError'] = 'Incorrect email or Password';

        http_response_code(401);

        echo json_encode(['message' => $ex->getMessage()]);

        // echo 'login error';

        // header('Location: shoepa/login ');
    }
}

// echo json_encode(['message' => $data['password']]);

if (isset($data['email']) && isset($data['password'])) {

    $email = $data['email'];
    $password = $data['password'];

    login($email, $password);
} else {
    echo json_encode(['message' => 'Not Allowed']);
}

// login("admin", "admin");