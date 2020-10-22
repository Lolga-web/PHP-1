<?php
    $cartCount = mysqli_query($connect,"SELECT SUM(quantity) FROM cart");
    $cartCount = mysqli_fetch_assoc($cartCount)["SUM(quantity)"];

    $mergTable = mysqli_query($connect,"select id_good, quantity, price from cart inner join goods on cart.id_good = goods.id; ");
    while($data = mysqli_fetch_assoc($mergTable)){
        $cartSum = $cartSum+$data["quantity"]*$data["price"];
    }   