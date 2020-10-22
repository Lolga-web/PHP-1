<?php
    include '../models/config.php';
    $id=$_GET['id'];
    include "../models/getGood.php";
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

        <div class="top edit_top">
            <a href="admin.php" class="admin_link">Выйти из редактирования</a>
            <div id="result_form"></div>
        </div>

        </script>
        <div class="addGood" id="id_<?= $id?>">
            <form id="edit_form" action="actionGood.php?action=edit&id=<?= $id?>" method="POST" enctype="multipart/form-data">
                <p class="addGood_title">Редактировать товар</p>
                <input type="text" name="title" value="<?=$title?>"><br>
                <textarea name="short_description" cols="30" rows="10"><?=$short_description?></textarea>
                <textarea name="description" cols="30" rows="20"><?=$description?></textarea>
                <input type="text" name="price" value="<?=$price?>"><br>
                <input type="file" name="img" accept="image/*"><br>
                <input class="btn" type="submit" value="Сохранить">  
            </form>
        </div>

    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="editAjax.js" type="text/javascript"></script>
</body>
</html>