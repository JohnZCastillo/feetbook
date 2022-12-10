<?php

namespace db;

use Exception;
use db\Database;
use model\user\User;

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

    public static function logout($id, $sessionId, $email, $timestamp)
    {
        $connection = Database::open();

        $stmt = $connection->prepare("UPDATE history SET logout_date = ? where session_id = ? and email = ? and id = ?");

        $stmt->bind_param(
            "ssss",
            $timestamp,
            $sessionId,
            $email,
            $id
        );

        $stmt->execute();

        $error = mysqli_error($connection);

        Database::close($connection);

        return $error;
    }
}
