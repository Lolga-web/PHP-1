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
                    <h1 class="top_title">Контакты</h1>       
                </div>

                <div class="contacts">
                    <div class="contacts_shop">
                        <h2 class="contacts_shop_name">Little Wood Home</h2>
                        <p class="contacts_shop_address">
                           Адрес: 153021, г.Иваново, ул.Поляковой,8б
                        </p>
                        <a class="contacts_shop_phone" href="tel:+00000000000">Тел: 0-000-000-00-00</a>
                        <a class="contacts_shop_phone" href="tel:+11111111111">Тел: 1-111-111-11-11</a>
                        <a class="contacts_shop_email" href="mailto:mail@mail.ru">E-mail: mail@mail.ru</a>
                    </div>
                    <div class="contacts_map">
                        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A9eab5341513ce34414c80fcbd64b798a2297f4398b693364fe7dff2ba61f0092&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
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