<?php
require_once('DB.php');
require_once('Message.php');
$conn=DB::getInstance();
$sql = "SELECT * FROM message where idmessage>:messageid";

$res = $conn->prepare($sql);

//$stmt->bind_param("i", $_GET['messageId']);
$x1=$res->execute(['messageid'=>$_GET['messageId']]);
//$x2=$stmt->store_result();
//$x3=$stmt->bind_result($cid, $cname, $name, $adr);
$messages=[];
foreach($res->fetchAll() as $red){
$messages[]=new Message($red[0],$red[1],$red[2],$red[3]);
}
if(count($messages)==0){
    header("HTTP/1.1 204 NO CONTENT");
    return;
}
//$x5=$stmt->close();

$data=["Luka","je","car"];
$data2 = [ 'name' => 'God', 'age' => -1 ];
$data3=array($data,$data2);
echo json_encode( $messages );

?>