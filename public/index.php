<?php

require_once __DIR__ . '/../bootstrap.php';

try {
    $router = new \App\App\Router();
    $router->dispatchRequest();
} catch (Exception $e) {
    \App\App\Logger::log($e->getMessage());
    echo $e->getMessage();
}
