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
        $sql = "INSERT INTO `accepted_arrangement`(`idgroup`, `idarrangement`) VALUES ('{$obj['idgroup']}','{$obj['idarrangemnt']}')";
        break;
    case "pay":
        $sql = "SELECT * FROM `paid` WHERE  idgroup = '{$obj['groupId']}' AND iduser = '{$obj['iduser']}' AND idarrangement = '{$obj['idarrangement']}'";
        if(count(DB::getRows($sql)) == 0){
            $sql = "INSERT INTO `paid`(`idgroup`, `iduser`, `idarrangement`, `amount`) VALUES ('{$obj['groupId']}','{$obj['iduser']}','{$obj['idarrangement']}','{$obj['amount']}')";
        }else {
            $sql = "SELECT amount FROM `paid` WHERE  idgroup = '{$obj['groupId']}' AND iduser = '{$obj['iduser']}' AND idarrangement = '{$obj['idarrangement']}'";         
            $old_amount = DB::getRows($sql)[0][0];
            $add_value = intval($obj['amount']);
            $new_amount = intval($old_amount) + (int)$obj['amount'];
            $sql = "UPDATE `paid` SET `amount`='{$new_amount}' WHERE idgroup = '{$obj['groupId']}' AND iduser = '{$obj['iduser']}' AND idarrangement = '{$obj['idarrangement']}'";
        }
        break;
    
}

if(isset($sql)){
    DB::Execute($sql);
    echo "QUERY DONE";
}