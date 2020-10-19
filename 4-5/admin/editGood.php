<?php
    include '../models/config.php';
    $id=$_GET['id'];
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
        <?php 

            $sql_good = "SELECT * FROM goods WHERE id=$id";         
            $res_good = mysqli_query($connect,$sql_good);

            while($data = mysqli_fetch_assoc($res_good)):?> 
                <div class="addGood" id="id_<?= $data['id']?>">
                    <form action="action.php" method="POST" enctype="multipart/form-data">
                        <p class="addGood_title">Редактировать товар</p>
                        <input type="text" name="title" value="<?=$data['title']?>"><br>
                        <textarea name="short_description" cols="30" rows="10"><?=$data['short_description']?></textarea>
                        <textarea name="description" cols="30" rows="20"><?=$data['description']?></textarea>
                        <input type="text" name="price" value="<?=$data['price']?>"><br>
                        <input type="file" name="img" accept="image/*" ><br>
                        <input class="buy_btn" type="submit" value="Сохранить">  
                    </form>
                </div>
        <?php
            endwhile;               
        ?>

        

       
    </div>
</body>
</html>