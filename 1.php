<!DOCTYPE HTML>
<html lang="ru">
<head>
    <meta charset = "UTF-8">
    <style>
        .calc{
            display: flex;
        }
        .result{
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <h1>Калькулятор</h1>

    <div class="calc">

        <form action="" method="post">
            <input type="text" name="number1" value="<?php echo $_POST['number1']; ?>" placeholder="Первое число">
            <select name="operation">
                <option value='plus'>+ </option>
                <option value='minus'>- </option>
                <option value="multiply">* </option>
                <option value="divide">/ </option>
            </select>
            <input type="text" name="number2" value="<?php echo $_POST['number2']; ?>" placeholder="Второе число">
                
            <input type="submit" name="submit" value=" = ">
        </form>

        <div class="result">
            <?php
                if(isset($_POST['submit'])){
                    $number1 = $_POST['number1'];
                    $number2 = $_POST['number2'];
                    $operation = $_POST['operation'];
                }
                if(!$operation || (!$number1 && $number1 != '0') || (!$number2 && $number2 != '0')) {
                    $error = 'Заполните все поля';
                }
                else { 
                    if(!is_numeric($number1) || !is_numeric($number2)) { 
                        $error = "Веденные данные не являются числами"; 
                    }
                    else
                        switch($operation){
                        case 'plus': 
                            $result = $number1 + $number2; 
                            break;
                        case 'minus': 
                            $result = $number1 - $number2;  
                            break;
                        case 'multiply': 
                            $result = $number1 * $number2;
                            break;
                        case 'divide':
                            if( $number2 == '0')
                            $error = "На ноль делить нельзя!"; 
                            else 
                                $result = $number1 / $number2; 
                                break;    
                        }
                }
                if(isset($error)) {
                    echo "$error";
                }	
                else {
                    echo "$result";
                }
            ?> 
        </div>	
    </div>
    
</body>
</html>
