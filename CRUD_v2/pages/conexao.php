<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "estudando";

    $conn = new mysqli($host, $user, $pass, $db);

    if($conn->connect_errno){
        echo("Falha".$conn->connect_error);
    }