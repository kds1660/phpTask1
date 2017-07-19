<?php
namespace App\Controllers\IndexController;

use App\DbConnect as Db;
use Log\Logger as Log;

class IndexController
{
    public function home()
    {
        Db\DbConnect::getInstance();
        if (Db\DbConnect::getError()) {
            $errorDb = Db\DbConnect::getError();
            require_once ROOT . '/app/Views/Error.php';
            Log\Logger::log('IndexController - Database Error'.$errorDb);
        } else {
            require_once ROOT . '/app/Views/Home.php';
            Log\Logger::log('IndexController - Load Homepage');
        }
    }

    public function error()
    {
        Log\Logger::log('IndexController - Load Errorpage');
        require_once ROOT . '/app/Views/Error.php';
    }
}
