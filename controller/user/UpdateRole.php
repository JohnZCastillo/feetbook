<?php

namespace controller\user;

session_start();

require_once 'autoload.php';

use db\UserDb;
use Exception;
use model\user\Role;
use model\user\User;

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

//enable json
$json = file_get_contents('php://input');

// Converts it into a PHP object
$data = json_decode($json, true);

//save the created user to db.
//this return an exception if an error occured upon creation
//if error is present then redirect the user to signup page
function saveToDb($user)
{
    try {
        UserDb::registerUser($user);
        echo json_encode(['message' => 'registered']);
    } catch (Exception $ex) {
        http_response_code(403);
        echo json_encode(['message' => $ex->getMessage()]);
        die();
    }
}

//Note! validation of input must be done here
//no validation yet.
//check if $post values are valid base on condition present
function isValid()
{
    global $data;
    return isset($data['role'], $_SESSION['userId']);
}

if (isValid()) {

    try {

        //throw na error if user set as admin
        if (!strcasecmp($data["role"], Role::$ADMIN))  throw new Exception("not an admin");

        switch (mb_strtolower($data['role'])) {
            case "user":
                break;
            case "employee":
                break;
            default:
                throw new Exception("invalid role");
        }

        UserDb::registerRole($_SESSION['userId'], $data['role']);
        $_SESSION['userRole'] = mb_strtoupper($data['role']);
        echo json_encode(['message' => 'ok']);

        die();
    } catch (Exception $ex) {
        http_response_code(403);
        echo json_encode(['message' => $ex->getMessage()]);
        die();
    }
} else {
    http_response_code(422);
    echo json_encode(['message' => 'missing input']);
}
