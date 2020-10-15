<?php

  CONST PHOTO = "./img/big/";
  CONST PHOTO_SMALL = "./img/small/";

  CONST SERVER = "localhost";
  CONST DB = "lesson5";
  CONST LOGIN = "root";
  CONST PASS = "root";

  $connect = mysqli_connect(SERVER, LOGIN, PASS, DB) or die ("Ошибка при подключении к базе данных");
  
?>