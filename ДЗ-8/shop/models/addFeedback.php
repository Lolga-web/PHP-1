<?php
    session_start();
    include 'config.php';

    $text = $_POST['text'];

    // Находим id юзера по логину из сессии
    $login = $_SESSION['userName'];
    $res_user = mysqli_query($connect,"SELECT * FROM `users` WHERE login='$login';");
    while($data = mysqli_fetch_assoc($res_user)){
        $id=$data['id'];    
    }
    // Добавляем отзыв в БД
    $sql = "INSERT INTO `feedbacks` (`id_user`, `text`, `date`) VALUES ($id, '$text', NOW())";
    $res = mysqli_query($connect,$sql);
    header("location: /shop/view/feedbacksPage.php");


