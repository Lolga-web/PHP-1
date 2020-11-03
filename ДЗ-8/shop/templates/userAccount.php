
<form class="account_form" action="#" method="POST">

    <p class="account_form_text">Имя:</p>
    <input class="account_form_input" type="text" name="name" value="<?= $name?>" required="required" disabled>

    <p class="account_form_text">Логин:</p>
    <input class="account_form_input" type="text" name="login" value="<?= $login?>" required="required" disabled>

    <p class="account_form_text">E-mail:</p>
    <input class="account_form_input" type="email" name="email" value="<?= $email?>" required="required" disabled>

    <a class="btn account_logout" href="../models/logoutUser.php">Выйти</a>

</form>

<div class="admin_orders_block">
    <table class="order_table">
        <tr class="order_table_title">
            <th>№ заказа</th>
            <th>Дата</th>
            <th>Статус</th>
        </tr>

        <?php
            // Получаем информацию о заказах пользователя
            $sql_orders = mysqli_query($connect,"SELECT * FROM orders WHERE `id_user`=$idUser");
            while($data = mysqli_fetch_assoc($sql_orders)){
                $idOrder = $data['id_order'];
                $dateOrder = $data['date_order'];
                $statusOrder = $data['status_order'];
        ?>

                <tr class="order_table_text">
                    <td><?= $idOrder?></td>
                    <td><?= $dateOrder?></td>
                    <td><?= $statusOrder?></td>
                </tr>
                <tr>
                    <td class="order_table_good_list" colspan="3">
                        <?php
                            // Получаем информацию о товарах из заказа пользователя
                            $sql_order_goods = mysqli_query($connect,"SELECT order_goods.id_order, order_goods.id_good, 
                                order_goods.good_count, goods.title, goods.price FROM order_goods, goods WHERE 
                                order_goods.id_good=goods.id AND order_goods.id_order=$idOrder;");
                            while($data = mysqli_fetch_assoc($sql_order_goods)): ?>
                                <p>(<?=$data['id_good']?>) <?=$data['title']?> - <?=$data['price']?> x <?=$data['good_count']?>шт</p>
                                <? $orderSum[] = $data['price'] * $data['good_count'] ?>
                        <?php
                            endwhile;            
                        ?>
                        <p class="order_table_total">Сумма заказа: <?= array_sum($orderSum)?>р.</p>
                    </td>
                </tr>    
            <?php 
                    $orderSum = [];  
                }
            ?> 
                    
    </table>
</div>