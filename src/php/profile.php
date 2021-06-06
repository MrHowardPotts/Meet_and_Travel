<?php
session_start();
require_once "../DB.php";

// $json_string=file_get_contents("php://input");
// $json_obj=json_decode($json_string);
// $obj=get_object_vars($json_obj);

  $fname =  $_POST['fname'];
  $lname = $_POST['lname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm = $_POST['confirm'];
//   $biog = htmlspecialchars($_POST['bio']);
$biog = $_POST['biorafija'];
  

$sql = "UPDATE `user` SET `username`='{$username}',`firstname`='{$fname}',`lastname`='{$lname}',`bio`='{$biog}',`image`='{}' WHERE iduser = '{$_SESSION['unique_id']}'";

if(isset($sql)) DB::Execute($sql);


echo "success";