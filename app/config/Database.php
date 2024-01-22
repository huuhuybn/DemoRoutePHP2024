<?php

namespace Huuhuy\Demo\config;

class Database
{
    static $db;
    public static function getDB()
    {
        $servername ='sql.freedb.tech';
        $username = 'freedb_underroot';
        $password = '26Ke2xWThh4R$WJ';
        $database_name = 'freedb_fpolyhn';
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