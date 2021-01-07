<?php
require_once 'AutoId.php';
$id = create_guid();
class CategoriesController{
    private $host="localhost";
    private $username="root";
    private $password="";
    private $database="aramgrill";
    private $con=null;

    function __construct() {
        $con = mysqli_connect($this->host,$this->username,$this->password,$this->database);
        $this->con = $con;
    }

    public function insert($name){
        $insert_video_sql ="INSERT INTO `categories`( `name`) VALUES ('$name')";
        $query = mysqli_query($this->con,$insert_video_sql);
        if($query){
            //Eslam
            //move_uploaded_file($_FILES['VideoUrl']['tmp_name'],$target_file);
            //move_uploaded_file($url_tmp,$target_file);
            return 1;
        }else{
            return 0;
        }
    }

    public function selectAll(){
        $selectAll = "select * from categories ";
        $query =mysqli_query($this->con,$selectAll);
        if($query){
            $records = mysqli_fetch_all($query,MYSQLI_ASSOC);
            return $records;
        }else{
            echo "Statement Error";
            $records = null;
            return $records;
        }

    }
    public function selectWithId($id){
        $selectWithId = "select * from categories where id ='$id' ";
        $query =mysqli_query($this->con,$selectWithId);
        if($query){

            $records = mysqli_fetch_all($query,MYSQLI_ASSOC);
            return $records;
        }else{
            echo "Statement Error";
            $records = null;
            return $records;
        }
    }
    public function deleteAll(){
        $deleteSql = "delete from categories";
        $query =mysqli_query($this->con,$deleteSql);
        if($query){
            echo "Done";
        }else{
            echo "Statement Error";
        }
    }
    public function deleteWithId($id){
        $deleteSql = "delete from categories where id =$id";
        $query =mysqli_query($this->con,$deleteSql);
        if($query){
            echo "Done";
        }else{
            echo "Statement Error";
        }
    }
    public function updateWithId($id,$url,$section_id){
        $updateQuery = "update categories set url='$url', section_id='$section_id' where id ='$id' ";
        $query =mysqli_query($this->con,$updateQuery);
        if($query){
            echo "Done";
        }else{
            echo "Statement Error";
        }

    }
    public function VideoExist($url){
        $selectWithName = "select * from categories where url ='$url' ";
        $query =mysqli_query($this->con,$selectWithName);
        if($query){
            $records = mysqli_fetch_all($query,MYSQLI_ASSOC);
        }else{
            $records = 0;
        }

        if(count($records)>0){
            return 1;
        }else{
            return 0;
        }

    }
}
