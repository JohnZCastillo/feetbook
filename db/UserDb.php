<?php

namespace db;

use Exception;
use db\Database;
use model\user\User;

require_once 'autoload.php';

class UserDb
{

    //register person in databse
    public static function registerPerson($fullname, $email)
    {

        //check if username is available
        if (self::isEmailTaken($email)) {
            throw new Exception('Email is in used');
        }

        $connection = Database::open();

        $stmt = $connection->prepare("INSERT INTO person(fullname,email) values(?,?)");

        $stmt->bind_param(
            "ss",
            $fullname,
            $email,
        );

        $stmt->execute();

        $error = mysqli_error($connection);

        Database::close($connection);

        return $error;
    }

    // register as user and put to the database
    public static function registerUser($email, $password, $role)
    {

        $connection = Database::open();

        $stmt = $connection->prepare("INSERT INTO user(email,password,role) values(?,?,?)");

        $stmt->bind_param(
            "sss",
            $email,
            $password,
            $role
        );

        $stmt->execute();

        $error = mysqli_error($connection);

        Database::close($connection);

        return $error;
    }

    public static function registerLinks($email)
    {
        $connection = Database::open();

        $stmt = $connection->prepare("INSERT INTO links(person_email) values(?)");

        $stmt->bind_param(
            "s",
            $email,
        );

        $stmt->execute();

        $error = mysqli_error($connection);

        Database::close($connection);

        return $error;
    }

    public static function registerRole($userId, $userRole)
    {

        $id = $userId;
        $role = mb_strtoupper($userRole);
        $connection = Database::open();

        $stmt = $connection->prepare("UPDATE user SET ROLE = ? WHERE id = ?");

        $stmt->bind_param(
            "ss",
            $role,
            $id
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

        $stmt = $conn->prepare("
        SELECT person.fullname, person.email,person.mobile,person.address,person.job,person.area,person.created,facebook,youtube,website,password,status,profile,role FROM (Person 
        INNER JOIN user us ON person.email = us.email
        INNER JOIN links li ON person.email = li.person_email)
        WHERE person.email = ?");

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
        $user = new User($data['fullname'], $data['email'], $data['password'],);

        // update role base on db 
        $user->setRole($data['role']);

        return $user;
    }

    public static function getUserById($id)
    {

        // open database connection
        $conn = Database::open();

        $stmt = $conn->prepare("SELECT id,username,email,password,role,birthday FROM user where id = ?");


        // set the ?'s mark data to parameter's data
        $stmt->bind_param("s", $id);

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

        $stmt = $conn->prepare("SELECT person.fullname, person.email,person.mobile,person.address,person.job,person.area,person.created,facebook,youtube,website,password,status,profile,role FROM Person INNER JOIN user us ON person.email = us.email INNER JOIN links li ON person.email = li.person_email");

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

            $stmt = $conn->prepare("SELECT person.fullname, person.email,person.mobile,person.address,person.job,person.area,person.created,facebook,youtube,website,password,status,profile,role FROM Person INNER JOIN user us ON person.email = us.email INNER JOIN links li ON person.email = li.person_email WHERE person.email = ?");

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
