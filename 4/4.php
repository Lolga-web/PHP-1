<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <form action="server.php" method="post" enctype="multipart/form-data">
            <p>Выберите файл</p>
            <input type="file" name="photo" accept="image/*"><br>
            <input type="submit" value="Загрузить">  
        </form>
    </div>

    <div class="gallery">

    <?php
        $images = scandir("small");
        for($i=2;$i<count($images);$i++):?>
            <a href="big\<?= $images[$i]?>" target="blank"><img src="small/<?= $images[$i]?>"></a>
        <?php
        endfor;
    ?>

    </div>
</body>
</html>