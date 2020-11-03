<?php
session_start();
include "config.php";

$login = $_POST['login'] ? strip_tags($_POST['login']) : "";
$pass = $_POST['pass'] ? strip_tags($_POST['pass']) : "";
$pass = md5($pass);

$sql = "select id from users where login='$login' and pass='$pass'";
$res = mysqli_query($connect,$sql) or die("Error: ".mysqli_error($connect));

if(mysqli_num_rows($res) == 1){
    $_SESSION['userName'] = $login;
    header("Location: ../view/accountPage.php");
}
else{
    $_SESSION['userName'] = 1; // "Неверный логин или пароль!"
    header("Location: ../view/accountPage.php");
}

