<?php
require_once '../../Controllers/admin/CurrentOrderController.php';

if(@$_GET['page'] == 'thanksGod'){
    header('location:../order.php');
}elseif (@$_GET['page'] == 'confirmOrder'){
    header('location:../order.php');
}elseif (@$_GET['page'] == 'DeleteOrder'){
    header('location:../order.php');
}elseif (@$_GET['request']){
    $id = $_GET['id'];
    $CurrentOrderController = new CurrentOrderController();
    $CurrentOrderController->deleteWithId($id);
    header('location:../order.php');
}