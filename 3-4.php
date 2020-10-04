<!-- 
3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. 
Обязательно использовать оператор return. 

4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 
– значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции 
выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).

-->

<?php

    function sum($a, $b) {
        return $a + $b;
    }

    function sub($a, $b) {
        return $a - $b;
    }

    function mult($a, $b) {
        return $a * $b;
    }

    function div($a, $b) {
        return $a / $b;
    }
    
    function mathOperation($arg1, $arg2, $operation){
        switch($operation){
            case '+':
                sum($arg1, $arg2);
                break;
            case '-':
                sub($arg1, $arg2);
                break;
            case '/':
                div($arg1, $arg2);
                break;
            case '*':
                mult($arg1, $arg2);
                break;
        }
    } 
