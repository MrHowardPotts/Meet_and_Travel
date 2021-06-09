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
$image=$obj['imageWish'];
$x=$coordinates['long'];
$y=$coordinates['lat'];

$image_path="images/wish".time().".png";
file_put_contents($image_path,base64_decode($image));
$image_path="php/".$image_path;

$sql="INSERT INTO wish (`iduser`, `budget`, `from`, `to`, `location`, `coordinate_x`, `coordinate_y`, `image`)
 VALUES ({$user_id},{$budget},'{$from}','{$to}','{$where}',{$x},{$y},'{$image_path}')";

DB::Execute($sql);

$sql="Select * from wish order by wish.idwish desc";
$rows=DB::getRows($sql);
$idwish=$rows[0]['idwish'];
$groupName=$obj['groupName'];
$image=$obj['imageGroup'];

$image_path="images/group".time().".png";
file_put_contents($image_path,base64_decode($image));
$image_path="php/".$image_path;

$sql="INSERT INTO `groups`(`idleader`, `idwish`, `name`, `image`) 
VALUES ({$user_id},{$idwish},'{$groupName}','{$image_path}')";
DB::Execute($sql);

$sql="Select * from groups order by groups.idgroup desc";
$rows=DB::getRows($sql);
$idgroup=$rows[0]['idgroup'];
$sql="INSERT INTO `member`(`idgroup`, `iduser`) 
VALUES ({$idgroup},{$user_id})";
DB::Execute($sql);

echo "ok"
?>