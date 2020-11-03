
<script src="../script/showAdminBlock.js"></script>

<h2 class="admin_account_title">Вы вошли как администратор!</h2>
<a href="../models/logoutUser.php" class="btn">Выйти</a>

<div class="admin_account_block">
    <a href="#" class="admin_account_link add_link" onclick="showAdminBlock('add')">Добавить товар</a>
    <a href="#" class="admin_account_link edit_link active_center" onclick="showAdminBlock('edit')">Список товаров</a>
    <a href="#" class="admin_account_link orders_link" onclick="showAdminBlock('orders')">Заказы</a>
</div>

<div class="admin_account_add_block" style="display: none;">
    <form class="admin_account_add_form" action="../models/actionGood.php?action=add" method="POST" enctype="multipart/form-data">

        <label class="admin_account_add_title" for="title">Название:
            <input class="admin_account_add_text" type="text" name="title">
        </label>

        <label class="admin_account_add_title" for="description">Описание:
            <textarea class="admin_account_add_text_description" name="description"></textarea>
        </label>

        <label class="admin_account_add_title" for="price">Цена:
            <input class="admin_account_add_text" type="text" name="price">
        </label>

        <label class="admin_account_add_title" for="img">Изображение:
            <input class="admin_account_add_img" type="file" name="img" accept="image/*">
        </label>

        <input class="btn admin_form_btn" type="submit" value="Сохранить">  
    </form>
</div>

<div class="admin_account_edit_block">
    <?php
        $sql_goods = "SELECT * FROM goods";         
        $res_goods = mysqli_query($connect,$sql_goods);

        while($data = mysqli_fetch_assoc($res_goods)):?> 
            <div class="admin_good_wrp">

                <div class="admin_good_info" id="admin_good_info_<?= $data['id']?>">
                    <img class="admin_good_img" src="../img/goods/<?=$data['img']?>">
                    <h2 class="admin_good_title"><?=$data['title']?></h2>        
                    <button class="btn admin_edit_btn" href="#" onclick="editGood(<?= $data['id']?>)">Редактировать</button>
                    <a class="btn admin_delete_btn" href="../models/actionGood.php?action=delete&id=<?= $data['id']?>">Удалить</a>
                </div>

                <div class="admin_edit_block" id="admin_edit_block_<?= $data['id']?>" style="display: none;">
                    <div class="admin_edit_wrp">
                        <button class="btn admin_form_btn" href="#" onclick="showGood(<?= $data['id']?>)">Выйти из редактирования</button>
                        <img src="../img/goods/<?=$data['img']?>" alt="edit_block_img" class="admin_edit_block_img">
                    </div>

                    <form class="admin_edit_form" action="../models/actionGood.php?action=edit&id=<?= $data['id']?>" method="POST" enctype="multipart/form-data">
                     
                        <label class="admin_edit_title" for="title">Название:
                            <input class="admin_edit_text" type="text" name="title" value="<?=$data['title']?>">
                        </label>
                        
                        <label class="admin_edit_title" for="description">Описание:
                            <textarea class="admin_edit_text_description" name="description"><?=$data['description']?></textarea>
                        </label>
                                
                        <label class="admin_edit_title" for="price">Цена:
                            <input class="admin_edit_text" type="text" name="price" value="<?=$data['price']?>">
                        </label>
                        
                        <label class="admin_edit_title" for="img">Изображение:
                            <input class="admin_edit_img" type="file" name="img" accept="image/*">
                        </label>
                        
                        <input class="btn admin_form_btn" type="submit" value="Сохранить">  
                    </form>    
                </div> 

            </div>                  
    <?php
        endwhile;               
    ?>
</div>

<div class="admin_orders_block" style="display: none;">
    <table class="order_table">
        <tr class="order_table_title">
            <th>№ заказа</th>
            <th>Дата</th>
            <th>Имя/e-mail</th>
            <th>Статус</th>
        </tr>

        <?php
            // Получаем информацию о заказах
            $sql_orders = mysqli_query($connect,"SELECT * FROM orders");
            while($data = mysqli_fetch_assoc($sql_orders)){
                $idOrder = $data['id_order'];
                $idUser = $data['id_user'];
                $dateOrder = $data['date_order'];
                $statusOrder = $data['status_order'];
                // Получаем информацию о каждом пользователе
                $sql_user = mysqli_query($connect,"SELECT * FROM `users` WHERE `id`=$idUser");
                while($data = mysqli_fetch_assoc($sql_user)){
                    $userName = $data['name'];
                    $userEmail = $data['email'];
                }?>

                <tr class="order_table_text">
                    <td><?= $idOrder?></td>
                    <td><?= $dateOrder?></td>
                    <td><?= $userName?>/<?= $userEmail?></td>
                    <td><?= $statusOrder?></td>
                </tr>
                <tr>
                    <td class="order_table_good_list" colspan="4">
                        <?php
                            // Получаем информацию о товарах в каждом заказе
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