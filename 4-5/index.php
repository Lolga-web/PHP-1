<?php
    include "models/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>SHOP</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <p class="logo">SHOP</p>
            <p class="phone">&#9990 0-000-000-00-00</p>
        </div>

        <div class="goods">
            <div class="top">
                <h1 class="goods_title">Каталог товаров</h1>
                <a href="admin/admin.php" class="admin_link">Редактировать каталог</a>
            </div>
            <?php
                $sql_goods = "SELECT * FROM goods";         
                $res_goods = mysqli_query($connect,$sql_goods);

                while($data = mysqli_fetch_assoc($res_goods)):?> 
                    <div class="good_wrp" id="id_<?= $data['id']?>">
                        <a class="good_link" href="models/good.php?id=<?= $data['id']?>">
                            <img class="good_img" src="img/<?=$data['img']?>">
                            <div class="good_description">
                                <h2 class="good_title"><?=$data['title']?></h2>
                                <p class="short_description"><?=$data['short_description']?></p>
                            </div>
                        </a>
                        <div class="buy_good">
                            <p class="good_price"><?=$data['price']?> руб.</p>
                            <a class="buy_btn" href="#">КУПИТЬ</a>
                        </div>
                    </div>                  
            <?php
                endwhile;               
            ?>
        </div>

    </div>
</body>
</html>