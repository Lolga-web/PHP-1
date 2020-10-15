<?php
  include_once 'models/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <title>Document</title>
    <style>
        .gallery {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 5% 10%;
        }
        .gallery a {
            margin-bottom: 20px;
        }
        .form {
            padding: 5% 10% 0 10%;
        }
    </style>
</head>
<body>
        
    <div class="form">
        <form action="addPhoto.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="photo" accept="image/*"><br>
            <input type="submit" value="Загрузить">  
        </form>
    </div>

    <script>
        function clickCount(id){
            $.ajax({
                type: "GET",
                url: "models/clickCount.php",
                data: {"id": id},
                success: function(answer){
                    console.log('+1 просмотр');
                }
            });
        };
    </script>

    <div class="gallery">
        <?php
            $sql_bd = "SELECT * FROM gallery ORDER BY click_count DESC";         
            $res_bd = mysqli_query($connect,$sql_bd);

            while($data = mysqli_fetch_assoc($res_bd)):?> 
                <div class="img_wrp">
                    <a data-fancybox="gallery" id="id_<?= $data['id_img']?>" href="<?=$data['link']?>" 
                                onclick="clickCount(<?= $data['id_img']?>)">
                        <img src="<?=PHOTO_SMALL.$_GET['photo'].$data['name']?>">
                    </a>
                    <p class="click_count">Количество просмотров: <?= $data['click_count']?></p>
                </div>                  
            <?php
            endwhile;               
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
</body>
</html>