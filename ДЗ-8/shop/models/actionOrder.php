<?php
    session_start();
    include "config.php";

    if (isset($_SESSION['cart_goods']) && isset($_SESSION['userName'])) {
        // Получаем id пользователя
        $login = $_SESSION['userName'];
        $getUser = mysqli_query($connect,"SELECT * FROM `users` WHERE login='$login';");
        while($data = mysqli_fetch_assoc($getUser)){
            $idUser=$data['id'];
        }
        // Добавляем заказ в БД
        if(mysqli_query($connect, "INSERT INTO `orders` (`id_user`, `date_order`, `status_order`) VALUES ('$idUser', NOW(), 'Активен')")) {
            $idOrder = mysqli_insert_id($connect);
            // Добавляем информацию о товарах в заказе в БД
            $orderGood = $_SESSION['cart_goods'];
            foreach ($orderGood as $key => $val) {
                $idGood = $key;
                $goodCount = $val;
                mysqli_query($connect, "INSERT INTO `order_goods` (`id_order`, `id_good`, `good_count`) VALUES ('$idOrder', '$idGood', '$goodCount')");    
            }
        }
        unset($_SESSION['cart_goods']);
    }
    header ("location: ../view/accountPage.php");

    
    
