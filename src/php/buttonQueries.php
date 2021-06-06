<?php
session_start();
require_once "../DB.php";

$user_id=$_SESSION['unique_id'];


$json_string=file_get_contents("php://input");
$json_obj=json_decode($json_string);
$obj=get_object_vars($json_obj);

switch($obj['class']){
    case "acceptGRrequest":
        $sql = "DELETE FROM `request` WHERE idgroup = '{$obj['idgroup']}' AND iduser = '{$obj['iduser']}'"; 
        DB::Execute($sql);                
        $sql = "INSERT INTO `member` (`idgroup`, `iduser`) VALUES ('{$obj['idgroup']}' ,'{$obj['iduser']}')";
        break;
    case "rejectGRrequest":
        $sql = "DELETE FROM `request` WHERE idgroup = '{$obj['idgroup']}' AND iduser = {$obj['iduser']}";
        break;
    case "requestToJoin":
        $sql = "INSERT INTO `request` (`idgroup`, `iduser`) VALUES ('{$obj['idgroup']}' ,$user_id)";
        break;
    case "acceptArrangement":
        
        break;
    
    //todo jos pay da se uradi sa conetovim modalom
}

if(isset($sql)){
    DB::Execute($sql);
    echo "QUERY DONE";
}