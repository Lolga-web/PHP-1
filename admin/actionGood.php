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

    if($action == "delete"){
        $sql_del = "delete from goods where id=$id";
        if(mysqli_query($connect,$sql_del)){
            header("Location: admin.php");
        }
    }

    if($action == "add"){
        move_uploaded_file($_FILES['img']['tmp_name'],$path);
        $sql_addGood = "INSERT INTO `goods` (`id`, `title`, `img`, `short_description`, `description`, `price`) VALUES (NULL, '$title', '$img', '$short_description', '$description', '$price')";
        if(mysqli_query($connect,$sql_addGood)){
            header("Location: admin.php");
        }
    }  

    if($action == "edit"){
        move_uploaded_file($_FILES['img']['tmp_name'],$path);
        $sql_editGood = "UPDATE `goods` SET `title` = '$title', `img` = '$img', `short_description` = '$short_description', `description` = '$description', `price` = '$price' WHERE `goods`.`id` = $id;";
        if(mysqli_query($connect,$sql_editGood)){
            echo 'Изменения внесены!';
        }
    }  
