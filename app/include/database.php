<?php
ini_set('display_errors', 1);
$config = parse_ini_file(dirname(__DIR__) . "/../private/config.ini");

$link = mysqli_connect($config['servername'], $config['username'], $config['password'], $config['dbname']);

if (mysqli_connect_errno()) {
    echo "<div class='alert alert-danger'>Error connect (" . mysqli_connect_error() . ")</div>";
    exit();
} else {
    echo "<div class='alert alert-success'>Db connected</div>";
}