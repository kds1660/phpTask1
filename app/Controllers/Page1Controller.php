<?php

namespace App\Controllers\Page1Controller;

use App\Models\RequestResult as Request;

class Page1Controller
{
    public function show()
    {
        $sqlRuesult=Request\RequestResult::page1();
        include ROOT . '/app/Views/Page.php';
    }
}
