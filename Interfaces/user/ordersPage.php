<?php
require_once '../Controllers/admin/CategoriesController.php';
require_once '../Controllers/admin/ProductsController.php';
require_once '../Controllers/admin/CurrentOrderController.php';
$con = mysqli_connect('localhost','root','','aramgrill');
$categories = new CategoriesController();
$products = new ProductsController();
$CurrentOrderController = new CurrentOrderController();
//All Categories
$allCats = $categories->selectAll();
$allMealInOneOrder = $CurrentOrderController->selectAll();
//$productsInEachCategory = $products->selectWithForignKey(1);
require_once '../Controllers/admin/OrdersController.php';

if(isset($_POST['ConfirmOrder'])){
    OnClickAddOrder();
    header('location:ajax/empty.php?page=confirmOrder');
}elseif (isset($_POST['DeleteOrder'])){
    OnClickDelete($con);
    header('location:ajax/empty.php?page=DeleteOrder');

}