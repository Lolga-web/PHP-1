<?php
    session_start();
    include "../models/config.php";
    $id=$_GET['id'];
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
                    <a href="catalogPage.php" class="top_title">Назад в каталог</a>
                </div>

                <div class="good">
                    <?php   
                        $sql_good = "SELECT * FROM goods WHERE id=$id";         
                        $res_good = mysqli_query($connect,$sql_good);

                        while($data = mysqli_fetch_assoc($res_good)):?> 
                            <div class="good_wrp" id="id_<?= $data['id']?>">
                                <img class="good_img" src="../img/goods/<?=$data['img']?>">
                                <div class="good_description">
                                    <h2 class="good_title"><?=$data['title']?></h2>
                                    <p class="description"><?=$data['description']?></p>
                                    <div class="good_buy">
                                        <p class="good_price">Цена: <?=$data['price']?> руб.</p>
                                        <a class="btn" href="../models/actionCart.php?action=add&id=<?= $data['id']?>">КУПИТЬ</a>
                                    </div>
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