<?php
    include "../models/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>SHOP</title>
</head>
<body>
    <div class="container">
        <?php include "../templates/header.php";?>

        <div class="goods">
            <div class="top">
                <h1 class="goods_title">Каталог товаров - редактирование</h1>
                <a href="../index.php" class="admin_link">Выйти из редактирования</a>
            </div>

            <?php
                $sql_goods = "SELECT * FROM goods";         
                $res_goods = mysqli_query($connect,$sql_goods);

                while($data = mysqli_fetch_assoc($res_goods)):?> 
                    <div class="good_wrp" id="id_<?= $data['id']?>">
                        <img class="admin_good_img" src="../img/<?=$data['img']?>">
                        <h2 class="good_title"><?=$data['title']?></h2>        
                        <a class="btn admin_edit_btn" href="editForm.php?id=<?= $data['id']?>">РЕДАКТИРОВАТЬ</a>
                        <a class="btn delete_btn" href="actionGood.php?action=delete&id=<?= $data['id']?>">УДАЛИТЬ</a>
                    </div>                  
            <?php
                endwhile;               
            ?>
        </div>

        <div class="addGood">
            <form action="actionGood.php?action=add&id=<?= $data['id']?>" method="POST" enctype="multipart/form-data">
                <p class="addGood_title">Добавить товар</p>
                <input type="text" name="title" placeholder="Название товара"><br>
                <textarea name="short_description" cols="30" rows="10" placeholder="Краткое описание"></textarea>
                <textarea name="description" cols="30" rows="20" placeholder="Полное описание"></textarea>
                <input type="text" name="price" placeholder="Цена"><br>
                <input type="file" name="img" accept="image/*"><br>
                <input class="btn" type="submit" value="Сохранить">  
            </form>
        </div>

    </div>
</body>
</html>