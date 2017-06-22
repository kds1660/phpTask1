<?php
ini_set('error_reporting',E_ALL);
ini_set('display_errors',1);
include_once "app/header.php";

if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch($page){
        case '1':
            $_SESSION['querySelect']=1;
            include "app/bodyRequest.php";

            break;
        case '2':
            $studio="20th Century Fox";
            $_SESSION['querySelect']=2;
            include "app/bodyRequest.php";
            break;

    }
}
include_once "app/footer.php";
?>