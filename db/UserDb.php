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
        $user = new User($data['fullname'], $data['email'], $data['password']);

        $user->setFullname($data['fullname']);
        $user->setEmail($data['email']);
        $user->setMobile($data['mobile']);
        $user->setAddress($data['address']);
        $user->setJob($data['job']);
        $user->setArea($data['area']);
        $user->setPassword($data['password']);
        $user->setStatus($data['status']);
        $user->setCreated($data['created']);
        $user->setRole($data['role']);
        $user->setFacebook($data['facebook']);
        $user->setYoutube($data['youtube']);
        $user->setWebsite($data['website']);
        $user->setProfile($data['profile']);

        return $user;
    }

    public static function getUserById($id)
    {

        // open database connection
        $conn = Database::open();

        $stmt = $conn->prepare("SELECT person.fullname, person.email,person.mobile,person.address,person.job,person.area,person.created,facebook,youtube,website,password,status,profile,role FROM person INNER JOIN user us ON person.email = us.email INNER JOIN links li ON person.email = li.person_email where id = ?");


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
        $user = new User($data['fullname'], $data['email'], $data['password']);


        $user->setFullname($data['fullname']);
        $user->setEmail($data['email']);
        $user->setMobile($data['mobile']);
        $user->setAddress($data['address']);
        $user->setJob($data['job']);
        $user->setArea($data['area']);
        $user->setPassword($data['password']);
        $user->setStatus($data['status']);
        $user->setCreated($data['created']);
        $user->setRole($data['role']);
        $user->setFacebook($data['facebook']);
        $user->setYoutube($data['youtube']);
        $user->setWebsite($data['website']);
        $user->setProfile($data['profile']);

        return $user;
    }


    public static function getAllUser()
    {

        // open database connection
        $conn = Database::open();

        $stmt = $conn->prepare("SELECT person.fullname, person.email,person.mobile,person.address,person.job,person.area,person.created,facebook,youtube,website,password,status,profile,role FROM person INNER JOIN user us ON person.email = us.email INNER JOIN links li ON person.email = li.person_email");

        // execute prepared statement
        $stmt->execute();

        //get result
        $result = $stmt->get_result();

        $users = array();

        while ($data = $result->fetch_assoc()) {
            //crete user base on collected data | more like format 
            $user = new User($data['fullname'], $data['email'], $data['password']);

            $user->setFullname($data['fullname']);
            $user->setEmail($data['email']);
            $user->setMobile($data['mobile']);
            $user->setAddress($data['address']);
            $user->setJob($data['job']);
            $user->setArea($data['area']);
            $user->setPassword($data['password']);
            $user->setStatus($data['status']);
            $user->setCreated($data['created']);
            $user->setRole($data['role']);
            $user->setFacebook($data['facebook']);
            $user->setYoutube($data['youtube']);
            $user->setWebsite($data['website']);
            $user->setProfile($data['profile']);

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

            $stmt = $conn->prepare("SELECT person.fullname, person.email,person.mobile,person.address,person.job,person.area,person.created,facebook,youtube,website,password,status,profile,role FROM person INNER JOIN user us ON person.email = us.email INNER JOIN links li ON person.email = li.person_email WHERE person.email = ?");

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

    public static function updateLink($email, $link, $value)
    {
        $connection = Database::open();

        $statment = "";

        switch ($link) {
            case "facebook":
                $statment = "UPDATE links set facebook = ? where person_email = ?";
                break;
            case "instagram":
                $statment = "UPDATE links set youtube = ? where  person_email = ?";
                break;
            case "website":
                $statment = "UPDATE links set website = ? where  person_email = ?";
                break;
        }

        $stmt = $connection->prepare($statment);

        $stmt->bind_param(
            "ss",
            $value,
            $email
        );

        $stmt->execute();

        $error = mysqli_error($connection);

        Database::close($connection);

        return $error;
    }

    public static function updateDetails($email, $link, $value)
    {
        $connection = Database::open();

        $statment = "";

        switch ($link) {
            case "fullname":
                $statment = "UPDATE person set fullname = ? where email = ?";
                break;
            case "mobile":
                $statment = "UPDATE person set mobile = ? where email = ?";
                break;
            case "address":
                $statment = "UPDATE person set address = ? where email = ?";
                break;
            case "job":
                $statment = "UPDATE person set job = ? where email = ?";
                break;
        }

        $stmt = $connection->prepare($statment);

        $stmt->bind_param(
            "ss",
            $value,
            $email
        );

        $stmt->execute();

        $error = mysqli_error($connection);

        Database::close($connection);

        return $error;
    }

    public static function blockUser($id)
    {

        $connection = Database::open();

        $statment = "UPDATE user set status = 0 where email = ?";

        $stmt = $connection->prepare($statment);

        $stmt->bind_param(
            "s",
            $id
        );

        $stmt->execute();

        $error = mysqli_error($connection);

        Database::close($connection);

        return $error;
    }

    public static function unblockUser($id)
    {

        $connection = Database::open();

        $statment = "UPDATE user set status = 1 where email = ?";

        $stmt = $connection->prepare($statment);

        $stmt->bind_param(
            "s",
            $id
        );

        $stmt->execute();

        $error = mysqli_error($connection);

        Database::close($connection);

        return $error;
    }

    public static function updateUserProfile($id, $link)
    {
        $connection = Database::open();

        $stmt = $connection->prepare("UPDATE user set profile = ? WHERE email = ?");

        $stmt->bind_param("ss", $link, $id);
        $stmt->execute();

        $error = mysqli_error($connection);

        Database::close($connection);

        if ($error !== null && $error !== '') {
            throw new Exception("Update Failed ");
        }
    }

    // delete user but must also delete its history
    public static function deleteUser($id)
    {

        $connection = Database::open();

        $statement[0] = "Delete from history where email = ?";
        $statement[1] = "Delete from links where person_email = ?";
        $statement[2] = "Delete from user where email = ?";
        $statement[3] = "Delete from person where email = ?";


        foreach ($statement as $query) {
            $stmt = $connection->prepare($query);
            $stmt->bind_param(
                "s",
                $id
            );

            $stmt->execute();
        }

        $error = mysqli_error($connection);

        Database::close($connection);

        return $error;
    }
}
