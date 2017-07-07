<?php

class Page2Controller   {

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function show() {
        $sqlRuesult=RequestResult::page2($this->query);
        include ROOT . '/app/Views/selector.php';
        include ROOT . '/app/Views/Page.php';
    }
}


?>