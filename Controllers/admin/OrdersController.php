<?php
require_once 'CurrentOrderController.php';
$CurrentOrderController = new CurrentOrderController();
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
}

$OrdersController = new OrdersController();
$curentOrder = $CurrentOrderController->selectAll();

for($i=0;$i<count($curentOrder);$i++) {
    $productsArr [$i]= $curentOrder[$i]['id'];
    $quantityArr [$i] = $curentOrder[$i]['quantity'];
}


$products = implode('&',$productsArr);
$amounts = implode('&',$quantityArr);
$size = 's&s&s';
$totalPrice = 20;
echo $OrdersController->addOrder($products,$amounts,$totalPrice,$size);