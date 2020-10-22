     <form class="login_form" action="login/checkLogin.php" method="post">
        <p>Ваш логин</p>
        <input type="text" name="login" value="<?= $_SESSION['login']?>">
        <p>Ваш пароль</p>
        <input type="text" name="pass" value="<?= $_SESSION['pass']?>"><br><br>
        <input class="btn" type="submit" value="Войти">
    </form>