<?php
session_start();

//capture data
$userid=$_SESSION["unique_id"];
$messageid=$_GET['messageId']; // do ovog id-a je stigao Worker (Listener Thread)
$groupid=$_GET['groupId'];

require_once('../DB.php');
require_once('../Message.php');

$sql = "SELECT * FROM message where idmessage>{$messageid} and idgroup={$groupid}";

$rows=DB::getRows($sql);
$messages=[];
for($i=0;$i<count($rows);$i++){
    $row=$rows[$i];
$messages[]=new Message($row[0],$row[1],$row[2],$row[3]);
}
if(count($messages)==0){
    header("HTTP/1.1 204 NO CONTENT");
    return;
}
//$x5=$stmt->close();


$data = [ 'user_id' => $userid, 'messages' => $messages ];

echo json_encode( $data );

?>