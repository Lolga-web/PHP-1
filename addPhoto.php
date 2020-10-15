<?php
    include_once 'models/config.php';
    include("models/imgResize.php");

    $pathBig = "img/big/".$_FILES['photo']['name'];
    $pathSmall = "img/small/".$_FILES['photo']['name'];
    
    $name = $_FILES['photo']['name'];
    $link = $pathBig;
    $size = $_FILES['photo']['size'];

    if(move_uploaded_file($_FILES['photo']['tmp_name'],$pathBig)){
        img_resize($pathBig, $pathSmall, 400, 0);
        $sql_addPhoto = "INSERT INTO `gallery` (`id_img`, `name`, `link`, `size`, `click_count`) VALUES (NULL, '$name', '$link', '$size', '0')";
        $res_addPhoto = mysqli_query($connect,$sql_addPhoto);
        echo $_FILES['photo']['name']." успешно загружен!";
    }
    else{
        echo "Error: файл не был загружен";
    }
    echo '<br><a href="5.php">вернуться в галерею</a>';
?>