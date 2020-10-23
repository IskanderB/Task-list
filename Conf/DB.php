<?php
namespace App\Conf;
/**
 * Config class of data base
 */
abstract class DB
{
    const USER = 'root';
    const PASS = 'root';
    const HOST = 'db';
    const DB   = 'task_list_db';

    public static function connToDB()
    {
        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db = self::DB;

        $conn = new \PDO("mysql:dbname=$db;host=$host", $user, $pass, [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
        return $conn;
    }
}
