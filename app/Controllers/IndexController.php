<?php

class IndexController {

    public function home() {
        \App\DbConnect\DbConnect::getInstance();
       if (\App\DbConnect\DbConnect::getError()){
          $errorDb= \App\DbConnect\DbConnect::getError();
           require_once ROOT.'/app/Views/Error.php';
       }else {
           require_once ROOT.'/app/Views/Home.php';
       }

    }

    public function error() {
       require_once ROOT.'/app/Views/Error.php';
    }
}


?>