<?php
function executeRequest($req){
    global $link;
    $result = mysqli_query($link, $req);
    return array($result, $req);
}
