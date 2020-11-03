<?php
    session_start();
    include 'config.php';

    if (isset($_POST['submit'])) {
        
        $login = trim( strip_tags ($_POST['login']));
        $pass = trim( strip_tags ($_POST['pass']));
        $pass = md5($pass);
        $name = trim( strip_tags ($_POST['name']));
        $email = trim( strip_tags ($_POST['email']));

        $result = mysqli_query($connect, "SELECT id FROM users WHERE login='$login';");
        $myrow = mysqli_fetch_array($result);
        if (!empty($myrow['id'])) {
            $_SESSION['userName'] = 2; // "Такой логин уже зарегистрирован!"
            header("location: /shop/view/accountPage.php");
            exit();
        }

        $result = mysqli_query($connect, "SELECT id FROM users WHERE email='$email';");
        $myrow = mysqli_fetch_array($result);
        if (!empty($myrow['id'])) {
            $_SESSION['userName'] = 3; // "Такой адрес электронной почты уже зарегистрирован!"
            header("location: /shop/view/accountPage.php");
            exit();
        }

        mysqli_query($connect, "INSERT INTO users(login, pass, name, email, status) VALUES ('$login', '$pass', '$name', '$email', 'user')");
        $_SESSION['userName'] = $login;
        header("location: /shop/view/accountPage.php");
    }