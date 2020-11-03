<?php
    session_start();
    include "../models/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../style/style.css">
    <title>Little Wood Home</title>
</head>
<body>
    <div class="container">
        <?php include "../templates/header.php";?>
        
        <main class="main">
            <?php include "../templates/mainNav.php";?>

            <div class="main_content">
                <div class="top">
                    <h1 class="top_title">Отзывы</h1>       
                </div>

                <div class="feedbacks">

                    <?php
                        if (isset($_SESSION['userName'])) {
                            $login = $_SESSION['userName'];
                            $res_user = mysqli_query($connect,"SELECT * FROM `users` WHERE login='$login';");
                            while($data = mysqli_fetch_assoc($res_user)){
                                $status=$data['status'];
                            }
                            if ($status === 'admin') {
                                // можно добавить удаление отзывов
                                echo "<p class='warning'>Вы вошли как Админ</p>";
                            } elseif($status === 'user') {
                                include_once '../templates/feedbackForm.php';
                            }
                        } else {
                            echo "<p class='warning'>Оставлять отзывы могут только авторизованные пользователи</p>";
                        }
                    ?>

                    <div class="feedbacks_wrp">
                        <?php 

                            $feedbacks = mysqli_query($connect,"SELECT * FROM feedbacks");
                            while($data = mysqli_fetch_assoc($feedbacks)){ 
                                $id = $data['id'];
                                $idUser=$data['id_user'];
                                $text=$data['text'];
                                $date=$data['date'];
                                $getUser = mysqli_query($connect,"SELECT * FROM users WHERE id=$idUser");
                                while($data = mysqli_fetch_assoc($getUser)){
                                    $name=$data['name'];
                                }?>
                                     <div class="feedback_item_wrp" id="id_<?=$id?>"> 
                                         <p class="feedback_user_name"><?=$name?></h2>
                                         <p class="feedback_date"><?=$date?></p> 
                                         <p class="feedback_text"><?=$text?></p>   
                                     </div>  
                                <?php               
                            }                     
                        ?>
                    </div>
                </div>    
            </div>
        </main>
            <?php include "../templates/footer.php";?>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../script/modal.js"></script>
</body>
</html>