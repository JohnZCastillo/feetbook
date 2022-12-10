<?php

namespace controller\security;

require_once 'autoload.php';

use db\UserDb;
use Exception;
use model\user\Role;
use model\user\User;

session_start();

//enable json
$json = file_get_contents('php://input');

// Converts it into a PHP object
$data = json_decode($json, true);

//create and return user base $post value
function createUser()
{
    // global $data;
    // $user =  new User($data['name'], $data['password'], $data['email']);

    // //format date so that sql accept id
    // $formatedDate = strtotime($data['birthday']);
    // $data['birthday'] = date('Y-m-d H:i:s', $formatedDate); //now you can save in DB

    // //update birthday
    // $user->setBirthday($data['birthday']);

    // //return user
    // return $user;
}

//save the created user to db.
//this return an exception if an error occured upon creation
//if error is present then redirect the user to signup page
function saveToDb()
{
    global $data;

    try {

        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];

        $role = Role::$USER;

        //register person
        UserDb::registerPerson($name, $email);

        //resgister user
        UserDb::registerUser($email, $password, $role);

        //register linkst
        UserDb::registerLinks($email);

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
    return isset($data['name'], $data['email'], $data['password']);
}

if (isValid()) {
    saveToDb(createUser());
} else {
    http_response_code(422);
    echo json_encode(['message' => 'missing input']);
}

//Steps!
//Step 1: validate $post value
//Step 2: create a user base on $post value
//Step 3: save user info to db