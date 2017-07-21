<?php

require_once __DIR__ . '/../bootstrap.php';

try {
    $router = new App\System\Router();
    $router->dispatchRequest();
} catch (Exception $e) {
    App\System\Logger::log($e->getMessage());
    echo $e->getMessage();
}
