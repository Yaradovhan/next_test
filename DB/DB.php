<?php

class DB
{
    protected static $connection;

    private function __construct() {

        try {
            self::$connection	= new PDO( 'mysql:charset=utf8mb4;mysql:host=localhost;dbname=next', 'test1', '47xc59v31');
            self::$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            self::$connection->setAttribute( PDO::ATTR_PERSISTENT, false );

        } catch (PDOException $e) {
            echo "Could not connect to database. Message below<hr />";
            echo $e->getMessage();
            exit;
        }

    }

    public static function getConnection() {
        if (!self::$connection) {
            new DB();
        }
        return self::$connection;
    }

}

