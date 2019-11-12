<?php

abstract class DbManager 
{
    static private $_host = 'localhost';
    static private $_dbname = 'maje8864_blog';
    static private $_log = 'maje8864'; 
    static private $_password = 'GB5aLh-QSf5Z';

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