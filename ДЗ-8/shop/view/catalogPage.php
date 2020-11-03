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
                    <h1 class="top_title">Каталог товаров</h1>
                </div>

                <div class="catalog">
                    <?php       
                        $res_goods = mysqli_query($connect,"SELECT * FROM goods");

                        while($data = mysqli_fetch_assoc($res_goods)):?> 
                            <div class="catalog_item_wrp" id="id_<?= $data['id']?>">
                                <a class="catalog_item_link" href="goodPage.php?id=<?= $data['id']?>">
                                    <img class="catalog_item_img" src="../img/goods/<?=$data['img']?>">
                                    <h2 class="catalog_item_title"><?=$data['title']?></h2>
                                </a>
                                <div class="catalog_item_buy">
                                    <p class="catalog_item_price"><?=$data['price']?> руб.</p>
                                    <a class="btn" href="../models/actionCart.php?action=add&id=<?= $data['id']?>">КУПИТЬ</a>
                                </div>
                            </div>                  
                    <?php
                        endwhile;               
                    ?>
                </div>
                
            </div>
        </main>

            <?php include "../templates/footer.php";?>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../script/modal.js"></script>
</body>
</html>