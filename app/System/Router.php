<?php

namespace App\System;

class Router
{
    public function dispatchRequest()
    {
        $requestString = $_SERVER['REQUEST_URI'];
        $requestString = trim($requestString, '/');
        $requestParts = explode('/', $requestString);
        $partsNumber = count($requestParts);
//todo not index - error
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
        $queryStudio=$_POST['studio'] ?? null;
        if(class_exists($controllerClassName)) {
            $controller = new $controllerClassName($queryStudio);

        } else {
            $controllerClassName='\App\Controllers\IndexController';
            $controller = new $controllerClassName();
            $action='errorAction';
        }

        method_exists($controller,$action)?$controller->$action():$controller->errorAction();



    }
}
