<?php

class Page1Controller   {

    public function show() {
        $sqlRuesult=RequestResult::page1();
        include ROOT . '/app/Views/Page.php';
    }
}


?>