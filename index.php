<?php
    include "models/config.php";
?>
<?php
    session_start();
    if($_GET['success'] && $_SESSION['login']):?>
    <h1>Ваша учетная запись подтверждена</h1>
<?php
    endif;
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
        <?php include "templates/header.php";?>

        <div class="goods">
            <div class="top">
                <h1 class="goods_title">Каталог товаров</h1>
                <button id="modal__btn" class="admin_link">Редактировать каталог</button>
                <div id="modal__window" class="modal">
                    <div class="modal__content">
                        <span class="close__modal__btn">×</span>
                        <div id="login">
                            <?php include "login/loginForm.php";?>
                        </div>
                    </div>
                </div>
                <!-- <a href="admin/admin.php" class="admin_link">Редактировать каталог</a> -->
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
                            <a class="btn" href="cart/actionCart.php?action=add&id=<?= $data['id']?>">КУПИТЬ</a>
                        </div>
                    </div>                  
            <?php
                endwhile;               
            ?>
        </div>

    </div>
    <script src="script/modal.js"></script>
</body>
</html>