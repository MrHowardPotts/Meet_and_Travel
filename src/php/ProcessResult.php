
<?php
//This file will process the result polymorphically
session_start();

$user_id=$_SESSION['unique_id'];

require_once("BaseResult.php");
require_once("SpecificResults.php");



$json_string=file_get_contents("php://input");
$json_obj=json_decode($json_string);
$obj=get_object_vars($json_obj);
switch($obj['class']){
    case "group":
        $g=new GroupResult($obj);
        $g->processResult();
        echo json_encode($g);
        break;

    case "mygroup":
        $g=new MyGroupResult($obj,$user_id);
        $g->processResult();
        echo json_encode($g);
        break;
    case "members":
        $g=new MembersResult($obj);
        $g->processResult();
        echo json_encode($g);
        break;
    case "request":
        $g=new RequestResult($obj,$user_id);
        $g->processResult();
        echo json_encode($g);
        break;
    case "wish":
        $g=new WishResult($obj,$user_id);
        $g->processResult();
        echo json_encode($g);
        break;
    case "acceptedArr":
        $g=new AccepterArrResult($obj,$user_id);
        $g->processResult();
        echo json_encode($g);
        break;
}
$p=123;



?>