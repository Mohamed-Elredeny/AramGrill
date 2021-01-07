<?php
if(isset($_POST['productId'])){
    $con = mysqli_connect('localhost','root','','aramgrill');
    $productId = $_POST['product'];
    $deleteSql = "delete from currentorder where id =$productId";
    $deleteQuery = mysqli_query($con,$deleteSql);


}