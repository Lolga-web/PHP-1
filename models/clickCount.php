<?php
        include "config.php";
        $id = $_GET['id'];

        $sql_addCount = "UPDATE `gallery` SET `click_count` = click_count+1 WHERE `gallery`.`id_img` = $id";
        $res_count = mysqli_query($connect,$sql_addCount);
?>;
  

