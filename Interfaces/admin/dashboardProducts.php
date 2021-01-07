<?php
require_once '../../../Controllers/admin/ProductsController.php';
$usersController = new ProductsController();
$users = $usersController->selectAll();

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $size =$_POST['size'];
    $sizeCost =$_POST['sizeCost'];

    $newUser = $usersController->insert($name,$price,$category_id,$size,$sizeCost);
    if($newUser){
        header('location:empty.php?page=registerproduct&id='.$_GET['id'].'');
    }
}
