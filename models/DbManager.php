<?php

abstract class DbManager 
{

    static private $_host = 'localhost';
    static private $_dbname = 'blog';
    static private $_log = 'root'; 
    static private $_password = '';

    static public function dbConnect()
    {
        $db = new PDO(
            'mysql:host='. self::$_host 
            .';dbname=' . self::$_dbname 
            . ';charset=utf8', 
            self::$_log,  
            self::$_password, 
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        return $db;
    }

} 