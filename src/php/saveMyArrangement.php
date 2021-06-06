<?php
session_start();
require_once "../DB.php";

$user_id=$_SESSION['unique_id'];

$json_string=file_get_contents("php://input");
$json_obj=json_decode($json_string);
$obj=get_object_vars($json_obj);

$price=$obj['price'];
$where=$obj['where'];
$from=$obj['from'];
$to=$obj['to'];
$image=$obj['image'];


$sql="INSERT INTO arrangement (`idagency`, `from`, `to`, `location`, `price`, `image`)
 VALUES ({$user_id},'{$from}','{$to}','{$where}',{$price},'{$image}')";

DB::Execute($sql);

echo "ok"
?>