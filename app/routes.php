<?php
use App\Controllers\IndexController as Index;
use App\Controllers\Page1Controller as Page1;
use App\Controllers\Page2Controller as Page2;

function call($controller, $action, $query)
{
    require_once ROOT.'/app/Controllers/' . $controller . 'Controller.php';

    switch ($controller) {
        case 'Index':
            $controller = new Index\IndexController();
            break;
        case 'Page1':
            require_once ROOT . '/app/Models/RequestResult.php';
            $controller = new Page1\Page1Controller();
            break;
        case 'Page2':
            require_once ROOT . '/app/Models/RequestResult.php';
            $controller = new Page2\Page2Controller($query);
            break;
    }

    $controller->{ $action }();
}

$controllers = array('Index' => ['Home', 'Error'],
    'Page1' => ['Show', 'Error'],'Page2' => ['Show', 'Error']);

$controller[0]=strtoupper($controller[0]);
$action[0]=strtoupper($action[0]);

if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action, $query);
    } else {
        call('Index', 'Error','');
    }
} else {
    call('Index', 'Error','');
}
?>