<?php
namespace App\Controllers\IndexController;

use App\DbConnect as Dbconnect;

class IndexController
{
    public function home()
    {
        Dbconnect\DbConnect::getInstance();
        if (Dbconnect\DbConnect::getError()) {
            $errorDb = Dbconnect\DbConnect::getError();
            require_once ROOT . '/app/Views/Error.php';
        } else {
            require_once ROOT . '/app/Views/Home.php';
        }
    }

    public function error()
    {
        require_once ROOT . '/app/Views/Error.php';
    }
}
