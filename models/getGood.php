<?php
    include '../models/config.php';

    $sql_good = "SELECT * FROM goods WHERE id=$id";         
    $res_good = mysqli_query($connect,$sql_good);
    while($data = mysqli_fetch_assoc($res_good)){
        $title=$data['title'];
        $short_description=$data['short_description'];
        $img=$data['img'];
        $description=$data['description'];
        $price=$data['price'];
    }