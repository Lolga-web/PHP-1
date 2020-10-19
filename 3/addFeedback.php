<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>thanks</title>
</head>
<body>
    <div class="thanks_wrp">
        <?php
            include 'config.php';

            $name = $_POST['name'];
            $text = $_POST['text'];

            $sql = "INSERT INTO `feedbacks` (`id`, `name`, `text`) VALUES (NULL, '$name', '$text')";
            $res = mysqli_query($connect,$sql);

            echo '<h1 class="thanks">Спасибо за ваш отзыв!</h1>';
            echo '<br><a class="return" href="index.php">вернуться к отзывам</a>';

        ?>
    </div>
</body>
</html>
