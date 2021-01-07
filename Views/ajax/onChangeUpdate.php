<?php


class ProductsController
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "aramgrill";
    private $con = null;

    function __construct()
    {
        $con = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        $this->con = $con;
    }

    public function insert($name, $price, $category_id, $size, $sizeCost)
    {
        $insert_video_sql = "INSERT INTO `products`( `name`,`price`,`category_id`,`size`,`sizeCost`) VALUES ('$name','$price','$category_id','$size','$sizeCost')";
        $query = mysqli_query($this->con, $insert_video_sql);
        if ($query) {
            //Eslam
            //move_uploaded_file($_FILES['VideoUrl']['tmp_name'],$target_file);
            //move_uploaded_file($url_tmp,$target_file);
            return 1;
        } else {
            return 0;
        }
    }

    public function selectAll()
    {
        $selectAll = "select * from products ";
        $query = mysqli_query($this->con, $selectAll);
        if ($query) {
            $records = mysqli_fetch_all($query, MYSQLI_ASSOC);
            return $records;
        } else {
            echo "Statement Error";
            $records = null;
            return $records;
        }

    }

    public function selectWithId($id)
    {
        $selectWithId = "select * from products where id ='$id' ";
        $query = mysqli_query($this->con, $selectWithId);
        if ($query) {

            $records = mysqli_fetch_all($query, MYSQLI_ASSOC);
            return $records;
        } else {
            echo "Statement Error";
            $records = null;
            return $records;
        }
    }

    public function selectWithForignKey($key)
    {
        $selectWithId = "select * from products where category_id ='$key' ";
        $query = mysqli_query($this->con, $selectWithId);
        if ($query) {

            $records = mysqli_fetch_all($query, MYSQLI_ASSOC);
            return $records;
        } else {
            echo "Statement Error";
            $records = null;
            return $records;
        }
    }

    public function deleteAll()
    {
        $deleteSql = "delete from products";
        $query = mysqli_query($this->con, $deleteSql);
        if ($query) {
            echo "Done";
        } else {
            echo "Statement Error";
        }
    }

    public function deleteWithId($id)
    {
        $deleteSql = "delete from products where id =$id";
        $query = mysqli_query($this->con, $deleteSql);
        if ($query) {
            echo "Done";
        } else {
            echo "Statement Error";
        }
    }

    public function updateWithId($id, $url, $section_id)
    {
        $updateQuery = "update products set url='$url', section_id='$section_id' where id ='$id' ";
        $query = mysqli_query($this->con, $updateQuery);
        if ($query) {
            echo "Done";
        } else {
            echo "Statement Error";
        }

    }

    public function VideoExist($url)
    {
        $selectWithName = "select * from products where url ='$url' ";
        $query = mysqli_query($this->con, $selectWithName);
        if ($query) {
            $records = mysqli_fetch_all($query, MYSQLI_ASSOC);
        } else {
            $records = 0;
        }

        if (count($records) > 0) {
            return 1;
        } else {
            return 0;
        }

    }
}
$ProductsController = new ProductsController();


$con = mysqli_connect('localhost','root','','aramgrill');

function selectWithId($id,$con){
    $selectWithId = "select * from products where id ='$id' ";
    $productsQuery = mysqli_query($con, $selectWithId);
    if($productsQuery){
        $records = mysqli_fetch_all($productsQuery,MYSQLI_ASSOC);
        return $records;
    }else{
        echo "Statement Error";
        $records = null;
        return $records;
    }
}

$mealID = $_POST['mealID'];
$quantity = $_POST['quantity'];

$sqlAddNewOrder = "UPDATE `currentorder` SET quantity=$quantity WHERE id= $mealID";
$addNewOrder = mysqli_query($con,$sqlAddNewOrder);





if($addNewOrder) {
    $sqlSelectOrderMeals = "select * from currentorder";
    $SelectOrderMeals = mysqli_query($con, $sqlSelectOrderMeals);
    $ViewOrderMeals = mysqli_fetch_all($SelectOrderMeals, MYSQLI_ASSOC);
    if (count(@$ViewOrderMeals) > 0) {
      header('location:empty.php?page=thanksGod');

    }
}

?>

