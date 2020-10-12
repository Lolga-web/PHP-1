<?php
    
    $pathBig = "big/".$_FILES['photo']['name'];
    $pathSmall = "small/".$_FILES['photo']['name'];

    include("imgResize.php");
    
    if(move_uploaded_file($_FILES['photo']['tmp_name'],$pathBig)){
        img_resize($pathBig, $pathSmall, 400, 0);
        echo $_FILES['photo']['name']." успешно загружен!";
    }
    echo '<br><a href="4.php">вернуться в галерею</a>'

?>