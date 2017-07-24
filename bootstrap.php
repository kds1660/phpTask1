<?php

$dir = dir(__DIR__);
chdir($dir->path);
ini_set('error_reporting', E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', '/Log/log.log');
ini_set('display_errors', 1);

require_once 'vendor/autoload.php';
