<?php
require_once '../../../Controllers/admin/CategoriesController.php';
$usersController = new CategoriesController();
$users = $usersController->selectAll();

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $newUser = $usersController->insert($name);
    if($newUser){
        header('location:empty.php?page=registercat');

    }
}
