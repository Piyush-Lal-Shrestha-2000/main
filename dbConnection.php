<?php
    $host_name = "127.0.0.1";
    $database_name = "prototype";
    $username = "root";
    $password = "";
    $C = mysqli_connect($host_name, $username, $password, $database_name) or die("ERROR CONNECTING TO THE DATABASE.");