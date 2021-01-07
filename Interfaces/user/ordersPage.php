<?php
require_once '../Controllers/admin/CategoriesController.php';
require_once '../Controllers/admin/ProductsController.php';
require_once '../Controllers/admin/CurrentOrderController.php';

$categories = new CategoriesController();
$products = new ProductsController();
$CurrentOrderController = new CurrentOrderController();
//All Categories
$allCats = $categories->selectAll();
$allMealInOneOrder = $CurrentOrderController->selectAll();
//$productsInEachCategory = $products->selectWithForignKey(1);
