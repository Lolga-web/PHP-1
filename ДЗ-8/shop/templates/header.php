
<header class="header">
    <a class="logo" href="/shop/"><img src="/shop/img/main/logo.png" alt="logo"></a>
    <a class="phone" href="tel:+70000000000">&#9990 0-000-000-00-00</a>
    <div class="socials">
        <a class="socials_link" href="https://www.facebook.com/" target="_blank">
            <svg width="25" height="25" viewBox="0 0 25 24">
                <rect width="24" height="24" x=".385" fill="#f7c1d0" rx="12"/>
                <path fill="#FFF" fill-rule="nonzero" d="M12.68 11.878h2.243l.36-2.263h-2.604V8.44c0-.634.18-1.177 1.077-1.177h1.706V5h-2.424c-2.064 0-2.602 1.357-2.602 3.258v1.357H9v2.263h1.436v6.968h2.243v-6.968z"/>    
            </svg>
        </a>
        <a class="socials_link" href="https://www.instagram.com/" target="_blank">
            <svg width="25" height="25" viewBox="0 0 25 24">
                <rect width="24" height="24" x=".154" fill="#f7c1d0" rx="12"/>
                    <path fill="#FFF" d="M15.66 4.453H8.774a4.253 4.253 0 0 0-4.258 4.258v6.886a4.253 4.253 0 0 0 4.258 4.258h6.886a4.253 4.253 0 0 0 4.258-4.258V8.71c-.09-2.355-1.993-4.258-4.258-4.258zm2.808 11.053c0 1.54-1.268 2.9-2.899 2.9H8.684c-1.54 0-2.9-1.27-2.9-2.9V8.621c0-1.54 1.269-2.9 2.9-2.9h6.885c1.54 0 2.9 1.269 2.9 2.9v6.885z"/>
                    <path fill="#FFF" d="M12.217 8.168a3.867 3.867 0 0 0-3.896 3.895 3.867 3.867 0 0 0 3.896 3.896 3.867 3.867 0 0 0 3.896-3.896 3.867 3.867 0 0 0-3.896-3.895zm0 6.523a2.532 2.532 0 0 1-2.537-2.537 2.532 2.532 0 0 1 2.537-2.537c1.36 0 2.537 1.178 2.537 2.537a2.532 2.532 0 0 1-2.537 2.537zM16.294 6.99c-.272 0-.544.09-.725.272-.181.18-.272.453-.272.724 0 .272.091.544.272.725.181.181.453.272.725.272.272 0 .544-.09.725-.272.181-.181.272-.453.272-.725 0-.271-.091-.543-.272-.724-.181-.182-.453-.272-.725-.272z"/>
            </svg>
        </a>
        <a class="socials_link" href="https://www.youtube.com/" target="_blank">
            <svg width="24px" height="25px" viewBox="0 0 24 24" version="1.1">
                <rect fill="#f7c1d0" x="0" y="0" width="24" height="24" rx="12"></rect>
                <path d="M16.3516752,12.6458285 L9.74480435,16.3556858 C9.50402414,16.4908875 9.19923057,16.4052992 9.06402886,16.164519 C9.02204903,16.0897573 9,16.0054562 9,15.9197146 L9,8.5 C9,8.22385763 9.22385763,8 9.5,8 C9.5857416,8 9.67004262,8.02204903 9.74480435,8.06402886 L16.3516752,11.7738862 C16.5924554,11.9090879 16.6780437,12.2138815 16.542842,12.4546617 C16.4978829,12.5347292 16.4317427,12.6008693 16.3516752,12.6458285 Z" id="Triangle" fill="#FFFFFF"></path>
            </svg>                
        </a>
    </div>
    <a class="header_cart" href="/shop/view/cartPage.php">
        <?php 
            if (isset($_SESSION['cart_goods'])) {
                $cartCount = array_sum($_SESSION['cart_goods']);
                echo '<span class="cart_count">'.$cartCount.'</span>';
            } 
        ?> 
        Корзина</a>
</header>