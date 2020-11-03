
<nav class="main_nav">
    <ul class="nav_list">
        <a href="/shop/" class="nav_link"><li class="nav_item">Главная</li></a>
        <a href="/shop/view/catalogPage.php" class="nav_link"><li class="nav_item">Каталог</li></a>
        <a href="/shop/view/galleryPage.php" class="nav_link"><li class="nav_item">Галерея</li></a>
        <a href="/shop/view/feedbacksPage.php" class="nav_link"><li class="nav_item">Отзывы</li></a>  
        <a href="/shop/view/contactsPage.php" class="nav_link"><li class="nav_item">Контакты</li></a>  
    </ul>

    <? if (isset($_SESSION['userName'])){
        $login = $_SESSION['userName'];
        if ($login !== 1 && $login !== 2 && $login !== 3) { ?>
            <a href="/shop/view/accountPage.php" class="nav_item login">Личный кабинет</a>        
    <?php 
        } else { ?>
        <a href="#" id="login" class="nav_item login modal__btn" onclick="openModal('login')">Авторизация</a>
    <?}
    } else { ?>
        <a href="#" id="login" class="nav_item login modal__btn" onclick="openModal('login')">Авторизация</a>
    <? } ?>
        
    <div class="passwords">
        <p>Пароли:</p>
        <p>admin/admin</p>
        <p>user/user</p>
        <p>user2/user2</p>
    </div>

    <div id="modal__window" class="modal">
        <div class="modal__content">
            <span class="close__modal__btn">×</span>
            <div id="modal__content_wrp"></div>
        </div>
    </div>
</nav>