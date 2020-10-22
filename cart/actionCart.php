<?php

    include "../models/config.php";

    $action = $_GET['action'];
    $id = $_GET['id'];
    $path = "../img/".$_FILES['img']['name'];
    $title = $_POST['title'];
    $short_description = $_POST['short_description'];
    $description = $_POST['description'];
    $img = $_FILES['img']['name'];
    $price = $_POST['price'];

    if($action == "add"){
        $query = mysqli_query($connect, "SELECT * FROM cart WHERE `id_good` = $id;");
        if($quantity = mysqli_fetch_assoc($query)){
            $query = mysqli_query($connect, "SELECT `quantity` FROM `cart` WHERE `id_good` = $id;");
            $quantity = mysqli_fetch_assoc($query)['quantity']+1;
            if(mysqli_query($connect, "UPDATE `cart` SET `quantity` = $quantity WHERE `id_good` = $id;")){
                header("Location: ../index.php");
            }
        }
        else{
            $sql_addCart = "INSERT INTO `cart` (`id`, `id_user`, `id_good`, `quantity`) VALUES (NULL, '0', '$id', '1');";
            if(mysqli_query($connect,$sql_addCart)){
                header("Location: ../index.php");
            }
        }       
    }  

    if($action == "delete"){
        $query = mysqli_query($connect, "SELECT * FROM cart WHERE `id_good` = $id;");
        if($quantity = mysqli_fetch_assoc($query)){
            $query = mysqli_query($connect, "SELECT `quantity` FROM `cart` WHERE `id_good` = $id;");
            $quantity = mysqli_fetch_assoc($query)['quantity'];
            if($quantity>1){
                $quantity=$quantity-1;
                if(mysqli_query($connect, "UPDATE `cart` SET `quantity` = $quantity WHERE `id_good` = $id;")){
                    header("Location: cart.php");
                }
            }
            else{
                if(mysqli_query($connect,"DELETE FROM `cart` WHERE `cart`.`id_good` = $id")){
                    header("Location: cart.php");
                }
            }    
        }
    }
  