<?php

namespace db;

use Exception;
use db\Database;
use model\user\User;

require_once 'autoload.php';

class UserDb
{

    //register user to db
    public static function registerUser($user)
    {

        // //check if username is available
        // if (self::isUsernameTaken($user->getUsername())) {
        //     throw new Exception('Username is in used');
        // }

        //check if username is available
        if (self::isEmailTaken($user->getEmail())) {
            throw new Exception('Email is in used');
        }

        $id =  $user->getId();
        $name =  $user->getName();
        $email =  $user->getEmail();
        $password =  $user->getPassword();
        $birthday =  $user->getBirthday();
        $role =  $user->getRole();

        $connection = Database::open();

        $stmt = $connection->prepare("INSERT INTO user values(?,?,?,?,?,?)");

        $stmt->bind_param(
            "ssssss",
            $id,
            $name,
            $email,
            $password,
            $birthday,
            $role
        );

        $stmt->execute();

        $error = mysqli_error($connection);

        Database::close($connection);

        return $error;
    }


    public static function getUserByEmail($email)
    {

        // open database connection
        $conn = Database::open();

        $stmt = $conn->prepare("SELECT id,username,email,password,role,birthday FROM user where email = ?");

        // set the ?'s mark data to parameter's data
        $stmt->bind_param("s", $email);

        // execute prepared statement
        $stmt->execute();

        //get result
        $result = $stmt->get_result();

        // store result in array
        $data = $result->fetch_assoc();

        // throw an exception data is null that means username is not present in db
        if ($data == null) {
            Database::close($conn);
            throw new Exception('Username not found | Invalid Connection');
        }

        Database::close($conn);

        //crete user base on collected data | more like format 
        $user = new User($data['username'], $data['password'], $data['email'],);

        // update id base on db
        $user->setId($data['id']);

        // update role base on db 
        $user->setRole($data['role']);

        //update birthday
        $user->setBirthday($data['birthday']);

        return $user;
    }

    public static function getAllUser()
    {

        // open database connection
        $conn = Database::open();

        $stmt = $conn->prepare("SELECT id,username,email,role,birthday FROM user");

        // execute prepared statement
        $stmt->execute();

        //get result
        $result = $stmt->get_result();

        $users = array();

        while ($data = $result->fetch_assoc()) {
            //crete user base on collected data | more like format 
            $user = new User($data['username'], 'NULL', $data['email']);

            // update id baso on db
            $user->setId($data['id']);

            // update role base on db 
            $user->setRole($data['role']);

            //update birthday
            $user->setBirthday($data['birthday']);

            array_push($users, $user);
        }

        Database::close($conn);

        // throw an exception data is null that means username is not present in db
        if ($users == null) {
            throw new Exception('Username not found | Invalid Connection');
        }

        return $users;
    }

    public static function isUsernameTaken($email)
    {
        try {
            self::getUserByEmail($email);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    //check if email is taken    
    public static function isEmailTaken($email)
    {
        try {

            // open database connecti/on
            $conn = Database::open();

            $stmt = $conn->prepare("SELECT username FROM user where email = ?");

            // set the ?'s mark data to parameter's data
            $stmt->bind_param("s", $email);

            // execute prepared statement
            $stmt->execute();

            //get result
            $result = $stmt->get_result();

            // store result in array
            $data = $result->fetch_assoc();

            // throw an exception data is null that means email is not present in db
            if ($data == null) {
                Database::close($conn);
                throw new Exception('Username not found | Invalid Connection');
            }

            Database::close($conn);
        } catch (Exception $ex) {
            return false;
        }

        return true;
    }
}
