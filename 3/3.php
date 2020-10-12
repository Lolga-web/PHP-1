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
    </style>   
</head>
<body>

    <div class="gallery">
        <?php

            $images = scandir("small");
            for($i=2;$i<count($images);$i++):?>
                <a data-fancybox="gallery" href="big\<?= $images[$i]?>"><img src="small/<?= $images[$i]?>"></a>
            <?php
            endfor;

        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
</body>
</html>