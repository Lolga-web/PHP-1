<?php
    session_start();
    include "../models/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../style/style.css">
    <title>Little Wood Home</title>
</head>
<body>
    <div class="container">
        <?php include "../templates/header.php";?>

        <main class="main">
            <?php include "../templates/mainNav.php";?>

            <div class="main_content">
                <div class="top">
                    <h1 class="top_title">Корзина</h1>
                </div>
                <div class="cart">
                    <div class="cart_goods">

                        <? if (empty($_SESSION['cart_goods'])) : ?>
                            <p class="cart_empty">В корзине нет товаров</p>
                        <? else : ?>

                        <?php
                            if (isset($_SESSION['cart_goods'])) {
                                $cartGood = $_SESSION['cart_goods'];
                                foreach ($cartGood as $key => $val) {
                                    $idGood = $key;
                                    $goodCount = $val;
                                    if ($getGood = mysqli_query($connect, "SELECT * FROM goods WHERE id='$idGood'")) {
                                        while ($data = mysqli_fetch_assoc($getGood)): ?>  
                                            <div class="cart_item_wrp" id="id_<?=$data['id']?>">
                                                <img class="cart_item_img" src="../img/goods/<?=$data['img']?>?>">
                                                <h2 class="cart_item_title"><?=$data['title']?></h2>
                                                <a class="count_good" href="../models/actionCart.php?action=plus&id=<?=$data['id']?>">+</a>
                                                <p class="cart_item_quantity"><?= $goodCount?></p> 
                                                <a class="count_good" href="../models/actionCart.php?action=minus&id=<?=$data['id']?>">-</a>
                                                <p class="cart_item_price"><?=$data['price']?> р.</p>    
                                                <a class="btn delete_btn" href="../models/actionCart.php?action=delete&id=<?=$data['id']?>">Удалить</a>
                                            </div>
                                            <? $cartSum[] = $data['price'] * $goodCount?>
                                    <?php
                                        endwhile;
                                    }
                                }
                            }            
                                    ?>   

                            <div class="cart_total">
                                <p class="cart_sum">Итого: <?= $cartCount?> товаров на сумму <?= array_sum($cartSum)?> р.</p>

                                <? if (isset($_SESSION['userName'])){
                                    $login = $_SESSION['userName'];
                                    if ($login !== 1 && $login !== 2 && $login !== 3) { ?>
                                        <a class="btn order_btn" href="../models/actionOrder.php?action=buy">Оформить заказ</a>        
                                <?php 
                                    } else { ?>
                                    <p class="cart_login">Для заказа необходимо 
                                        <a href="#" id="login" class="cart_login_link modal__btn" onclick="openModal('login')">авторизоваться</a>
                                    </p>
                                <?}
                                } else { ?>
                                    <p class="cart_login">Для заказа необходимо 
                                        <a href="#" id="login" class="cart_login_link modal__btn" onclick="openModal('login')">авторизоваться</a>
                                    </p>
                                <? } ?>
                                
                            </div>

                        <? endif ?>
                    </div>
                </div>             
            </div>
        </main>

        <?php include "../templates/footer.php";?>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../script/modal.js"></script>   
</body>
</html>