<?php

namespace Huuhuy\Demo\config;

class Database
{
    static $db;
    public static function getDB()
    {
        $servername = $_ENV['SERVER'];
        $username = $_ENV['TENTK'];
        $password = $_ENV['PASSWORD'];
        $database_name = $_ENV['DATABASENAME'];
        if (!isset(self::$db)){
            // khoi tao ket noi DB !!!
            self::$db = new \PDO("mysql:host={$servername};
            dbname={$database_name}",
                $username,$password);
            self::$db->setAttribute(\PDO::ATTR_ERRMODE,
                \PDO::ERRMODE_EXCEPTION);
        }
        return self::$db;
    }

}