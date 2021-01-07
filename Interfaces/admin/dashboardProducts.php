<?php
require_once '../../../Controllers/admin/ProductsController.php';
$usersControllers = new ProductsController();
$users = $usersControllers->selectAll();


if(isset($_POST['registermeal'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $size =$_POST['size'];
    $sizeCost =$_POST['sizeCost'];

    $newUsers = $usersControllers->insert($name,$price,$category_id,$size,$sizeCost);
    if($newUsers){
        header('location:empty.php?page=registerproduct&id='.$_GET['id'].'');
    }
}
