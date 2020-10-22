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
        <div class="top">
            <h1 class="goods_title">Корзина</h1>
            <a href="../index.php" class="admin_link">Вернуться в каталог</a>
        </div>

        <div class="cart_wrp">
            <div class="cart_goods">
                <?php
                    $sql_cart = "SELECT * FROM cart";         
                    $res_cart = mysqli_query($connect,$sql_cart);

                    while($data = mysqli_fetch_assoc($res_cart)){ 
                        $id=$data['id_good'];
                        $quantity=$data['quantity'];
                        include "../models/getGood.php";

                        echo
                        '<div class="good_wrp" id="id_'.$id.'">
                            <img class="admin_good_img" src="../img/'.$img.'?>">
                            <h2 class="good_title">'.$title.'</h2>
                            <p class="good_quantity">'.$quantity.' шт</p> 
                            <p class="good_price">'.$price.' р.</p>    
                            <a class="btn delete_btn" href="actionCart.php?action=delete&id='.$id.'">УДАЛИТЬ</a>
                        </div>';                
                    }            
                ?>
            </div>

            <div class="cart_total">
                <?php 
                    include "cartCount.php";
                    if(!$cartCount==0){
                        echo '<p class="cart_sum">Итого: '.$cartCount.' товаров на '.$cartSum.' р.</p>';
                    }
                    else{
                        echo '<p class="cart_empty">В корзине нет товаров</p>';
                    }
                ?> 
                
            </div>
        </div>
    
    </div>   
</body>
</html>