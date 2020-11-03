<?php
    session_start();
    include "models/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="style/style.css">
    <title>Little Wood Home</title>
</head>
<body>
    <div class="container">
        <?php include "templates/header.php";?>
        <main class="main">
            <?php include "templates/mainNav.php";?>
            <div class="main_content">
                <p class="about_shop"><span>Little Wood Home - российский производитель деревянной мебели и игрушек для детей</span></p>
                <p class="about_shop">
                Игрушечная мебель — лучший подарок для маленькой девочки, которая любит играть с куклами. 
                Красивые, реалистичные изделия идеально впишутся в интерьер детской комнаты и помогут сделать 
                игры увлекательными. Наша продукция выполняется из дерева. В отличие от пластика, это более 
                экологичное решение для интерьера детской. Кроме того, приятная фактура и прочность древесины 
                делают мебель максимально практичной для игр малышей. 
                </p>
                <p class="about_shop"><span>&#128504;</span> Используем только безопасные материалы</p>
                <p class="about_shop"><span>&#128504;</span> Детально прорабатываем дизайн</p>
                <p class="about_shop"><span>&#128504;</span> Предлагаем модели изделий с разными размерами, цветами, комплектацией</p>
                <p class="about_shop"><span>&#128504;</span> Гарантируем качество товаров</p>
                <img class="main_img" src="img/main/main.jpg" alt="main_img">
            </div>
        </main>

        <?php include "templates/footer.php";?>
                
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="script/modal.js"></script>
</body>
</html>