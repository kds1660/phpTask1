<?php

namespace App\DbConnect;
use \PDO;

class DbConnect
{


    private static $instance;
    private static $error;
    private static $config;

    private function __construct()
    {
    }

    private function __clone()
    {
    }


    public static function getInstance()
    {
        $config = (array) parse_ini_file(dirname(__DIR__) . '/private/config.ini');

        $host=$config['servername'];
        $user=$config['username'];
        $pass=$config['password'];
        $db=$config['dbname'];

        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            try {
                self::$instance = new PDO("mysql:host=$host;dbname=$db", $user, $pass, $pdo_options);
            } catch (\PDOException $e){
                self::$error = $e->getMessage();
            }

        }
        return self::$instance;
    }

public static function getError()
{
    return self::$error;
}

}

?>
