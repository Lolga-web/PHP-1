<?php
    include '../models/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>thanks</title>
</head>
<body>
    <div class="container">
        <?php

            $path = "../img/".$_FILES['img']['name'];
            $title = $_POST['title'];
            $short_description = $_POST['short_description'];
            $description = $_POST['description'];
            $img = $_FILES['img']['name'];
            $price = $_POST['price'];

            move_uploaded_file($_FILES['photo']['tmp_name'],$path);

            $sql_addGood = "INSERT INTO `goods` (`id`, `title`, `img`, `short_description`, `description`, `price`) VALUES (NULL, '$title', '$img', '$short_description', '$description', '$price')";
            $res_addGood = mysqli_query($connect,$sql_addGood);

            echo '<h1 class="thanks">Товар успешно добавлен!</h1>';
            echo '<br><a class="return" href="admin.php">Вернуться к редактированию</a>';

        ?>
    </div>
</body>
</html>