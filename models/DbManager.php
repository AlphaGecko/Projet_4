<?php

abstract class DbManager 
{

    static private $host = 'localhost';
    static private $dbname = 'blog';
    static private $log = 'root'; 
    static private $password = '';

    static public function dbConnect()
    {
        $db = new PDO(
            'mysql:host='. self::$host 
            .';dbname=' . self::$dbname 
            . ';charset=utf8', 
            self::$log,  
            self::$password, 
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        return $db;
    }

} 