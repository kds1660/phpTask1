<?php

namespace App\Db;

use \PDO;

class Connection
{
    private static $instance;
    private static $error;

    private function __construct()
    {
    }

    private function __clone()
    {
    }


    public static function getInstance()
    {
        if (null === self::$instance) {
            $config = (array) parse_ini_file('private/config.ini');

            $user = $config['username'];
            $db = $config['dbname'];

            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            try {
                self::$instance = new PDO(
                    "mysql:host={$config['servername']};dbname=$db",
                    $user,
                    $config['password'],
                    $pdo_options
                );
            } catch (\PDOException $e) {
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
