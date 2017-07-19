<?php
use Log\Logger as Log;

require_once __DIR__ . '/config.php';
require_once ROOT . '/app/DbConnect.php';
require_once ROOT . '/Log/Logger.php';

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : null;
$controller = isset($url[0]) ? $url[0] : 'Index';
$action = isset($url[1])&&count($url[1]) ? $url[1] : 'Home';
$query = isset($url[2])&&count($url[2]) ? $url[2] : '';
Log\Logger::log('Use controller '.$controller.' action '.$action );
require_once ROOT . '/app/Views/Layout.php';
