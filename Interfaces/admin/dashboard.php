<?php
require_once '../../../Controllers/admin/UsersController.php';
$usersController = new UsersController();
$users = $usersController->selectAll();

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $admin = $_POST['admin'];
    $newUser = $usersController->insert($name,$email,$password,$admin);
    if($newUser){
        header('location:empty.php?page=register');

    }
}
