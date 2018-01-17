<?php

namespace TP\Core;

use PDO;

class DB{

    private static $db;

    static function getInstance(){
        if(self::$db == null){
            self::$db = self::getConnection();
        }
        return self::$db;
    }

    private function __construct(){}

    private static function getConnection()
    {
        //information sur la BDD
        $servername = "localhost";
        $port = 3306;
        $dbname = "ptdw";
        $charset = "utf8";
        $username = "root";
        $password = "";

        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        return new \PDO("mysql:host=$servername;port=$port;
                                            dbname=$dbname;charset=$charset",
            $username, $password, $options);

    }

}