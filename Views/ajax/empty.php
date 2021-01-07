<?php
if(@$_GET['page'] == 'thanksGod'){
    header('location:../order.php');
}elseif (@$_GET['page'] == 'confirmOrder'){
    header('location:../order.php');
}elseif (@$_GET['page'] == 'DeleteOrder'){
    header('location:../order.php');
}elseif (@$_GET['request']){
    $id = $_GET['id'];

    echo $id;
}