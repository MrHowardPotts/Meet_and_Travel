<?php
session_start();
require_once "../DB.php";

$json_string=file_get_contents("php://input");
$json_obj=json_decode($json_string);
$obj=get_object_vars($json_obj);

$sql = "UPDATE `user` SET `username`='{$obj['username']}',`firstname`='{$obj['firstname']}',`lastname`='{$obj['lastname']}',`bio`='{$obj['bio']}',`image`='{$obj['image']}' WHERE iduser = '{$_SESSION['unique_id']}'";

if(isset($sql)) DB::Execute($sql);


echo "success";