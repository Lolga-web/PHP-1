<?php

include "../models/config.php";

$action = $_GET['action'];
$id = $_GET['id'];

if($action == "delete"){
    $sql_del = "delete from goods where id=$id";
    if(mysqli_query($connect,$sql_del)){
        header("Location: admin.php");
    }
}
