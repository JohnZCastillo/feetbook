<?php

namespace db;

use Exception;
use db\Database;
use model\user\User;
use model\user\History;

require_once 'autoload.php';

class HistoryDb
{


    public static function login($sessionId, $email, $timestamp)
    {
        $connection = Database::open();

        $stmt = $connection->prepare("insert into history(email,session_id,login_date) values (?,?,?)");

        $stmt->bind_param(
            "sss",
            $email,
            $sessionId,
            $timestamp
        );

        $stmt->execute();

        $error = mysqli_error($connection);

        $stmt = $connection->prepare("select last_insert_id() as id");

        $stmt->execute();

        //get result
        $result = $stmt->get_result();

        // store result in array
        $data = $result->fetch_assoc();

        Database::close($connection);

        return $data["id"];
    }

    public static function logout($id, $timestamp)
    {

        // $id, $sessionId, $email, $timestamp);
        $connection = Database::open();


        $stmt = $connection->prepare("UPDATE history set logout_date = ? where id = ?");

        $stmt->bind_param(
            "sd",
            $timestamp,
            $id
        );

        $stmt->execute();

        $error = mysqli_error($connection);

        Database::close($connection);

        return $error;
    }

    public static function getHistories()
    {

        // open database connection
        $conn = Database::open();

        $stmt = $conn->prepare("SELECT *  from history");

        // execute prepared statement
        $stmt->execute();

        //get result
        $result = $stmt->get_result();

        $histories = array();

        while ($data = $result->fetch_assoc()) {
            //crete user base on collected data | more like format 
            $history = new History();

            $history->setId($data['id']);
            $history->setSessionId($data['session_id']);
            $history->setEmail($data['email']);

            $history->setLogin($data['login_date']);

            $history->setLogout($data['logout_date']);

            array_push($histories, $history);
        }

        Database::close($conn);

        // throw an exception data is null that means username is not present in db
        if ($histories == null) {
            throw new Exception('Username not found | Invalid Connection');
        }

        return $histories;
    }
}
