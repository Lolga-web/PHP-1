<?php
    include "config.php";
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
        <div class="header">
            <p class="logo">SHOP</p>
            <p class="phone">&#9990 0-000-000-00-00</p>
        </div>
        <a href="../index.php" class="goods_title">Вернуться в каталог</a>
        <?php   
            $sql_good = "SELECT * FROM goods WHERE id=$id";         
            $res_good = mysqli_query($connect,$sql_good);

            while($data = mysqli_fetch_assoc($res_good)):?> 
                <div class="open_good_wrp" id="id_<?= $data['id']?>">
                    <img class="open_good_img" src="../img/<?=$data['img']?>">
                    <div class="open_good_description">
                        <h2 class="open_good_title"><?=$data['title']?></h2>
                        <p class="open_description"><?=$data['description']?></p>
                        <div class="open_buy_good">
                            <p class="good_price">Цена: <?=$data['price']?> руб.</p>
                            <a class="buy_btn" href="#">КУПИТЬ</a>
                        </div>
                    </div>
                </div>                  
        <?php
            endwhile;               
        ?>
    </div>
        

</body>
</html>