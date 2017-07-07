<?php
function call($controller, $action, $query) {
    // require the file that matches the controller name
    require_once ROOT.'/app/Controllers/' . $controller . 'Controller.php';
    // create a new instance of the needed controller

    switch($controller) {
        case 'Index':
            $controller = new IndexController();
            break;
        case 'Page1':
            require_once ROOT.'/app/Models/RequestResult.php';
            $controller = new Page1Controller();
            break;
        case 'Page2':

            require_once ROOT.'/app/Models/RequestResult.php';
            $controller = new Page2Controller($query);
            break;

    }

    // call the action
    $controller->{ $action }();
}

// just a list of the controllers we have and their actions
// we consider those "allowed" values
$controllers = array('Index' => ['Home', 'Error'],
    'Page1' => ['Show', 'Error'],'Page2' => ['Show', 'Error']);
// check that the requested controller and action are both allowed
// if someone tries to access something else he will be redirected to the error action of the pages controller
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