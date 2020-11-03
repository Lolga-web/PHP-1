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
                    <h1 class="top_title">Личный кабинет</h1>
                </div>

                <div class="account">
                    <?php
                        if (isset($_SESSION['userName'])) {
                            $login = $_SESSION['userName'];
                            if ($login === 1) {
                                echo "<span class='error'>Неверный логин или пароль!</span>";
                                unset($_SESSION['userName']);
                            } elseif ($login === 2) {
                                echo "<span class='error'>Такой логин уже зарегистрирован!</span>";
                                unset($_SESSION['userName']);
                            } elseif ($login === 3) {
                                echo "<span class='error'>Такой адрес электронной почты уже зарегистрирован!</span>";
                                unset($_SESSION['userName']);
                            } else {
                                $getUser = mysqli_query($connect,"SELECT * FROM `users` WHERE login='$login';");
                                while($data = mysqli_fetch_assoc($getUser)){
                                    $idUser=$data['id'];
                                    $name=$data['name'];
                                    $email=$data['email'];
                                    $status=$data['status'];
                                }
                                if ($status === 'admin') {
                                    include_once '../templates/adminAccount.php';
                                } elseif ($status === 'user') {
                                    include_once '../templates/userAccount.php';
                                }
                            }    
                        } else {
                            echo "<p class='warning'>Войдите в личный кабинет</p>";
                        }
                    ?>  
                </div>

            </div>
        </main>

        <?php include "../templates/footer.php";?>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../script/modal.js"></script>   
</body>
</html>