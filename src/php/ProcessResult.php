
<?php
//This file will process the result polymorphically
session_start();
require_once("BaseResult.php");
require_once("SpecificResults.php");

$user_id=$_SESSION['unique_id'];

$x=file_get_contents("php://input");
$y=json_decode($x);
$y=get_object_vars($y);
$g=new GroupResult($y);
$g->processResult();
echo json_encode($g);

$p=123;



?>