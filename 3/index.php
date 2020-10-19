<?php
    include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>feedbacks</title>
</head>
<body>
    
    <div class="container">

        <div class="feedbacks">
            <h1>ОТЗЫВЫ</h1>
            <?php
                $sql_fb = "SELECT * FROM feedbacks";         
                $res_fb = mysqli_query($connect,$sql_fb);

                while($data = mysqli_fetch_assoc($res_fb)):?> 
                    <div class="feedback_wrp" id="id_<?= $data['id']?>">
                        <p><?=$data['name']?></p>
                        <p><?=$data['text']?></p>
                    </div>                  
                <?php
                endwhile;               
            ?>
        </div>

        <div class="form">
            <form action="addFeedback.php" method="POST" enctype="multipart/form-data">
                <p>ОСТАВЬТЕ ВАШ ОТЗЫВ</p>
                <input type="text" name="name" placeholder="Ваше имя"><br>
                <textarea name="text" cols="30" rows="10" placeholder="Текст отзыва"></textarea>
                <input type="submit" value="Отправить отзыв">  
            </form>
        </div>
       
    </div>

</body>
</html>