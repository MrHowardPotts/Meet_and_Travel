<?php
session_start();
require_once "../DB.php";

$user_id=$_SESSION['unique_id'];

$json_string=file_get_contents("php://input");
$json_obj=json_decode($json_string);
$obj=get_object_vars($json_obj);

$coordinates=DB::getCoordinates($obj['where']);
$budget=$obj['budget'];
$where=$obj['where'];
$from=$obj['from'];
$to=$obj['to'];
$image=$obj['image'];
$x=$coordinates['long'];
$y=$coordinates['lat'];

$sql="INSERT INTO wish (`iduser`, `budget`, `from`, `to`, `location`, `coordinate_x`, `coordinate_y`, `image`)
 VALUES ({$user_id},{$budget},'{$from}','{$to}','{$where}',{$x},{$y},'{$image}')";

DB::Execute($sql);

echo "ok"
?>