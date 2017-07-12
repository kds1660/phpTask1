<?php
namespace App\Controllers\Page2Controller;

use App\Models\RequestResult as Request;
use Log\Logger as Log;

class Page2Controller
{
    public function __construct($query)
    {
        $this->query = $query;
    }

    public function show()
    {
        $sqlRuesult=Request\RequestResult::page2($this->query);
        include ROOT . '/app/Views/Selector.php';
        include ROOT . '/app/Views/Page.php';
        Log\Logger::log("Page2Controller - used method show for studio ".$this->query);
    }
}
