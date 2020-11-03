<?php
    session_start();
    include "config.php";

    $action = $_GET['action'];
    $idGood = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $img = $_FILES['img']['name'];
    $price = $_POST['price'];

    if($action == "add"){
        $cartGoods = [];

        if (isset($_SESSION['cart_goods'])) {
            $cartGoods = $_SESSION['cart_goods'];
        }
        if (array_key_exists($idGood, $cartGoods)) {
            $cartGoods[$idGood] = $cartGoods[$idGood] + 1;
        } else {
            $cartGoods[$idGood] = 1;
        }

        $_SESSION['cart_goods'] = $cartGoods;
        $backLink = $_SERVER["HTTP_REFERER"];
        header("location: $backLink");

    } elseif ($action == 'plus') {
        $_SESSION['cart_goods'][$idGood]++;
        header("location: ../view/cartPage.php");

    } elseif ($action == 'minus') {
        if ($_SESSION['cart_goods'][$idGood] > 1) {
            $_SESSION['cart_goods'][$idGood]--;
            header("location: ../view/cartPage.php");
        } else {
            header("location: ../view/cartPage.php");
        }
        
    } elseif ($action == 'delete') {
        unset($_SESSION['cart_goods'][$idGood]);
        header("location: ../view/cartPage.php");
    }
    
       