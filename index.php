<?php
use App\DbConnect\DbConnect;

define('ROOT',__DIR__);

require_once ROOT.'/app/Logger.php';
require_once ROOT.'/app/DbConnect.php';

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'],'/')) : null;
$controller = isset($url[0]) ? $url[0] : 'Index';
$action = isset($url[1])&&count($url[1]) ? $url[1] : 'Home';
$query = isset($url[2])&&count($url[2]) ? $url[2] : '';
require_once ROOT.'/app/Views/Layout.php';

