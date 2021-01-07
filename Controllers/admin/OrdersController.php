<?php
require_once 'CurrentOrderController.php';
require_once 'ProductsController.php';
$CurrentOrderController = new CurrentOrderController();
$products  = new ProductsController();
//selectSizeWithId to get total price
class OrdersController
{
    private $host="localhost";
    private $username="root";
    private $password="";
    private $database="aramgrill";
    private $con=null;

    function __construct() {
        $con = mysqli_connect($this->host,$this->username,$this->password,$this->database);
        $this->con = $con;
    }
    public function addOrder($products,$amounts,$totalPrice,$size){
        $created_at =  date("Y-m-d h:i:sa");
        $sql = "insert into allorders (products,amounts,sizes,totalPrice,created_at) values ('$products','$amounts','$size','$totalPrice','$created_at') ";
        $query = mysqli_query($this->con,$sql);
        if($query){
            return 1;
        }else{
            return 2;
        }
    }
    public function deleteWithId(){
        $deleteSql = "delete from currentorder";
        $query =mysqli_query($this->con,$deleteSql);
        if($query){
            echo "Done";
        }else{
            echo "Statement Error";
        }
    }

}

function OnClickAddOrder(){
    $CurrentOrderController = new CurrentOrderController();
    $products  = new ProductsController();
    $OrdersController = new OrdersController();
    $curentOrder = $CurrentOrderController->selectAll();
    $totalPrice=0;

    for($i=0;$i<count($curentOrder);$i++) {
        $productsArr [$i]= $curentOrder[$i]['id'];
        $quantityArr [$i] = $curentOrder[$i]['quantity'];
        $priceArr [$i] = $products->selectPriceWithId($curentOrder[$i]['product_id']);

        $totalPrice+= $priceArr[$i] *    $quantityArr [$i];
    }


    $products = implode('&',$productsArr);
    $amounts = implode('&',$quantityArr);
    $size = 's&s&s';

    $OrdersController->addOrder($products,$amounts,$totalPrice,$size);
    $OrdersController->deleteWithId();
}
function OnClickDelete($con){
    $sql = "delete from currentorder";
    $query =mysqli_query($con,$sql);
    if($query){
        echo "Done";
    }else{
        echo "Statement Error";
    }
}