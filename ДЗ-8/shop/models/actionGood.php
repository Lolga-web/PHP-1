<?php
    include "config.php";

    $action = $_GET['action'];
    $id = $_GET['id'];
    $path = "../img/goods/";
    $title = $_POST['title'];
    $description = $_POST['description'];
    $img = $_POST['img'];
    $price = $_POST['price'];

    if($action == "delete"){
        // Находим и удаляем из файла изображение товара
        $getId=mysqli_query($connect,"SELECT * FROM goods WHERE id=$id;");
        while($data = mysqli_fetch_assoc($getId)){
            $img=$data['img'];
            unlink($path.$img);
        }
        // Удаляем карточку товара из БД
        $sql_del = "delete from goods where id=$id";
        if(mysqli_query($connect,$sql_del)){
            header("Location: ../view/accountPage.php");
        }
    }

    if($action == "add"){
        // Перемещаем изображение, меняя имя на "new_img"
        $endName = explode(".",$_FILES["img"]["name"]);
        $newImgName = 'new_img'.'.'.end($endName);
        move_uploaded_file($_FILES["img"]["tmp_name"], "../img/goods/".$newImgName);
        // Добавляем данные в БД
        $sql_addGood = "INSERT INTO `goods` (`title`, `img`, `description`, `price`) VALUES ('$title', '$newImgName', '$description', '$price')";
        if(mysqli_query($connect,$sql_addGood)){
            // Получаем id нового товара
            $getId=mysqli_query($connect,"SELECT * FROM goods WHERE img='$newImgName';");
            while($data = mysqli_fetch_assoc($getId)){
                $id=$data['id'];
                $img=$data['img'];
                // Делаем имя картинки в карточке товара такое же как и id товара
                $idImgName = $id.'.'.end($endName);
                if(mysqli_query($connect,"UPDATE `goods` SET `img` = '$idImgName' WHERE `goods`.`id` = $id;")){
                    rename($path.$newImgName, $path.$idImgName);
                    header("Location: ../view/accountPage.php");
                }
                else {
                    echo "Ошибка добавления файла";
                }
            }
        }
        else {
            echo "Ошибка добавления файла";
        }
    }  

    if($action == "edit"){
        if (is_uploaded_file($_FILES['img']['tmp_name'])){
            // Если загружено новое изображение, получаем имя файла старого изображения и удаляем его
            $getId=mysqli_query($connect,"SELECT * FROM goods WHERE id=$id;");
            while($data = mysqli_fetch_assoc($getId)){
                $img=$data['img'];
                unlink($path.$img); // !!!!!!!!!!!!
            }
            // Загружаем и переименовываем новое изображение
            $endName = explode(".",$_FILES["img"]["name"]);
            $newImgName = $id.'.'.end($endName);
            move_uploaded_file($_FILES["img"]["tmp_name"], "../img/goods/".$newImgName);
            $sql_editGood = "UPDATE `goods` SET `title` = '$title', `img` = '$newImgName', `description` = '$description', `price` = '$price' WHERE `goods`.`id` = $id;";
        } 
        else {
            $sql_editGood = "UPDATE `goods` SET `title` = '$title', `description` = '$description', `price` = '$price' WHERE `goods`.`id` = $id;";
        }
        if(mysqli_query($connect,$sql_editGood)){
            header("Location: ../view/accountPage.php");
        }     
    } 

