<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Query task</title>
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">
    <script src="public/js/selectQueryBody.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
</head>

<body>
<div class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
                <span class="sr-only">Open</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">Requests</a>
        </div>
        <div class="collapse navbar-collapse" id="responsive-menu">
            <ul class="nav navbar-nav">
                <li><a onclick="selectQueryBody('',1)">Page1</a></li>
                <li><a onclick="selectQueryBody('',2)">Page2</a></li>
            </ul>
        </div>
    </div>
</div>
</body>

