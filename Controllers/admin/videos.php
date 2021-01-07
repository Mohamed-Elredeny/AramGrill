<?php
$con= mysqli_connect('localhost','root','','aramgrill');

$fields = ['name','email','password','admin'];
$values = ['moka','moka@yahoo.com',123,1];
$count = count($fields);

$test = implode(',',$fields);
$test2="'".implode("','",$values)."'" ;
echo $test2;

$sql = "insert into users ($test) values ($test2)";
$query =mysqli_query($con,$sql);
if($query){
    echo 'done';
}else{
    echo 'sad';
}
