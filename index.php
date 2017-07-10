<?php
define('ROOT', __DIR__);
require_once ROOT . '/app/config.php';
require_once ROOT.'/app/DbConnect.php';
ini_set('error_reporting', E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', ROOT.'/log/log.log');
ini_set('display_errors', 1);

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : null;
$controller = isset($url[0]) ? $url[0] : 'Index';
$action = isset($url[1])&&count($url[1]) ? $url[1] : 'Home';
$query = isset($url[2])&&count($url[2]) ? $url[2] : '';
require_once ROOT.'/app/Views/Layout.php';
