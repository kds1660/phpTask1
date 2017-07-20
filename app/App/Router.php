<?php

namespace App\App;

class Router
{
    public function dispatchRequest()
    {
        $requestString = $_SERVER['REQUEST_URI'];
        $requestString = trim($requestString, '/');
        $requestParts = explode('/', $requestString);
        $partsNumber = count($requestParts);

        $action = $requestParts[$partsNumber - 1] ?: 'index';
        $action .= 'Action';
        unset($requestParts[$partsNumber - 1]);

        if (count($requestParts)) {
            array_walk($requestParts, function (&$item) {
                $item = ucfirst($item);
            });
            $controller = implode('\\', $requestParts);
        } else {
            $controller = 'Index';
        }

        $controllerClassName = sprintf('\App\Controllers\%sController', $controller);
        $controller = new $controllerClassName;

        $controller->$action();
    }
}
