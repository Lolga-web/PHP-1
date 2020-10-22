<?php
    CONST SERVER = "localhost";
    CONST DB = "shop";
    CONST LOGIN = "root";
    CONST PASS = "root";
  
    $connect = mysqli_connect(SERVER, LOGIN, PASS, DB) or die ("Ошибка при подключении к базе данных");
?>