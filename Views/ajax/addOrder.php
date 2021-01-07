<?php
require_once '../../Controllers/admin/ProductsController.php';
$products = new ProductsController();



$con = mysqli_connect('localhost','root','','aramgrill');
function checkWeatherExistOrNot($con,$productId){
    $sql = "select * from currentorder where product_id	 = '$productId'";
    $query = mysqli_query($con,$sql);
    $results = mysqli_fetch_all($query,MYSQLI_ASSOC);
    if(count(@$results) > 0){
        return $results[0]['id'];
    }else{
        return  0;
    }
}
function getQuantityWithId($con,$id){
    $sql = "select * from currentorder where id	 = '$id'";
    $query = mysqli_query($con,$sql);
    $results = mysqli_fetch_all($query,MYSQLI_ASSOC);
    if(count(@$results) > 0){
        return $results[0]['quantity'];
    }else{
        return  0;
    }
}

/*$id=  checkWeatherExistOrNot($con,1);
$quantity = getQuantityWithId($con,$id);
$quantity+=1;


echo $id . "<br>" . $quantity . '<br>';

$sqlAddNewOrder = "UPDATE `currentorder` SET quantity=$quantity WHERE id= $id";
$addNewOrder = mysqli_query($con,$sqlAddNewOrder);*/



if(isset($_POST['productId'])){
    $output='';
    if(checkWeatherExistOrNot($con,$_POST['productId']) === 0){
        $sqlAddNewOrder = "INSERT INTO `currentorder` (`id`, `product_id`,`quantity`) VALUES (NULL, '".$_POST['productId']."',1);";
    }else{
        $id = checkWeatherExistOrNot($con,$_POST['productId']);
        $quantity = getQuantityWithId($con,$id);
        $quantity +=1;
        $sqlAddNewOrder = "UPDATE `currentorder` SET quantity=$quantity WHERE id= $id";
    }
    $addNewOrder = mysqli_query($con,$sqlAddNewOrder);

    $sqlSelectOrderMeals = "select * from currentorder";
    if($addNewOrder){
        $SelectOrderMeals = mysqli_query($con,$sqlSelectOrderMeals);
        $ViewOrderMeals = mysqli_fetch_all($SelectOrderMeals,MYSQLI_ASSOC);
        if(count(@$ViewOrderMeals) > 0) {
            $output = ' <div class="table-container col-7" style="width: 100%">
            <table dir="rtl" class="table"  style="height: 500px">
                <thead class="table-dark">
                    <tr>
                        <th>الرقم</th>
                        <th>الوجبة</th>
                        <th>العدد</th>
                        <th>السعر</th>
                        <th>
                            حذف
                        </th>
                    </tr>
                </thead>
                <tbody>
                ';
            for ($i=0;$i<count(@$ViewOrderMeals);$i++){
            $output .='
                <tr>
                    <td width="30px">'.($i+1).'</td>
                    <td>'.$products->selectWithId($ViewOrderMeals[$i]['product_id'])[0]['price'].'</td>
                    <td>'.$ViewOrderMeals[$i]['quantity'].'</td>
                    <td>1</td>
                    <td>
                        <button style="height : 32px; " type="button" class="btn btn-danger">X</button>
                    </td>
                </tr>
                ';
            }
            $output .='
                <tr class="table-dark" style="height: 50px">
                    <td colspan="2">اجمالي المبلغ</td>
                    <td colspan="3">
                        500 جنية
                    </td>
                    
                </tr>
                </tbody>
            </table>
            <div style="width:100% ; text-align:center" >
                <button type="button" class="btn btn-success" style="width:30%">تاكيد الطلب</button>
                <button type="button" class="btn btn-danger" style="width:30%">حذف الطلب</button>
            </div>
        </div>
        ';

            echo $output;
        }else{
            $output = "<h2>No thing yet !</h2>";
            echo $output;
        }
    }else{
        //header('location:../order.php');
    }
}