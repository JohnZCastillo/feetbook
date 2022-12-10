<?php

namespace db;

require_once 'autoload.php';

class Config
{

    // local development
    private static $servername = "127.0.0.1:3308";
    private static $username = "root";
    private static $password = "";
    private static $database = "feetbook";

    //configuration
    // private static $servername = "sql301.epizy.com:3306";
    // private static $username = "epiz_32856214";
    // private static $password = "fJ0SagRMl7NWb";
    // private static $database = "epiz_32856214_laravel";

    public static function getServername()
    {
        return self::$servername;
    }

    public static function getUsername()
    {
        return self::$username;
    }

    public static function getPassword()
    {
        return self::$password;
    }

    public static function getDatabase()
    {
        return self::$database;
    }
}
