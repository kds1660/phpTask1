<?php

namespace App\Controllers;

class IndexController extends AbstractController
{
    public function indexAction()
    {
        echo $this->renderLayout();
    }
//
//    public function errorAction()
//    {
//        Logger::log('IndexController - Load Errorpage');
//        require_once 'app/Views/Error.php';
//    }
}
